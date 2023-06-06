<!-- <?php

@include '../config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:../../login.php');
}

?> -->

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

  <!-------------------------navigation bar-------------------------------->
  <nav class="navbar bg-body-tertiary ">
    <div class="container-fluid">
      <a class="navbar-brand " href="#">
        <img src="logo/infinite.png" alt="Bootstrap" width="30" height="30">
        <span>Admin Portal</span>
      </a>
      <button class="btn btn-outline-danger" type="submit">Logout</button>
    </div>
  </nav>
  <!------------------------sidebar start here----------------------------->


  <div class="container-fluid">
    <div class="row flex-nowrap">
      <div class="bg-dark col-auto col-md-4 col-lg-2 min-vh-100">
        <div class="bg-dark p-2">
          <a class="d-flex text-decoration-none mt-1 align-items-center text-white">
            <span class="fs-4   d-none d-sm-inline">Dashboard</span>

          </a>
          <ul class="nav nav-tabs flex-column mt-4  ">
            <li class="nav-item">
              <a href="#" class="nav-link text-white rounded-2">
                <img src="../Images/icons/User.png" width="20px"  alt="user_image">
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

    </div>

  </div>
  <!------------------------sidebar ends here------------------------------>



















  <script src="../../bootstrap/js/bootstrap.js"></script>
</body>

</html>