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
            eCar - Book a Car
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

		<!-- Page Header -->
        <div class="header-large-title">
            <h1 class="title">Book an eCar</h1>
            <h4 class="subtitle">Make Your eCar Reservation</h4>
        </div>
		<!-- * Page Header -->

		<!-- Page Content -->
        <div class="section full mt-2 mb-2">
			<?php 
			// If the user did not submited the 'Form' (pressed the 'Reservation' button)
			// show/allow the form's content
			if(!isset($_POST["submit"])){

			?>		
			<div class="section mt-2">
				<form class="needs-validation" action="book-a-car.php" method="post" novalidate>
					<div class="section-title">Reservation Details</div>
					<div class="card">
						<div class="card-body">															
							<div class="form-group boxed">
								<div class="input-wrapper">
									<label class="label" for="origin">From (Campus)</label>
									<div class="custom-select-1">
										<select class="form-control" name="origin" id="origin" required>
											<option value="">Please Select a Campus</option>
											<?php 
											// Get All Campuses
											// DB Query
											$get_campus = "SELECT * FROM college_campus";
											
											// Connect to DB and run the Query 
											$run_get_campus = mysqli_query($conn, $get_campus);
											
											while($row_campus = mysqli_fetch_array($run_get_campus)){
												$campus_id 		= $row_campus['campus_id'];
												$campus_name 	= $row_campus['name'];

												echo'
													<option value="'.$campus_id.'">'.$campus_name.'</option>
												';
											}
											?>
										</select>
									</div>	
								</div>	
							</div>
							
							<div class="form-group boxed">
								<div class="input-wrapper">
									<label class="label" for="destination">Destination (Campus)</label>
									<div class="custom-select-1">
										<select class="form-control" name="destination" id="destination" required>
											<option value="">Please Select a Campus</option>
											<?php 
											// Get All Campuses
											// DB Query
											$get_campus = "SELECT * FROM college_campus";
											
											// Connect to DB and run the Query 
											$run_get_campus = mysqli_query($conn, $get_campus);
											
											while($row_campus = mysqli_fetch_array($run_get_campus)){
												$campus_id 		= $row_campus['campus_id'];
												$campus_name 	= $row_campus['name'];

												echo'
													<option value="'.$campus_id.'">'.$campus_name.'</option>
												';
											}
											?>
										</select>
									</div>	
								</div>	
							</div>							
							
							<div class="form-group boxed">
								<div class="input-wrapper">
									<label class="label" for="vehicle">Vehicle</label>
									<div class="custom-select-1">
										<select class="form-control" name="vehicle" id="vehicle" required>
											<option value="">Please Select a Vehicle</option>
										</select>
									</div>										
								</div>	
							</div>							
					
							<div class="form-group boxed">	
								<div class="input-wrapper">
									<label class="label" for="vehicle_model">Vehicle Model</label>
									<label type="text" class="form-control" style="padding-top: 8px;" name="vehicle_model" id="vehicle_model">Vehicle Model</label>									
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>								
								</div>								
							</div>					

							<div class="form-group boxed">
								<div class="input-wrapper">
									<label class="label" for="vehicle_registration_number">Vehicle Registration Number</label>
									<label type="text" class="form-control" style="padding-top: 8px;" name="vehicle_registration_number" id="vehicle_registration_number">Vehicle Registration Number</label>									
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>								
								</div>								
							</div>

							<div class="form-group boxed">
								<div class="input-wrapper">
									<label class="label" for="start_date">Start Date</label>
									<input type="date" class="form-control" name="start_date" id="start_date" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
									<div class="valid-feedback">Start date checked.</div>
									<div class="invalid-feedback">Please enter your start date.</div>									
								</div>
							</div>
							
							<div class="form-group boxed">
								<div class="input-wrapper">
									<label class="label" for="start_time">Start Time</label>
									<input type="time" class="form-control" name="start_time" id="start_time" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
									<div class="valid-feedback">Start time checked.</div>
									<div class="invalid-feedback">Please enter your start time.</div>									
								</div>
							</div>	

							<div class="form-group boxed">
								<div class="input-wrapper">
									<label class="label" for="end_date">End Date</label>
									<input type="date" class="form-control" name="end_date" id="end_date" required="required">
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
									<div class="valid-feedback">End date checked.</div>
									<div class="invalid-feedback">Please enter your end date.</div>									
								</div>
							</div>

							<div class="form-group boxed">
								<div class="input-wrapper">
									<label class="label" for="end_time">End Time</label>
									<input type="time" class="form-control" name="end_time" id="end_time" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
									<div class="valid-feedback">End time checked.</div>
									<div class="invalid-feedback">Please enter your end time.</div>									
								</div>
							</div>		

							<div class="form-group boxed">
								<div class="input-wrapper">
									<label class="label" for="description">Description</label>
									<input type="text" class="form-control" name="description" id="description" placeholder="Description">
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>								
								</div>
							</div>												
						</div>	
					</div>
					
                    <div class="update-button">
                        <button type="submit" class="btn btn-primary btn-block btn-lg" name="submit">Reservation</button>
                    </div>
				</form>
			</div>
			<?php 	
			} 
			else {
				// Function to generate a random reference number 
				function reference_number_generator($chars) {
					$data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
					return substr(str_shuffle($data), 0, $chars);
				}	
				
				function get_campus_by_id($campus_id) {
					global $conn;
					
					// Get campus by ID
					// DB Query
					$get_campus_by_id = "SELECT * FROM college_campus WHERE campus_id = '$campus_id' LIMIT 1";
											
					// Connect to DB and run the Query 
					$run_get_campus_by_id = mysqli_query($conn, $get_campus_by_id);
											
					while($row_campus = mysqli_fetch_array($run_get_campus_by_id)){
						$campus_id 		= $row_campus['campus_id'];
						$campus_name 	= $row_campus['name'];
					}
					return $campus_name;
				}				
				
				// Get the data from the 'Form' input fields
				// and assign them into variables
				$reference_number		= reference_number_generator(10);
				$origin 				= get_campus_by_id($_POST['origin']);
				$destination 			= get_campus_by_id($_POST['destination']);	
				$start_date	 			= $_POST['start_date'];
				$start_time	 			= $_POST['start_time'];	
				$end_date				= $_POST['end_date'];
				$end_time	 			= $_POST['end_time'];	
				$vehicle_id				= 1;
				$user_id 				= 1;
				$title 					= 'My Booking ' . $reference_number; 
				$description	 		= $_POST['description'];
				$reservation_type_id	= 1;
				$reservation_status_id	= 1;

				
				// Create a 'DB' Query to insert data into 'DB'
				$insert_reservation = "INSERT INTO reservation (reference_number, 
															origin,
															destination,
															start_date, 
															start_time, 
															end_date, 
															end_time, 
															vehicle_id, 
															user_id, 
															title, 
															description, 
															reservation_type_id, 
															reservation_status_id) 
													VALUES ('$reference_number', 
															'$origin',
															'$destination',
															'$start_date', 
															'$start_time', 
															'$end_date', 
															'$end_time', 
															'$vehicle_id', 
															'$user_id', 
															'$title', 
															'$description', 
															'$reservation_type_id', 
															'$reservation_status_id')";
				// Connect to the 'DB' and run the Query
				$run_insert_reservation = mysqli_query($conn, $insert_reservation);
				
				// If the record was successfully inserted into 'DB'
				if($run_insert_reservation){
					// Close 'DB' connection
					mysqli_close($conn);

					// Show success message to the user
					echo "<script>\n";
					echo "alert('Your reservation has been placed!');\n";
						
					// Reload the page
					echo "window.location='book-a-car.php';\n";
					echo "</script>";	
				} 
				else {	
					// Show error message to the 'user'
					echo "Error Placing Reservation: " . mysqli_connect_errno();

					// Exit
					exit();
				}				
			}
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