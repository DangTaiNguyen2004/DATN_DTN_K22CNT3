<?php
include "../config/db.php";

function mapColor($color){
    switch($color){
        case 'đen': return '#000';
        case 'trắng': return '#fff';
        case 'nâu': return '#8B4513';
        default: return '#ccc';
    }
}

$order_id = $_GET['id'] ?? 0;

/* Lấy info đơn */
$stmt = $conn->prepare("SELECT * FROM orders WHERE id=?");
$stmt->execute([$order_id]);
$order = $stmt->fetch();

/* Lấy sản phẩm */
$stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id=?");
$stmt->execute([$order_id]);
$items = $stmt->fetchAll();
?>


<link rel="stylesheet" href="../assets/css/order_view.css">
<div class="order-container">

  <div class="order-header">
    <h2>🧾 Chi tiết đơn #<?= $order['id'] ?></h2>
    <div class="order-info">
      <p><b>Khách:</b> <?= $order['customer_name'] ?></p>
      <p><b>Tổng tiền:</b> <span class="price"><?= number_format($order['total']) ?> đ</span></p>
      <p><b>Thanh toán:</b> <?= $order['payment_method'] ?? '---' ?></p>
        <p><b>Vận chuyển:</b> <?= $order['shipping_method'] ?? '---' ?></p>
    </div>
  </div>

  <table class="order-table">
    <thead>
      <tr>
        <th>Sản phẩm</th>
        <th>Màu</th>
        <th>Gỗ</th>
        <th>SL</th>
        <th>Giá</th>
      </tr>
    </thead>

    <tbody>
    <?php foreach($items as $i): ?>
      <tr>

        <td><?= $i['product_name'] ?></td>

        <td>
          <div style="display:flex;justify-content:center;align-items:center;gap:6px;">
            <span class="color-dot" style="background:<?= mapColor($i['color']) ?>"></span>
            <?= $i['color'] ?>
          </div>
        </td>

        <td><?= $i['wood'] ?? '---' ?></td>

        <td><?= $i['quantity'] ?></td>

        <td class="price"><?= number_format($i['price']) ?> đ</td>

      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>

  <a href="order_detail.php" class="back-btn">← Quay lại</a>

</div>