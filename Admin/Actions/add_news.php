<?php
require "../../config.php";

    if($_POST["checkNews"]=="add"){
            $reciev=$_POST["checkNews"];

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
        }
        else if($_POST["checkNews"]=="edit"){
            $reciev=$_POST["checkNews"];

            // The user addition form data
            $title=$_POST['title'];
            $news=$_POST['news'];
            $idWhereEdit=intval($_POST['editThisId']);

            // $sql = "UPDATE `newsdb`  SET  `title` = '" . $title . "'  , `news` =  '" . $news . "' ";
            $sql="update newsdb set title = '$title', news='$news' where id = $idWhereEdit";

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
        }

        else if($_POST['checkNews']=="delete") {
            $reciev=$_POST["checkNews"];
            $idWhereDelete=intval($_POST['deleteThisId']);
        
            $sql = "DELETE FROM  `newsdb` WHERE `id`  =  $idWhereDelete " ;
        
            if(mysqli_query($conn , $sql)){
                $response = [
                    'status'=>'ok',
                    'success'=>true,
                    'message'=>'Record deleted succesfully!'
                ];
                print_r(json_encode($response));
            }else{
                $response = [
                    'status'=>'ok',
                    'success'=>false,
                    'message'=>'Record deleted failed!'
                ];
                print_r(json_encode($response));
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