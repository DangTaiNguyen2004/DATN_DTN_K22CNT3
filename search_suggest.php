<?php
header('Content-Type: application/json');
include "config/db.php";

$keyword = $_GET['keyword'] ?? '';

if (!$keyword) {
    echo json_encode([]);
    exit;
}

// chống lỗi ký tự đặc biệt
$keyword = trim($keyword);

// query
$stmt = $conn->prepare("
    SELECT name 
    FROM products 
    WHERE name LIKE ? 
    LIMIT 5
");

$stmt->execute(["%$keyword%"]);

$result = $stmt->fetchAll(PDO::FETCH_COLUMN);

// trả về JSON
echo json_encode($result);