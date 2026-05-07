<?php
session_start();
include "config/db.php"; // ❗ thêm dòng này

$id = $_GET['id'];
$action = $_GET['action'];

if (!isset($_SESSION['cart'][$id])) {
  header("Location: cart.php");
  exit;
}

/* LẤY STOCK */
$product_id = $_SESSION['cart'][$id]['id'];

$stmt = $conn->prepare("SELECT stock FROM products WHERE id=?");
$stmt->execute([$product_id]);
$product = $stmt->fetch();

$stock = $product['stock'] ?? 0;

switch ($action) {

  case 'plus':
    // ❌ KHÔNG CHO VƯỢT KHO
    if ($_SESSION['cart'][$id]['qty'] < $stock) {
      $_SESSION['cart'][$id]['qty']++;
    }
    break;

  case 'minus':
    $_SESSION['cart'][$id]['qty']--;
    if ($_SESSION['cart'][$id]['qty'] <= 0) {
      unset($_SESSION['cart'][$id]);
    }
    break;

  case 'remove':
    unset($_SESSION['cart'][$id]);
    break;
}

header("Location: cart.php");
exit;