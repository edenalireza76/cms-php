<?php
include '../database/db.php';
$successmessage = null;

if (isset($_POST['sub'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $password = $_POST['password'];

    $result = $conn->prepare("INSERT INTO user SET username=? ,email=? , age=? , password=?");
    $result->bindValue(1, $name);
    $result->bindValue(2, $email);
    $result->bindValue(3, $age);
    $result->bindValue(4, $password);
    $result->execute();
    $successmessage = true;
}
?>
<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <title>ثبت نام</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>


<body>
    <div class="container">
        <br>
        <!--start header-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">وبلاگ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">خانه <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">پروفایل</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            مقالات
                        </a>
                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">برنامه نویسی</a>
                            <a class="dropdown-item" href="#">طراحی وب</a>
                            <a class="dropdown-item" href="#">بازی سازی</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0 mr-auto">
                    <input class="form-control mr-sm-2 placholder" type="search" placeholder="دنبال چی میگردی؟" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">جستجو</button>
                </form>
            </div>
        </nav>
    </div>
    <!-- end header -->

    <br><br><br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">

            </div>
            <div class="col-12 col-lg-4">
                <form method="post" class="register-form">
                    <input name="username" type="text" placeholder="نام کاربری ">
                    <input name="email" type="email" placeholder="ایمیل ">
                    <input name="age" type="number" placeholder="سن">
                    <input name="password" type="password" placeholder="رمز عبور"><br>
                    <input name="sub" type="submit" value="ثبت نام" placeholder="رمز عبور" class="btn btn-primary submit-regester">

                </form>
            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </div>




    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <!-- footer start -->
    <footer>
        <div class="footer1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-7"><br><br>
                        <form action="">
                            <input type="text" class="input-group" placeholder="پست الکترونیک شما">
                            <input type="submit" class="btn btn-success" value="عضویت در خبرنامه">
                        </form>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="namad">
                            <img src="../img/logo.png">
                            <img src="../img/logo (1).png" height="166px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer2">
            <p class="container">تمام حقوق این وبسایت برای وبلاگ محفوظ است </p>
        </div>
    </footer>
</body>
<?php if ($successmessage) { ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'ثبت نام با موفقیت انجام شد'
        })
    </script>

<?php  } ?>

<!----script----->
<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/bootstrap.min.js">
</script>

</html>