<pre>
<?php print_r($_SESSION['cart']); ?>
</pre>
<?php
session_start();
include "config/db.php";

$id = $_GET['id'];
$color = $_GET['color'] ?? '';
$wood  = $_GET['wood'] ?? '';

// lấy sản phẩm từ DB
$stmt = $conn->prepare("SELECT * FROM products WHERE id=?");
$stmt->execute([$id]);
$product = $stmt->fetch();

// key riêng theo biến thể
$key = $id . "_" . $color . "_" . $wood;

if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if(isset($_SESSION['cart'][$key])){
    $_SESSION['cart'][$key]['qty']++;
}else{
    $_SESSION['cart'][$key] = [
        'id' => $id,
        'name' => $product['name'],     // ✅ bắt buộc
        'price' => $product['price'],   // ✅ bắt buộc
        'color' => $color ?: 'gray',    // ✅ fix null
        'wood' => $wood ?: 'Không chọn',
        'qty' => 1
    ];
}

header("Location: cart.php");