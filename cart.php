<?php
session_start();
include "inc/header.php";

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
  echo "<div class='container text-center py-5'>Giỏ hàng trống</div>";
  include "inc/footer.php";
  exit;
}
?>

<div class="container py-5">
  <h3 class="mb-4">🛒 Giỏ hàng</h3>

  <table class="table text-white">
    <thead>
      <tr>
        <th>Tên</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
        <th>Xóa</th>
      </tr>
    </thead>

    <tbody>
    <?php
      $total = 0;
      foreach ($_SESSION['cart'] as $id => $item):
        $subtotal = $item['price'] * $item['qty'];
        $total += $subtotal;
    ?>
      <tr>
        <td><?= $item['name'] ?></td>

        <td><?= number_format($item['price']) ?> đ</td>

        <td>
          <a href="update_cart.php?id=<?= $id ?>&action=minus">➖</a>
          <strong><?= $item['qty'] ?></strong>
          <a href="update_cart.php?id=<?= $id ?>&action=plus">➕</a>
        </td>

        <td><?= number_format($subtotal) ?> đ</td>

        <td>
          <a
            href="update_cart.php?id=<?= $id ?>&action=remove"
            onclick="return confirm('Xóa sản phẩm này?')"
            style="color:red;font-weight:bold"
          >
            ❌
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>

    <tfoot>
      <tr>
        <td colspan="3"><b>Tổng cộng</b></td>
        <td colspan="2"><b><?= number_format($total) ?> đ</b></td>
      </tr>
    </tfoot>
  </table>

  <a href="checkout.php" class="btn btn-warning px-4">Thanh toán</a>
</div>

<?php include "inc/footer.php"; ?>
