<?php
include "auth.php";
include "../config/db.php";

$id = $_GET['id'];

/* Lấy dữ liệu */
$item = $conn->query("SELECT * FROM featured_products WHERE id=$id")->fetch();
$products = $conn->query("SELECT * FROM products")->fetchAll();

/* UPDATE */
if(isset($_POST['update'])){
    $product_id = $_POST['product_id'];

    $stmt = $conn->prepare("UPDATE featured_products SET product_id=? WHERE id=?");
    $stmt->execute([$product_id, $id]);

    header("Location: featured_add.php");
}
?>

<h2>✏ Cập nhật sản phẩm nổi bật</h2>

<form method="post">
<select name="product_id">
<?php foreach($products as $p): ?>
<option value="<?= $p['id'] ?>" <?= $p['id']==$item['product_id']?'selected':'' ?>>
    <?= $p['name'] ?>
</option>
<?php endforeach; ?>
</select>

<button name="update">Cập nhật</button>
</form>