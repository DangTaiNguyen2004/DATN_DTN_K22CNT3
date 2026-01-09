<?php
session_start();

$id = $_GET['id'];
$action = $_GET['action'];

if (!isset($_SESSION['cart'][$id])) {
  header("Location: cart.php");
  exit;
}

switch ($action) {
  case 'plus':
    $_SESSION['cart'][$id]['qty']++;
    break;

  case 'minus':
    $_SESSION['cart'][$id]['qty']--;
    if ($_SESSION['cart'][$id]['qty'] <= 0) {
      unset($_SESSION['cart'][$id]);
    }
    break;

  case 'remove': // ❌ XÓA 1 SẢN PHẨM
    unset($_SESSION['cart'][$id]);
    break;
}

header("Location: cart.php");
exit;
