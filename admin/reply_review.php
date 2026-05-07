<?php
session_start();
include "../config/db.php";

if(!isset($_SESSION['admin'])){
    die("Không có quyền");
}

$id = $_POST['id'];
$reply = $_POST['reply'];

$conn->prepare("
    UPDATE reviews 
    SET reply=?, reply_at=NOW()
    WHERE id=?
")->execute([$reply, $id]);

header("Location: reviews.php");