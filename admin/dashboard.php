
<?php
include "auth.php";
include "../config/db.php";

$totalProducts = $conn->query("SELECT COUNT(*) FROM products")->fetchColumn();
$totalUsers    = $conn->query("SELECT COUNT(*) FROM users")->fetchColumn();
$totalOrders   = $conn->query("SELECT COUNT(*) FROM orders")->fetchColumn();
$totalRevenue  = $conn->query("SELECT SUM(total) FROM orders")->fetchColumn();
?>

<link rel="stylesheet" href="../assets/css/dashboard.css">

<div class="admin-container">
    <h1>📊 Dashboard</h1>

    <div class="dashboard-grid">
        <div class="card">
            <h3>Sản phẩm</h3>
            <p><?= $totalProducts ?></p>
        </div>

        <div class="card">
            <h3>Người dùng</h3>
            <p><?= $totalUsers ?></p>
        </div>

        <div class="card">
            <h3>Đơn hàng</h3>
            <p><?= $totalOrders ?></p>
        </div>

        <div class="card highlight">
            <h3>Doanh thu</h3>
            <p><?= number_format($totalRevenue) ?> đ</p>
        </div>
    </div>
</div>
