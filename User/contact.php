<?php

@include '../config.php';
@include './Actions/visitor_count.php';

session_start();

if ($_SESSION['user_name'] == null) {
    header('location:../login.php');
}

?>




<!---------------------------------------html----------------------------------------------->
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "partials/header.php" ?>
    <script type="module" src="Javascript/video.js"></script>

</head>

<body>

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
                        <a href="news.php" class="nav-link text-black rounded-2">
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
                        <a href="contact.php" class="nav-link text-black rounded-2 active">
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
        <!------------------------sidebar end here----------------------------->
        <div class="container-fluid   col">
            <h5 class="mt-3">Contact Us</h5>

            <p>Thank you for visiting our Information Security Portal. If you have any questions, concerns, or feedback, we are here to assist you. Please feel free to contact us using the following methods:</p>

            <h6>Email:infosecpotal@gov.in</h6>

            <p>General inquiries: info@securityportal.com</p>
            <p>Technical support: support@securityportal.com</p>
            <p>Phone:+91 8797603854</p>

            <p>Customer support hotline: +1-XXX-XXX-XXXX</p>
            <p>Business hours: Monday to Friday, 9:00 AM to 5:00 PM (EST)</p>


            <p> Support Resources:</p>
            <p>Before contacting us, you may find it helpful to explore our website's resources, including our FAQ section, articles, and guides. We strive to provide comprehensive information to address common inquiries.</p>

            <p>Please provide us with as much detail as possible regarding your query or concern, enabling us to provide you with a prompt and accurate response. Our dedicated team of information security experts is committed to assisting you with any security-related matters.</p>

            <p>We value your privacy and assure you that any personal information you provide will be handled in accordance with our privacy policy. If you have any concerns about the privacy of your information, please let us know, and we will address them accordingly.</p>

            <p>Thank you for choosing our Information Security Portal. We look forward to hearing from you and assisting you with your information security needs.</p>
        </div>
    </div>
</body>

</html>