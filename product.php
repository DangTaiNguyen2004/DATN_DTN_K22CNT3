<?php
include __DIR__ . '/config/db.php';
include __DIR__ . '/inc/header.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

/* LẤY PRODUCT */
$stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch();

if (!$product) {
    echo "<p>Sản phẩm không tồn tại</p>";
    include __DIR__ . '/inc/footer.php';
    exit;
}

/* ⭐ LẤY REVIEW + LIKE + AVATAR + REPLY */
$reviewsStmt = $conn->prepare("
    SELECT r.*, u.name, u.avatar,
    (SELECT COUNT(*) FROM review_likes WHERE review_id = r.id) as likes
    FROM reviews r
    JOIN users u ON r.user_id = u.id
    WHERE r.product_id=?
    ORDER BY r.id DESC
");
$reviewsStmt->execute([$product['id']]);
$reviews = $reviewsStmt->fetchAll();

/* ⭐ TÍNH SAO */
$avgStmt = $conn->prepare("
    SELECT AVG(rating) as avg_rating 
    FROM reviews 
    WHERE product_id=?
");
$avgStmt->execute([$product['id']]);
$avg = $avgStmt->fetch()['avg_rating'] ?? 0;

/* LƯU ĐÃ XEM */
if(isset($_SESSION['user'])){
    $conn->prepare("
        INSERT INTO viewed_products(user_id, product_id)
        VALUES (?,?)
    ")->execute([
        $_SESSION['user']['id'],
        $product['id']
    ]);
}
$materials = explode(",", $product['materials']);
?>

<link rel="stylesheet" href="assets/css/wrapper.css">
<link rel="stylesheet" href="assets/css/review.css">

<form action="search.php" method="GET" class="search-form">
    <div class="search-box">
        <input type="text" name="keyword" id="searchInput"
            placeholder="Nhập tên sản phẩm..." autocomplete="off" required>
        <button type="submit">🔍</button>
    </div>
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

            <p>⭐ <?= round($avg,1) ?>/5</p>

            <!-- màu -->
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

            <p class="stock">
                Tồn kho: <?= $product['stock'] > 0 ? $product['stock'] : 'Hết hàng' ?>
            </p>

            <!-- gỗ -->
            <div class="option-group">
    <label>Chất liệu:</label>
    <select name="material" required>
        <option value="">-- Chọn chất liệu --</option>

        <?php foreach($materials as $m): ?>
            <option value="<?= trim($m) ?>">
                <?= trim($m) ?>
            </option>
        <?php endforeach; ?>

    </select>
</div>

            <button type="submit" class="btn"
                <?= $product['stock'] <= 0 ? 'disabled' : '' ?>>
                🛒 Thêm vào giỏ hàng
            </button>
        </form>
    </div>
</div>

<h3>⭐ Đánh giá sản phẩm</h3>

<?php foreach($reviews as $r): ?>
<div class="review-box">

    <!-- avatar -->
    <div style="display:flex;align-items:center;gap:10px;">
        <img src="assets/images/avatar/<?= $r['avatar'] ?? 'default.png' ?>"
             style="width:40px;height:40px;border-radius:50%;">
        <b><?= $r['name'] ?></b>
    </div>

    <!-- sao -->
    <div class="stars">
        <?= str_repeat("⭐", $r['rating']) ?>
    </div>

    <!-- comment -->
    <p><?= $r['comment'] ?></p>

    <!-- like -->
    <form action="like_review.php" method="post">
        <input type="hidden" name="review_id" value="<?= $r['id'] ?>">
        <button>👍 <?= $r['likes'] ?></button>
    </form>

    <!-- ✅ REPLY ADMIN (ĐÚNG CHỖ) -->
    <?php if(!empty($r['reply'])): ?>
        <div class="admin-reply" style="
            background:#f1f1f1;
            padding:10px;
            margin-top:5px;
            border-left:3px solid #f39c12;
        ">
            <b>Phản hồi từ shop:</b><br>
            <?= $r['reply'] ?>
        </div>
    <?php endif; ?>

</div>
<?php endforeach; ?>

<!-- FORM REVIEW -->
<?php if(isset($_SESSION['user'])): ?>

<form action="add_review.php" method="post" class="review-form">
    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">

    <label>Chọn sao:</label>
    <select name="rating" required>
        <option value="5">⭐⭐⭐⭐⭐</option>
        <option value="4">⭐⭐⭐⭐</option>
        <option value="3">⭐⭐⭐</option>
        <option value="2">⭐⭐</option>
        <option value="1">⭐</option>
    </select>

    <textarea name="comment" placeholder="Nhận xét..." required></textarea>
    <button>Gửi đánh giá</button>
</form>

<?php else: ?>
<p>👉 Vui lòng đăng nhập để đánh giá</p>
<?php endif; ?>

<script src="assets/js/search.js"></script>
<?php include "inc/footer_new.php"; ?>