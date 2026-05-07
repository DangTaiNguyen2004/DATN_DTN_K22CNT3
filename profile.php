<?php
session_start();
include "config/db.php";

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];

// ĐƠN HÀNG
$orders = $conn->prepare("
    SELECT * FROM orders 
    WHERE user_id=? 
    ORDER BY id DESC
");
$orders->execute([$user['id']]);
$orders = $orders->fetchAll();

// ĐÃ MUA (join order_items)
$purchased = $conn->prepare("
    SELECT 
        oi.product_name,
        oi.price,
        COALESCE(p.image, 'default.jpg') as image
    FROM order_items oi
    JOIN orders o ON oi.order_id = o.id
    LEFT JOIN products p ON oi.product_id = p.id
    WHERE o.user_id=?
    ORDER BY o.id DESC, oi.id DESC
");
$purchased->execute([$user['id']]);
$purchased = $purchased->fetchAll();

// ĐÃ XEM
$viewed = $conn->prepare("
    SELECT p.* FROM viewed_products v
    JOIN products p ON v.product_id = p.id
    WHERE v.user_id=?
    ORDER BY v.id DESC LIMIT 5
");
$viewed->execute([$user['id']]);
$viewed = $viewed->fetchAll();
?>

<link rel="stylesheet" href="assets/css/profile.css">

<div class="profile-container">

    <!-- HEADER -->
    <div class="profile-header">

        <img 
          src="assets/images/avatar/<?= $user['avatar'] ?? 'default.png' ?>" 
          class="avatar-img"
        >

        <h2><?= $user['name'] ?></h2>
        <p><?= $user['email'] ?></p>

    </div>

    <!-- MENU -->
    <div class="profile-menu">
        <a href="index.php">Trang chủ</a>
        <a href="#info">⚙️ Cá nhân</a>
        <a href="#orders">📦 Đơn hàng</a>
        <a href="#purchased">🛍 Đã mua</a>
        <a href="#viewed">👀 Đã xem</a>
        <a href="logout.php" class="logout">🚪 Đăng xuất</a>
    </div>

    <!-- THÔNG TIN -->
    <div id="info" class="profile-section">
        <h3>Thông tin cá nhân</h3>

        <form action="update_profile.php" method="post" enctype="multipart/form-data">
            
            <label>Avatar</label><br>
            <input type="file" name="avatar"><br><br>

            <input name="name" value="<?= $user['name'] ?>" placeholder="Tên">
            <input name="email" value="<?= $user['email'] ?>" placeholder="Email">
            <input name="phone" value="<?= $user['phone'] ?? '' ?>" placeholder="SĐT">

            <button>Cập nhật</button>
        </form>
    </div>

    <!-- ĐƠN HÀNG -->
    <div id="orders" class="profile-section">
    <h3>Đơn hàng của tôi</h3>

    <?php foreach($orders as $o): ?>

        <?php
        $status = $o['status'] ?? 'pending';

        $icon = '⏳';
        $text = 'Chờ xử lý';

        switch($status){
            case 'pending':
                $icon = '⏳'; $text = 'Chờ xử lý'; break;
            case 'processing':
                $icon = '📦'; $text = 'Đang chuẩn bị'; break;
            case 'shipping':
                $icon = '🚚'; $text = 'Đang giao'; break;
            case 'completed':
                $icon = '✅'; $text = 'Hoàn thành'; break;
        }
        ?>

        <a href="order_detail_user.php?id=<?= $o['id'] ?>" class="order-card">

            <div>
                <b>Đơn #<?= $o['id'] ?></b>
                <p><?= number_format($o['total']) ?> đ</p>
            </div>

            <div class="status status-<?= $status ?>">
                <?= $icon ?> <?= $text ?>
            </div>

        </a>

    <?php endforeach; ?>
</div>

    <!-- ĐÃ MUA -->
    <div id="purchased" class="profile-section">
        <h3>Sản phẩm đã mua</h3>

        <div class="viewed-list">
            <?php foreach($purchased as $p): ?>
                <div class="view-item">
                    
                    <p><?= $p['product_name'] ?></p>
                    <span><?= number_format($p['price']) ?>đ</span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- ĐÃ XEM -->
    <div id="viewed" class="profile-section">
        <h3>Sản phẩm đã xem</h3>

        <div class="viewed-list">
            <?php foreach($viewed as $p): ?>
                <div class="view-item">
                    <img src="assets/images/products/<?= $p['image'] ?>">
                    <p><?= $p['name'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>