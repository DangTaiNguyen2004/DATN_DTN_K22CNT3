<link rel="stylesheet" href="../assets/css/products_add.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<?php
include "../config/db.php";

if ($_POST) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $desc = $_POST['description'];

  $img = $_FILES['image']['name'];
  move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/products/$img");

  $conn->prepare("
    INSERT INTO products(name,price,image,description)
    VALUES(?,?,?,?)
  ")->execute([$name,$price,$img,$desc]);

  header("Location: products.php");
}
?>

<div class="admin-container">
    <h1>THÊM SẢN PHẨM</h1>

    <form method="post" enctype="multipart/form-data" class="admin-form">
        <label>Tên SP</label>
        <input type="text" name="name" required>

        <label>Giá</label>
        <input type="number" name="price" required>

        <label>Ảnh sản phẩm</label>
        <input type="file" name="image">

        <label>Mô tả</label>
        <textarea name="description"></textarea>

        <button type="submit" name="add">➕ Thêm sản phẩm</button>
    </form>
</div>

