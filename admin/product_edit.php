<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/css/ptoducts_edit.css">

<?php
include "../config/db.php";

$id = $_GET['id'] ?? 0;

// LẤY SẢN PHẨM
$stmt = $conn->prepare("SELECT * FROM products WHERE id=?");
$stmt->execute([$id]);
$p = $stmt->fetch();

if (!$p) die("Không tìm thấy sản phẩm");

// UPDATE
if ($_POST) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['description'] ?? '';
    $stock = $_POST['stock'] ?? 0;
    $materials = $_POST['materials'] ?? '';

    // xử lý ảnh
    if (!empty($_FILES['image']['name'])) {
        $img = time().'_'.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/products/$img");
    } else {
        $img = $p['image'];
    }

    // UPDATE FULL
    $stmt = $conn->prepare("
        UPDATE products 
        SET name=?, price=?, description=?, materials=?, stock=?, image=?
        WHERE id=?
    ");

    $stmt->execute([
        $name,
        $price,
        $desc,
        $materials,
        $stock,
        $img,
        $id
    ]);

    // reload lại dữ liệu mới
    $stmt = $conn->prepare("SELECT * FROM products WHERE id=?");
    $stmt->execute([$id]);
    $p = $stmt->fetch();

    echo "<div class='alert alert-success'>✔ Cập nhật thành công</div>";
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

        <label>Chất liệu</label>
        <input 
            type="text" 
            name="materials" 
            value="<?= htmlspecialchars($p['materials'] ?? '') ?>"
            placeholder="VD: Gỗ sồi, Gỗ xoan"
        >

        <label>Mô tả</label>
        <textarea name="description"><?= htmlspecialchars($p['description']) ?></textarea>

        <label>Số lượng tồn</label>
        <input type="number" name="stock" value="<?= $p['stock'] ?? 0 ?>" min="0">

        <button type="submit" class="btn btn-success">💾 Cập nhật</button>

    </form>
</div>