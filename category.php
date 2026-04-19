<?php
include "config/db.php";
include "inc/header.php";

$id = $_GET['id'] ?? 0;

/* Lấy danh mục */
$cat = $conn->prepare("SELECT * FROM categories WHERE id=?");
$cat->execute([$id]);
$category = $cat->fetch();

/* Lấy sản phẩm theo danh mục */
$stmt = $conn->prepare("SELECT * FROM products WHERE category_id=?");
$stmt->execute([$id]);
$products = $stmt->fetchAll();
?>

<h3 class="mb-4">
Danh mục: <?= $category['name'] ?? 'Không tồn tại' ?>
</h3>

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
</div>

<?php include "inc/footer.php"; ?>