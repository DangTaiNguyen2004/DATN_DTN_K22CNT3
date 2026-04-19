<?php
include "config/db.php";
include "inc/header.php";

/* BÀI CHÍNH (cũ nhất) */
$main = $conn->query("SELECT * FROM news ORDER BY id ASC LIMIT 1")->fetch();

/* BÀI MỚI (khác bài chính) */
$news = $conn->query("
    SELECT * FROM news 
    WHERE id != {$main['id']} 
    ORDER BY id DESC
")->fetchAll();
?>

<link rel="stylesheet" href="assets/css/tintuc.css">

<main class="news-container">

<div class="breadcrumb">
  <a href="index.php">Trang chủ</a> > <span>Tin tức</span>
</div>

<div class="content">

  <!-- LEFT -->
  <div class="news-box">

    <!-- CLICK TIÊU ĐỀ -->
    <h2>
        <a href="news_detail.php?id=<?= $main['id'] ?>">
            <?= $main['title'] ?>
        </a>
    </h2>

    <p><?= substr($main['content'],0,200) ?>...</p>

    <!-- CLICK ẢNH -->
    <a href="news_detail.php?id=<?= $main['id'] ?>">
        <img src="assets/images/news/<?= $main['image'] ?>">
    </a>

</div>
  <!-- RIGHT -->
  <aside class="news-right">
  <h3>BÀI VIẾT MỚI</h3>

  <?php foreach($news as $n): ?>
  <div class="post">
      <a href="news_detail.php?id=<?= $n['id'] ?>">
          <img src="assets/images/news/<?= $n['image'] ?>">
          <p><?= $n['title'] ?></p>
      </a>
  </div>
  <?php endforeach; ?>

</aside>

</div>

</main>

<?php include "inc/footer.php"; ?>