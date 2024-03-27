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
            eCar - Add a car
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

		<!-- Page Header -->
        <div class="header-large-title">
            <h1 class="title">Create an eCar</h1>
            <h4 class="subtitle">Add eCar details</h4>
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
				<form class="needs-validation" action="Add-vehicle.php" method="post" novalidate>
					<div class="section-title">eCar details</div>
					<div class="card">
						<div class="card-body">															
										
							<div class="form-group boxed">
								<div class="input-wrapper">
									<label class="label" for="registration_number">Vehicle Registration Number</label>
									<input type="text" class="form-control" name="registration_number" id="registration_number" placeholder="Vehicle Registration Number">
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>								
								</div>
							</div>
					
							<div class="form-group boxed">
								<div class="input-wrapper">
									<label class="label" for="make">Vehicle Make</label>
									<input type="text" class="form-control" name="make" id="make" placeholder="Vehicle Make">
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>								
								</div>
							</div>

							<div class="form-group boxed">
								<div class="input-wrapper">
									<label class="label" for="model">Vehicle Model</label>
									<input type="text" class="form-control" name="model" id="model" placeholder="Vehicle Model">
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>								
								</div>
							</div>

							
							
							<div class="form-group boxed">
								<div class="input-wrapper">
									<label class="label" for="colour">Colour</label>
									<input type="text" class="form-control" name="colour" id="colour" placeholder="Colour">
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>								
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
				
							<div class="form-group boxed">
								<div class="input-wrapper">
									<label class="label" for="notes">Notes</label>
									<input type="text" class="form-control" name="notes" id="notes" placeholder="Notes">
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>								
								</div>
							</div>
							<br>
							<div class="input-wrapper">
								<label class="label" for="isactive">Is Active: </label>
								<input type="radio"  name="is_active" id="isactive" value="1"> YES
								<input type="radio"  name="is_active" id="isactive" value="0" checked> NO                               
							</div>
							<br>
							<div class="input-wrapper">
								<label class="label" for="requires_approval">Requires Approval: </label>
								<input type="radio"  name="requires_approval" id="requires_approval" value="1"> YES
								<input type="radio"  name="requires_approval" id="requires_approval" value="0" checked> NO                               
							</div>
							<div class="input-wrapper">
								<label class="label" for="image_name">Add image: </label>
								<div class="input-wrapper">
								<input type="file" name="image_name" id="image_name">
							</div>
							<br>
							<div class="form-group boxed">
								<div class="input-wrapper">
									<label class="label" for="campus_id">Starting Campus</label>
									<input type="text" class="form-control" name="campus_id" id="campus_id" placeholder="Campus ID Number (1-4)">
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>								
								</div>
							</div>
						</div>	
					</div>
					
                    <div class="update-button">
                        <button type="submit" class="btn btn-primary btn-block btn-lg" name="submit">Create new vehicle</button>
                    </div>
				</form>
			</div>
			<?php 	
			} 
			else {
								
				// Get the data from the 'Form' input fields
				// and assign them into variables
								
				$registration_number = $_POST['registration_number'];
				$make                = $_POST['make'];
				$model               = $_POST['model'];
				$colour              = $_POST['colour'];
				$description	 	 = $_POST['description'];
				$notes	             = $_POST['notes'];
				$isactive            = $_POST['isactive'];
				$requires_approval   = $_POST['requires_approval'];
				$image_name          = $_POST['image_name'];
				$campus_id           = $_POST['campus_id'];

				
				// Create a 'DB' Query to insert data into 'DB'
				$insert_vehicle = "INSERT INTO vehicle ( 
															 
															registration_number, 
															make, 
															model, 
															colour, 
															description, 
															notes,  
															isactive, 
															requires_approval, 
															image_name, 
															campus_id) 
													VALUES ( 
															'$registration_number',
															'$make', 
															'$model', 
															'$colour', 
															'$description',
															'$notes', 
															'$isactive', 
															'$requires_approval', 
															'$image_name', 
															'$campus_id')";	

				// Connect to the 'DB' and run the Query
				$run_insert_vehicle = mysqli_query($conn, $insert_vehicle);
				
				// If the record was successfully inserted into 'DB'
				if($run_insert_vehicle){
					// Close 'DB' connection
					mysqli_close($conn);

					// Show success message to the user
					echo "<script>\n";
					echo "alert('A new car has been added');\n";
						
					// Reload the page
					echo "window.location='Add-vehicle.php';\n";
					echo "</script>";	
				} 
				else {	
					// Show error message to the 'user'
					echo "Error adding vehicle: " . mysqli_connect_errno();

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