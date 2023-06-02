<?php
@include 'config.php';
session_start();
if (isset($_POST['submit'])) {
    // $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    // $cpass = md5($_POST['cpassword']);
    // $user_type = $_POST["user_type"];

    $select = "SELECT * from user_form where email = '$email' && password = '$pass'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        if($row['user_type']=='admin'){
            $_SESSION['admin_name']==$row['name'];
            header('location:Admin/Utility/Adminpage.php');   
        }
        elseif($row['user_type']=='user'){
            $_SESSION['user_name']==$row['name'];
            header('location:User/Utility/userpage.php');   
        }
        else{
            $error[] = 'Incorrect email or password';
        }
    }
};
?>



<!-- -------------------------html ----------------------------------->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="User/Utility/style.css">
</head>

<body>
    <!--------------------------main container------------------------------------------->
    <div class="container d-flex justify-content-center align-items-center min-vh-100 ">

        <!-------------------------login container-------------------------------------------->
        <div class="row border rounded-5 p-3 bg-white shadow box-area">



            <!-------------------------left box--------------------------------------------------->
            <div class="col-md-6 rounded-5 d-flex justify-content-center align-items-center flex-column left-box" style=" background: #eff9da; ">
                <div class="featured-image mb-3">
                    <img src="User/Utility/logo/infinite.png" alt="image" class="img-fluid" style="width: 100px; height: 100px;">
                </div>
                <p class="text-black fs-4" style="font-family:poppins;">Security Information Portal</p>


            </div>

            <!-------------------------right box-------------------------------------------------->
            <div class="col-md-6 right-box">
                <div class="row align-item-center">
                    <div class="header-text mb-4">
                        <h2>Welcome, Back!</h2>
                        <p>Login to your account</p>
                    </div>
                    <div>
                        <?php
                        if (isset($error)) {
                            foreach ($error as $error) {
                                echo "<p>$error</p>";
                            }
                        };
                        ?>
                    </div>

                    <form action="" method="post">
                        <div class="form-group mb-3">
                            <input type="text" name="email" class="form-control form-control-lg gb-light fs-6" placeholder="Email Address">
                        </div>
                        <div class="form-group mb-1">
                            <input type="password" name="password" class="form-control form-control-lg gb-light fs-6" placeholder="Password">
                        </div>
                        <div class="form-group mb-5 d-flex justify-content-between">
                            <div class="form-group">
                                <input type="checkbox" class="form-group-input" id="formCheck">
                                <label for="formCheck" class="form-group-label"><small> Remember Me</small></label>
                            </div>
                            <div class="forgot">
                                <small><a href="#">Forgot password?</a></small>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" name="submit" class="btn brn-lg btn-primary w-100 fs-6">Login</button>
                        </div>
                    </form>
                    <div class="row">
                        <small>Don't have a account <a href="User/registeruser.php">Signup</a></small>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="bootstrap/js/bootstrap.js"></script>
</body>

</html>