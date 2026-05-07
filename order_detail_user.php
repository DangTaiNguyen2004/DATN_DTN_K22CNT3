<?php
session_start();
include "config/db.php";

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user']['id'];
$order_id = $_GET['id'] ?? 0;

// CHECK QUYỀN
$stmt = $conn->prepare("
    SELECT * FROM orders 
    WHERE id=? AND user_id=?
");
$stmt->execute([$order_id, $user_id]);
$order = $stmt->fetch();

if(!$order){
    die("Không tìm thấy đơn hàng");
}

// LẤY SẢN PHẨM
$stmt = $conn->prepare("
    SELECT * FROM order_items 
    WHERE order_id=?
");
$stmt->execute([$order_id]);
$items = $stmt->fetchAll();
?>

<link rel="stylesheet" href="assets/css/order_user.css">

<div class="order-user-container">

    <h2>🧾 Chi tiết đơn #<?= $order['id'] ?></h2>

    <!-- THÔNG TIN -->
    <div class="order-info">
        <p><b>Họ tên:</b> <?= $order['customer_name'] ?></p>
        <p><b>SĐT:</b> <?= $order['phone'] ?></p>
        <p><b>Địa chỉ:</b> <?= $order['address'] ?></p>
        <p><b>Thanh toán:</b> <?= $order['payment_method'] ?></p>
        <p><b>Vận chuyển:</b> <?= $order['shipping_method'] ?></p>
    </div>

    <!-- TRẠNG THÁI -->
    <div class="order-status">
        Trạng thái: <b><?= $order['status'] ?></b>
    </div>

    <!-- DANH SÁCH -->
    <table class="order-table">
        <tr>
            <th>Sản phẩm</th>
            <th>Màu</th>
            <th>Gỗ</th>
            <th>SL</th>
            <th>Giá</th>
        </tr>

        <?php foreach($items as $i): ?>
        <tr>
            <td><?= $i['product_name'] ?></td>
            <td><?= $i['color'] ?></td>
            <td><?= $i['wood'] ?></td>
            <td><?= $i['quantity'] ?></td>
            <td><?= number_format($i['price']) ?> đ</td>
        </tr>
        <?php endforeach; ?>
    </table>

    <div class="order-total-box">

    <p>
        Tổng tiền: 
        <b><?= number_format($order['total']) ?> đ</b>
    </p>

    <p style="color:red;">
        Giảm giá: 
        <?php if(($order['discount'] ?? 0) > 0): ?>
            -<?= number_format($order['discount']) ?> đ
        <?php else: ?>
            0 đ
        <?php endif; ?>
    </p>

    <p style="color:green; font-size:18px;">
        Thành tiền: 
        <b>
            <?= number_format($order['final_total'] ?? ($order['total'] - ($order['discount'] ?? 0))) ?> đ
        </b>
    </p>

</div>

    <a href="profile.php" class="back-btn">← Quay lại</a>

</div>
<style>.order-total-box {
    margin-top: 20px;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 10px;
}
.order-total-box p {
    margin: 5px 0;
}</style>