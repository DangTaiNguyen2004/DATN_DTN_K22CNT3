<?php
include "config/db.php";
include "inc/header.php";

$id = $_GET['id'] ?? 0;

$stmt = $conn->prepare("SELECT * FROM news WHERE id=?");
$stmt->execute([$id]);
$n = $stmt->fetch();

if(!$n){
    echo "Không tìm thấy bài viết";
    exit;
}
?>

<link rel="stylesheet" href="assets/css/tintuc.css">

<div class="container mt-4">

    <h2><?= $n['title'] ?></h2>

    <p style="color:#888;">
        Ngày đăng: <?= $n['created_at'] ?>
    </p>

    <img src="assets/images/news/<?= $n['image'] ?>" style="width:100%; max-height:400px; object-fit:cover;">

    <div style="margin-top:20px; line-height:1.6;">
        <?= nl2br($n['content']) ?>
    </div>

</div>

<?php include "inc/footer.php"; ?>