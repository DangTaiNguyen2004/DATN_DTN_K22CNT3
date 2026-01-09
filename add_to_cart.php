<?php
session_start();
include "config/db.php";

$id = $_GET['id'];

$product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch();

if (!$product) {
    die("Sản phẩm không tồn tại");
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['qty'] += 1;
} else {
    $_SESSION['cart'][$id] = [
        'name' => $product['name'],
        'price' => $product['price'],
        'image' => $product['image'],
        'qty' => 1
    ];
}

header("Location: cart.php");
