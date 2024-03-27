<!DOCTYPE html>
<?php
	// A 'DB' connection is required once
	require_once("includes/db.php");

	// If a 'SESSION' is not started... start a new one.
	if (!isset($_SESSION)) {
		session_start();
	}

	// If a 'SESSION' called 'username' exists and is empty (it means that the user isn't logged in)
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
    <link rel="manifest" href="__manifest.json">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">	
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
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="header-large-title">
            <h1 class="title">My Bookings</h1>
            <h4 class="subtitle">Upcoming bookings</h4>
        </div>
		<?php			
			// Get all active bookings
			// Create a 'DB' Query
			$get_all_bookings = "SELECT * FROM reservation WHERE reservation_status_id = 1";

			// Connect to 'DB' and run the Query			
			$run_get_all_bookings = mysqli_query($conn, $get_all_bookings);
				
			// Bookings array
			$all_bookings_arr = array();
				
			while ($row_bookings = mysqli_fetch_array($run_get_all_bookings)) {
				$reservation_id			= $row_bookings['reservation_id'];
				$reference_number		= $row_bookings['reference_number'];
				$origin 				= $row_bookings['origin'];
				$destination 			= $row_bookings['destination'];	
				$start_date	 			= $row_bookings['start_date'];
				$start_time	 			= $row_bookings['start_time'];	
				$end_date				= $row_bookings['end_date'];
				$end_time	 			= $row_bookings['end_time'];	
				$vehicle_id				= $row_bookings['vehicle_id'];
				$user_id 				= $row_bookings['user_id'];
				$title 					= $row_bookings['title'];
				$description	 		= $row_bookings['description'];
				$reservation_type_id	= $row_bookings['reservation_type_id'];
				$reservation_status_id	= $row_bookings['reservation_status_id'];
					
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

				$all_bookings_arr[] = array("reservation_id" 		=> $reservation_id,
											"reference_number" 		=> $reference_number, 
											"origin" 				=> $origin, 
											"destination" 			=> $destination, 
											"start_date" 			=> $start_date, 
											"start_time" 			=> $start_time, 
											"end_date" 				=> $end_date, 
											"end_time" 				=> $end_time, 
											"vehicle_id" 			=> $vehicle_id, 
											"user_id" 				=> $user_id, 
											"title" 				=> $title, 
											"description" 			=> $description, 
											"reservation_type_id" 	=> $reservation_type_id, 
											"reservation_status_id" => $reservation_status_id, 
											"registration_number" 	=> $registration_number, 
											"make" 					=> $make, 
											"model" 				=> $model, 
											"image_name" 			=> $image_name
											);					
			}

			//var_dump($all_bookings_arr);
			$total_num_records = count($all_bookings_arr);
			$total_num_sections = $total_num_records / 2;
			$num_row_per_section = 1;
			$num_records_per_row = 2;
			
			$l = 0;
			// loop to go through the sections
			for($i = 0; $i < $total_num_sections; $i++) {
				echo 	'<div class="section mt-2">';	
										
				// loop to go through the records per section
				for($j = 0; $j < $num_row_per_section; $j++) {
					echo	'<div class="row">';						
					// loop to go through the records info
					for($k= 0; $k < $num_records_per_row; $k++) {
						echo	'<div class="col-6">
									<div class="card product-card">
										<div class="card-body">
											<img src="media/'.$all_bookings_arr[$l]['image_name'].'" class="image" alt="vehicle image">
											<h2 class="title">'.$all_bookings_arr[$l]['make'].' '.$all_bookings_arr[$l]['model'].'</h2>
											<p class="text">'.$all_bookings_arr[$l]['registration_number'].'</p>
											<div class="date">'.$all_bookings_arr[$l]['start_date'].'</div>
											<div class="time">'.$all_bookings_arr[$l]['start_time'].'</div>
											<a href="edit-booking.php?booking_id='.$all_bookings_arr[$l]['reservation_id'].'" class="btn btn-sm btn-primary btn-block">EDIT</a>
										</div>
									</div>
								</div>
						';
						$l++;
					}	
					echo	'</div>';						
				}
										
				echo	'</div>	';					
			}
		?>
		
		<!--
        <div class="section mt-2">
            <div class="row">
                <div class="col-6">
                    <div class="card product-card">
                        <div class="card-body">
                            <img src="media/bmw-i3.png" class="image" alt="vehicle image">
                            <h2 class="title">BMW i3</h2>
                            <p class="text">YH21 JCT</p>
                            <div class="date">07/05/2021</div>
							<div class="time">08:30 - 16:30</div>
                            <a href="#" class="btn btn-sm btn-primary btn-block">EDIT</a>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card product-card">
                        <div class="card-body">
                            <img src="media/nissan-leaf.png" class="image" alt="vehicle image">
                            <h2 class="title">NISSAN LEAF</h2>
                            <p class="text">YH21 JCT</p>
                            <div class="date">11/05/2021</div>
							<div class="time">08:30 - 16:30</div>
                            <a href="#" class="btn btn-sm btn-primary btn-block">EDIT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section mt-2">
            <div class="row">
                <div class="col-6">
                    <div class="card product-card">
                        <div class="card-body">
                            <img src="media/bmw-i3.png" class="image" alt="vehicle image">
                            <h2 class="title">BMW i3</h2>
                            <p class="text">YH21 JCT</p>
                            <div class="date">13/05/2021</div>
							<div class="time">08:30 - 16:30</div>
                            <a href="#" class="btn btn-sm btn-primary btn-block">EDIT</a>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card product-card">
                        <div class="card-body">
                            <img src="media/nissan-leaf.png" class="image" alt="vehicle image">
                            <h2 class="title">NISSAN LEAF</h2>
                            <p class="text">YH21 JCT</p>
                            <div class="date">18/05/2021</div>
							<div class="time">08:30 - 16:30</div>
                            <a href="#" class="btn btn-sm btn-primary btn-block">EDIT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->
        <br>

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
        setTimeout(() => {
            notification('notification-welcome', 5000);
        }, 2000);
    </script>

</body>

</html>