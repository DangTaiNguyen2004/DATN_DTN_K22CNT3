<?php
include "auth.php";
include "../config/db.php";

/* ĐẾM */
$totalProducts = $conn->query("SELECT COUNT(*) FROM products")->fetchColumn();
$totalUsers    = $conn->query("SELECT COUNT(*) FROM users")->fetchColumn();
$totalOrders   = $conn->query("SELECT COUNT(*) FROM orders")->fetchColumn();
$totalContacts = $conn->query("SELECT COUNT(*) FROM contacts")->fetchColumn();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Quản trị hệ thống</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/css/admin_home.css">
</head>

<body>

<div class="admin-wrapper">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h4>⚙ Quản trị hệ thống</h4>

        <a href="index.php">📊 Bảng điều khiển</a>
<a href="products.php">📦 Sản phẩm</a>
<a href="featured_add.php">📦 Sản phẩm nổi bật</a>
<a href="order_detail.php">🧾 Đơn hàng</a>
<a href="users.php">👤 Người dùng</a>
<a href="banners.php">🖼 Banner</a>
<a href="artisans.php">🎨 Nghệ nhân</a>
<a href="contacts.php">📨 Liên hệ</a>
<a href="company.php">🏢 Công ty</a>
<a href="news.php">📰 Tin tức</a>
<a href="logout.php" class="logout">🚪 Đăng xuất</a>
    </div>

    <!-- MAIN -->
    <div class="main">

        <h3 class="mb-4">Quản trị nội dung</h3>

        <div class="row g-4">

            <!-- PRODUCT -->
            <div class="col-md-3">
                <a href="products.php" class="box red">
                    <h2><?= $totalProducts ?></h2>
                    <p>Sản phẩm</p>
                </a>
            </div>

            <!-- ORDER -->
            <div class="col-md-3">
                <a href="order_detail.php" class="box blue">
                    <h2><?= $totalOrders ?></h2>
                    <p>Đơn hàng</p>
                </a>
            </div>

            <!-- USER -->
            <div class="col-md-3">
                <a href="users.php" class="box green">
                    <h2><?= $totalUsers ?></h2>
                    <p>Người dùng</p>
                </a>
            </div>

            <!-- CONTACT -->
            <div class="col-md-3">
                <a href="contacts.php" class="box yellow">
                    <h2><?= $totalContacts ?></h2>
                    <p>Liên hệ</p>
                </a>
            </div>

        </div>

    </div>

</div>

</body>
</html>