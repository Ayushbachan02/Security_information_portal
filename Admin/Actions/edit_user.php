<?php
require "../../config.php";
if(isset($_POST['editDataSend'])){
    $id_val=intval($_POST["id_val"]);
    $sql="SELECT * from user_form where id=$id_val";
    $result=mysqli_query($conn,$sql);
    if($result){
        $row=mysqli_fetch_assoc($result);
        $response = [
            'status'=>"ok",
            'success'=>true,
            "name"=>$row["name"],
            "email"=>$row["email"],
            "password"=>$row["password"],
            "user_type"=>$row["user_type"]
            ];
    }
    print_r(json_encode($response));
}
?>