<?php
include "config/db.php";
include "inc/header.php";

$products = $conn->query("SELECT * FROM products")->fetchAll();
?>
<link rel="stylesheet" href="assets/css/wrapper.css">
<link rel="stylesheet" href="assets/css/categories.css">
<link rel="stylesheet" href="assets/css/doitac.css">
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
<h3 class="mb-4">Sản phẩm </h3>
<main>
<div class="row">
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
</main>
  

<?php include "inc/footer.php"; ?>
<script src="assets/js/search.js"></script>