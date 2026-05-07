<?php
session_start();
include "../config/db.php";

// check admin
if(!isset($_SESSION['admin'])){
    die("Không có quyền");
}

// LẤY REVIEW
$reviews = $conn->query("
    SELECT r.*, p.name as product_name, u.name as user_name
    FROM reviews r
    JOIN products p ON r.product_id = p.id
    JOIN users u ON r.user_id = u.id
    ORDER BY r.id DESC
")->fetchAll();
?>
<link rel="stylesheet" href="../assets/css/admin_home.css">

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
    <div class="main-content">
        <h2>Quản lý đánh giá</h2>

        <?php foreach($reviews as $r): ?>
        <div class="review-box">

            <div class="review-top">
                <b><?= $r['user_name'] ?></b> 
                <span class="product-name">- <?= $r['product_name'] ?></span>
            </div>

            <div class="review-rating">
                ⭐ <?= $r['rating'] ?>
            </div>

            <p class="review-text"><?= $r['comment'] ?></p>

            <?php if(!empty($r['reply'])): ?>
                <div class="admin-reply">
                    <b>Admin:</b> <?= $r['reply'] ?>
                </div>
            <?php endif; ?>

            <form action="reply_review.php" method="post" class="reply-form">
                <input type="hidden" name="id" value="<?= $r['id'] ?>">
                <textarea name="reply" placeholder="Trả lời..."></textarea>
                <button>Gửi</button>
            </form>

        </div>
        <?php endforeach; ?>
    </div>

</div>
<style>
    /* layout */
.admin-wrapper {
    display: flex;
}

/* content */
.main-content {
    flex: 1;
    padding: 20px;
}

/* ===== REVIEW ===== */
.review-box {
    display: block;
    width: 100%;
    background: #1e293b;
    border-radius: 8px;
    padding: 12px;
    margin-bottom: 12px;
    color: #e2e8f0;
}

/* header */
.review-top {
    font-size: 14px;
    margin-bottom: 5px;
}

.product-name {
    color: #38bdf8;
}

/* rating */
.review-rating {
    color: #facc15;
    font-size: 13px;
    margin-bottom: 6px;
}

/* comment */
.review-text {
    font-size: 14px;
    margin-bottom: 8px;
}

/* admin reply */
.admin-reply {
    background: #0f172a;
    padding: 8px;
    border-radius: 5px;
    margin-bottom: 8px;
    font-size: 13px;
}

/* textarea */
.reply-form textarea {
    width: 100%;
    height: 50px;
    border-radius: 5px;
    border: none;
    padding: 6px;
    margin-bottom: 6px;
    background: #334155;
    color: #fff;
    resize: none;
}

/* button */
.reply-form button {
    background: #38bdf8;
    border: none;
    padding: 5px 12px;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
}

.reply-form button:hover {
    background: #0ea5e9;
}
body {
    background: linear-gradient(135deg, #0f172a, #020617);
    color: #e2e8f0;
}
</style>