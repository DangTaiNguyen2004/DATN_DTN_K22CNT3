<?php
include "../config/db.php";

$products = $conn->query("SELECT * FROM products ORDER BY id DESC")->fetchAll();
?>

<link rel="stylesheet" href="../assets/css/products.css">
<link rel="stylesheet" href="../assets/css/admin.css">
<link rel="stylesheet" href="../assets/css/sidebar.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

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
    <div class="admin-container">
        <h1>📦 QUẢN LÝ SẢN PHẨM</h1>

        <a class="btn-add" href="product_add.php">+ Thêm sản phẩm</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Tồn kho</th>
                    <th>Chất liệu</th> <!-- ✅ THÊM -->
                    <th>Ảnh</th>
                    <th>Hành động</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($products as $p): ?>
                <tr>
                    <td><?= $p['id'] ?></td>

                    <td><?= htmlspecialchars($p['name']) ?></td>

                    <td><?= number_format($p['price']) ?> đ</td>

                    <td><?= $p['stock'] ?? 0 ?></td>

                    <!-- ✅ HIỂN THỊ MATERIALS -->
                    <td>
                        <?php
                        if (!empty($p['materials'])) {
                            $mats = explode(",", $p['materials']);
                            foreach ($mats as $m) {
                                echo "<span style='
                                    display:inline-block;
                                    padding:3px 8px;
                                    margin:2px;
                                    background:;
                                    border-radius:5px;
                                    font-size:12px;
                                '>" . trim($m) . "</span>";
                            }
                        } else {
                            echo "<i>Chưa có</i>";
                        }
                        ?>
                    </td>

                    <td>
                        <?php if (!empty($p['image'])): ?>
                            <img src="../assets/images/products/<?= $p['image'] ?>" width="80">
                        <?php else: ?>
                            <span>Không có</span>
                        <?php endif; ?>
                    </td>

                    <td class="action">
                        <a class="edit" href="product_edit.php?id=<?= $p['id'] ?>">✏️</a>

                        <a class="delete"
                           href="product_delete.php?id=<?= $p['id'] ?>"
                           onclick="return confirm('Xóa sản phẩm?')">
                           🗑️
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

</div>