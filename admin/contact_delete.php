<?php
include "auth.php";
include "../config/db.php";

$id = $_GET['id'] ?? 0;

$conn->prepare("DELETE FROM contacts WHERE id=?")->execute([$id]);

header("Location: contacts.php");
exit;