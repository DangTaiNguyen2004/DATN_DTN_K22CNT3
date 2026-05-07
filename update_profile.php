<?php
session_start();
include "config/db.php";

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];

$name  = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// GIỮ AVATAR CŨ
$avatar = $user['avatar'] ?? 'default.png';

// UPLOAD AVATAR MỚI
if(!empty($_FILES['avatar']['name'])){
    $avatar = time().'_'.$_FILES['avatar']['name'];

    move_uploaded_file(
        $_FILES['avatar']['tmp_name'],
        "assets/images/avatar/".$avatar
    );
}

// UPDATE DB
$conn->prepare("
    UPDATE users 
    SET name=?, email=?, phone=?, avatar=?
    WHERE id=?
")->execute([$name, $email, $phone, $avatar, $user['id']]);

// UPDATE SESSION
$_SESSION['user']['name']   = $name;
$_SESSION['user']['email']  = $email;
$_SESSION['user']['phone']  = $phone;
$_SESSION['user']['avatar'] = $avatar;

// QUAY LẠI PROFILE
header("Location: profile.php");
exit;