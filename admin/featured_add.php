<?php
include "../config/db.php";

/* thêm */
if(isset($_GET['add'])){
    $id = $_GET['add'];
    $conn->query("INSERT INTO featured_products(product_id) VALUES($id)");
    header("Location: featured_add.php");
}

/* list sản phẩm */
$products = $conn->query("SELECT * FROM products")->fetchAll();

/* list featured */
$featured = $conn->query("
    SELECT f.id, p.name 
    FROM featured_products f
    JOIN products p ON f.product_id = p.id
")->fetchAll();
?>

<h2>⭐ Quản lý sản phẩm nổi bật</h2>

<h3>Danh sách sản phẩm</h3>
<?php foreach($products as $p): ?>
    <p>
        <?= $p['name'] ?>
        <a href="?add=<?= $p['id'] ?>">➕ Thêm nổi bật</a>
    </p>
<?php endforeach; ?>

<hr>

<h3>Đã chọn</h3>
<?php foreach($featured as $f): ?>
    <p>🔥 <?= $f['name'] ?></p>
<?php endforeach; ?>