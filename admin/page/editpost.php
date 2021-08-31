<?php
include '../../database/db.php';
$id = $_GET['id'];

if (isset($_POST['sub'])) {
    $title = $_POST['title'];
    $image = $_POST['image'];
    $content = $_POST['content'];
    $tag = $_POST['tag'];
    $writer = $_POST['writer'];
    $time = time();



    $result = $conn->prepare("UPDATE post SET title=? ,image=? , content=? ,tag=?,writer=?, date=? WHERE id=? ");
    $result->bindValue(1, $title);
    $result->bindValue(2, $image);
    $result->bindValue(3, $content);
    $result->bindValue(4, $tag);
    $result->bindValue(5, $writer);
    $result->bindValue(6, $time);
    $result->bindValue(7, $id);

    $result->execute();
}





$all = $conn->prepare("SELECT * FROM writers");
$all->execute();
$writers = $all->fetchAll(PDO::FETCH_ASSOC);

$all = $conn->prepare("SELECT * FROM post  WHERE id=?");
$all->bindValue(1, $id);
$all->execute();
$post = $all->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <title>مدیریت بلاگ</title>

    <style>
        input,
        textarea {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <br><br>
        <div class="row">
            <form method="post">
                <input name="title" type="text" class="form-control" placeholder="عنوان" value="<?php echo $post['title']; ?>">
                <input name="image" type="text" class="form-control" placeholder="تصویر" value="<?php echo $post['image']; ?>">
                <textarea name="content" placeholder="متن را وارد کنید " id="editor1" <?php echo $post['content']; ?>">&lt;p&gt;&lt;/p&gt;</textarea>
                <script>
                    CKEDITOR.replace('editor1');
                </script><br>
                <input name="tag" type="text" class="form-control" placeholder="برچسب ها" value="<?php echo $post['tag']; ?>">
                <select name="writer" class="form-control">
                    <?php foreach ($writers as $writer) : ?>
                        <option value="<?= $writer['id'] ?>" <?= ($post['writer'] == $writer['id']) ? 'selected' : '' ?>><?= $writer['name'] ?></option> <?php endforeach; ?>
                </select>
                <br>
                <input type="submit" value="ویرایش" name="sub" class="btn btn-primary">
                <a href="blog.php" class="btn btn-danger">بازگشت</a>


            </form>
        </div>
</body>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/jquery-3.5.1.min.js"></script>

</html>