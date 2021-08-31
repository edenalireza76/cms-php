<?php
include '../../database/db.php';
include '../../js/jdf.php';
if ($_SESSION['role'] != 2) {
    header('location:../index.php');
}

$number = 1;

if (isset($_POST['sub'])) {
    $title = $_POST['title'];
    $image = $_POST['image'];
    $content = $_POST['content'];
    $tag = $_POST['tag'];
    $writer = $_POST['writer'];
    $time = time();



    $result = $conn->prepare("INSERT INTO post SET title=? ,image=? , content=? ,tag=?,writer=?, date=? ");
    $result->bindValue(1, $title);
    $result->bindValue(2, $image);
    $result->bindValue(3, $content);
    $result->bindValue(4, $tag);
    $result->bindValue(5, $writer);
    $result->bindValue(6, $time);
    $result->execute();
}

$all = $conn->prepare("SELECT * FROM writers");
$all->execute();
$writers = $all->fetchAll(PDO::FETCH_ASSOC);



$all = $conn->prepare("SELECT * FROM post ORDER BY id DESC");
$all->execute();
$posts = $all->fetchAll(PDO::FETCH_ASSOC);

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
        <div class="row">
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a class="nav-link" href="menu.php">منو</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="blog.php">وبلاگ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="comment.php">نویسندگان</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
        </div>
        <br><br>
        <div class="row">
            <form method="post">
                <input name="title" type="text" class="form-control" placeholder="عنوان">
                <input name="image" type="text" class="form-control" placeholder="تصویر">
                <textarea name="content" placeholder="متن را وارد کنید " id="editor1">&lt;p&gt;&lt;/p&gt;</textarea>
                <script>
                    CKEDITOR.replace('editor1');
                </script><br>
                <input name="tag" type="text" class="form-control" placeholder="برچسب ها">
                <select name="writer" class="form-control">
                    <?php foreach ($writers as $writer) : ?>
                        <option value="<?php echo $writer['id']; ?>"><?php echo $writer['name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <br>
                <input type="submit" value="ثبت" name="sub" class="btn btn-primary">

            </form>
        </div>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">عنوان</th>
                        <th scope="col">تصویر</th>
                        <th scope="col">نویسنده</th>
                        <th scope="col">تاریخ</th>
                        <th scope="col">عملیات</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post) { ?>
                        <tr>
                            <th scope="row"><?php echo $number++; ?></th>
                            <td><?php echo $post['title']; ?></td>
                            <td><img src="<?php echo $post['image']; ?>" height="80px"></td>
                            <td><?php foreach ($writers as $writer) {
                                    if ($post['writer'] == $writer['id']) {
                                        echo $writer['name'];
                                    }
                                } ?></td>

                            <td><?php echo jdate('Y/m/d', $post['date']); ?></td>
                            <td>
                                <a href="editpost.php?id=<?php echo $post['id']; ?>" class="btn btn-warning">ویرایش </a>
                                <a href="deletpost.php?id=<?php echo $post['id']; ?>" class="btn btn-danger">حذف</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

</body>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/jquery-3.5.1.min.js"></script>

</html>