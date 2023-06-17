<?php

@include '../config.php';
@include './Actions/visitor_count.php';

session_start();

if ($_SESSION['user_name'] == null) {
    header('location:../../login.php');
}


?>




<!---------------------------------------html----------------------------------------------->
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "partials/header.php" ?>
</head>

<body>

    <!----------------------------navigation menu------------------------------->
    <nav class="navbar bg-body-tertiary ">
        <div class="container-fluid">
            <a class="navbar-brand " href="#">
                <img src="Utility/logo/infinite.png" alt="Bootstrap" width="30" height="30">
                <span>Information Security Portal</span>
            </a>
            <span class="visitor counter"><img src="Images/fi-rr-eye.png" width="15px" alt="user_image"> <?php echo $total_visitors; ?></span>

        </div>
    </nav>
    <!------------------------sidebar start here----------------------------->


    <div class="container-fluid row">
        <!-- <div class="col flex-nowrap"> -->
        <div class="bg-light col-auto col-md-4 col-lg-2 min-vh-100">
            <div class="bg-light p-2">
                <a class="d-flex text-decoration-none mt-1 align-items-center text-black">
                    <span class="fs-4   d-none d-sm-inline">Sections</span>
                </a>
                <ul class="nav nav-tabs flex-column mt-3">
                    <li class="nav-item ">
                        <a href="userpage.php" class="nav-link text-black rounded-2 ">
                            <img src="Images/fi-rr-home.png" width="20px" alt="user_image">
                            <span class="fs-6 d-none d-sm-inline ms-1">Home</span>
                        </a>
                    </li>
                    <li class="nav-item mt-1 ">
                        <a href="news.php" class="nav-link text-black rounded-2">
                            <img src="Images/fi-rr-physics.png" width="20px" alt="user_image">
                            <span class="fs-6 d-none d-sm-inline ms-1">News</span>
                        </a>
                    </li>
                    <li class="nav-item mt-1">
                        <a href="Information.php" class="nav-link text-black rounded-2">
                            <img src="Images/fi-rr-globe.png" " width=" 20px" alt="list icons">
                            <span class="fs-6 d-none d-sm-inline  ms-1">Information</span>
                        </a>
                    </li>
                    <li class="nav-item mt-1">
                        <a href="video.php" class="nav-link text-black rounded-2">
                            <img src="Images/fi-rr-play.png" width="20px" alt="banner icon">
                            <span class="fs-6 d-none d-sm-inline  ms-1">Video</span>
                        </a>
                    </li>
                    <li class="nav-item mt-1">
                        <a href="Image.php" class="nav-link text-black rounded-2 active">
                            <img src="Images/fi-rr-picture.png" width="20px" alt="">
                            <span class="fs-6 d-none d-sm-inline  ms-1">Images</span>
                        </a>
                    </li>
                    <li class="logout">
                        <a href="../logout.php" class="nav-link text-black rounded-2">
                            <img src="./Images/logout.png" width="20px" alt="">
                            <span class="fs-6 d-none d-sm-inline  ms-1">Logout</span>
                        </a>
                    </li>


                </ul>
            </div>


        </div>

        <div class="container-fluid col">

        </div>
    </div>
















    <script src="../bootstrap/js/bootstrap.js"></script>
</body>

</html>