<?php 
    require_once("includes/db.php");
    
    if(!isset($_SESSION)) {
        session_start();
    }

    if(isset($_SESSION["username"])=="") {
        header("Location: login.php");
    }
?>

    <!-- App Sidebar -->
    <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">

                    <!-- profile box -->
                    <div class="profileBox">
                        <div class="image-wrapper">
                            <img src="assets/img/sample/avatar/avatar1.jpg" alt="image" class="imaged rounded">
                        </div>
                        <div class="in">
                            <strong>
                                <?php 
                                echo $_SESSION["username"];
                                ?>
                            </strong>
                            <div class="text-muted">
                                <ion-icon name="location"></ion-icon>
                                <?php 
                                // Print user location if upadted into the database
                                // 1- Get the user 'campus_id' value
                                // Create a 'DB' Query
                                $get_user_campus_id = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
                                
                                // Connect to 'DB' and run the Query            
                                $run_get_user_campus_id = mysqli_query($conn, $get_user_campus_id);  
                                
                                // Put the result of the Query into an array of data
                                $row = mysqli_fetch_array($run_get_user_campus_id);

                                // Check if we have a 'campus_id'
                                if(is_array($row)) {
                                    // If we have data into the array 
                                    // assign the content from the 'DB' fields into variables
                                    $campus_id = $row["campus_id"];
                                }
                                
                                // Check if the 'campus_id' is not NULL
                                if($campus_id != NULL) {
                                    // 2- Get location by id
                                    // Create a 'DB' Query
                                    $get_campus_name = "SELECT * FROM college_campus WHERE campus_id = $campus_id LIMIT 1"; 

                                    // Connect to 'DB' and run the Query            
                                    $run_get_campus_name = mysqli_query($conn, $get_campus_name);
                                
                                    // Put the result of the Query into an array of data
                                    $row = mysqli_fetch_array($run_get_campus_name);

                                    // Check if we have a 'campus_id'
                                    if(is_array($row)) {
                                        // If we have data into the array 
                                        // assign the content from the 'DB' fields into variables
                                        $campus_name = $row["name"];
                                    }   
                                    
                                    echo $campus_name . " Campus";
                                }
                                else {
                                    echo "Needs Update...";
                                }   
                                ?>
                            </div>
                        </div>
                        <a href="javascript:;" class="close-sidebar-button" data-dismiss="modal">
                            <ion-icon name="close"></ion-icon>
                        </a>
                    </div>
                    
                <!-- menu box -->                 
                   <div class="listview-title mt-2 mb-1">
                        <span>Menu</span>
                    </div>
                    
                    <ul class="listview flush transparent no-line image-listview mt-2">
                        <li>
                            <a href="home.php" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="home-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Home
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="book-a-car.php" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="car-sport-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Book an eCar
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="my-bookings.php" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="reader-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    My Bookings
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="history.php" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="calendar-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Booking History
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="report.php" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="build-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Report a Problem
                                </div>
                            </a>
                        </li> 
                        <li>
                            <a href="Add-vehicle.php" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="car-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Add Vehicles
                                </div>
                            </a>
                        </li>                     
                    </ul>
                    <!-- * menu box -->
                    

   <div class="listview-title mt-2 mb-1">
                        <span>Custom</span>
                    </div>
                    <ul class="listview image-listview flush transparent no-line">
                        <li>
                            <div class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="moon-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    <div>Dark Mode</div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input dark-mode-switch"
                                            id="darkmodesidebar">
                                        <label class="custom-control-label" for="darkmodesidebar"></label>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>                   
                </div>

                <!-- sidebar buttons -->
                <div class="sidebar-buttons">
                    <a href="user-profile.php" class="button">
                        <ion-icon name="person-outline"></ion-icon>
                    </a>
                    <a href="javascript:;" class="button">
                        <ion-icon name="settings-outline"></ion-icon>
                    </a>
                    <a href="logout.php" class="button">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </a>
                </div>
                <!-- * sidebar buttons -->
            </div>
        </div>
    </div>
    <!-- * App Sidebar -->