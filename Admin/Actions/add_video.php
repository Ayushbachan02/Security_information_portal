<?php

@include '../../config.php';

if ($_POST['checkvideo']=="add") {
    $maxsize = 5242880; // 5MB
    if ($_FILES['videoFile']['name']!='') {
        $name = $_FILES['videoFile']['name'];
        $title= $_POST["title"];
        $target_dir = "../videos/";
        $target_file = $target_dir . $_FILES["videoFile"]["name"];
        $db_dir =  $_FILES["videoFile"]["name"];
        echo  $target_file;
        echo "\n";

        // Select file type
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("mp4", "avi", "3gp", "mov", "mpeg","mp3");

        // Check extension
        if (in_array($extension, $extensions_arr)) {

            // Check file size
            if (($_FILES['videoFile']['size'] >= $maxsize) || ($_FILES["videoFile"]["size"] == 0)) {
                $response = [
                    'status'=>"not ok",
                    'success'=>true,
                    'message'=>'File is to large please select size under 5mb'
                ];
            } else {
                // Upload
                if (move_uploaded_file($_FILES['videoFile']['tmp_name'], $target_file)) {
                    // Insert record
                    $query = "INSERT INTO videodb (name,location,title) VALUES('" . $name . "','" . $db_dir . "','" . $title . "')";

                    if(mysqli_query($conn, $query)){
                        $response = [
                            'status'=>"ok",
                            'success'=>true,
                            'message'=>'The video has been added successfully'
                        ];
                    }
                    else{
                        $response = [
                            'status'=>"not ok",
                            'success'=>true,
                            'message'=>'The video has been added but db failed'
                        ];
                    }
                }
                else{
                    $response = [
                        'status'=>"not ok",
                        'success'=>true,
                        'message'=>'Your video could not inserted for some reason'
                    ];
                }
            }
        } 
        else {
            $response = [
                'status'=>"not ok",
                'success'=>true,
                'message'=>'PLease select a valid file only mp4 allowed'
            ];
        }
    }
    else {
        $response = [
            'status'=>"not ok",
            'success'=>true,
            'message'=>'PLease select a video file. it is mandatory'
        ];
    }
    echo json_encode($response);
}

else if($_POST['checkvideo']=="add") {
    $reciev=$_POST["checkvideo"];
    $video_name = $_POST['title'];
    $idWhereEdit=intval($_POST['editThisId']);



    //sql query to create a table named Service with three columns
    $sql = "UPDATE `videodb`  SET  name = '$video_name' WHERE id='$idWhereEdit' ";

    if (!mysqli_query($conn, $sql)) {
        echo "Error:" . mysqli_error($conn);
    }
}


else if($_POST['checkvideo']=="delete") {
    $reciev=$_POST["checkvideo"];
    $idWhereDelete=intval($_POST['deleteThisId']);

    $sql = "DELETE FROM  `videodb` WHERE `id`  =  $idWhereDelete " ;

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
?>
