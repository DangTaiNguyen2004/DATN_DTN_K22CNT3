<?php
include "auth.php";
include "../config/db.php";

$users = $conn->query("SELECT * FROM users ORDER BY id DESC")->fetchAll();
?>

<link rel="stylesheet" href="../assets/css/admin.css">
<link rel="stylesheet" href="../assets/css/sidebar.css">
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

  <div class="admin-container">
      <h1>🧑‍💼 Quản lý người dùng</h1>

      <table>
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Tên</th>
                  <th>Email</th>
                  <th>Quyền</th>
                  <th>Hành động</th>
              </tr>
          </thead>

          <tbody>
          <?php foreach ($users as $u): ?>
              <tr>
                  <td><?= $u['id'] ?></td>
                  <td><?= htmlspecialchars($u['name']) ?></td>
                  <td><?= htmlspecialchars($u['email']) ?></td>
                  <td><?= $u['role'] == 'admin' ? 'Admin' : 'User' ?></td>
                  <td class="action">
                      <?php if ($u['role'] != 'admin'): ?>
                          <a class="delete" 
                             onclick="return confirm('Xóa user?')" 
                             href="user_delete.php?id=<?= $u['id'] ?>">🗑️</a>
                      <?php else: ?>
                          <span style="color:#888">—</span>
                      <?php endif ?>
                  </td>
              </tr>
          <?php endforeach ?>
          </tbody>
      </table>
  </div>

</div>