<?php
session_start();
include "config/db.php";

$cart = $_SESSION['cart'] ?? [];

if(empty($cart)){
    header("Location: cart.php");
    exit;
}

$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$payment = $_POST['payment'];
$shipping = $_POST['shipping'];

$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['qty'];
}

// ==========================
// 🔥 GIẢM GIÁ
// ==========================
$discount = 0;

if($total >= 1000000){
    $discount = $total * 0.1;
}

if($discount > $total){
    $discount = $total;
}

$final_total = $total - $discount;

// ==========================
// 🔥 LƯU ORDER
// ==========================
$user_id = $_POST['user_id'] ?? null;

$conn->prepare("
INSERT INTO orders(
    user_id, customer_name, phone, address, 
    total, discount, final_total, 
    payment_method, shipping_method
)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
")->execute([
    $user_id,
    $name,
    $phone,
    $address,
    $total,
    $discount,
    $final_total,
    $payment,
    $shipping
]);

$order_id = $conn->lastInsertId();

// ==========================
// 🔥 FIX CHÍNH Ở ĐÂY
// ==========================
$stmt = $conn->prepare("
INSERT INTO order_items(
    order_id,
    product_name,
    price,
    color,
    material,
    quantity
)
VALUES(?,?,?,?,?,?)
");

foreach($cart as $item){

    $stmt->execute([
        $order_id,
        $item['name'],
        $item['price'],
        $item['color'],
        $item['material'] ?? '', // 🔥 FIX
        $item['qty']
    ]);

    // TRỪ KHO
    $conn->prepare("
        UPDATE products 
        SET stock = stock - ?
        WHERE id = ?
    ")->execute([$item['qty'], $item['id']]);
}

// XÓA GIỎ
unset($_SESSION['cart']);

include "inc/header.php";
?>

<link rel="stylesheet" href="assets/css/success.css">

<div class="success-container">

    <div class="success-icon">✅</div>

    <div class="success-title">
        Đặt hàng thành công!
    </div>

    <div class="success-text">
        Cảm ơn bạn đã mua hàng ❤️ <br>
        Đơn hàng của bạn đang được xử lý.
    </div>

    <div class="success-actions">
        <a href="index.php" class="btn-home">🏠 Trang chủ</a>
        <a href="sanpham.php" class="btn-continue">🛍 Mua tiếp</a>
    </div>

</div>

<?php include "inc/footer_new.php"; ?>