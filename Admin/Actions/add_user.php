<?php
require "../../config.php";

    if($_POST["addUser"]!=null){
            $reciev=$_POST["addUser"];

            // The user addition form data
            $name=$_POST['name'];
            $email=$_POST['email'];
            $pswd=$_POST['password'];
            $user_type=$_POST['user_type'];
            $hastpass=password_hash($pswd,PASSWORD_DEFAULT);

            $sql="INSERT INTO user_form (name,email,password,user_type) values ('$name','$email','$hastpass','$user_type')";   
            $result=mysqli_query($conn,$sql);

            if($result){
                $response = [
                'status'=>"ok",
                'success'=>true,
                'message'=>'The user has been added successfully',
                "user name"=>$name,
                "user email"=>$email,
                "user password"=>$pswd,
                "user type"=>$user_type,
                ];
            }
            else{
                $response = [
                'status'=>"not ok",
                'success'=>true,
                'message'=>'The user could not added successfully. Please try again',
                ];
            }

            // uncomment the above code and execute the query it will work
            // This is just for checking fo your understanding remove this
            // $response = [
            //     'status'=>"ok",
            //     'success'=>true,
            //     'message'=>'We have got the from data successfully',
            //     'You sended'=>$reciev,
            //     "user name"=>$name,
            //     "user email"=>$email,
            //     "user password"=>$pswd,
            //     "user type"=>$user_type,
            // ];
            // -----------------------------
            print_r(json_encode($response));
        }
        else{
            $response = [
                'status'=>'ok',
                'success'=>false,
                'message'=>'Something went wrong'
            ];
            print_r(json_encode($response));
        }
?>