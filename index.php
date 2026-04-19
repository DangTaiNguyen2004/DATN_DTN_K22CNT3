<?php
include "config/db.php";
include "inc/header.php";

$keyword = $_GET['keyword'] ?? '';

if ($keyword) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE ?");
    $stmt->execute(["%$keyword%"]);
    $products = $stmt->fetchAll();
} else {
    $products = $conn->query("SELECT * FROM products")->fetchAll();
}
$stmt = $conn->query("
    SELECT p.* 
    FROM featured_products f
    JOIN products p ON f.product_id = p.id
    ORDER BY f.id DESC
");

$products = $stmt->fetchAll();
?>
<?php if($keyword): ?>
  <h5>Kết quả tìm kiếm cho: "<b><?= htmlspecialchars($keyword) ?></b>"</h5>
<?php endif; ?>
<?php
$cats = $conn->query("SELECT * FROM categories")->fetchAll();
?>
<link rel="stylesheet" href="assets/css/featured.css">
<link rel="stylesheet" href="assets/css/categories.css">
<link rel="stylesheet" href="assets/css/wrapper.css">
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
        <button type="submit">Tìm kiếm</button>
    </div>

    <!-- dropdown gợi ý -->
    <div id="suggestBox"></div>
</form>
<div class="wrapper">
        <marquee id="slider" scrollamount="14" direction="left">
            <div class="images" id="imgBox">
                <h1>NỘI THẤT DTN HOME được xây dựng dựa trên tình yêu, đam mê cái đẹp với nghề mộc và khát khao mang những sản phẩm nội thất đẹp của mình đến với khách hàng thân yêu.</h1>
                <img src="https://noithathpro.com/uploads/hoan-thien-noi-that-nha-anh-hoang-2.jpg" alt="" class="img">
                <img src="https://noithatnabi.com/wp-content/uploads/2019/02/banner-nabi-slide-03-1900x700.jpg" alt="" class="img">
                <img src="https://noithat.mangvinhphuc.com/wp-content/uploads/2024/12/thiet-ke-thi-cong-noi-that-vinhphuc-banner8.jpg" alt="" class="img">
                <img src="https://bighome.vn/wp-content/uploads/2023/01/Banner-anh-Long.jpg" alt="" class="img">
            </div>
        </marquee>
    </div>
    
    <h2>DANH MỤC SẢN PHẨM</h2>
<section class="categories">
<?php foreach($cats as $c): ?>
  <a href="category.php?id=<?= $c['id'] ?>" class="cat-item">
    
    <div class="icon-box">
      <img src="/noithat_ngocquangggg/assets/images/icon/<?= $c['icon'] ?>">
    </div>

    <p><?= $c['name'] ?></p>

  </a>
<?php endforeach; ?>
</section>
<div class="container py-5">

    <h2 class="title">🔥 SẢN PHẨM NỔI BẬT</h2>

    <div class="product-grid">
        <?php foreach($products as $p): ?>
        <div class="product-card">

            <div class="product-img">
                <img src="assets/images/products/<?= $p['image'] ?>" alt="">
                <span class="badge-hot">HOT</span>
            </div>

            <div class="product-body">
                <h4><?= $p['name'] ?></h4>

                <p class="price"><?= number_format($p['price']) ?> đ</p>

                <div class="actions">
                    <a href="product.php?id=<?= $p['id'] ?>" class="btn-view">
                        Xem chi tiết
                    </a>

                    <a href="add_to_cart.php?id=<?= $p['id'] ?>" class="btn-cart">
                        🛒
                    </a>
                </div>
            </div>

        </div>
        <?php endforeach; ?>
    </div>

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
          NỘI THẤT DTN HOME được xây dựng dựa trên tình yêu, đam mê cái đẹp với nghề mộc và khát khao mang những sản phẩm nội thất đẹp của mình đến với khách hàng thân yêu. <br><br>
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
  
<?php


$success = "";

if(isset($_POST['send'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("
        INSERT INTO contacts(name,email,phone,message)
        VALUES(?,?,?,?)
    ");
    $stmt->execute([$name,$email,$phone,$message]);

    $success = "Gửi liên hệ thành công!";
}
?>

<link rel="stylesheet" href="assets/css/lienhe.css">

<!-- BANNER -->
<section class="contact-banner">
    <h1>LIÊN HỆ</h1>
</section>

<div class="contact-box container">

    <div class="row align-items-center">

        <!-- LEFT IMAGE -->
        <div class="col-md-6 text-center">
            <img src="https://noithathpro.com/uploads/hoan-thien-noi-that-nha-anh-hoang-2.jpg" class="img-fluid">
        </div>

        <!-- RIGHT FORM -->
        <div class="col-md-6">
            <h3>LIÊN HỆ VỚI CHÚNG TÔI</h3>

            <?php if($success): ?>
                <div class="alert alert-success"><?= $success ?></div>
            <?php endif; ?>

            <form method="post">
                <input type="text" name="name" placeholder="Họ tên" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="phone" placeholder="Số điện thoại">
                <textarea name="message" placeholder="Nội dung" required></textarea>

                <button name="send">Gửi</button>
            </form>
        </div>

    </div>

</div>


<?php include "inc/footer.php"; ?>
<script src="assets/js/search.js"></script>