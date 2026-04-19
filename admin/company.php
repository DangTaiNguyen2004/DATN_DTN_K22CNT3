<?php
include "auth.php";
include "../config/db.php";

/* LẤY DATA */
$company = $conn->query("SELECT * FROM company_info LIMIT 1")->fetch();

/* LƯU */
if(isset($_POST['save'])){
    $name    = $_POST['name'];
    $phone   = $_POST['phone'];
    $email   = $_POST['email'];
    $address = $_POST['address'];

    if($company){
        $stmt = $conn->prepare("
            UPDATE company_info 
            SET name=?, phone=?, email=?, address=? 
            WHERE id=?
        ");
        $stmt->execute([$name,$phone,$email,$address,$company['id']]);
    }else{
        $stmt = $conn->prepare("
            INSERT INTO company_info(name,phone,email,address)
            VALUES(?,?,?,?)
        ");
        $stmt->execute([$name,$phone,$email,$address]);
    }

    header("Location: company.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Thông tin công ty</title>

<link rel="stylesheet" href="../assets/css/sidebar.css">
<link rel="stylesheet" href="../assets/css/admin.css">
<link rel="stylesheet" href="../assets/css/company_admin.css">

</head>

<body>

<div class="admin-wrapper">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h4>⚙ Quản trị hệ thống</h4>

        <a href="index.php">📊 Bảng điều khiển</a>
<a href="products.php">📦 Sản phẩm</a>
<a href="order_detail.php">🧾 Đơn hàng</a>
<a href="users.php">👤 Người dùng</a>
<a href="banners.php">🖼 Banner</a>
<a href="artisans.php">🎨 Nghệ nhân</a>
<a href="contacts.php">📨 Liên hệ</a>
<a href="company.php">🏢 Công ty</a>
<a href="news.php">📰 Tin tức</a>
<a href="logout.php" class="logout">🚪 Đăng xuất</a>
    </div>

    <!-- CONTENT -->
    <div class="admin-content">

        <div class="admin-card">
            <h2>🏢 THÔNG TIN CÔNG TY</h2>

            <form method="post" class="company-form">

                <input type="text" name="name" placeholder="Tên công ty"
                       value="<?= $company['name'] ?? '' ?>" required>

                <input type="text" name="phone" placeholder="SĐT"
                       value="<?= $company['phone'] ?? '' ?>">

                <input type="email" name="email" placeholder="Email"
                       value="<?= $company['email'] ?? '' ?>">

                <textarea name="address" placeholder="Địa chỉ"><?= $company['address'] ?? '' ?></textarea>

                <button name="save">💾 Lưu thông tin</button>

            </form>

        </div>

    </div>

</div>

</body>
</html>