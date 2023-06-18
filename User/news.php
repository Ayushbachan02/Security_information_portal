<?php

@include 'config.php';
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
    <?php require "partials/navbar.php" ?>
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
                            <img src="Images/home.svg" width="20px" alt="user_image">
                            <span class="fs-6 d-none d-sm-inline ms-1">Home</span>
                        </a>
                    </li>
                    <li class="nav-item mt-1 ">
                        <a href="news.php" class="nav-link text-black rounded-2 active">
                            <img src="Images/news.svg" width="20px" alt="user_image">
                            <span class="fs-6 d-none d-sm-inline ms-1">News</span>
                        </a>
                    </li>
                    <li class="nav-item mt-1">
                        <a href="Information.php" class="nav-link text-black rounded-2">
                            <img src="Images/Information.svg" " width=" 20px" alt="list icons">
                            <span class="fs-6 d-none d-sm-inline  ms-1">Information </span>
                        </a>
                    </li>
                    <li class="nav-item mt-1">
                        <a href="video.php" class="nav-link text-black rounded-2 ">
                            <img src="Images/video.svg" width="20px" alt="banner icon">
                            <span class="fs-6 d-none d-sm-inline  ms-1">Cyber Video</span>
                        </a>
                    </li>
                    <li class="nav-item mt-1">
                        <a href="Image.php" class="nav-link text-black rounded-2 ">
                            <img src="Images/gallery.svg" width="20px" alt="">
                            <span class="fs-6 d-none d-sm-inline  ms-1">Gallery</span>
                        </a>
                    </li>
                     <li class="nav-item mt-1">
                        <a href="complain.php" class="nav-link text-black rounded-2">
                            <img src="Images/report.svg" width="20px" alt="">
                            <span class="fs-6 d-none d-sm-inline  ms-1">Report Complaint</span>
                        </a>
                    </li>
                       <li class="nav-item mt-1">
                        <a href="faq.php" class="nav-link text-black rounded-2">
                            <img src="Images/faq.svg" width="21px" alt="">
                            <span class="fs-6 d-none d-sm-inline  ms-1">FAQ</span>
                        </a>
                    </li>
                       <li class="nav-item mt-1">
                        <a href="feedback.php" class="nav-link text-black rounded-2">
                            <img src="Images/feedback.svg" width="22px" alt="">
                            <span class="fs-6 d-none d-sm-inline  ms-1">Feedback</span>
                        </a>
                    </li>
                    <li class="nav-item mt-1">
                        <a href="contact.php" class="nav-link text-black rounded-2">
                            <img src="Images/contact.svg" width="20px" alt="">
                            <span class="fs-6 d-none d-sm-inline  ms-1">Contact Us</span>
                        </a>
                    </li>
                    <li class="logout">
                        <a href="../logout.php" class="nav-link text-black rounded-2">
                            <img src="Images/logout.svg" width="25px" alt="">
                            <span class="fs-6 d-none d-sm-inline  ms-1">Logout</span>
                        </a>
                    </li>


                </ul>
            </div>


        </div>

        <div class="container-fluid col">
            <div class=" row mt-2 ">
                <?php

                @include '../config.php';
                $query = "SELECT * FROM newsdb";
                $query_run = mysqli_query($conn, $query);
                $check_news = mysqli_num_rows($query_run) > 0;

                if ($check_news) {
                    while ($data = mysqli_fetch_assoc($query_run)) {
                ?>

                            <div class="col-sm-5 mb-3 mb-sm-0" style="padding-right: 0%;">
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $data['title']; ?></h5>
                                        <p class="card-text"><?php echo $data['news']; ?></p>
                                    </div>
                                </div>
                            </div>

                    <?php

                    }
                } else {
                    echo "no news found";
                }

                    ?>


                        </div>
            </div>
        </div>
















        <script src="../bootstrap/js/bootstrap.js"></script>
</body>

</html>