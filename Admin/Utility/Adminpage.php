<?php

@include '../config.php';

if (!isset($_SESSION)) {
  session_start();
}

if ($_SESSION['admin_name'] == null) {
  header('location:../../login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin page</title>
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-----------------------------------------model----------------------------->
  <div class="modal fade" id="useraddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="alert alert-warning d-none">

          </div>
          <div class="form-group">
            <label for="">Name:</label>
            <input type="text" class="form-control" id="name">
          </div>
          <div class="form-group">
            <label for="">Email:</label>
            <input type="email" class="form-control" id="email">
          </div>
          <div class="form-group">
            <label for="">Password:</label>
            <input type="password" class="form-control" id="password">
          </div>
          <div class="form-group">
            <label for="">User Type:</label>
            <input type="text" class="form-control" id="user_type">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" onclick="adduser()">Save</button>
        </div>
      </div>
    </div>
  </div>

  <!-------------------------navigation bar-------------------------------->
  <nav class="navbar bg-body-tertiary ">
    <div class="container-fluid">
      <a class="navbar-brand " href="#">
        <img src="logo/infinite.png" alt="Bootstrap" width="30" height="30">
        <span>Admin Portal</span>
      </a>
      <a class="btn btn-Danger" href="../../logout.php" role="button">Logout</a>
    </div>
  </nav>
  <!------------------------sidebar start here----------------------------->


  <div class="container-fluid row">
    <!-- <div class="row flex-nowrap"> -->
    <div class="bg-dark col-auto col-md-4 col-lg-2 min-vh-100">
      <div class="bg-dark p-2">
        <a class="d-flex text-decoration-none mt-1 align-items-center text-white">
          <span class="fs-4   d-none d-sm-inline">Dashboard</span>

        </a>
        <ul class="nav nav-tabs flex-column mt-4  ">
          <li class="nav-item">
            <a href="#" class="nav-link text-white rounded-2">
              <img src="../Images/icons/User.png" width="20px" alt="user_image">
              <span class="fs-6 d-none d-sm-inline ms-1">User</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-white rounded-2">
              <img src="../Images/icons/Bullet List.png" width="20px" alt="list icons">
              <span class="fs-6 d-none d-sm-inline  ms-1">List</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-white rounded-2">
              <img src="../Images/icons/Image.png" width="20px" alt="banner icon">
              <span class="fs-6 d-none d-sm-inline  ms-1">Banner</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-white rounded-2">
              <img src="../Images/icons/Medium Icons.png" width="20px" alt="">
              <span class="fs-6 d-none d-sm-inline  ms-1">Content</span>
            </a>
          </li>


        </ul>
      </div>

    </div>


    <div class="container-fluid col">
      <div class="row mt-3  ">
        <div class="col-md-12">
          <div class="card-header">
            <h4 class="card-title">User List
              <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#useraddModal">
                Add User
              </button>
            </h4>
          </div>
          <div class="card-body" id="usertable">

          </div>
        </div>
      </div>

    </div>

  </div>

  </div>


  <!------------------------sidebar ends here------------------------------>


  <script src="../../bootstrap/js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

  <script>
    function displayData() {
      var display = "true";
      $.ajax({
        url: 'code.php',
        method: 'POST',
        data: {
          display: display
        },
        success: function(data, status) {
          console.log(status);
          $('#usertable').html(data);
        }
      });
    }

    function adduser() {
      var name = $('#name').val();
      var email = $('#email').val();
      var password = $('#password').val();
      var user_type = $('#user_type').val();

      $.ajax({
        url: 'code.php',
        method: 'POST',
        data: {
          name: name,
          email: email,
          password: password,
          user_type: user_type
        },
        success: function(data, status) {
          console.log(status);
          displayData()
        }
      });
    }
  </script>
</body>

</html>