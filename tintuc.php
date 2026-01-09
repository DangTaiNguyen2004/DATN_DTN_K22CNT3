<?php
include "config/db.php";
include "inc/header.php";

$products = $conn->query("SELECT * FROM products")->fetchAll();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tin tức - Hoàng Hoan</title>
  <link rel="stylesheet" href="assets/css/tintuc.css">
</head>
<body>

  <main class="news-container">

    <div class="breadcrumb">
      <a href="index.php">Trang chủ</a> > <span>Tin tức</span>
    </div>

    <div class="content">
      <div class="news-left">
  <div class="news-box">
    <h2>NGẤT NGÂY VỚI TOP 10 MẪU NỘI THẤT CHUNG CƯ 1 PHÒNG NGỦ ĐẸP NHẤT</h2>

    <p>
      Những căn hộ chung cư mini, có diện tích nhỏ ngày càng trở nên phổ biến trong cuộc sống hiện đại.
      Thiết kế nội thất chung cư 1 phòng ngủ chính là giải pháp tối ưu giúp mang lại không gian sống hoàn hảo.
    </p>

    <p>
      Hãy cùng Nội thất Mạnh Hệ khám phá bài viết dưới đây để tham khảo thêm nhiều ý tưởng thiết kế nội thất nhé!
    </p>

    <img src="https://noithathpro.com/uploads/hoan-thien-noi-that-nha-anh-hoang-5.jpg" alt="Nội thất chung cư">
  </div>
</div>

      <aside class="news-right">
        <h3>BÀI VIẾT MỚI</h3>
        <div class="post">
          <img src="https://i.pinimg.com/originals/53/96/f0/5396f072cdc21b50b26ea35cd48c90de.jpg" alt="">
          <p>25+ Mẫu giường ngủ học kéo thông minh cho căn phòng nhỏ của bạn</p>
        </div>
        <div class="post">
          <img src="https://cf.shopee.vn/file/2a48c250102edebd854ae93c6be869b4" alt="">
          <p>25+ Mẫu giường ngủ học kéo thông minh cho căn phòng nhỏ của bạn</p>
        </div>
        <div class="post">
          <img src="https://xuatnhapkhautheoyeucau.com/wp-content/uploads/2023/07/O1CN01u8XK4F1SLO0u3HZVE_2212882822230-0-cib.jpg" alt="">
          <p>25+ Mẫu giường ngủ học kéo thông minh cho căn phòng nhỏ của bạn</p>
        </div>
      </aside>
    </div>
  </main>

  
</body>
</html>
<?php include "inc/footer.php"; ?>