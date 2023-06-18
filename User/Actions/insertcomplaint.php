<?php
@include '../../config.php';

if ($_POST["complaint"]=="add") {
    $reciev=$_POST["complaint"];
         
        // Taking all 5 values from the form data(input)
        $name =  $_POST['name'];
        $email = $_POST['email'];
        $phone =  $_POST['phone'];
        $desc = $_POST['desc'];
         
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO `complaintdb`  VALUES ('$name','$email','$phone','$desc')";

         if(mysqli_query($conn , $sql)){
            $response = [
                'status'=>'ok',
                'success'=>true,
                'message'=>'Record deleted succesfully!'
            ];
            print_r(json_encode($response));
        }
        else{
            $response = [
                'status'=>'ok',
                'success'=>false,
                'message'=>'Record deleted failed!'
            ];
            print_r(json_encode($response));
        } 
    }
        ?>
