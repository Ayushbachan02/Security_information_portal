<?php
require "../../config.php";

    if($_POST["addnews"]!=null){
            $reciev=$_POST["addnews"];

            // The user addition form data
            $title=$_POST['title'];
            $news=$_POST['news'];

            $sql="INSERT INTO newsdb (title,news) values ('$title','$news')";   
            $result=mysqli_query($conn,$sql);

            if($result){
                $response = [
                'status'=>"ok",
                'success'=>true,
                'message'=>'The user has been added successfully',
                "title"=>$title,
                "news"=>$news,
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