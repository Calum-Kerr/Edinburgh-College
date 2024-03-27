<!doctype html>
    <?php
    require_once("includes/db.php");

    if (!isset($_SESSION)) {
        session_start();
    }

    // redirect the user to the 'index' (Login) page
    if(isset($_SESSION["username"])==""){
        header("Location: login.php");
    }
     
    $email = $_SESSION["email"];
?>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>eCar</title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="media/favicon.ico" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="manifest" href="__manifest.json">
</head>

<body>

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-primary scrolled">
        <div class="left">
            <a href="#" class="headerButton" data-toggle="modal" data-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            eCar
        </div>
        <div class="right">
            <a href="javascript:;" class="headerButton toggle-searchbox">
                <ion-icon name="search-outline"></ion-icon>
            </a>
        </div>
    </div>
    <!-- * App Header -->

    <!-- Search Component -->
    <div id="search" class="appHeader">
        <form class="search-form">
            <div class="form-group searchbox">
                <input type="text" class="form-control" placeholder="Search...">
                <i class="input-icon">
                    <ion-icon name="search-outline"></ion-icon>
                </i>
                <a href="javascript:;" class="ml-1 close toggle-searchbox">
                    <ion-icon name="close-circle"></ion-icon>
                </a>
            </div>
        </form>
    </div>
    <!-- * Search Component -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="header-large-title">
            <h1 class="title">eCar</h1>
            <h4 class="subtitle">Electric Car Booking System</h4>
        </div>

        <div class="section mt-3 mb-3">
            <div class="card">
                <img src="media/Bob-Murphy.png" class="card-img-top" alt="image">
                <div class="card-body">
                    <h6 class="card-subtitle">News</h6>
                    <h5 class="card-title">Bob is steering the way to electric vehicle success</h5>
                    <p class="card-text">
                        Edinburgh College electric vehicle administrator Bob Murphy has been named as one of the 100 most influential people in the green fleet industry.
                    </p>
                    <a href="news.php" class="btn btn-primary">
                        <ion-icon name="layers-outline"></ion-icon>
                        Read
                    </a>
                </div>
            </div>
        </div>

        <div class="section mt-3 mb-3">
            <div class="card">
                <img src="media/Jessica-OLeary.jpg" class="card-img-top" alt="image">
                <div class="card-body">
                    <h6 class="card-subtitle">News</h6>
                    <h5 class="card-title">Jessica gears up for automotive career with electric vehicle scholarship</h5>
                    <p class="card-text">
                        A 16-year-old Edinburgh College student is on the road to a long future in automotive engineering after being awarded an electric vehicle (EV) scholarship.
                    </p>
                    <a href="news.php" class="btn btn-primary">
                        <ion-icon name="layers-outline"></ion-icon>
                        Read
                    </a>
                </div>
            </div>
        </div>

        <div class="section mt-3 mb-3">
            <div class="card">
                <img src="media/Green-Fleet-award-image.jpg" class="card-img-top" alt="image">
                <div class="card-body">
                    <h6 class="card-subtitle">News</h6>
                    <h5 class="card-title">Edinburgh College green fleet named UK’s best</h5>
                    <p class="card-text">
                        Edinburgh College’s electric vehicle project has won the Green Fleet of the Year title at the UK-wide Business Car Magazine Awards.
                    </p>
                    <a href="news.php" class="btn btn-primary">
                        <ion-icon name="layers-outline"></ion-icon>
                        Read
                    </a>
                </div>
            </div>
        </div>

   <?php
    require_once("includes/app-footer.php");
    require_once("includes/app-sidebar.php");
    require_once("includes/app-bottom-menu.php");
    require_once("includes/app-welcome-notification.php");
    ?>       

    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="assets/js/lib/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap-->
    <script src="assets/js/lib/popper.min.js"></script>
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src="assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- jQuery Circle Progress -->
    <script src="assets/js/plugins/jquery-circle-progress/circle-progress.min.js"></script>
    <!-- Base Js File -->
    <script src="assets/js/base.js"></script>

        <script>
        setTimeout(() => {
            notification('notification-welcome', 5000);
        }, 2000);
    </script>

</body>

</html>