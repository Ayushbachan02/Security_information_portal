<?php

include '../../config.php';

extract($_POST);
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['user_type'])){
   
    $sql="INSERT INTO `user_form` (name,email,password,user_type)
    VALUES ('$name','$email','$password','$user_type')";

    $result=mysqli_query($conn,$sql);
}


?>