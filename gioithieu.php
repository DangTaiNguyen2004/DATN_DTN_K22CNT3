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

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Giới thiệu - Hoàng Hoan</title>
  <link rel="stylesheet" href="assets/css/gioithieu.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
  <!-- Giới thiệu -->
  <section class="intro">
    <div class="intro-container">
      <h2>THÀNH LẬP & PHÁT TRIỂN</h2>
      <div class="content">
        <img src="https://noithathpro.com/uploads/hoan-thien-noi-that-nha-anh-hoang-2.jpg" alt="Phòng khách">
        <p>
          NỘI THẤT Hoàng Hoan được xây dựng dựa trên tình yêu, đam mê cái đẹp với nghề mộc và khát khao mang những sản phẩm nội thất đẹp của mình đến với khách hàng thân yêu. <br><br>
          Cả tập thể luôn nỗ lực không ngừng để chỉnh chu từ khâu thiết kế, sản xuất đến thi công, với mục tiêu mang lại không gian sống lý tưởng cho mọi gia đình. Hoàng Hoan luôn hướng đến sự sáng tạo, thẩm mỹ và sự hài lòng của khách hàng là niềm tự hào nhất.
        </p>
      </div>

      <h2>TẦM NHÌN</h2>
      <div class="content reverse">
        <img src="https://noithathpro.com/uploads/hoan-thien-noi-that-nha-anh-hoang.jpg" alt="Tầm nhìn">
        <p>
          Chúng tôi luôn hướng đến việc tạo ra các sản phẩm nội thất tiện nghi, hiện đại và tinh tế. Với đội ngũ thiết kế sáng tạo và thợ mộc lành nghề, Hoàng Hoan không chỉ mang đến sản phẩm chất lượng mà còn khẳng định phong cách sống đẳng cấp cho mỗi khách hàng,Cả tập thể luôn nỗ lực không ngừng để chỉnh chu từ khâu thiết kế, sản xuất đến thi công, với mục tiêu mang lại không gian sống lý tưởng cho mọi gia đình. Hoàng Hoan luôn hướng đến sự sáng tạo, thẩm mỹ và sự hài lòng của khách hàng là niềm tự hào nhất.<br>Cả tập thể luôn nỗ lực không ngừng để chỉnh chu từ khâu thiết kế, sản xuất đến thi công, với mục tiêu mang lại không gian sống lý tưởng cho mọi gia đình. Hoàng Hoan luôn hướng đến sự sáng tạo, thẩm mỹ và sự hài lòng của khách hàng là niềm tự hào nhất.Cả tập thể luôn nỗ lực không ngừng để chỉnh chu từ khâu thiết kế, sản xuất đến thi công, với mục tiêu mang lại không gian sống lý tưởng cho mọi gia đình. Hoàng Hoan luôn hướng đến sự sáng tạo, thẩm mỹ và sự hài lòng của khách hàng là niềm tự hào nhất.
        </p>
      </div>

      <h2>SỨ MỆNH</h2>
      <div class="mission">
        <div class="box">
          <h4>Với xã hội</h4>
          <p>Đóng góp vào sự phát triển bền vững của ngành nội thất Việt Nam, lan tỏa giá trị thẩm mỹ và tiện ích đến cộng đồng.</p>
        </div>
        <div class="box">
          <h4>Với nhân viên</h4>
          <p>Tạo môi trường làm việc chuyên nghiệp, năng động và nhiều cơ hội phát triển bản thân.</p>
        </div>
        <div class="box">
          <h4>Với đối tác</h4>
          <p>Xây dựng mối quan hệ bền vững, hợp tác cùng phát triển dựa trên tinh thần tôn trọng và minh bạch.</p>
        </div>
        <div class="box">
          <h4>Với thị trường</h4>
          <p>Cung cấp các sản phẩm chất lượng cao với giá trị thẩm mỹ và công năng phù hợp nhu cầu người tiêu dùng.</p>
        </div>
      </div>
    </div>
  </section>

  

</body>
</html>
<?php include "inc/footer.php"; ?>