<?php
include "config/db.php";
include "inc/header.php";

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