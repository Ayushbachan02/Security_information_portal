<?php
require "../../config.php";
if(isset($_POST['editDataSend'])){
    $id_val=intval($_POST["id_val"]);
    $sql="select * from videodb where id=$id_val";
    $result=mysqli_query($conn,$sql);
    if($result){
        $row=mysqli_fetch_assoc($result);
        $response = [
            'status'=>"ok",
            'success'=>true,
            "video_name"=>$row["title"]
            ];
    }
    print_r(json_encode($response));
}
?>