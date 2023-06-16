<?php

@include 'config.php';
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
                        <a href="video.php" class="nav-link text-black rounded-2 active">
                            <img src="Images/fi-rr-play.png" width="20px" alt="banner icon">
                            <span class="fs-6 d-none d-sm-inline  ms-1">Video</span>
                        </a>
                    </li>
                    <li class="nav-item mt-1">
                        <a href="Image.php" class="nav-link text-black rounded-2 ">
                            <img src="Images/fi-rr-picture.png" width="20px" alt="">
                            <span class="fs-6 d-none d-sm-inline  ms-1">Images</span>
                        </a>
                    </li>
                    <li class="logout">
                        <a href="../logout.php" class="nav-link text-black rounded-2">
                            <img src="Images/logout.png" width="20px" alt="">
                            <span class="fs-6 d-none d-sm-inline  ms-1">Logout</span>
                        </a>
                    </li>


                </ul>
            </div>


        </div>

        <div class="container-fluid col">
            <div class="row mt-3  ">
                <div class="col-md-12">
                    <div class="card-header">
                        <!-- addaed by #saksham -->
                        <!-- <h1>This is the main front page of admin</h1> -->
                        <!-- ------------------ -->
                        <h4 class="card-title">video List

                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#videoaddModal">
                                Add video
                            </button>
                        </h4>
                    </div>
                    <div class="card-body" id="videotable">
                    <form action="" id="addvideoForm" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label for="">video title:</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="">Select video: </label><br>
                            <input type="file" name="files[]" id="files" multiple directory="" webkitdirectory="" moxdirectory="" />
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    </div>
    <!-----------------------------------------model----------------------------->
    <div class="modal fade" id="videoaddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Photo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="alert alert-warning d-none">

                    </div>
                    <form action="" id="addvideoForm" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label for="">video title:</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="">Select video: </label><br>
                            <input type="file" name="files[]" id="files" multiple directory="" webkitdirectory="" moxdirectory="" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" id="addvideoSubmit"">Upload</button>
                </div>
            </div>
        </div>
  </div>
  <!-- --------------------------------------------- -->
  <!-- Modal 2 -->
  <div class=" modal fade" id="videoeditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Photo</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="alert alert-warning d-none">

                                    </div>
                                    <form action="" id="editvideoForm">

                                        <div class="form-group mb-3">
                                            <label for="">video title:</label>
                                            <input type="text" class="form-control" id="titleEdit" name="title">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" id="editvideoSubmit"">Save Changes</button>
        </div>
      </div>
    </div>
  </div>
  <!-- -------------------------- -->


</body>

</html>