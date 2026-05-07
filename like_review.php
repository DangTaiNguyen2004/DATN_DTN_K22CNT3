<?php
session_start();
include "config/db.php";

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user']['id'];
$review_id = $_POST['review_id'] ?? 0;

if(!$review_id){
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}

/* CHECK ĐÃ LIKE CHƯA */
$check = $conn->prepare("
    SELECT * FROM review_likes 
    WHERE user_id=? AND review_id=?
");
$check->execute([$user_id, $review_id]);

if($check->rowCount() > 0){
    // ❌ Đã like → UNLIKE
    $conn->prepare("
        DELETE FROM review_likes 
        WHERE user_id=? AND review_id=?
    ")->execute([$user_id, $review_id]);
}else{
    // ✅ LIKE
    $conn->prepare("
        INSERT INTO review_likes(user_id, review_id)
        VALUES (?,?)
    ")->execute([$user_id, $review_id]);
}

/* QUAY LẠI TRANG TRƯỚC */
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;