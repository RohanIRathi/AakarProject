  
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
                        <button class="dropdown-item" type='submit' name='logout-btn'><i class="fas fa-power-off fa-2x text-white"></i></button>
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
                            <h4 class="profile-info-text pb-3" style="font-size: small;">Admin</h4>
                        </div>
                        <a class="pt-3 nav-link" href="booking_4.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-desktop"></i></div>
                            Dashboard <br>
                        </a>
                        <a class="nav-link" href="add_admin_4.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                            Admin Registration
                        </a>
                        
                        <a class="nav-link" href="add_hod_4.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                            HOD Registration
                        </a>
                        <a class="nav-link" href="add_employee_4.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                        Employee Registration
                        </a>
                        <a class="nav-link" href="add_security_4.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                            Security Registration
                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Registration
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="new_visitor_4.php">ADD appointment</a>
                                <a class="nav-link" href="#">Delete visitor</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="notification_4.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Notifications
                        </a>
                        
                        <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="php_spreadsheet_export.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                </div>
                <!-- <div class="small">
                    <div class="text-muted p-2 pb-2">Copyright &copy; Aakar Foundry 2020</div>
                </div> -->
            </nav>
            <!-- <div id="layoutSidenav_content"> -->
            <div id="layoutSidenav_content">
                
