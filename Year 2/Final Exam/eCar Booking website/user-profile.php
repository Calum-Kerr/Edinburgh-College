<!doctype html>
<?php 
    require_once("includes/db.php");
    
    if(!isset($_SESSION)) {
        session_start();
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
            eCar - User Profile
        </div>
    </div>
    <!-- * App Header -->


       <!-- App Capsule -->
    <div id="appCapsule">

        <!-- Page Header -->
        <div class="header-large-title">
            <h1 class="title">User Profile</h1>
            <h4 class="subtitle">User Account Settings</h4>
        </div>
        <!-- * Page Header -->

        <!-- Page Content -->
        <div class="section full mt-2 mb-2">
            <?php
            // If the user did not submited the 'Form' (pressed the 'Update' button)
            // show/allow the form's content
            if(!isset($_POST["submit"])){
            ?>
            <div class="section mt-2">
                <form class="needs-validation" action="user-profile.php" method="post" novalidate>
                    <div class="section-title">Personal Details</div>
                    <div class="card">
                        <div class="card-body">                                                         
                            <div class="form-group boxed">
                                <div class="input-wrapper">
                                    <label class="label" for="username">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            
                            <div class="form-group boxed">
                                <div class="input-wrapper">
                                    <label class="label" for="name">Name</label>
                                    <input type="text" class="form-control" name="firstName" id="name" placeholder="First name" required>
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>                          
                    
                            <div class="form-group boxed">
                                <div class="input-wrapper">
                                    <label class="label" for="surname">Surname</label>
                                    <input type="text" class="form-control" name="lastName" id="surname" placeholder="Last name" required>
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>                  

                            <div class="form-group boxed">
                                <div class="input-wrapper">
                                    <label class="label" for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo $email;?>" required>
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>

                            <div class="form-group boxed">
                                <div class="input-wrapper">
                                    <label class="label" for="contact_number">Contact Number</label>
                                    <input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="Contact Number" required>
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            
                            <div class="form-group boxed">
                                <div class="input-wrapper">
                                    <label class="label" for="staff_number">Staff Number</label>
                                    <input type="text" class="form-control" name="staff_number" id="staff_number" placeholder="Staff Number" required>
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>

                            <div class="form-group boxed">
                                <div class="input-wrapper">
                                    <label class="label" for="staff_position">Staff Position</label>
                                    <input type="text" class="form-control" name="staff_position" id="staff_position" placeholder="Staff Position" required>
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>

                            <div class="form-group boxed">
                                <div class="input-wrapper">
                                    <label class="label" for="campus">Campus</label>
                                    <input type="text" class="form-control" name="campus" id="campus" placeholder="Campus" required>
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>

                            <div class="form-group boxed">
                                <div class="input-wrapper">
                                    <label class="label" for="driving_licence_number">Driving Licence Number</label>
                                    <input type="text" class="form-control" name="driving_licence_number" id="driving_licence_number" placeholder="Driving Licence Number" required>
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>

                            <div class="form-group boxed">
                                <div class="input-wrapper">
                                    <label class="label" for="dvla_check_code">DVLA Check Code</label>
                                    <input type="text" class="form-control" name="dvla_check_code" id="dvla_check_code" placeholder="DVLA Check Code" required>
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>

                            <div class="form-group boxed">
                                <div class="input-wrapper">
                                    <label class="label" for="role">Role</label>
                                    <input type="text" class="form-control" name="role" id="role" placeholder="Role" required>
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>                          
                        </div>
                    </div>  
                <div class="update-button">
                        <button type="submit" class="btn btn-primary btn-block btn-lg" name="submit">Update</button>
                    </div>                  
                </form>
            </div>

            <?php
            } 
            else {
                // Get the data from the 'Form' input fields 
                // and assign them into variables
                $username               = $_POST["username"];
                $first_name             = $_POST["firstName"];
                $last_name              = $_POST["lastName"];
                $email                  = $_POST["email"];
                $contact_number         = $_POST["contact_number"];
                $staff_number           = $_POST["staff_number"];
                $staff_position         = $_POST["staff_position"];
                $campus_id              = 1;
                $driving_licence_number = $_POST["driving_licence_number"];
                $dvla_check_code        = $_POST["dvla_check_code"];
                $role_id                = 3;
                
                // Create a 'DB' Query to insert data into 'DB'
                $update_user = "UPDATE user
                                SET username                = '$username',
                                    first_name              = '$first_name',
                                    last_name               = '$last_name',
                                    email                   = '$email',
                                    contact_number          = '$contact_number',
                                    staff_number            = '$staff_number',
                                    staff_position          = '$staff_position',
                                    campus_id               = '$campus_id',
                                    driving_licence_number  = '$driving_licence_number',
                                    dvla_check_code         = '$dvla_check_code',
                                    role_id                 = '$role_id',
                                    last_modified           = now()
                                WHERE email = '$email'";
                                
                $insert_update_user = mysqli_query($conn, $update_user);
                
                if($insert_update_user) {
                    
                    mysqli_close($conn);
                        
                    echo"<script>\n";
                    echo"alert('Your profile has been updated!');\n";
                                              
                    echo"window.location='user-profile.php';\n";
                    echo"</script>";    
                }
                else {
                    echo "Error Updating User: " . mysqli_connect_errno();
                    exit();                     
                }               
            }
            ?>
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