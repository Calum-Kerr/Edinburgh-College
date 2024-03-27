<?php 
	include "db.php";
	
	//global $conn;
		
	if(isset($_POST['campus'])){
		$campus_selected_id = 0;   
		$campus_selected_id = mysqli_real_escape_string($conn, $_POST['campus']); // campus_selected_id
		   		   
	    $all_vehicles_arr = array();
			
		// Get all vehicles from a campus
		// DB Query
		$get_all_vehicles = "SELECT * FROM vehicle WHERE campus_id = $campus_selected_id";
												
		// Connect to DB and run the Query 
		$run_get_all_vehicles = mysqli_query($conn, $get_all_vehicles);
												
		while($row_vehicles = mysqli_fetch_array($run_get_all_vehicles)){
			$vehicle_id 		= $row_vehicles['vehicle_id'];
			$vehicle_make 		= $row_vehicles['make'];

			$all_vehicles_arr[] = array("vehicle_id" => $vehicle_id, "vehicle_make" => $vehicle_make);
		}

		// encoding array to json format
		echo json_encode($all_vehicles_arr);
	}	

	if(isset($_POST['vehicle'])){
		$vehicle_selected_id = 0;
		$vehicle_selected_id = mysqli_real_escape_string($conn, $_POST['vehicle']); // vehicle_selected_id
		   		   
	    $single_vehicle_arr = array();
			
		// Get vehicle info by id
		// DB Query
		$get_single_vehicle = "SELECT * FROM vehicle WHERE vehicle_id = $vehicle_selected_id";
											
		// Connect to DB and run the Query 
		$run_get_single_vehicle = mysqli_query($conn, $get_single_vehicle);
											
		while($row_vehicles = mysqli_fetch_array($run_get_single_vehicle)){
			$vehicle_id 					= $row_vehicles['vehicle_id'];
			$vehicle_registration_number	= $row_vehicles['registration_number'];
			$vehicle_make 					= $row_vehicles['make'];
			$vehicle_model 					= $row_vehicles['model'];
			
			$single_vehicle_arr[] = array("vehicle_id" 				=> $vehicle_id, 
								   "vehicle_registration_number"	=> $vehicle_registration_number,
								   "vehicle_make" 					=> $vehicle_make,
								   "vehicle_model" 					=> $vehicle_model
								   );
		}

		// encoding array to json format
		echo json_encode($single_vehicle_arr);
	}

	if(isset($_POST['vehicle_model'])){
		$vehicle_model_selected_id = 0;
		$vehicle_model_selected_id = mysqli_real_escape_string($conn, $_POST['vehicle_model']); // $vehicle_model_selected_id
		   		   
	    $vehicle_registration_number = array();
			
		// Get vehicle registration number
		// DB Query
		$get_vehicle_registration_number = "SELECT * FROM vehicle WHERE vehicle_id = $vehicle_model_selected_id";
											
		// Connect to DB and run the Query 
		$run_get_vehicle_registration_number = mysqli_query($conn, $get_vehicle_registration_number);
											
		while($row_vehicles = mysqli_fetch_array($run_get_vehicle_registration_number)){
			$vehicle_id 					= $row_vehicles['vehicle_id'];
			$vehicle_registration_number	= $row_vehicles['registration_number'];

			$vehicle_registration_number[] = array("vehicle_id" 			=> $vehicle_id, 
											"vehicle_registration_number" 	=> $vehicle_registration_number
											);
		}

		// encoding array to json format
		echo json_encode($vehicle_registration_number);
	}	
?>