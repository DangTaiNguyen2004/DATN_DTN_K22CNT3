<?php
session_start();
include "config/db.php";

if(!isset($_SESSION['user'])){
    die("Bạn chưa đăng nhập");
}

$user_id = $_SESSION['user']['id'];
$product_id = $_POST['product_id'];
$rating = $_POST['rating'];
$comment = $_POST['comment'];

/* CHECK ĐÃ REVIEW CHƯA */
$check = $conn->prepare("
    SELECT id FROM reviews 
    WHERE user_id=? AND product_id=?
");
$check->execute([$user_id, $product_id]);

if($check->rowCount() > 0){
    // 👉 UPDATE
    $conn->prepare("
        UPDATE reviews 
        SET rating=?, comment=?, created_at=NOW()
        WHERE user_id=? AND product_id=?
    ")->execute([$rating, $comment, $user_id, $product_id]);
}else{
    // 👉 INSERT
    $conn->prepare("
        INSERT INTO reviews(user_id, product_id, rating, comment)
        VALUES (?,?,?,?)
    ")->execute([$user_id, $product_id, $rating, $comment]);
}

header("Location: product.php?id=".$product_id);
exit;