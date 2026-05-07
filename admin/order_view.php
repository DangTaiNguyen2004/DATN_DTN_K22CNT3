<?php
include "../config/db.php";

/* MAP MÀU */
function mapColor($color){
    switch(strtolower($color)){
        case 'đen': return '#000';
        case 'trắng': return '#fff';
        case 'nâu': return '#8B4513';
        default: return '#ccc';
    }
}

/* TEXT TRẠNG THÁI */
function statusText($s){
    switch($s){
        case 'pending': return '🕐 Chờ xử lý';
        case 'processing': return '📦 Đang chuẩn bị';
        case 'shipping': return '🚚 Đang giao';
        case 'completed': return '✅ Hoàn thành';
        default: return $s;
    }
}

$order_id = $_GET['id'] ?? 0;

/* LẤY ĐƠN */
$stmt = $conn->prepare("SELECT * FROM orders WHERE id=?");
$stmt->execute([$order_id]);
$order = $stmt->fetch();

if(!$order){
    die("Không tìm thấy đơn hàng");
}

/* LẤY SẢN PHẨM */
$stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id=?");
$stmt->execute([$order_id]);
$items = $stmt->fetchAll();
?>

<link rel="stylesheet" href="../assets/css/order_view.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<div class="order-container">

  <!-- HEADER -->
  <div class="order-header">
    <h2>🧾 Chi tiết đơn #<?= $order['id'] ?></h2>

    <div class="order-info">
      <p><b>Khách:</b> <?= htmlspecialchars($order['customer_name']) ?></p>
      <p><b>SĐT:</b> <?= $order['phone'] ?></p>
      <p><b>Địa chỉ:</b> <?= $order['address'] ?></p>

      <p><b>Tổng tiền gốc:</b> 
        <span class="price"><?= number_format($order['total']) ?> đ</span>
      </p>

      <!-- 🔥 GIẢM GIÁ -->
      <?php 
        $discount = $order['discount'] ?? 0;
        $final_total = $order['final_total'] ?? ($order['total'] - $discount);
      ?>

      <?php if($discount > 0): ?>
        <p style="color:red;"><b>Giảm giá:</b> -<?= number_format($discount) ?> đ</p>
      <?php endif; ?>

      <p style="color:green;font-size:18px;">
        <b>Thành tiền:</b> <?= number_format($final_total) ?> đ
      </p>

      <p><b>Thanh toán:</b> <?= $order['payment_method'] ?? '---' ?></p>
      <p><b>Vận chuyển:</b> <?= $order['shipping_method'] ?? '---' ?></p>

      <!-- STATUS -->
      <p>
        <b>Trạng thái:</b> 
        <span class="status-badge">
            <?= statusText($order['status']) ?>
        </span>
      </p>

      <p><b>Ngày tạo:</b> <?= $order['created_at'] ?></p>
    </div>
  </div>

  <!-- TABLE -->
  <table class="order-table table table-bordered text-center align-middle">
    <thead class="table-dark">
      <tr>
        <th>Sản phẩm</th>
        <th>Màu</th>
        <th>Gỗ</th>
        <th>SL</th>
        <th>Giá</th>
        <th>Thành tiền</th>
      </tr>
    </thead>

    <tbody>
    <?php 
        $total = 0;
        foreach($items as $i): 

            // ✅ FIX quantity
            $qty = $i['quantity'] ?? $i['qty'] ?? 1;

            $sub = $i['price'] * $qty;
            $total += $sub;
    ?>
      <tr>

        <td><?= $i['product_name'] ?></td>

        <!-- MÀU -->
        <td>
          <div style="display:flex;justify-content:center;align-items:center;gap:6px;">
            <span class="color-dot" style="background:<?= mapColor($i['color']) ?>"></span>
            <?= $i['color'] ?>
          </div>
        </td>

        <td><?= !empty($i['material']) ? $i['material'] : '---' ?></td>

        <!-- ✅ FIX -->
        <td><?= $qty ?></td>

        <td><?= number_format($i['price']) ?> đ</td>

        <td><b><?= number_format($sub) ?> đ</b></td>

      </tr>
    <?php endforeach; ?>
    </tbody>

    <tfoot>
  <tr>
    <td colspan="5">Tổng tiền</td>
    <td><?= number_format($order['total']) ?> đ</td>
  </tr>
  <tr>
    <td colspan="5">Giảm giá</td>
    <td style="color:red">-<?= number_format($discount) ?> đ</td>
  </tr>
  <tr>
    <td colspan="5"><b>Thành tiền</b></td>
    <td style="color:green"><b><?= number_format($final_total) ?> đ</b></td>
  </tr>
</tfoot>

  </table>

  <!-- BUTTON -->
  <div style="margin-top:20px">
    <a href="order_detail.php" class="btn btn-secondary">← Quay lại</a>
  </div>

</div>

<!-- STYLE -->
<style>
.order-container{
    max-width:1000px;
    margin:30px auto;
    background:#fff;
    padding:25px;
    border-radius:10px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.order-header{
    margin-bottom:20px;
}

.order-info p{
    margin:5px 0;
}

.price{
    color:#e74c3c;
    font-weight:bold;
}

.color-dot{
    width:16px;
    height:16px;
    border-radius:50%;
    border:1px solid #ccc;
}

.status-badge{
    padding:6px 12px;
    border-radius:6px;
    background:#f1f1f1;
    font-weight:bold;
}
</style>