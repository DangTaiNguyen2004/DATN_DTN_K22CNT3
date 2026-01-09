<link rel="stylesheet" href="../assets/css/admin.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<?php
include "../config/db.php";
$orders = $conn->query("SELECT * FROM orders ORDER BY id DESC")->fetchAll();

?>

<h2>QUẢN LÝ ĐƠN HÀNG</h2>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Khách</th>
    <th>SĐT</th>
    <th>Tổng</th>
    <th></th>
</tr>

<?php foreach ($orders as $o): ?>
<tr>
    <td><?= $o['id'] ?></td>
    <td><?= $o['customer_name'] ?></td>
    <td><?= $o['phone'] ?></td>
    <td><?= number_format($o['total']) ?> đ</td>
    <td><a href="order_detail.php?id=<?= $o['id'] ?>">Xem</a></td>
</tr>
<?php endforeach ?>
</table>
