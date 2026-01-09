<?php
session_start();

/* Xóa session */
session_unset();
session_destroy();

/* Quay về trang login ADMIN */
header("Location: /noithat_ngocquangggg/admin/login.php");
exit;
