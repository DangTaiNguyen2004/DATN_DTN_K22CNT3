<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Nội thất Ngọc Quang</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/gioithieu.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container-fluid px-0 d-flex align-items-center">

    <a class="navbar-brand ms-3" href="index.php">
      <img src="assets/images/products/logo1.png.jpg" alt="Logo">
    </a>

    <ul class="navbar-nav ms-auto me-3 align-items-center">
      <li class="nav-item"><a class="nav-link" href="index.php">Trang chủ</a></li>
      <li class="nav-item"><a class="nav-link" href="gioithieu.php">Giới thiệu</a></li>
      <li class="nav-item"><a class="nav-link" href="sanpham.php">Sản phẩm</a></li>
      <li class="nav-item"><a class="nav-link" href="tintuc.php">Tin tức</a></li>
      <li class="nav-item"><a class="nav-link" href="doitac.php">Đối tác</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Liên hệ</a></li>
      <li class="nav-item"><a class="nav-link fw-bold" href="cart.php">🛒</a></li>
      <?php if(isset($_SESSION['user'])): ?>
  <li class="nav-item ms-2">
    <form action="logout.php" method="post">
      <button type="submit" class="btn btn-outline-danger btn-sm">
        Đăng xuất
      </button>
    </form>
  </li>
<?php endif; ?>

    </ul>

  </div>
</nav>

<section class="banner">
    <img src="https://noithathpro.com/uploads/hoan-thien-noi-that-nha-anh-hoang-4.jpg" alt="Banner giới thiệu">
    <div class="banner-text">
      <img src="https://phuongnamvina.com/img_data/images/logo-noi-that-dep.jpg" alt="Logo trắng">
      
    </div>
  </section>
<div class="container mt-4">
