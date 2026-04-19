<?php
include "inc/header.php";
include "config/db.php";
$cart = $_SESSION['cart'] ?? [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $payment = $_POST['payment'] ?? 'COD';
    $shipping = $_POST['shipping'] ?? 'Hỏa tốc';

    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['qty'];
    }

    $conn->prepare("
        INSERT INTO orders(customer_name, phone, address, total, payment_method, shipping_method)
    VALUES (?, ?, ?, ?, ?, ?)
")->execute([$name, $phone, $address, $total, $payment, $shipping]);

    $order_id = $conn->lastInsertId();

   $stmt = $conn->prepare("
  INSERT INTO order_items(order_id, product_name, price, color, wood, quantity)
  VALUES(?,?,?,?,?,?)
");

    foreach($_SESSION['cart'] as $item){

    $stmt->execute([
        $order_id,
        $item['name'],
        $item['price'],
        $item['color'], // ✅ thêm
        $item['wood'],  // ✅ thêm
        $item['qty']
    ]);
}

    unset($_SESSION['cart']);
    echo "<h2>Đặt hàng thành công 🎉</h2>";
    exit;
}
?>
<link rel="stylesheet" href="assets/css/check_out.css">
<form method="post" class="checkout-form">

  <h3>Thông tin khách hàng</h3>
  <input name="name" placeholder="Họ tên" required><br><br>
  <input name="phone" placeholder="SĐT" required><br><br>
  <input name="address" placeholder="Địa chỉ" required><br><br>

  <h3>Phương thức thanh toán</h3>
  <label><input type="radio" name="payment" value="COD" checked> Thanh toán khi nhận hàng (COD)</label><br>
  <label><input type="radio" name="payment" value="Ví điện tử"> Ví điện tử</label><br>
  <label><input type="radio" name="payment" value="Thẻ"> Thẻ ngân hàng</label><br>
  <label><input type="radio" name="payment" value="Trả sau"> Khoản trả sau</label><br><br>

  <h3>Phương thức vận chuyển</h3>
  <label><input type="radio" name="shipping" value="Hỏa tốc" checked> Hỏa tốc</label><br>
  <label><input type="radio" name="shipping" value="Giao hàng tiết kiệm"> Giao hàng tiết kiệm</label><br>
  <label><input type="radio" name="shipping" value="Giao hàng nhanh"> Giao hàng nhanh</label><br><br>

  <button>Đặt hàng</button>
</form>
