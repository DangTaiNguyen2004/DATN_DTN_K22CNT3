<?php
include "auth.php";
include "../config/db.php";

$news = $conn->query("SELECT * FROM news ORDER BY id DESC")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Quản lý tin tức</title>

<link rel="stylesheet" href="../assets/css/sidebar.css">
<link rel="stylesheet" href="../assets/css/admin.css">
<link rel="stylesheet" href="../assets/css/news_admin.css">

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

            <div class="header-row">
                <h2>📰 QUẢN LÝ TIN TỨC</h2>
                <a href="news_add.php" class="btn-add">+ Thêm bài</a>
            </div>

            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Ảnh</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                <?php foreach($news as $n): ?>
                    <tr>
                        <td><?= $n['id'] ?></td>
                        <td class="title"><?= $n['title'] ?></td>
                        <td>
                            <img src="../assets/images/news/<?= $n['image'] ?>">
                        </td>
                        <td>
                            <a href="news_edit.php?id=<?= $n['id'] ?>" class="btn-edit">✏</a>
                            <a href="news_delete.php?id=<?= $n['id'] ?>" 
                               class="btn-delete"
                               onclick="return confirm('Xóa bài viết?')">🗑</a>
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