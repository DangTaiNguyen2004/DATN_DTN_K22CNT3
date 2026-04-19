
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/css/sidebar.css">
<link rel="stylesheet" href="../assets/css/order_detail.css">

<?php
include "../config/db.php";
$orders = $conn->query("SELECT * FROM orders ORDER BY id DESC")->fetchAll();

?>
<div class="admin-wrapper">
  <div class="sidebar">
        <h4>⚙ Quản trị hệ thống</h4>

        <a href="index.php">📊 Bảng điều khiển</a>
<a href="products.php">📦 Sản phẩm</a>
<a href="order_detail.php">🧾 Đơn hàng</a>
<a href="users.php">👤 Người dùng</a>
<a href="banners.php">🖼 Banner</a>
<a href="artisans.php">🎨 Nghệ nhân</a>
<a href="contacts.php">📨 Liên hệ</a>
<a href="company.php">🏢 Công ty</a>
<a href="news.php">📰 Tin tức</a>
<a href="logout.php" class="logout">🚪 Đăng xuất</a>
    </div>
<div class="admin-content"> <!-- phần nội dung -->
    
    <div class="admin-card">
      <h2>📋 QUẢN LÝ ĐƠN HÀNG</h2>
    
      <table class="admin-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Khách</th>
            <th>Tổng</th>
            <th>Thanh toán</th>
            <th>Đơn vị vận chuyển</th>
            <th>Hành động</th>
          </tr>
        </thead>

        <tbody>
        <?php foreach($orders as $o): ?>
          <tr>
            <td><?= $o['id'] ?></td>
            <td><?= htmlspecialchars($o['customer_name']) ?></td>
            <td class="price"><?= number_format($o['total']) ?> đ</td>
              <td><?= $o['payment_method'] ?? '---' ?></td>
              <td><?= $o['shipping_method'] ?? '---' ?></td>
            <td>
              <a class="btn-view" href="order_view.php?id=<?= $o['id'] ?>">Xem</a>
            </td>
          </tr>
        <?php endforeach ?>
        </tbody>
      </table>

    </div>

  </div>

</div>
</div>