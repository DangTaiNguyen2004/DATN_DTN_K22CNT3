<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/css/sidebar.css">
<link rel="stylesheet" href="../assets/css/order_detail.css">

<?php
include "../config/db.php";

/* UPDATE STATUS */
if($_POST){
    $id = $_POST['id'];
    $status = $_POST['status'];

    $conn->prepare("
        UPDATE orders 
        SET status=? 
        WHERE id=?
    ")->execute([$status, $id]);

    header("Location: order_detail.php");
    exit;
}

/* ❌ FIX: không dùng biến test nữa nhưng vẫn giữ cho bạn */
$total = 1000000;
$discount = 100000;
$final_total = $total - $discount;

/* ❌ FIX: nếu muốn chạy insert test thì phải execute */
# $conn->prepare("INSERT INTO orders (customer_name, total, discount, final_total)
# VALUES ('Nguyen Van A', ?, ?, ?)")->execute([$total,$discount,$final_total]);

/* GET DATA */
$orders = $conn->query("SELECT * FROM orders ORDER BY id DESC")->fetchAll();

/* HIỂN THỊ TEXT */
function statusText($s){
    switch($s){
        case 'pending': return '🕐 Chờ xử lý';
        case 'processing': return '📦 Đang chuẩn bị';
        case 'shipping': return '🚚 Đang giao';
        case 'completed': return '✅ Hoàn thành';
        default: return $s;
    }
}
?>

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
<div class="admin-content">
<div class="admin-card">

<h2>📋 QUẢN LÝ ĐƠN HÀNG</h2>

<table class="admin-table">
<thead>
<tr>
    <th>ID</th>
    <th>Khách</th>
    <th>Tổng</th>
    <th>Giảm giá</th>
    <th>Thành tiền</th> <!-- 🔥 FIX -->
    <th>Thanh toán</th>
    <th>Vận chuyển</th>
    <th>Trạng thái</th>
    <th>Cập nhật</th>
    <th>Xem</th>
</tr>
</thead>

<tbody>
<?php foreach($orders as $o): ?>
<tr>

<td><?= $o['id'] ?></td>

<td><?= htmlspecialchars($o['customer_name']) ?></td>

<td class="price"><?= number_format($o['total']) ?> đ</td>

<td class="price" style="color:red;">
    <?php if(($o['discount'] ?? 0) > 0): ?>
        -<?= number_format($o['discount']) ?> đ
    <?php else: ?>
        0 đ
    <?php endif; ?>
</td>

<td class="price" style="color:green; font-weight:bold;">
    <?= number_format($o['final_total'] ?? ($o['total'] - ($o['discount'] ?? 0))) ?> đ
</td>

<td><?= $o['payment_method'] ?? '---' ?></td>

<td><?= $o['shipping_method'] ?? '---' ?></td>

<!-- STATUS -->
<td>
    <span class="status">
        <?= statusText($o['status']) ?>
    </span>
</td>

<!-- UPDATE -->
<td>
<form method="post" style="display:flex;gap:5px;">
    <input type="hidden" name="id" value="<?= $o['id'] ?>">

    <select name="status" class="form-select form-select-sm">
        <option value="pending" <?= $o['status']=='pending'?'selected':'' ?>>Chờ xử lý</option>
        <option value="processing" <?= $o['status']=='processing'?'selected':'' ?>>Đang chuẩn bị</option>
        <option value="shipping" <?= $o['status']=='shipping'?'selected':'' ?>>Đang giao</option>
        <option value="completed" <?= $o['status']=='completed'?'selected':'' ?>>Hoàn thành</option>
    </select>

    <button class="btn btn-sm btn-success">✔</button>
</form>
</td>

<!-- VIEW -->
<td>
    <a class="btn-view" href="order_view.php?id=<?= $o['id'] ?>">Xem</a>
</td>

</tr>
<?php endforeach ?>
</tbody>
</table>

</div>
</div>
</div>