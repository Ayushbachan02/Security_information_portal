<?php

@include '../../config.php';
//receiving data through POST and assigning to variables 
// if (isset($_POST['addvideo'])) {
//     $no_of_files = count($_FILES['files']['name']);
//     $video_name = $_POST['title'];

//     //$directory=$_FILES['files']['full_path'];
//     // echo $event_name." contains ".$no_of_files." files.".$directory."<br>";
//     foreach ($_FILES['files']['name'] as $item) {
//         echo $item . "\n";
//     }
//     //Create a folder named as the event name and upload the contents of the uploaded folder into it 
//     if ($_POST['title'] != "") {
//         $title = $_POST['title'];
//         $path = $title . "/";
//         if (!is_dir("video/" . $title)) {
//             mkdir("video/" . $title,0777,true);
//         }
//         foreach ($_FILES['files']['name'] as $i => $name) {
//             if (strlen($_FILES['files']['name'][$i]) > 1) {
//                 move_uploaded_file($_FILES['files']['tmp_name'][$i], "video/" . $title . "/" . $name);
//             }
//         }
//         echo '<script>alert("Folder uploaded successfully")</script>';
//     } else
//         echo "<br>Event name is empty<br>";


//     //sql query to create a table named Service with three columns
//     $query = 'INSERT INTO `videodb` (path,video_name,no_of_files) values("' . $path . '","' . $video_name . '","' . $no_of_files . '")';
//     if (!mysqli_query($conn, $query)) {
//         echo "Error:" . mysqli_error($conn);
//     }
// }




if (isset($_POST['addvideo'])) {
    $maxsize = 5242880; // 5MB
    if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
        $name = $_FILES['file']['name'];
        $title= $_POST["title"];
        $target_dir = "videos/";
        $target_file = $target_dir . $_FILES["file"]["name"];

        // Select file type
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("mp4", "avi", "3gp", "mov", "mpeg");

        // Check extension
        if (in_array($extension, $extensions_arr)) {

            // Check file size
            if (($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
                $_SESSION['message'] = "File too large. File must be less than 5MB.";
            } else {
                // Upload
                if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                    // Insert record
                    $query = "INSERT INTO videodb (name,location,title) VALUES('" . $name . "','" . $target_file . "','" . $title . "')";

                    mysqli_query($conn, $query);
                    $_SESSION['message'] = "Upload successfully.";
                }
            }
        } else {
            $_SESSION['message'] = "Invalid file extension.";
        }
    } else {
        $_SESSION['message'] = "Please select a file.";
    }
    header('location:');
    exit;
}
?>




?>