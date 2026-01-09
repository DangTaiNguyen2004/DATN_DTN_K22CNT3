<link rel="stylesheet" href="../assets/css/products.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/css/admin.css">
<?php
include "../config/db.php";

$products = $conn->query("SELECT * FROM products ORDER BY id DESC")->fetchAll();
?>

<div class="admin-container">
    <h1>QUẢN LÝ SẢN PHẨM</h1>
    
    <a class="btn-add" href="product_add.php">+ Thêm sản phẩm</a>
    <a class="btn-add" href="users.php">Quản Lí Người Dùng</a>
    <a class="btn-add" href="order_detail.php">Quản Lí Đơn Hàng</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= $p['name'] ?></td>
                <td><?= number_format($p['price']) ?> đ</td>
                <td>
                    <img src="../assets/images/products/<?= $p['image'] ?>">
                </td>
                <td class="action">
                    <a class="edit" href="product_edit.php?id=<?= $p['id'] ?>">✏️</a>
                    <a class="delete" href="product_delete.php?id=<?= $p['id'] ?>"
                       onclick="return confirm('Xóa sản phẩm?')">🗑️</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

