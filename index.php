<?php
include "config/db.php";
include "inc/header.php";

$products = $conn->query("SELECT * FROM products")->fetchAll();
?>
<link rel="stylesheet" href="assets/css/categories.css">
<link rel="stylesheet" href="assets/css/doitac.css">
<section class="categories">
    <div class="cat-item"><img src="assets/images/products/sofa2.jpg"><p>Phòng khách</p></div>
    <div class="cat-item"><img src="assets/images/products/giuong2.jpg"><p>Phòng ngủ</p></div>
    <div class="cat-item"><img src="assets/images/products/ban2.jpg"><p>Phòng bếp</p></div>
    <div class="cat-item"><img src="assets/images/products/nhatam.jpg"><p>Phòng tắm</p></div>
    <div class="cat-item"><img src="assets/images/products/treem.jpg"><p>Trẻ em</p></div>
    <div class="cat-item"><img src="assets/images/products/vanphong.jpg"><p>Văn phòng</p></div>
    <div class="cat-item"><img src="assets/images/products/ban2.jpg"><p>Cầu thang</p></div>
    <div class="cat-item"><img src="assets/images/products/ban2.jpg"><p>Đồ trang trí</p></div>
  </section>
<h3 class="mb-4">Sản phẩm nổi bật</h3>

<div class="row">
<?php foreach($products as $p): ?>
  <div class="col-md-3 mb-4">
    <div class="card h-100">
      <img src="assets/images/products/<?= $p['image'] ?>" class="card-img-top">
      <div class="card-body text-center">
        <h6><?= $p['name'] ?></h6>
        <p class="text-danger fw-bold"><?= number_format($p['price']) ?> đ</p>
        <a href="product.php?id=<?= $p['id'] ?>" class="btn btn-outline-dark btn-sm">
          Xem chi tiết
        </a>
     
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>
 <section class="page-header">
  <h1 class="page-title">Tin Tức </h1>
</section>
<section class="intro">
    <div class="container">
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
   <section class="page-header">
  <h1 class="page-title">Đối Tác </h1>
</section>
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
  

<?php include "inc/footer.php"; ?>
