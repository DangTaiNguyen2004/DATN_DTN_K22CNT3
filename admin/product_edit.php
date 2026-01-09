
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/css/ptoducts_edit.css">
<?php
include "../config/db.php";

$id = $_GET['id'] ?? 0;

// LẤY SẢN PHẨM
$p = $conn->query("SELECT * FROM products WHERE id=$id")->fetch();
if (!$p) die("Không tìm thấy sản phẩm");

if ($_POST) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['description'];

    if (!empty($_FILES['image']['name'])) {
        $img = time().'_'.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/products/$img");
    } else {
        $img = $p['image'];
    }

    $conn->prepare("
        UPDATE products 
        SET name=?, price=?, image=?, description=? 
        WHERE id=?
    ")->execute([$name, $price, $img, $desc, $id]);

    header("Location: products.php");
    exit;
}
?>


<div class="admin-container">
    <h1>SỬA SẢN PHẨM</h1>

    <form method="post" enctype="multipart/form-data" class="admin-form">
        <label>Tên sản phẩm</label>
        <input type="text" name="name" value="<?= htmlspecialchars($p['name']) ?>" required>

        <label>Giá</label>
        <input type="number" name="price" value="<?= $p['price'] ?>" required>

        <label>Ảnh hiện tại</label>
        <div class="preview-img">
            <?php if ($p['image']): ?>
                <img src="../assets/images/products/<?= $p['image'] ?>" width="120">
            <?php else: ?>
                <p>Chưa có ảnh</p>
            <?php endif; ?>
        </div>

        <label>Đổi ảnh mới (nếu có)</label>
        <input type="file" name="image">

        <label>Mô tả</label>
        <textarea name="description"><?= htmlspecialchars($p['description']) ?></textarea>

        <button type="submit" class="btn btn-success">💾 Cập nhật</button>
    </form>
</div>
