<link rel="stylesheet" href="../assets/css/admin.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<?php
session_start();

/* Xóa toàn bộ session */
session_unset();
session_destroy();

/* Quay về trang login */
header("Location: login.php");
exit;
