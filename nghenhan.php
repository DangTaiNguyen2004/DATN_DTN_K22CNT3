<?php
include "config/db.php";
include "inc/header.php";

$artisans = $conn->query("SELECT * FROM artisans")->fetchAll();
?>

<h2>Nghệ nhân</h2>

<div class="row">
<?php foreach($artisans as $a): ?>
    <div class="col-md-3 text-center mb-4">
        <img src="assets/images/artisans/<?= $a['image'] ?>" style="width:100%; height:200px; object-fit:cover;">
        <h5><?= $a['name'] ?></h5>
        <p><?= substr($a['description'],0,80) ?>...</p>
    </div>
<?php endforeach; ?>
</div>

<?php include "inc/footer.php"; ?>