<?php
 $email=$_POST['email'];
 $password=$_POST['password'];
/*-------------------database connection------------------*/
$con = new mysqli("localhost","root","","security_portal");

/* ------------------validity check-----------------------*/
if($con->connect_error){
    die("Failed to connect : ".$con->connect_error);
}
else{
    $stmt = $con->prepare("select * from usertable where email = ? ");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();
        if($data['password'] === $password){
            echo "<h2>invalid Email or Password</h2>";
        }
    }   
    else {
        echo "<h2>Invaild Email or password</h2>";
    }
}