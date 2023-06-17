<?php
require "../../config.php";

    if($_POST["user"]=="add"){
            $reciev=$_POST["user"];

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

   
        }

        else if($_POST["user"]=="edit"){
            $reciev=$_POST["checkNews"];

            // The user addition form data
            $name=$_POST['name'];
            $email=$_POST['email'];
            $pswd=$_POST['password'];
            $user_type=$_POST['user_type'];
            $hastpass=password_hash($pswd,PASSWORD_DEFAULT);
            $idWhereEdit=intval($_POST['editThisId']);
            

            $sql="UPDATE `user_form` SET name = '$name', email = '$email' , password = '$hastpass' , user_type = '$user_type' WHERE id = $idWhereEdit ";   

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