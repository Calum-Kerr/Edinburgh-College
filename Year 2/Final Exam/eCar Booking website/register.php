<!doctype html>
<?php
	require_once("includes/db.php");

	if (!isset($_SESSION)) {
		session_start();
	}

	if (isset($_SESSION["username"]) !="") {
		header("location: home.php");
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
    <title>Register</title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="manifest" href="__manifest.json">
</head>

<body class="bg-white">

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="login-form">
            <div class="section">
                <img src="media/EdinburghCollegeLogo.png" alt="Edinburgh College Logo" width="109.75" height="51.75"><br><br>
                <h4>eCar Booking</h4>
                <h1>Register</h1>
                
            </div>
            <div class="section mt-2 mb-5">
            	<?php
            		if (!isset($_POST["submit"])) {
				?>
                <form action="register.php" method="post">

                     <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="text" class="form-control" name="firstName" placeholder="First name">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                     <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="text" class="form-control" name="lastName" placeholder="Last name">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="email" class="form-control" name="email" id="email1" placeholder="Email address">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="password" class="form-control" name="password" id="password1" placeholder="Password">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                     <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="password" class="form-control" name="repeatPassword" id="password2" placeholder="Repeat password">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="mt-1 text-left">
                        <div class="custom-control custom-checkbox mb-1">
                            <input type="checkbox" class="custom-control-input" id="customCheckb1" required>
                            <label class="custom-control-label" for="customCheckb1" style="font-size: 13px;">I agree with the <a
                                    href="javascript:;">Terms & Conditions</a></label>
                        </div>
                    </div>

                        Already have an account? <a href="login.php">Login</a>
                    </div>

                    <div class="form-button-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-block btn-lg">Register</button>
                    </div>
                </form>
                
                <?php
                	}
                	else {
                		$firstName=$_POST["firstName"];
                		$lastName=$_POST["lastName"];
                		$email=$_POST["email"];
                		$pass=$_POST["password"];
                		$repeatPassword=$_POST["repeatPassword"];
                        $role_id = 3;
                        $user_status_id = 3;

                		// Check if the 'password' and 'repeatPassword' fields match
                		if ($pass == $repeatPassword) {
                			// If the 'password' and 'repeatPassword' fields match
                			// assign the 'password' into a variable
                			$password = $pass;
                		}
                		else {
                			//If the 'password' and 'repeatPassword' fields don't match
                			//show error message
                			echo "<script>\n";
                			echo "alert('Passwords do not match');\n";
                			echo "window.location='register.php';\n";
                			echo "</script>";

                			//Exit
                			exit();
                		}
                		// Check if the user 'email' already exists (to prevent duplicate records)
                		$exists = 0;

                		// Create a database query to check user email address
                		$checkUserEmail = "SELECT email FROM user WHERE email = '$email' LIMIT 1";

                		// Connect to database and run the query
                		$run_checkUserEmail = mysqli_query($conn, $checkUserEmail);

                		// Check the number of rows (entries) on the database for the user email
                		$numRowEmail = mysqli_num_rows($run_checkUserEmail);
                		$result = $numRowEmail;

                		if ($result == 1) {
                			$exists = 1;
                		}

                		// If an empty record is found, show error message
                		if($exists == 1) {
                			echo "<script>\n";
                			echo "alert('Email already exists.');\n";
                			echo "window.location='register.php';\n";
                			echo "</script>";
                		}
                		else {
                			//Create a database query to insert data into database
                			$insertUser = "INSERT INTO user (first_name, 
                                                             last_name, 
                                                             email, 
                                                             password, 
                                                             role_id, 
                                                             user_status_id, 
                                                             salt) 
                                                             VALUES 
                                                             ('$firstName', 
                                                             '$lastName', '$email', 
                                                             '$password', '$role_id', 
                                                             '$user_status_id', 
                                                             '$salt')";

                			// Connect to database and run query
                			$insertUserQuery = mysqli_query($conn, $insertUser);

                			// If the record was successfully inserted into database
                			if ($insertUserQuery) {
                				
                			// Close database connection
                			mysqli_close($conn);

                			// Show success message to user
                			echo "<script>\n";
                			echo "alert('Successfully registered.');\n";
                			
                			//Redirect the user to login page
                			echo "window.location='login.php';\n";
                			echo "</script>";
                			}
                			else {
                				//Show error message to the user
                				echo "Error inserting user: " . mysqli_connect_errno();

                				exit();
                			}
                		}
                	}
				?>
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


</body>

</html>