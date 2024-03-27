<!doctype html>
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
    <link rel="manifest" href="__manifest.json">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">	
</head>

<body class="bg-white">

    <!-- App Capsule -->
    <div id="appCapsule">
	    <div class="login-form">
			<div class="section">
				<img src="media/logo.png" alt="image" class="form-image">
			</div>
			
			<div class="section mt-5 mb-5">
				<div class="header-large-title">
					<h1 class="title" style="font-size: 30px;">eCar</h1>
				</div>			
				<img src="media/ecar-splash-logo.png" alt="image" class="form-image">
				<div class="header-large-title">
					<h1 class="title" style="font-size: 30px;">Booking System</h1>
				</div>				
			</div>
		</div>
    </div>
    <!-- * App Capsule -->


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
		$( document ).ready(function() {
			// Hide 'Splash Screen' after 3000ms = 3secs
			$(function() {
				setTimeout(hideSplash, 3000);
			});

			// Calls 'Login Page'
			function hideSplash() {					
				window.location.href = "login.php";
			}			
		});
	</script>
</body>

</html>