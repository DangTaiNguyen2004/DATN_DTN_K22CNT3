<?php
include "inc/header.php";
include "config/db.php";
$cart = $_SESSION['cart'] ?? [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['qty'];
    }

    $conn->prepare("
        INSERT INTO orders(customer_name, phone, address, total)
        VALUES (?, ?, ?, ?)
    ")->execute([$name, $phone, $address, $total]);

    $order_id = $conn->lastInsertId();

    $stmt = $conn->prepare("
        INSERT INTO order_items(order_id, product_name, price, quantity)
        VALUES (?, ?, ?, ?)
    ");

    foreach ($cart as $item) {
        $stmt->execute([
            $order_id,
            $item['name'],
            $item['price'],
            $item['qty']
        ]);
    }

    unset($_SESSION['cart']);
    echo "<h2>Đặt hàng thành công 🎉</h2>";
    exit;
}
?>

<form method="post">
    <input name="name" placeholder="Họ tên" required><br><br>
    <input name="phone" placeholder="SĐT" required><br><br>
    <input name="address" placeholder="Địa chỉ" required><br><br>
    <button>Đặt hàng</button>
</form>
