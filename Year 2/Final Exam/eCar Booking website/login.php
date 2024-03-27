<!DOCTYPE html>
<?php
	// A 'DB' connection is required once
	require_once("includes/db.php");

	// If a 'SESSION' is not started... start a new one.
	if (!isset($_SESSION)) {
		session_start();
	}

	// If a 'SESSION' called 'username' exists and is not empty (it means that the user is already logged in)
	// redirect the user to the 'home' page to prevent the user to login again
    if(isset($_SESSION["username"])!=""){
		header("Location: home.php");
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
    <link rel="manifest" href="__manifest.json">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">	
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
				<img src="media/EdinburghCollegeLogo.png" alt="image" class="form-image">
			</div>
			<div class="section mt-1">
                <h1>Login</h1>
                <h4>Fill the form to log in</h4>
			</div>
			<?php
			// If the user did not submited the 'Form' (pressed the 'Login' button)
			// show/allow the form's content
			if(!isset($_POST["submit"])){
			?>			
			<div class="section mt-2 mb-5">
				<form class="needs-validation" action="login.php" method="post" novalidate>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="email" class="form-control" name="email" id="email1" placeholder="Email address" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                            <div class="valid-feedback">Email checked.</div>
                            <div class="invalid-feedback">Please enter your email.</div>							
                        </div>
                    </div>
					
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="password" class="form-control" name="password" id="password1" placeholder="Password" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                            <div class="valid-feedback">Password checked.</div>
                            <div class="invalid-feedback">Please enter your password.</div>								
                        </div>
                    </div>					
					
                    <div class="form-links mt-2">
                        <div>
                            <a href="register.php">Register Now</a>
                        </div>
                        <div><a href="forgot-password.php" class="text-muted">Forgot Password?</a></div>
                    </div>
					
                    <div class="form-button-group">
                        <button type="submit" class="btn btn-primary btn-block btn-lg" name="submit">Login</button>
                    </div>
				</form>
			</div>
			<?php
			} else {
				// Get the data from the 'Form' input fields 
				// and assign them into variables
				$email	= $_POST["email"];
				$pass   = $_POST["password"];

				// Create a 'DB' Query
				$check_user_email = "SELECT * FROM user WHERE email = '$email' LIMIT 1";

				// Connect to 'DB' and run the Query			
				$run_check_user_email_query = mysqli_query($conn, $check_user_email);

				// Put the result of the Query into an array of data
				$row = mysqli_fetch_array($run_check_user_email_query);	

				// Check if we have a data into the array (not empty)
				if(is_array($row)) {			
					// If we have data into the array (it means that the user exists)
					// assign the content from the 'DB' fields into variables
					$id = $row["user_id"];				
					$first_name = $row["first_name"];
                    $email = $row["email"];
					$password = $row["password"];


					// Compare if the password saved into the 'DB' 
					// match the password entered by the user
					if($password == $pass){				
						// If passwords match...
						// assign the user 'id' and user 'name' from the 'DB' fields into variables
						$_SESSION["user_id"] = $id;
						$_SESSION["username"] = $first_name;
                        $_SESSION["email"] = $email;
						
						// Close 'DB' connection
						mysqli_close($conn);

						// Redirect user into 'home' page
						header("Location: home.php");

						// Exit
						exit();
					} 
					else {	
						// If the password saved into the 'DB' 
						// doesn't match the password entered by the user 
						// close 'DB' connection 
						mysqli_close($conn);

						// Show error message
						echo "<script>\n";
						echo "alert('Wrong email or password!');\n";
						echo "window.location='login.php'";
						echo "</script>";					
					}
				} 
				else {	
					// If we don't have data into the array (it means that the user doesn't exist)
					// show error message
					echo "<script>\n";
					echo "alert('User does not exist!');\n";
					echo "window.location='login.php'";
					echo "</script>";

					// Close 'DB' connection
					mysqli_close($conn);			

					// Exit
					exit();
				}
			}
			?>			
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
</body>

</html>