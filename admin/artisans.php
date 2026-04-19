<?php
include "../config/db.php";

/* ===== XÓA ===== */
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $conn->query("DELETE FROM artisans WHERE id=$id");
    header("Location: artisans.php");
}

/* ===== EDIT DATA ===== */
$editData = null;
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $stmt = $conn->prepare("SELECT * FROM artisans WHERE id=?");
    $stmt->execute([$id]);
    $editData = $stmt->fetch();
}

/* ===== THÊM ===== */
if(isset($_POST['add'])){
    $name = $_POST['name'];
    $desc = $_POST['description'];

    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/artisans/".$image);

    $stmt = $conn->prepare("INSERT INTO artisans(name,image,description) VALUES(?,?,?)");
    $stmt->execute([$name,$image,$desc]);

    header("Location: artisans.php");
}

/* ===== UPDATE ===== */
if(isset($_POST['update'])){
    $id   = $_POST['id'];
    $name = $_POST['name'];
    $desc = $_POST['description'];

    if(!empty($_FILES['image']['name'])){
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/artisans/".$image);

        $stmt = $conn->prepare("UPDATE artisans SET name=?, image=?, description=? WHERE id=?");
        $stmt->execute([$name,$image,$desc,$id]);
    }else{
        $stmt = $conn->prepare("UPDATE artisans SET name=?, description=? WHERE id=?");
        $stmt->execute([$name,$desc,$id]);
    }

    header("Location: artisans.php");
}

$artisans = $conn->query("SELECT * FROM artisans ORDER BY id DESC")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Quản lý nghệ nhân</title>

<link rel="stylesheet" href="../assets/css/sidebar.css">
<link rel="stylesheet" href="../assets/css/admin.css">
<link rel="stylesheet" href="../assets/css/artisan_admin.css">

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
            <h2> QUẢN LÝ NGHỆ NHÂN</h2>

            <!-- FORM -->
            <form method="post" enctype="multipart/form-data" class="artisan-form">

                <input type="hidden" name="id" value="<?= $editData['id'] ?? '' ?>">

                <input type="text" name="name" placeholder="Tên nghệ nhân"
                       value="<?= $editData['name'] ?? '' ?>" required>

                <input type="file" name="image">

                <?php if($editData): ?>
                    <img src="../assets/images/artisans/<?= $editData['image'] ?>" class="preview">
                <?php endif; ?>

                <textarea name="description" placeholder="Mô tả"><?= $editData['description'] ?? '' ?></textarea>

                <?php if($editData): ?>
                    <button name="update">Cập nhật</button>
                    <a href="artisans.php" class="btn-cancel">Hủy</a>
                <?php else: ?>
                    <button name="add">+ Thêm</button>
                <?php endif; ?>

            </form>

            <!-- TABLE -->
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Mô tả</th>
                        <th>Hành động</th>
                    </tr>
                </thead>

                <tbody>
                <?php foreach($artisans as $a): ?>
                    <tr>
                        <td><img src="../assets/images/artisans/<?= $a['image'] ?>"></td>
                        <td><?= $a['name'] ?></td>
                        <td><?= $a['description'] ?></td>
                        <td>
                            <a href="?edit=<?= $a['id'] ?>" class="btn-edit">✏</a>
                            <a href="?delete=<?= $a['id'] ?>" 
                               class="btn-delete"
                               onclick="return confirm('Xóa?')">🗑</a>
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