<?php
include "../config/db.php";

$id = $_GET['id'] ?? 0;

$conn->prepare("DELETE FROM news WHERE id=?")->execute([$id]);

header("Location: news.php");