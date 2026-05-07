<?php
include __DIR__ . "/../config/db.php";
$company = $conn->query("SELECT * FROM company_info LIMIT 1")->fetch();
?>

<link rel="stylesheet" href="assets/css/footer_new.css">

<footer class="ft-new">
    <div class="ft-new-container">

        <!-- LEFT -->
        <div class="ft-col">
            <h4>THÔNG TIN CHUNG</h4>
            <p class="ft-name"><?= $company['name'] ?? 'CÔNG TY TNHH HOÀNG HOAN' ?></p>

            <p>📞 <?= $company['phone'] ?? '0999.999.999' ?></p>
            <p>✉️ <?= $company['email'] ?? 'cskh@hoanghoan.vn' ?></p>
            <p>📍 <?= $company['address'] ?? 'Hà Nội' ?></p>
        </div>

        <!-- CENTER -->
        <div class="ft-col">
            <h4>VỀ CHÚNG TÔI</h4>
            <ul>
                <li><a href="gioithieu.php">Giới thiệu</a></li>
                <li><a href="sanpham.php">Sản phẩm</a></li>
                <li><a href="tintuc.php">Tin tức</a></li>
                <li><a href="doitac.php">Đối tác</a></li>
                <li><a href="lienhe.php">Liên hệ</a></li>
            </ul>
        </div>

        <!-- RIGHT -->
        <div class="ft-col">
            <h4>KẾT NỐI VỚI CHÚNG TÔI</h4>

            <div class="ft-icons">
                <a href="#"><img src="assets/images/products/fb.png"></a>
                <a href="#"><img src="assets/images/products/yt.png"></a>
                <a href="#"><img src="assets/images/products/ig.png"></a>
            </div>

            <!-- badge giả giống hình -->
            <div class="ft-badge">
                <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png">
                <span>ĐÃ THÔNG BÁO</span>
            </div>
        </div>

    </div>

    <div class="ft-copy">
        © Bản quyền thuộc về DTN HOME | Thiết kế bởi Sinh viên CNTT
    </div>
</footer>