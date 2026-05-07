<link rel="stylesheet" href="../assets/css/products_add.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<?php
include "../config/db.php";

$cats = $conn->query("SELECT * FROM categories")->fetchAll();

if ($_POST) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['description'] ?? '';
    $category_id = $_POST['category_id'];
    $stock = $_POST['stock'] ?? 0;
    $materials = $_POST['materials'] ?? '';

    // xử lý ảnh
    $img = '';
    if (!empty($_FILES['image']['name'])) {
        $img = time().'_'.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/products/$img");
    }

    // INSERT CHUẨN (GỘP TẤT CẢ)
    $stmt = $conn->prepare("
        INSERT INTO products(name, price, image, description, category_id, stock, materials)
        VALUES(?,?,?,?,?,?,?)
    ");

    $stmt->execute([
        $name,
        $price,
        $img,
        $desc,
        $category_id,
        $stock,
        $materials
    ]);

    header("Location: products.php");
    exit;
}
?>

<div class="admin-container">
    <h1>THÊM SẢN PHẨM</h1>

    <form method="post" enctype="multipart/form-data" class="admin-form">

        <label>Tên SP</label>
        <input type="text" name="name" required>

        <label>Giá</label>
        <input type="number" name="price" required>

        <label>Số lượng tồn</label>
        <input type="number" name="stock" min="0" value="0">

        <label>Ảnh sản phẩm</label>
        <input type="file" name="image">

        <label>Mô tả</label>
        <textarea name="description"></textarea>

        <label>Danh mục</label>
        <select name="category_id" required>
            <option value="">-- Chọn danh mục --</option>
            <?php foreach($cats as $c): ?>
                <option value="<?= $c['id'] ?>">
                    <?= $c['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Chất liệu (cách nhau dấu ,)</label>
        <input 
            type="text" 
            name="materials" 
            placeholder="VD: Gỗ sồi, Gỗ xoan, Gỗ óc chó"
            required
        >

        <button type="submit" name="add">➕ Thêm sản phẩm</button>

    </form>
</div>