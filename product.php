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
<link rel="stylesheet" href="assets/css/wrapper.css">
<form action="search.php" method="GET" class="search-form">
    <div class="search-box">
        <input 
            type="text" 
            name="keyword" 
            id="searchInput"
            placeholder="Nhập tên sản phẩm..."
            autocomplete="off"
            required
        >
        <button type="submit">🔍</button>
    </div>

    <!-- dropdown gợi ý -->
    <div id="suggestBox"></div>
</form>
<div class="product-detail">
    <div class="product-image">
        <img src="assets/images/products/<?= $product['image'] ?: 'default.jpg' ?>" alt="">
    </div>

    <div class="product-info">
        <h1><?= $product['name'] ?></h1>
        <p class="price"><?= number_format($product['price']) ?> đ</p>

        <p class="desc"><?= nl2br($product['description']) ?></p>
        <form action="add_to_cart.php" method="GET">

    <input type="hidden" name="id" value="<?= $product['id'] ?>">

    <!-- CHỌN MÀU -->
    <div class="option-group">
        <label>Chọn màu:</label>
        <div class="color-options">
            <label class="color-item">
                <input type="radio" name="color" value="Đen" required>
                <span class="color-circle black"></span>
            </label>

            <label class="color-item">
                <input type="radio" name="color" value="Nâu">
                <span class="color-circle brown"></span>
            </label>

            <label class="color-item">
                <input type="radio" name="color" value="Trắng">
                <span class="color-circle white"></span>
            </label>
        </div>
    </div>

    <!-- CHỌN LOẠI GỖ -->
    <div class="option-group">
        <label>Loại gỗ:</label>
        <select name="wood" required>
            <option value="">-- Chọn loại gỗ --</option>
            <option value="Gỗ sồi">Gỗ sồi</option>
            <option value="Gỗ xoan">Gỗ xoan</option>
            <option value="Gỗ óc chó">Gỗ óc chó</option>
        </select>
    </div>

    <button type="submit" class="btn">🛒 Thêm vào giỏ hàng</button>

</form>
        
    </div>
</div>
<script src="assets/js/search.js"></script>
<?php include __DIR__ . '/inc/footer.php'; ?>
