<?php
// BẢO VỆ ADMIN
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include "../config/db.php";

// KIỂM TRA ID
if (!isset($_GET['id'])) {
    header("Location: users.php");
    exit;
}

$id = $_GET['id'];

// KHÔNG CHO XOÁ ADMIN
$stmt = $conn->prepare("SELECT role FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();

if (!$user || $user['role'] === 'admin') {
    header("Location: users.php");
    exit;
}

// XOÁ USER
$conn->prepare("DELETE FROM users WHERE id = ?")->execute([$id]);

header("Location: users.php");
exit;
