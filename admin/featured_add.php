<?php
include "auth.php";
include "../config/db.php";

/* ===== THÊM ===== */
if(isset($_GET['add'])){
    $id = (int)$_GET['add'];
    $conn->query("INSERT INTO featured_products(product_id) VALUES($id)");
    header("Location: featured_add.php");
    exit();
}

/* ===== XÓA ===== */
if(isset($_GET['delete'])){
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM featured_products WHERE id=$id");
    header("Location: featured_add.php");
    exit();
}

/* ===== UPDATE ===== */
if(isset($_POST['update'])){
    $fid = (int)$_POST['fid'];
    $pid = (int)$_POST['product_id'];

    $conn->query("UPDATE featured_products SET product_id=$pid WHERE id=$fid");
    header("Location: featured_add.php");
    exit();
}

/* DATA */
$products = $conn->query("SELECT * FROM products")->fetchAll();

$featured = $conn->query("
    SELECT f.id, f.product_id, p.name, p.image 
    FROM featured_products f
    JOIN products p ON f.product_id = p.id
    ORDER BY f.id DESC
")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Sản phẩm nổi bật</title>

<link rel="stylesheet" href="../assets/css/admin_layout.css">
<link rel="stylesheet" href="../assets/css/featured_admin.css">

</head>

<body>

<div class="admin-wrapper">

    <!-- SIDEBAR -->
     <div class="sidebar">
      <h4>⚙ Quản trị hệ thống</h4>

     <a href="index.php">📊 Bảng điều khiển</a>
<a href="products.php">📦 Sản phẩm</a>
<a href="featured_add.php">📦 Sản phẩm nổi bật</a>
<a href="order_detail.php">🧾 Đơn hàng</a>
<a href="users.php">👤 Người dùng</a>
<a href="banners.php">🖼 Banner</a>
<a href="artisans.php">🎨 Nghệ nhân</a>
<a href="contacts.php">📨 Liên hệ</a>
<a href="company.php">🏢 Công ty</a>
<a href="news.php">📰 Tin tức</a>
<a href="reviews.php">⭐ Trả lời đánh giá</a>
<a href="logout.php" class="logout">🚪 Đăng xuất</a>
  </div>
    <!-- CONTENT -->
    <div class="admin-content">

        <div class="card">

            <h2>🔥 QUẢN LÝ SẢN PHẨM NỔI BẬT</h2>

            <!-- LIST PRODUCT -->
            <h3>📦 Danh sách sản phẩm</h3>

            <div class="product-list">
            <?php foreach($products as $p): ?>
                <div class="item">
                    <span><?= $p['name'] ?></span>
                    <a href="?add=<?= $p['id'] ?>" class="btn add">+ Thêm</a>
                </div>
            <?php endforeach; ?>
            </div>

            <hr>

            <!-- FEATURED -->
            <h3>⭐ Sản phẩm nổi bật</h3>

            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Ảnh</th>
                    <th>Tên</th>
                    <th>Cập nhật</th>
                    <th></th>
                </tr>

                <?php foreach($featured as $f): ?>
                <tr>
                    <td><?= $f['id'] ?></td>

                    <td>
                        <img src="../assets/images/products/<?= $f['image'] ?>">
                    </td>

                    <td><?= $f['name'] ?></td>

                    <td>
                        <form method="post">
                            <input type="hidden" name="fid" value="<?= $f['id'] ?>">

                            <select name="product_id">
                                <?php foreach($products as $p): ?>
                                    <option value="<?= $p['id'] ?>"
                                        <?= $p['id']==$f['product_id']?'selected':'' ?>>
                                        <?= $p['name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>

                            <button name="update" class="btn edit">Lưu</button>
                        </form>
                    </td>

                    <td>
                        <a href="?delete=<?= $f['id'] ?>" 
                           class="btn delete"
                           onclick="return confirm('Xóa?')">🗑</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>

        </div>

    </div>

</div>

</body>
</html>