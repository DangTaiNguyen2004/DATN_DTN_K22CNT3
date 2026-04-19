<?php
include "../config/db.php";

$id = $_GET['id'] ?? 0;

$stmt = $conn->prepare("SELECT * FROM news WHERE id=?");
$stmt->execute([$id]);
$n = $stmt->fetch();

if(!$n) die("Không tìm thấy");

if($_POST){
    $title = $_POST['title'];
    $content = $_POST['content'];

    if(!empty($_FILES['image']['name'])){
        $img = time().'_'.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/news/$img");
    } else {
        $img = $n['image'];
    }

    $conn->prepare("
        UPDATE news 
        SET title=?, content=?, image=? 
        WHERE id=?
    ")->execute([$title,$content,$img,$id]);

    header("Location: news.php");
}
?>

<h2>Sửa bài viết</h2>

<form method="post" enctype="multipart/form-data">
    <input type="text" name="title" value="<?= $n['title'] ?>"><br><br>

    <textarea name="content" rows="6"><?= $n['content'] ?></textarea><br><br>

    <p>Ảnh hiện tại:</p>
    <img src="../assets/images/news/<?= $n['image'] ?>" width="120"><br><br>

    <input type="file" name="image"><br><br>

    <button>Cập nhật</button>
</form>