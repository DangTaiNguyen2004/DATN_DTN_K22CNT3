<?php
session_start();
include "config/db.php";

$error = "";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // LẤY USER
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // KIỂM TRA PASSWORD
    if ($user && md5($password) === $user['password']) {

        // ✅ QUAN TRỌNG (dùng toàn hệ thống)
        $_SESSION['user_id']   = $user['id'];
        $_SESSION['user_name'] = $user['name'] ?? $user['email'];

        // lưu full user nếu cần
        $_SESSION['user'] = $user;

        header("Location: index.php");
        exit;

    } else {
        $error = "❌ Email hoặc mật khẩu không đúng";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Đăng nhập</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/login_user.css">

</head>
<body>

<div class="login-container">

    <form method="post" class="login-box">

        <h2>👤 Đăng nhập</h2>

        <?php if($error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mật khẩu" required>

        <button name="login">Đăng nhập</button>

        <p class="login-link">
            Chưa có tài khoản? 
            <a href="register.php">Đăng ký</a>
        </p>

    </form>

</div>

</body>
</html>