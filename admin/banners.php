<?php
session_start();
include __DIR__."/../config/db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

// thêm banner
if(isset($_POST['add'])){
    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "../assets/images/banner/".$img);

    $conn->prepare("INSERT INTO banners(image) VALUES(?)")
         ->execute([$img]);
}

// xóa
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $conn->prepare("DELETE FROM banners WHERE id=?")->execute([$id]);
    header("Location: banners.php");
    exit;
}

$banners = $conn->query("SELECT * FROM banners ORDER BY id DESC")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Quản lý Banner</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/admin.css">
<link rel="stylesheet" href="../assets/css/sidebar.css">
<link rel="stylesheet" href="../assets/css/banner_admin.css">

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
            <h2> QUẢN LÝ BANNER</h2>

            <!-- FORM -->
            <form method="post" enctype="multipart/form-data" class="banner-form">
                <input type="file" name="image" required>
                <button name="add">+ Thêm Banner</button>
            </form>

            <!-- LIST -->
            <div class="banner-grid">
                <?php foreach($banners as $b): ?>
                    <div class="banner-item">
                        <img src="../assets/images/banner/<?= $b['image'] ?>">
                        <a href="?delete=<?= $b['id'] ?>"
                           onclick="return confirm('Xóa banner?')">
                           🗑
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

    </div>

</div>

</body>
</html>