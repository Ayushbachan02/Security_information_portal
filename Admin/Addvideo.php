<?php

@include '../config.php';


if (!isset($_SESSION)) {
  session_start();
}

if ($_SESSION['admin_name'] == null) {
  header('location:../index.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require "partials/header.php" ?>
  <script type="module" src="Javascript/video.js"></script>
</head>

<body>
  <?php require "partials/navbar.php"; ?>
  <!------------------------sidebar start here----------------------------->


  <div class="container-fluid row">
    <!-- <div class="row flex-nowrap"> -->
    <div class="bg-dark col-auto col-md-4 col-lg-2 min-vh-100">
      <div class="bg-dark p-2">
        <a class="d-flex text-decoration-none mt-1 align-items-center text-white">
          <span class="fs-4   d-none d-sm-inline">Dashboard</span>

        </a>
        <ul class="nav nav-tabs flex-column mt-4  ">
          <li class="nav-item mb-2">
            <a href="home.php" class="nav-link text-white rounded-2">
              <img src="Images/icons/fi-rr-user-1.png" width="20px" alt="user_image">
              <span class="fs-6 d-none d-sm-inline ms-1">User</span>
            </a>
          </li>
          <li class="nav-item mb-2">
            <a href="Addnews.php" class="nav-link text-white rounded-2">
              <img src="Images/icons/fi-rr-physics-1.png" width="20px" alt="list icons">
              <span class="fs-6 d-none d-sm-inline  ms-1">News</span>
            </a>
          </li>
          <li class="nav-item mb-2">
            <a href="Addinfo.php" class="nav-link text-white rounded-2">
              <img src="Images/icons/fi-rr-globe-1.png" width="20px" alt="banner icon">
              <span class="fs-6 d-none d-sm-inline  ms-1">Information</span>
            </a>
          </li>
          <li class="nav-item mb-2">
            <a href="Addphoto.php" class="nav-link text-white rounded-2 ">
              <img src="Images/icons/fi-rr-picture-1.png" width="20px" alt="">
              <span class="fs-6 d-none d-sm-inline  ms-1">Photo</span>
            </a>
          </li>
          <li class="nav-item mb-2">
            <a href="Addvideo.php" class="nav-link text-dark rounded-2 active">
              <img src="Images/icons/fi-rr-play.png" width="20px" alt="">
              <span class="fs-6 d-none d-sm-inline  ms-1">videos</span>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add video</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="alert alert-warning d-none">

          </div>
          <form action="" id="addvideoForm" enctype="multipart/form-data" method="POST">
            <div class="form-group mb-3">
              <label for="">video title:</label>
              <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
              <label for="">Select video: </label><br>
              <input type="file" name="videoFile">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeaddModal">Close</button>
          <button class="btn btn-primary" id="addvideoSubmit">Upload</button>
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
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Edit video</h1>
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
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeEditModal">Close</button>
                  <button class="btn btn-primary" id="editvideoSubmit"">Save Changes</button>
        </div>
      </div>
    </div>
  </div>
 <!-- --------------------------------------------- -->
  <!-- Modal 3 -->
  <div class=" modal fade" id="videodeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">delete video</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                  <div class="alert alert-warning d-none">

                  </div>
                  <form action="" id="deletevideoForm">

                    <div class="form-group mb-3">
                     <p>Are you sure you want to delete this video</p>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeDeleteModal">Close</button>
                  <button class="btn btn-danger" id="deletevideoSubmit"">delete</button>
        </div>
      </div>
    </div>
  </div>
  <!-- -------------------------- -->


</body>

</html>