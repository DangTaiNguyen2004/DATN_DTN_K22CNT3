<?php
include "auth.php";
include "../config/db.php";

$contacts = $conn->query("SELECT * FROM contacts ORDER BY id DESC")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Quản lý liên hệ</title>

<link rel="stylesheet" href="../assets/css/sidebar.css">
<link rel="stylesheet" href="../assets/css/admin.css">
<link rel="stylesheet" href="../assets/css/contact_admin.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="admin-wrapper">

    <!-- SIDEBAR -->
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

    <!-- CONTENT -->
    <div class="admin-content">

        <div class="admin-card">
            <h2>📩 QUẢN LÝ LIÊN HỆ</h2>

            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Điện thoại</th>
                        <th>Nội dung</th>
                        <th>Ngày gửi</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($contacts as $c): ?>
                    <tr>
                        <td><?= $c['id'] ?></td>
                        <td><?= $c['name'] ?></td>
                        <td><?= $c['email'] ?></td>
                        <td><?= $c['phone'] ?></td>
                        <td class="msg"><?= $c['message'] ?></td>
                        <td><?= $c['created_at'] ?></td>
                        <td>
                            <a href="contact_delete.php?id=<?= $c['id'] ?>" 
                               onclick="return confirm('Xóa liên hệ này?')"
                               class="btn-delete">🗑</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>

    </div>

</div>

</body>
</html>