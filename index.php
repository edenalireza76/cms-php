<?php
include 'database/db.php';


$result = $conn->prepare('SELECT COUNT(id) FROM POST');
$result->execute();
$numposts = $result->fetch(PDO::FETCH_ASSOC);
foreach ($numposts as $numpost) {
}



$result = $conn->prepare('SELECT COUNT(id) FROM writers');
$result->execute();
$numwriters = $result->fetch(PDO::FETCH_ASSOC);
foreach ($numwriters as $numwriter) {
}


$result = $conn->prepare('SELECT COUNT(id) FROM user');
$result->execute();
$numusers = $result->fetch(PDO::FETCH_ASSOC);
foreach ($numusers  as $numuser) {
}

$menus = $conn->prepare("SELECT * FROM menu ORDER BY sort");
$menus->execute();
$menus = $menus->fetchAll(PDO::FETCH_ASSOC);


$posts = $conn->prepare("SELECT * FROM post");
$posts->execute();
$posts = $posts->fetchAll(PDO::FETCH_ASSOC);


$writers = $conn->prepare("SELECT * FROM writers");
$writers->execute();
$writers = $writers->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <title>weblog</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
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
                        <a class="nav-link" href="#">خانه </a>
                    </li>
                    <?php foreach ($menus as $menu) {
                        if ($menu['status'] == 1) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><?php echo $menu['title'];  ?> </a>
                            </li>
                    <?php }
                    } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">پروفایل</a>
                    </li>
                    <?php if (isset($_SESSION['login'])) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                حساب کاربری
                            </a>
                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#"><?php echo $_SESSION['email'] ?></a>
                                <a class="dropdown-item" href="#"><?php echo $_SESSION['password'] ?></a>
                                <?php if ($_SESSION['role'] == 2) { ?><a class="dropdown-item" href="admin/index.php">پنل ادمین </a><?php } ?>
                            </div>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="page/log.php">خروج </a>

                        </li>
                    <?php } else { ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="page/login.php">ورود <span class="sr-only">(current)</span></a>

                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="page/regiester.php">ثبت نام <span class="sr-only">(current)</span></a>

                        </li>

                    <?php } ?>

                </ul>
                <form class="form-inline my-2 my-lg-0 mr-auto">
                    <input class="form-control mr-sm-2 placholder" type="search" placeholder="دنبال چی میگردی؟" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">جستجو</button>
                </form>
            </div>
        </nav>
        <!-----end header-->
        <!--start content-->
        <br><br>
        <div class="div">
            <div class="row d-none d-lg-flex">
                <div class="col-4 information-site">
                    <img src="./img/stat-time.svg">
                    <span>تعداد مقالات</span>
                    <span><?php echo $numpost; ?></span>
                </div>
                <div class="col-4 information-site">
                    <img src="./img/stat-student.svg">
                    <span>نویسدنگان</span>
                    <span><?php echo $numwriter; ?></span>
                </div>
                <div class="col-4 information-site">
                    <img src="./img/stat-teacher.svg">
                    <span>تعداد کاربران</span>
                    <span><?php echo $numuser; ?></span>
                </div>
            </div>
        </div>
        <br><br class="d-none d-lg-block"><br class="d-none d-lg-block">
        <!--end content----->
        <!----start post--->

        <div>
            <h5 style="padding:15px;">مقالات وبلاگ</h5>
            <div class="row">
            <?php foreach($posts as $post){ ?>
                <div class="col-12 col-lg-4">
                    <div class="post-item">
                        <a href="" class="item-hover-btn"><img src="<?php  echo $post['image'];?>" width="100%"></a>
                        <div class="hover-show">
                            <div class="hover-img-post d-none d-lg-flex">
                            </div>
                            <a href="#" class="more-opst btn btn d-none d-lg-flex">مشاهده مقاله</a>
                        </div>
                        <div class="post-caption">
                            <p><a href="#"><?php echo $post['title'] ?></a></p>
                            <span>اگر می‌خواهید در سال 2021، Machine Learning را یاد بگیرید و کنجکاوید که بدانید کدام زبان برنامه نویسی را باید یاد بگیرید،</span>
                            <br><br>
                            <span class="seen-post">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg>۱۳۵
                            </span>

                            <span class="seen-post post-comment">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15 fill=" currentColor" class="bi bi-chat-left-fill" viewBox="0 0 16 16">
                                    <path d="M2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                </svg>۷
                            </span>

                            <span class="person">
                                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    </svg><?php foreach($writers as $writer){ 
                                        
                                     if($post['writer'] == $writer['id']){
                                         
                                        echo $writer['name'];
                                    }
                                }
                                        ?>
                                    </a>
                            </span>
                        </div>
                    </div>
                </div>
                   <?php } ?>
                <!-- <div class="col-12 col-lg-4">
                    <div class="post-item">
                        <a href="" class="item-hover-btn"><img src="./img/01-03-2021vs.png" width="100%"></a>
                        <div class="hover-show">
                            <div class="hover-img-post d-none d-lg-flex">
                            </div>
                            <a href="#" class="more-opst btn btn d-none d-lg-flex">مشاهده مقاله</a>
                        </div>
                        <div class="post-caption">
                            <p><a href="#">چرا در سال 2021 پایتون بهترین ...</a></p>
                            <span>اگر می‌خواهید در سال 2021، Machine Learning را یاد بگیرید و کنجکاوید که بدانید کدام زبان برنامه نویسی را باید یاد بگیرید،</span>
                            <br><br>
                            <span class="seen-post">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg>۱۳۵
                            </span>

                            <span class="seen-post post-comment">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15 fill=" currentColor" class="bi bi-chat-left-fill" viewBox="0 0 16 16">
                                    <path d="M2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                </svg>۷
                            </span>

                            <span class="person">
                                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    </svg>علیرضا مقیمیان</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="post-item">
                        <a href="" class="item-hover-btn"><img src="./img/01-03-2021wordpress.png" width="100%"></a>
                        <div class="hover-show">
                            <div class="hover-img-post d-none d-lg-flex">
                            </div>
                            <a href="#" class="more-opst btn btn d-none d-lg-flex">مشاهده مقاله</a>
                        </div>
                        <div class="post-caption">
                            <p><a href="#">چرا در سال 2021 پایتون بهترین ...</a></p>
                            <span>اگر می‌خواهید در سال 2021، Machine Learning را یاد بگیرید و کنجکاوید که بدانید کدام زبان برنامه نویسی را باید یاد بگیرید،</span>
                            <br><br>
                            <span class="seen-post">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg>۱۳۵
                            </span>

                            <span class="seen-post post-comment">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15 fill=" currentColor" class="bi bi-chat-left-fill" viewBox="0 0 16 16">
                                    <path d="M2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                </svg>۷
                            </span>

                            <span class="person">
                                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    </svg>علیرضا مقیمیان</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="post-item">
                        <a href="" class="item-hover-btn"><img src="./img/01-03-20217703_agile.png" width="100%"></a>
                        <div class="hover-show">
                            <div class="hover-img-post d-none d-lg-flex">
                            </div>
                            <a href="#" class="more-opst btn btn d-none d-lg-flex">مشاهده مقاله</a>
                        </div>
                        <div class="post-caption">
                            <p><a href="#">چرا در سال 2021 پایتون بهترین ...</a></p>
                            <span>اگر می‌خواهید در سال 2021، Machine Learning را یاد بگیرید و کنجکاوید که بدانید کدام زبان برنامه نویسی را باید یاد بگیرید،</span>
                            <br><br>
                            <span class="seen-post">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg>۱۳۵
                            </span>

                            <span class="seen-post post-comment">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15 fill=" currentColor" class="bi bi-chat-left-fill" viewBox="0 0 16 16">
                                    <path d="M2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                </svg>۷
                            </span>

                            <span class="person">
                                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    </svg>علیرضا مقیمیان</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="post-item">
                        <a href="" class="item-hover-btn"><img src="./img/01-04-2021resume.png" width="100%"></a>
                        <div class="hover-show">
                            <div class="hover-img-post d-none d-lg-flex">
                            </div>
                            <a href="#" class="more-opst btn btn d-none d-lg-flex">مشاهده مقاله</a>
                        </div>
                        <div class="post-caption">
                            <p><a href="#">چرا در سال 2021 پایتون بهترین ...</a></p>
                            <span>اگر می‌خواهید در سال 2021، Machine Learning را یاد بگیرید و کنجکاوید که بدانید کدام زبان برنامه نویسی را باید یاد بگیرید،</span>
                            <br><br>
                            <span class="seen-post">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg>۱۳۵
                            </span>

                            <span class="seen-post post-comment">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15 fill=" currentColor" class="bi bi-chat-left-fill" viewBox="0 0 16 16">
                                    <path d="M2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                </svg>۷
                            </span>

                            <span class="person">
                                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    </svg>علیرضا مقیمیان</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="post-item">
                        <a href="" class="item-hover-btn"><img src="./img/02-22-2021angular.png" width="100%"></a>
                        <div class="hover-show">
                            <div class="hover-img-post d-none d-lg-flex">
                            </div>
                            <a href="#" class="more-opst btn btn d-none d-lg-flex">مشاهده مقاله</a>
                        </div>
                        <div class="post-caption">
                            <p><a href="#">چرا در سال 2021 پایتون بهترین ...</a></p>
                            <span>اگر می‌خواهید در سال 2021، Machine Learning را یاد بگیرید و کنجکاوید که بدانید کدام زبان برنامه نویسی را باید یاد بگیرید،</span>
                            <br><br>
                            <span class="seen-post">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg>۱۳۵
                            </span>

                            <span class="seen-post post-comment">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15 fill=" currentColor" class="bi bi-chat-left-fill" viewBox="0 0 16 16">
                                    <path d="M2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                </svg>۷
                            </span>

                            <span class="person">
                                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    </svg>علیرضا مقیمیان</a>
                            </span>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <br><br><br><br>
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
                            <img src="./img/logo.png">
                            <img src="./img/logo (1).png" height="166px">
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

<!----script----->
<script src="./js/jquery-3.5.1.min.js"></script>
<script src="./js/bootstrap.min.js">
</script>

</html>