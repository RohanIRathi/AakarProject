  
<?php
session_start();
include('../php-utils/login.utils.php');
isValidUser();
userLogout();

?>

<body>
    <nav class="sb-topnav navbar navbar-expand navbar-light sticky-top" style="padding-left: 0; padding-top: 0; padding-bottom: 0; z-index: 1040;">
        <a class="navbar-brand" href="" style="padding: 0;"><img class="logo" src="css/logo.jpg" alt="Aakar Foundry" width="auto" height="56px"></a> <a class="logout-button pl-3" id="sidebarToggle"><i class="fas fa-bars text-white"></i></a>
        <ul class="navbar-nav ml-auto ">
        <li class="nav-item">
                <form method='POST'>
                    <a href="resetpass_2.php"class="btn btn-outline-warning mr-2" type='submit' name='reset-btn'>Reset Password</a>
                </form>
            </li>
            <li class="nav-item">
            <form method='POST'>
                    <button class="btn btn-outline-danger ml-2" type='submit' name='logout-btn'><i class="fas fa-power-off fa-1x text-white"></i></button>
                </form>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="profile_info pb-2">
                            <i class="fas fa-user-circle fa-3x pb-1"style="color:white"></i>
                            <h4 class="profile-info-text pt-2">
                                <?php
                                    echo $_SESSION['firstname'];
                                ?></h4>
                            <h4 class="profile-info-text pb-3" style="font-size: small;">Employee</h4>
                        </div>
                        <a class="pt-3 nav-link" href="booking_2.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-desktop"></i></div>
                            Dashboard <br>
                        </a>
                        <a class="pt-3 nav-link" href="employee_leave_2.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Leave Pass
                        </a>
                        <a class="nav-link" href="new_visitor_2.php">
                              <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                              ADD appointment
                          </a>
                        <a class="nav-link" href="notification_2.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Notification
                        </a>
                </div>
            </nav>
            
        </div>
        <div id="layoutSidenav_content">
                
