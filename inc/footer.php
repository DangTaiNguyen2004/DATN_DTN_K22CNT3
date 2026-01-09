</div>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<link rel="stylesheet" href="assets/css/footer.css">
<footer>
    <div class="footer-content">
      <div class="info">
        <h4>THÔNG TIN CHUNG</h4>
        <p><strong>CÔNG TY TNHH HOÀNG HOAN</strong></p>
        <p>📞 0999.999.999</p>
        <p>✉️ cskh@hoanghoan.vn</p>
        <p>📍 Số 1 Nguyễn Trãi, Thanh Xuân, Hà Nội</p>
      </div>

      <div class="about">
        <h4>VỀ CHÚNG TÔI</h4>
        <ul>
          <li><a href="gioithieu.php">Giới thiệu</a></li>
          <li><a href="sanpham.php">Sản phẩm</a></li>
          <li><a href="tintuc.php">Tin tức</a></li>
          <li><a href="doitac.php">Đối tác</a></li>
          <li><a href="lienhe.php">Liên hệ</a></li>
        </ul>
      </div>

      <div class="social">
        <h4>KẾT NỐI VỚI CHÚNG TÔI</h4>
        <div class="icons">
         <a href="#"><img src="assets/images/products/fb.png" alt=""></a>
          <a href="#"><img src="assets/images/products/yt.png" alt=""></a>
          <a href="#"><img src="assets/images/products/ig.png" alt=""></a>
        </div>
      </div>
    </div>
    <div class="copyright">
      © Bản quyền thuộc về Hoàng Hoan | Thiết kế bởi Sinh viên CNTT
    </div>
  </footer>
</body>
</html>
