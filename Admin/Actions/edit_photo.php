<?php
require "../../config.php";
if(isset($_POST['editDataSend'])){
    $id_val=intval($_POST["id_val"]);
    $sql="select * from photodb where id=$id_val";
    $result=mysqli_query($conn,$sql);
    if($result){
        $row=mysqli_fetch_assoc($result);
        $response = [
            'status'=>"ok",
            'success'=>true,
            "title"=>$row["event_name"],
            "date"=>$row['event_date']
            ];
    }
    print_r(json_encode($response));
}
?>