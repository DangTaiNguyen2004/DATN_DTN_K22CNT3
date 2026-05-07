<?php
session_start();
include "inc/header.php";
include "config/db.php";

$cart = $_SESSION['cart'] ?? [];

if(empty($cart)){
    echo "<h2 style='text-align:center'>Giỏ hàng trống</h2>";
    exit;
}

// ======================
// 🔥 TÍNH TỔNG TIỀN
// ======================
$total = 0;

foreach($cart as $item){
    $qty = $item['qty'] ?? 1; // ✅ FIX
    $total += $item['price'] * $qty;
}

// ======================
// 🔥 GIẢM GIÁ
// ======================
$discount = 0;

if($total >= 1000000){
    $discount = $total * 0.1;
}

if($discount > $total){
    $discount = $total;
}

$final_total = $total - $discount;
?>

<link rel="stylesheet" href="assets/css/check_out.css">

<div class="checkout-container">

<form method="post" action="confirm.php" class="checkout-form">

  <h3>Thông tin khách hàng</h3>
  <input name="name" placeholder="Họ tên" required><br><br>
  <input name="phone" placeholder="SĐT" required><br><br>
  <input name="address" placeholder="Địa chỉ" required><br><br>

  <h3>Phương thức thanh toán</h3>
  <label><input type="radio" name="payment" value="COD" checked> Thanh toán khi nhận hàng (COD)</label><br>
  <label><input type="radio" name="payment" value="Ví điện tử"> Ví điện tử</label><br>
  <label><input type="radio" name="payment" value="Thẻ"> Thẻ ngân hàng</label><br>
  <label><input type="radio" name="payment" value="Trả sau"> Khoản trả sau</label><br><br>

  <h3>Phương thức vận chuyển</h3>
  <label><input type="radio" name="shipping" value="Hỏa tốc" checked> Hỏa tốc</label><br>
  <label><input type="radio" name="shipping" value="Giao hàng tiết kiệm"> Giao hàng tiết kiệm</label><br>
  <label><input type="radio" name="shipping" value="Giao hàng nhanh"> Giao hàng nhanh</label><br><br>

  <!-- 🔥 hidden -->
  <input type="hidden" name="total" value="<?= $total ?>">
  <input type="hidden" name="discount" value="<?= $discount ?>">
  <input type="hidden" name="final_total" value="<?= $final_total ?>">

  <button>Tiếp tục</button>
</form>

<!-- ====================== -->
<div class="checkout-summary">

    <h3>🛒 Đơn hàng của bạn</h3>

    <?php foreach($cart as $item): ?>
        <?php 
            $qty = $item['qty'] ?? 1; // ✅ FIX
            $sub = $item['price'] * $qty;
        ?>
        <div class="checkout-item">
            <div>
                <b><?= $item['name'] ?></b><br>
                <small>
                    Màu: <?= $item['color'] ?? '' ?> | 
                    Chất liệu: <?= $item['material'] ?? '---' ?> <!-- ✅ FIX -->
                </small>
            </div>
            <div>
                x<?= $qty ?><br>
                <?= number_format($sub) ?> đ
            </div>
        </div>
    <?php endforeach; ?>

    <hr>

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