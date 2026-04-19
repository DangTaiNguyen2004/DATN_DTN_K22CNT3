<?php
// ===== SESSION =====
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// ===== DATABASE =====
include __DIR__ . "/../config/db.php";

// ===== BANNER =====
$banners = [];
try {
    $banners = $conn->query("SELECT * FROM banners ORDER BY id DESC LIMIT 3")->fetchAll();
} catch (Exception $e) {
    $banners = [];
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Nội thất Ngọc Quang</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/noithat_ngocquangggg/assets/css/style.css">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container-fluid px-0 d-flex align-items-center">

    <a class="navbar-brand ms-3" href="/noithat_ngocquangggg/index.php">
      <img src="/noithat_ngocquangggg/assets/images/products/logo111.png" height="50">
    </a>

    <ul class="navbar-nav ms-auto me-3 align-items-center">

      <li class="nav-item"><a class="nav-link" href="/noithat_ngocquangggg/index.php">Trang chủ</a></li>
      <li class="nav-item"><a class="nav-link" href="/noithat_ngocquangggg/gioithieu.php">Giới thiệu</a></li>
      <li class="nav-item"><a class="nav-link" href="/noithat_ngocquangggg/sanpham.php">Sản phẩm</a></li>
      <li class="nav-item"><a class="nav-link" href="/noithat_ngocquangggg/tintuc.php">Tin tức</a></li>
      <li class="nav-item"><a class="nav-link" href="/noithat_ngocquangggg/doitac.php">Đối tác</a></li>
      <li class="nav-item"><a class="nav-link" href="/noithat_ngocquangggg/nghenhan.php">Nghệ nhân</a></li>
      <li class="nav-item"><a class="nav-link" href="/noithat_ngocquangggg/lienhe.php">Liên hệ</a></li>

      <li class="nav-item">
        <a class="nav-link fw-bold" href="/noithat_ngocquangggg/cart.php">🛒</a>
      </li>

      <!-- LOGIN / LOGOUT -->
      <?php if(isset($_SESSION['user'])): ?>
        <li class="nav-item ms-2">
          <form action="/noithat_ngocquangggg/logout.php" method="post">
            <button class="btn btn-outline-danger btn-sm">Đăng xuất</button>
          </form>
        </li>
      <?php else: ?>
        <li class="nav-item ms-2">
          <a href="/noithat_ngocquangggg/admin/login.php" class="btn btn-outline-dark btn-sm">
            Đăng nhập
          </a>
        </li>
      <?php endif; ?>

    </ul>
  </div>
</nav>

<!-- BANNER -->
<?php if(!empty($banners)): ?>
<div class="banner">
  <?php foreach($banners as $b): ?>
    <div class="banner-item">
      <img src="/noithat_ngocquangggg/assets/images/banner/<?= $b['image'] ?>">
    </div>
  <?php endforeach; ?>
</div>
<?php endif; ?>

<div class="container mt-4">