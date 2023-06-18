<?php
require "../../config.php";

    if($_POST["checkinfo"]=="add"){
            $reciev=$_POST["checkinfo"];

            // The user addition form data
            $title=$_POST['heading'];
            $info=$_POST['content'];

            $sql="INSERT INTO infodb (heading,content) values ('$title','$info')";   
            $result=mysqli_query($conn,$sql);

            if($result){
                $response = [
                'status'=>"ok",
                'success'=>true,
                'message'=>'The user has been added successfully',
                "heading"=>$title,
                "content"=>$info,
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
        else if($_POST["checkinfo"]=="edit"){
            $reciev=$_POST["checkinfo"];

            // The user addition form data
            $title=$_POST['heading'];
            $info=$_POST['content'];
            $idWhereEdit=intval($_POST['editThisId']);

            // $sql = "UPDATE `newsdb`  SET  `title` = '" . $title . "'  , `news` =  '" . $news . "' ";
            $sql="update infodb set heading = '$title', content='$info' where id = $idWhereEdit";

            $result=mysqli_query($conn,$sql);

            if($result){
                $response = [
                'status'=>"ok",
                'success'=>true,
                'message'=>'The user has been added successfully',
                "title"=>$title,
                "info"=>$info,
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

        else if($_POST['checkinfo']=="delete") {
            $reciev=$_POST["checkinfo"];
            $idWhereDelete=intval($_POST['deleteThisId']);
        
            $sql = "DELETE FROM  `infodb` WHERE `id`  =  $idWhereDelete " ;
        
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