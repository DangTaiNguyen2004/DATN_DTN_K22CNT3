<?php
session_start();
include __DIR__."/../config/db.php";

$error = "";

if (isset($_POST['register'])) {
    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);
    $pass  = $_POST['password'];
    $repass = $_POST['repassword'];

    if ($pass !== $repass) {
        $error = "Mật khẩu nhập lại không khớp";
    } else {
        $check = $conn->prepare("SELECT id FROM users WHERE email=?");
        $check->execute([$email]);

        if ($check->rowCount()) {
            $error = "Email đã tồn tại";
        } else {
            $conn->prepare("
                INSERT INTO users(name,email,password,role)
                VALUES(?,?,?,'user')
            ")->execute([$name, $email, md5($pass)]);

            header("Location: login.php");
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Đăng ký | Nội Thất Ngọc Quang</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/css/dangki.css">
</head>
<body>

<div class="login-wrapper">

  <div class="login-left">
    <div class="brand">
      <h1>Nội Thất Ngọc Quang</h1>
      <p>Đăng ký tài khoản người dùng</p>
    </div>
  </div>

  <div class="login-right">
    <form method="post" class="login-form">

      <h2>Đăng ký</h2>

      <?php if($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
      <?php endif; ?>

      <input type="text" name="name" placeholder="Họ tên" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Mật khẩu" required>
      <input type="password" name="repassword" placeholder="Nhập lại mật khẩu" required>

      <button type="submit" name="register">Đăng ký</button>

      <div class="text-center mt-3">
        <a href="login.php">Đã có tài khoản? Đăng nhập</a>
      </div>

    </form>
  </div>

</div>

</body>
</html>
