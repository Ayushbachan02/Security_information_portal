<?php

@include 'config.php';

session_start();

if ($_SESSION['user_name'] == null) {
   header('location:../../login.php');
}


$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "security_portal";

//connection to database
$connect = mysqli_connect($hostname, $username, $password, $databaseName);
if (mysqli_connect_errno()) {
   die("error connecting to the database");
}

//adding new visitor
$visitor_ip = $_SERVER['REMOTE_ADDR'];

//checking if the visitor is unique
$query = "SELECT * FROM visitor_counter WHERE ip_address='$visitor_ip'";
$result = mysqli_query($connect, $query);

//checking query error
if (!$result) {
   die("Retriving Query Error<br>" . $query);
}
$total_visitors = mysqli_num_rows($result);
if ($total_visitors < 1) {
   $query = "INSERT INTO visitor_counter(ip_address) VALUES('$visitor_ip')";
   $result = mysqli_query($connect, $query);
}

//retriving exiting visitors
$query = "SELECT * FROM visitor_counter ";
$result = mysqli_query($connect, $query);
if (!$result) {
   die("Retriving Query Error<br>" . $query);
}
$total_visitors = mysqli_num_rows($result);

$page = 'bye';
?>




<!---------------------------------------html----------------------------------------------->
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
   <title>user page</title>
</head>

<body>

   <!----------------------------navigation menu------------------------------->
   <nav class="navbar bg-body-tertiary ">
      <div class="container-fluid">
         <a class="navbar-brand " href="#">
            <img src="logo/infinite.png" alt="Bootstrap" width="30" height="30">
            <span>Information Security Portal</span>
         </a>
         <span class="visitor counter"><img src="../Images/fi-rr-eye.png" width="15px" alt="user_image"> <?php echo $total_visitors; ?></span>

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
                  <a href="userpage.php" class="nav-link text-black rounded-2 active">
                     <img src="../Images/fi-rr-home.png" width="20px" alt="user_image">
                     <span class="fs-6 d-none d-sm-inline ms-1">Home</span>
                  </a>
               </li>
               <li class="nav-item mt-1 ">
                  <a href="../news.php" class="nav-link text-black rounded-2">
                     <img src="../Images/fi-rr-physics.png" width="20px" alt="user_image">
                     <span class="fs-6 d-none d-sm-inline ms-1">News</span>
                  </a>
               </li>
               <li class="nav-item mt-1">
                  <a href="../Information.php" class="nav-link text-black rounded-2">
                     <img src="../Images/fi-rr-globe.png" " width=" 20px" alt="list icons">
                     <span class="fs-6 d-none d-sm-inline  ms-1">Information</span>
                  </a>
               </li>
               <li class="nav-item mt-1">
                  <a href="../video.php" class="nav-link text-black rounded-2">
                     <img src="../Images/fi-rr-play.png" width="20px" alt="banner icon">
                     <span class="fs-6 d-none d-sm-inline  ms-1">Video</span>
                  </a>
               </li>
               <li class="nav-item mt-1">
                  <a href="../Image.php" class="nav-link text-black rounded-2">
                     <img src="../Images/fi-rr-picture.png" width="20px" alt="">
                     <span class="fs-6 d-none d-sm-inline  ms-1">Images</span>
                  </a>
               </li>
               <li class="logout">
                  <a href="../../logout.php" class="nav-link text-black rounded-2">
                     <img src="../Images/logout.png" width="20px" alt="">
                     <span class="fs-6 d-none d-sm-inline  ms-1">Logout</span>
                  </a>
               </li>


            </ul>
         </div>


      </div>

      <div class="container-fluid col">
         <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img src="../Images/carousel/Image-3.png" class="d-block w-100" alt="...">
               </div>
               <div class="carousel-item">
                  <img src="../Images/carousel/Image-2.jpg" class="d-block w-100" alt="...">
               </div>
               <div class="carousel-item">
                  <img src="../Images/carousel/Image-1.jpg" class="d-block w-100" alt="...">
               </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Next</span>
            </button>
         </div>
      </div>
   </div>
















   <script src="../../bootstrap/js/bootstrap.js"></script>
</body>

</html>