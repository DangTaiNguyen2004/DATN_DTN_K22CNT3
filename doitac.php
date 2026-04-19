<?php
include "config/db.php";
include "inc/header.php";

/* FIX lỗi */
$keyword = $_GET['keyword'] ?? '';

$products = $conn->query("SELECT * FROM products")->fetchAll();
?>

<?php if($keyword): ?>
  <h5>Kết quả tìm kiếm cho: "<b><?= htmlspecialchars($keyword) ?></b>"</h5>
<?php endif; ?>
<link rel="stylesheet" href="assets/css/wrapper.css">
<link rel="stylesheet" href="assets/css/categories.css">
<link rel="stylesheet" href="assets/css/doitac.css">
<form action="search.php" method="GET" class="search-form">
    <div class="search-box">
        <input 
            type="text" 
            name="keyword" 
            id="searchInput"
            placeholder="Nhập tên sản phẩm..."
            autocomplete="off"
            required
        >
        <button type="submit">🔍</button>
    </div>

    <!-- dropdown gợi ý -->
    <div id="suggestBox"></div>
</form>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đối tác - Hoàng Hoan</title>
  <link rel="stylesheet" href="assets/css/doitac.css">
</head>
<body>
 



  <!-- Main content -->
  <main class="partners">
    <div class="partner">
      <img src="assets/images/products/vinpe.png" alt="Vinpearl">
      <div class="partner-info">
        <h3>CÔNG TY CỔ PHẦN VINPEARL</h3>
        <p>
          Vinpearl là thương hiệu dịch vụ du lịch nghỉ dưỡng – giải trí lớn nhất Việt Nam.
          Vinpearl sở hữu chuỗi khách sạn, resort và trung tâm hội nghị đẳng cấp 5 sao,
          các khu vui chơi giải trí quốc tế tọa lạc tại những danh thắng du lịch nổi tiếng nhất của Việt Nam.
        </p>
      </div>
    </div>

    <div class="partner">
      <img src="assets/images/products/mt.jpg" alt="Mường Thanh">
      <div class="partner-info">
        <h3>TẬP ĐOÀN KHÁCH SẠN MƯỜNG THANH</h3>
        <p>
          Tại Mường Thanh, chúng tôi mang đến không gian thanh tịnh chứa đựng
          những nét văn hóa mang đậm tinh thần bản sắc Việt, nơi con người gắn kết và thấu hiểu.
        </p>
      </div>
    </div>

    <div class="partner">
      <img src="assets/images/products/she.jpg" alt="Sheraton Hotel">
      <div class="partner-info">
        <h3>SHERATON HANOI HOTEL</h3>
        <p>
          Situated on the shores of Hanoi’s West Lake and surrounded by its many local attractions,
          Sheraton Hanoi Hotel is just a quick drive to the bustling downtown of Hanoi City.
        </p>
      </div>
    </div>

    <div class="partner">
      <img src="assets/images/products/cofe.png" alt="The Coffee House">
      <div class="partner-info">
        <h3>THE COFFEE HOUSE</h3>
        <p>
          Tại The Coffee House, chúng tôi luôn trân trọng những câu chuyện và đề cao giá trị Kết nối con người.
          Mỗi ly cà phê mang đến niềm vui, sự sẻ chia và hương vị chất lượng.
        </p>
      </div>
    </div>

    <div class="partner">
      <img src="assets/images/products/mar.png" alt="Marvella Hotel Nha Trang">
      <div class="partner-info">
        <h3>MARVELLA HOTEL NHA TRANG</h3>
        <p>
          Marvella là thương hiệu khách sạn 4 sao mới xây dựng theo phong cách tân cổ điển, sang trọng và hiện đại.
        </p>
      </div>
    </div>
  </main>


</body>
</html>
<?php include "inc/footer.php"; ?>
<script src="assets/js/search.js"></script>