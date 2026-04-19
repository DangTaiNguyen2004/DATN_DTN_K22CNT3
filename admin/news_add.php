<?php
include "../config/db.php";

if($_POST){
    $title = $_POST['title'];
    $content = $_POST['content'];

    $img = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/news/".$img);

    $conn->prepare("INSERT INTO news(title,content,image) VALUES(?,?,?)")
         ->execute([$title,$content,$img]);

    header("Location: news.php");
}
?>

<form method="post" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Tiêu đề">
    <textarea name="content" placeholder="Nội dung"></textarea>
    <input type="file" name="image">
    <button>Thêm</button>
</form>