<?php
session_start();
include "config/db.php";
include "inc/header.php";

$cart = $_SESSION['cart'] ?? [];
$user_id = $_SESSION['user']['id'] ?? null;

if(empty($cart)){
    echo "<div class='container py-5 text-center'>Giỏ hàng trống</div>";
    include "inc/footer_new.php";
    exit;
}

// LẤY DATA
$name = $_POST['name'] ?? '';
$phone = $_POST['phone'] ?? '';
$address = $_POST['address'] ?? '';

$payment = $_POST['payment'] ?? 'COD';
$shipping = $_POST['shipping'] ?? 'Hỏa tốc';

// =======================
// 🔥 TÍNH TIỀN (CHUẨN)
// =======================
$total = 0;

foreach($cart as $item){
    $total += $item['price'] * $item['qty'];
}

// 🔥 GIẢM GIÁ
$discount = 0;

if($total >= 1000000){
    $discount = $total * 0.1;
}

// không cho âm
if($discount > $total){
    $discount = $total;
}

$final_total = $total - $discount;
?>

<link rel="stylesheet" href="assets/css/confirm.css">

<div class="confirm-container">

    <!-- LEFT -->
    <div class="confirm-left">
        <h2>📦 Xác nhận đơn hàng</h2>

        <p><b>Họ tên:</b> <?= htmlspecialchars($name) ?></p>
        <p><b>SĐT:</b> <?= htmlspecialchars($phone) ?></p>
        <p><b>Địa chỉ:</b> <?= htmlspecialchars($address) ?></p>
        <p><b>Thanh toán:</b> <?= htmlspecialchars($payment) ?></p>
        <p><b>Vận chuyển:</b> <?= htmlspecialchars($shipping) ?></p>

        <div class="confirm-actions">

            <!-- SUBMIT -->
            <form action="process_checkout.php" method="post" style="flex:1">

                <input type="hidden" name="name" value="<?= htmlspecialchars($name) ?>">
                <input type="hidden" name="phone" value="<?= htmlspecialchars($phone) ?>">
                <input type="hidden" name="address" value="<?= htmlspecialchars($address) ?>">
                <input type="hidden" name="payment" value="<?= htmlspecialchars($payment) ?>">
                <input type="hidden" name="shipping" value="<?= htmlspecialchars($shipping) ?>">
                <input type="hidden" name="user_id" value="<?= $user_id ?>">

                <!-- 🔥 QUAN TRỌNG -->
                <input type="hidden" name="total" value="<?= $total ?>">
                <input type="hidden" name="discount" value="<?= $discount ?>">
                <input type="hidden" name="final_total" value="<?= $final_total ?>">

                <button class="btn-confirm">✅ Xác nhận đặt hàng</button>
            </form>

            <a href="checkout.php" class="btn-back">⬅ Quay lại</a>
        </div>
    </div>

    <!-- RIGHT -->
    <div class="confirm-right">
        <h3>🛒 Đơn hàng của bạn</h3>

        <!-- DANH SÁCH SẢN PHẨM -->
        <?php foreach($cart as $item): ?>
            <?php 
                $qty = $item['qty'] ?? 1;
                $material = $item['material'] ??'' ; // 🔥 FIX Ở ĐÂY
                $color = $item['color'] ?? '';
                $sub = $item['price'] * $qty;
            ?>
            <div class="confirm-item">
                <div>
                    <b><?= $item['name'] ?></b><br>
                    <small>Màu: <?= $color ?> | Gỗ: <?= $material ?></small>
                </div>
                <div>
                    x<?= $qty ?><br>
                    <?= number_format($sub) ?> đ
                </div>
            </div>
        <?php endforeach; ?>

        <hr>

        <!-- 🔥 TỔNG TIỀN -->
        <div class="checkout-total">
            <p>Tổng tiền: <b><?= number_format($total) ?> đ</b></p>

            <p style="color:red;">
                Giảm giá: -<?= number_format($discount) ?> đ
            </p>

            <p style="color:green; font-size:18px;">
                Thành tiền: <b><?= number_format($final_total) ?> đ</b>
            </p>
        </div>

    </div>

</div>

<?php include "inc/footer_new.php"; ?>