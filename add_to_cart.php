<?php
session_start();
include "config/db.php";

$id = $_GET['id'];
$color = $_GET['color'] ?? '';
$material = $_GET['material'] ?? ''; // ✅ đổi tên

$stmt = $conn->prepare("SELECT * FROM products WHERE id=?");
$stmt->execute([$id]);
$product = $stmt->fetch();

if (!$product) {
    die("Sản phẩm không tồn tại");
}

/* KEY */
$key = $id . "_" . $color . "_" . $material;

if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

/* CHECK STOCK */
$currentQty = $_SESSION['cart'][$key]['qty'] ?? 0;

if ($currentQty + 1 > $product['stock']) {
    die("⚠️ Sản phẩm chỉ còn {$product['stock']} cái!");
}

/* ADD CART */
if(isset($_SESSION['cart'][$key])){
    $_SESSION['cart'][$key]['qty']++;
}else{
    $_SESSION['cart'][$key] = [
        'id' => $id,
        'name' => $product['name'],
        'price' => $product['price'],
        'color' => $color ?: 'Không chọn',
        'material' => $material ?: 'Không chọn', // ✅ đổi
        'qty' => 1
    ];
}

header("Location: cart.php");