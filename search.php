<?php
include "config/db.php";
include "inc/header.php";

$keyword = $_GET['keyword'] ?? '';

$stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE ?");
$stmt->execute(["%$keyword%"]);
$products = $stmt->fetchAll();
?>
<link rel="stylesheet" href="assets/css/wrapper.css">
<div class="container mt-4">
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
<h3>Kết quả tìm kiếm: "<b><?= htmlspecialchars($keyword) ?></b>"</h3>

<div class="row mt-4">
<?php if($products): ?>
    <?php foreach($products as $p): ?>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="assets/images/products/<?= $p['image'] ?>" class="card-img-top">
                <div class="card-body text-center">
                    <h6><?= $p['name'] ?></h6>
                    <p class="text-danger fw-bold"><?= number_format($p['price']) ?> đ</p>
                    <a href="product.php?id=<?= $p['id'] ?>" class="btn btn-outline-dark btn-sm">
                        Xem chi tiết
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-danger text-center">Không tìm thấy sản phẩm</p>
<?php endif; ?>
</div>

</div>
<script src="assets/js/search.js"></script>
<?php include "inc/footer.php"; ?>