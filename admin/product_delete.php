<link rel="stylesheet" href="../assets/css/admin.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<?php
include "../config/db.php";

$id = $_GET['id'];
$conn->query("DELETE FROM products WHERE id=$id");
header("Location: products.php");
