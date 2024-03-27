<!DOCTYPE html>
<?php
	// A 'DB' connection is required once
	require_once("includes/db.php");

	// If a 'SESSION' is not started... start a new one.
	if (!isset($_SESSION)) {
		session_start();
	}

	// If a 'SESSION' called 'user_name' exists and is empty (it means that the user isn't logged in)
	// redirect the user to the 'index' (Login) page
    if(isset($_SESSION["username"])==""){
		header("Location: login.php");
    }
	
	// Setting the user's 'email' 
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
						<br><br>
						For the second year running, Bob was named in Green Fleet magazine’s list of the 100 most influential people. The list includes a mix of fleet managers, vehicle manufacturers, government figures, campaigners and company bosses whose efforts have contributed to making the fleet and motoring industry more environmentally friendly in 2017.
						<br><br>
						Coming in at number 66, Bob, who manages the college’s award-winning 15-strong fleet of electric vehicles, is in high-profile company on the list, which includes Chancellor of the Exchequer Phillip Hammond and Transport Secretary Chris Grayling, as well as CEO of ClientEarth James Thornton and the head of Tesla, Elon Musk.
						<br><br>
						Since its launch in 2012, the electric fleet has saved the equivalent of 50 tonnes of CO2 emission as well as more than £100,000 in fuel costs. In total, the fleet has travelled 250,000 miles, with 45,200 trips and 9,300 bookings by the 600 staff members registered to use the vehicles.
						<br><br>
						As part of his role, Bob regularly shares the work of the college’s electric vehicle fleet with peers across the UK, attending events such as the Greenfleet Evolution, GoUltraLow summits and E-Cosse forums to discuss his work.
						<br><br>
						Thanks to Bob’s hard work the college’s electric vehicle fleet was named the UK’s best at the 2017 Business Car Magazine Awards, picking up the Green Fleet of the Year title.
						<br><br>
						Bob, who also mentors students on the college’s eCar scholarship project, said: “I’m surprised and delighted to have made the list for the second year in a row. To be listed alongside globally influential people like Elon Musk and Sadiq Khan and local electric vehicle heroes like Gary McRae (corporate fleet manager, Dundee City Council) is an absolute honour.
						<br><br>
						“2017 was a great year for the college’s electric vehicles and in 2018 I’m hoping to expand and improve the fleet. Our new BMW i3s will be available to staff within the next couple of weeks and I’ll be looking into new innovative ways to boost the utilisation of the cars in future. I’ll also be working with the Sustainability team on a college-wide Green Travel Plan, which aims to improve all aspects of green travel at the college.”
                    </p>
                    <a href="home.php" class="btn btn-primary">
                        <ion-icon name="layers-outline"></ion-icon>
                        Back
                    </a>					
                </div>
            </div>
        </div>

        <?php
    require_once("includes/app-footer.php");
    require_once("includes/app-sidebar.php");
    require_once("includes/app-bottom-menu.php");
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
</body>

</html>