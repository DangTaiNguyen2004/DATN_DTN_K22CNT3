<?php
$host = "localhost";
$db   = "noithat_hoanhoannn";
$user = "root";
$pass = "";

try {
  $conn = new PDO(
    "mysql:host=$host;dbname=noithat_hoanhoannn;charset=utf8",
    $user,
    $pass
  );
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Lỗi DB: " . $e->getMessage());
}
