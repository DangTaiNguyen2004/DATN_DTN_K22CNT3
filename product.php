<?php
include __DIR__ . '/config/db.php';
include __DIR__ . '/inc/header.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch();

if (!$product) {
    echo "<p>Sản phẩm không tồn tại</p>";
    include __DIR__ . '/inc/footer.php';
    exit;
}
?>

<div class="product-detail">
    <div class="product-image">
        <img src="assets/images/products/<?= $product['image'] ?: 'default.jpg' ?>" alt="">
    </div>

    <div class="product-info">
        <h1><?= $product['name'] ?></h1>
        <p class="price"><?= number_format($product['price']) ?> đ</p>

        <p class="desc"><?= nl2br($product['description']) ?></p>

        <a href="add_to_cart.php?id=<?= $product['id'] ?>" class="btn">
            Thêm vào giỏ hàng
        </a>
    </div>
</div>

<?php include __DIR__ . '/inc/footer.php'; ?>
