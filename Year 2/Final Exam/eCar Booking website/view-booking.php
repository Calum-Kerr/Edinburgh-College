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
	
	// Setting the user's 'id' and 'email' 
	$id 	= $_SESSION["user_id"];
	$email 	= $_SESSION["email"];
	
	// If we didn't receive a booking_id
	// redirect the user to the 'home' page to prevent errors	
	if(!isset($_GET['booking_id'])){
		header("Location: home.php");	
	} 
	else {
		$booking_id = $_GET["booking_id"];
	}	
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
	
	<style>
		.profile-image {
			width: 20%;
			height: auto;
			display: block;
			margin: 0 auto;
		}
		.profile-image.rounded {
			border-radius: 100% !important;
		}
		.update-button {
			bottom: 0;
			left: 0;
			right: 0;
			width: 100%;
			padding-left: 16px;
			padding-right: 16px;
			min-height: 84px;
			display: flex;
			align-items: center;
			justify-content: center;
			padding-bottom: env(safe-area-inset-bottom);
		}		
	</style>	
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
            eCar - View Booking
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

		<!-- Page Header -->
        <div class="header-large-title">
            <h1 class="title">View Booking</h1>
            <h4 class="subtitle">View Your eCar Past Reservation</h4>
        </div>
		<!-- * Page Header -->

		<!-- Page Content -->
        <div class="section full mt-2 mb-2">
			<?php 
				// Get a reservation by id
				// DB Query
				$get_booking = "SELECT * FROM reservation WHERE reservation_id = '$booking_id' LIMIT 1";
											
				// Connect to DB and run the Query 
				$run_get_booking = mysqli_query($conn, $get_booking);
				
				// Booking array
				$booking_arr = array();
											
				while($row_booking = mysqli_fetch_array($run_get_booking)){
					$reference_number	= $row_booking['reference_number'];
					$origin 			= $row_booking['origin'];
					$destination 		= $row_booking['destination'];
					$start_date 		= $row_booking['start_date'];
					$start_time 		= $row_booking['start_time'];
					$end_date 			= $row_booking['end_date'];
					$end_time 			= $row_booking['end_time'];
					$vehicle_id 		= $row_booking['vehicle_id'];
					$description 		= $row_booking['description'];	
					
					// Get vehicle by id
					// DB Query
					$get_vehicle = "SELECT registration_number, make, model, image_name FROM vehicle WHERE vehicle_id = '$vehicle_id' LIMIT 1";
												
					// Connect to DB and run the Query 
					$run_get_vehicle = mysqli_query($conn, $get_vehicle);
															
					while($row_vehicle = mysqli_fetch_array($run_get_vehicle)){
						$registration_number	= $row_vehicle['registration_number'];
						$make 					= $row_vehicle['make'];	
						$model 					= $row_vehicle['model'];	
						$image_name 			= $row_vehicle['image_name'];						
					}	

					$booking_arr[] = array("reference_number" 		=> $reference_number, 
											"origin" 				=> $origin, 
											"destination" 			=> $destination, 
											"start_date" 			=> $start_date, 
											"start_time" 			=> $start_time, 
											"end_date" 				=> $end_date, 
											"end_time" 				=> $end_time,  
											"description" 			=> $description,  
											"registration_number" 	=> $registration_number, 
											"make" 					=> $make, 
											"model" 				=> $model, 
											"image_name" 			=> $image_name
											);						
				}
			?>		
			<div class="section mt-2">
				<form class="needs-validation" action="" method="post" novalidate>
					<div class="section-title">Reservation Details</div>
					<div class="card">
						<div class="card-body">																						
							<div class="form-group boxed">	
								<div class="input-wrapper">
									<label class="label" for="origin">From (Campus)</label>
									<label type="text" class="form-control" style="padding-top: 8px;" name="origin" id="origin"><?php echo $booking_arr[0]['origin']; ?></label>									
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>								
								</div>								
							</div>	

							<div class="form-group boxed">	
								<div class="input-wrapper">
									<label class="label" for="destination">Destination (Campus)</label>
									<label type="text" class="form-control" style="padding-top: 8px;" name="destination" id="destination"><?php echo $booking_arr[0]['destination']; ?></label>									
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>								
								</div>								
							</div>							
							
							<div class="form-group boxed">	
								<div class="input-wrapper">
									<label class="label" for="vehicle">Vehicle</label>
									<label type="text" class="form-control" style="padding-top: 8px;" name="vehicle" id="vehicle"><?php echo $booking_arr[0]['make']; ?></label>									
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>								
								</div>								
							</div>							
					
							<div class="form-group boxed">	
								<div class="input-wrapper">
									<label class="label" for="vehicle_model">Vehicle Model</label>
									<label type="text" class="form-control" style="padding-top: 8px;" name="vehicle_model" id="vehicle_model"><?php echo $booking_arr[0]['model']; ?></label>									
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>								
								</div>								
							</div>							
							
							<div class="form-group boxed">	
								<div class="input-wrapper">
									<label class="label" for="vehicle_registration_number">Vehicle Registration Number</label>
									<label type="text" class="form-control" style="padding-top: 8px;" name="vehicle_registration_number" id="vehicle_registration_number"><?php echo $booking_arr[0]['registration_number']; ?></label>									
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>								
								</div>								
							</div>								
							
							<div class="form-group boxed">	
								<div class="input-wrapper">
									<label class="label" for="start_date">Start Date</label>
									<label type="text" class="form-control" style="padding-top: 8px;" name="start_date" id="start_date"><?php echo $booking_arr[0]['start_date']; ?></label>									
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>								
								</div>								
							</div>								
														
							<div class="form-group boxed">	
								<div class="input-wrapper">
									<label class="label" for="start_time">Start Time</label>
									<label type="text" class="form-control" style="padding-top: 8px;" name="start_time" id="start_time"><?php echo $booking_arr[0]['start_time']; ?></label>									
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>								
								</div>								
							</div>								
							
							<div class="form-group boxed">	
								<div class="input-wrapper">
									<label class="label" for="end_date">End Date</label>
									<label type="text" class="form-control" style="padding-top: 8px;" name="end_date" id="end_date"><?php echo $booking_arr[0]['end_date']; ?></label>									
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>								
								</div>								
							</div>								

							<div class="form-group boxed">	
								<div class="input-wrapper">
									<label class="label" for="end_time">End Time</label>
									<label type="text" class="form-control" style="padding-top: 8px;" name="end_time" id="end_time"><?php echo $booking_arr[0]['end_time']; ?></label>									
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>								
								</div>								
							</div>							

							<div class="form-group boxed">	
								<div class="input-wrapper">
									<label class="label" for="description">Description</label>
									<label type="text" class="form-control" style="padding-top: 8px;" name="description" id="description"><?php echo $booking_arr[0]['description']; ?></label>									
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>								
								</div>								
							</div>
						</div>	
					</div>
				</form>
			</div>
			<?php 	

			?>				
		</div>
		<!-- * Page Content -->

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

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
	
    <script>
		$(document).ready(function(){

			$("#origin").change(function(){
				var campusId = $(this).val();

				$.ajax({
					url: 'includes/functions.php',
					type: 'post',
					data: {campus:campusId},
					dataType: 'json',
					success:function(response){

						var len = response.length;
						
						if(len > 0) {
							$("#vehicle").empty();
							$("#vehicle").append('<option value="0">Please Select a Vehicle</option>');
							for(var i = 0; i < len; i++){
								var vehicle_id 		= response[i]['vehicle_id'];
								var vehicle_make	= response[i]['vehicle_make'];							
								
								$("#vehicle").append('<option value="' + vehicle_id + '">' + vehicle_make + '</option>');
							}

							
						}
						else {
							$("#vehicle").empty();
							$("#vehicle").append('<option value="0">Please Select a Vehicle</option>');
						}
					}
				});				
			});
			
			$("#vehicle").change(function(){
				var vehicleId = $(this).val();

				$.ajax({
					url: 'includes/functions.php',
					type: 'post',
					data: {vehicle:vehicleId},
					dataType: 'json',
					success:function(response){

						var len = response.length;
						
						if(len > 0) {
							$("#vehicle_model").text('');
							$("#vehicle_registration_number").text('');							
							$("#vehicle_model").text('Vehicle Model');
							$("#vehicle_registration_number").text('Vehicle Registration Number');	
							
							for( var i = 0; i < len; i++){
								var vehicle_id 					= response[i]['vehicle_id'];
								var vehicle_registration_number	= response[i]['vehicle_registration_number'];
								var vehicle_make 				= response[i]['vehicle_make'];
								var vehicle_model 				= response[i]['vehicle_model'];								
								
								$("#vehicle_model").text(vehicle_model);
								$("#vehicle_registration_number").text(vehicle_registration_number);
							}							
						}
						else {
							$("#vehicle_model").text('');
							$("#vehicle_registration_number").text('');							
							$("#vehicle_model").text('Vehicle Model');
							$("#vehicle_registration_number").text('Vehicle Registration Number');
						}
					}
				});
			});	
		});
    </script>		
</body>

</html>