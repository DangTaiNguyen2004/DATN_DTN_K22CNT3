<?php
session_start();
include __DIR__."/../config/db.php";

$error = "";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass  = md5($_POST['password']);

    // ❗ BỎ role='admin'
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=? AND password=?");
    $stmt->execute([$email, $pass]);
    $user = $stmt->fetch();

    if ($user) {
        if ($user['role'] === 'admin') {
            $_SESSION['admin'] = $user;
            header("Location: index.php"); // admin
        } else {
            $_SESSION['user'] = $user;
            header("Location: ../index.php"); // web bán hàng
        }
        exit;
    } else {
        $error = "Email hoặc mật khẩu không đúng";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Đăng nhập | Nội Thất Ngọc Quang</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/css/admin.css">
<link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>

<div class="login-wrapper">

  <div class="login-left">
    <div class="brand">
      <h1>Nội Thất Ngọc Quang</h1>
      <p>Sự lựa chọn số 1 trong lòng người Việt</p>
    </div>
  </div>

  <div class="login-right">
    <form method="post" class="login-form">

      <h2>Đăng nhập</h2>

      <?php if($error): ?>
        <div class="alert alert-danger text-center"><?= $error ?></div>
      <?php endif; ?>

      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Mật khẩu" required>

      <button type="submit" name="login">Đăng nhập</button>
      <a class="btn-add" href="dangki.php">Đăng ký</a>

      <div class="login-footer">
        © 2026 Nội Thất Ngọc Quang
      </div>

    </form>
  </div>

</div>

</body>
</html>
