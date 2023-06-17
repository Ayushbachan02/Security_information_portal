<?php

@include '../../config.php';
//receiving data through POST and assigning to variables 
if ($_POST["checkphoto"]=="add") {
    $reciev=$_POST["checkphoto"];
    $no_of_files = count($_FILES['files']['name']);
    $event_name = $_POST['title'];
    $event_date = date('Y-m-d', strtotime($_POST['eventdate']));

    //$directory=$_FILES['files']['full_path'];
    // echo $event_name." contains ".$no_of_files." files.".$directory."<br>";
    foreach ($_FILES['files']['name'] as $item) {
        echo $item . "\n";
    }
    //Create a folder named as the event name and upload the contents of the uploaded folder into it 
    if ($_POST['title'] != "") {
        $title = $_POST['title'];
        $path = $title . "/";
        if (!is_dir("images/" . $title)) {
            mkdir("images/" . $title,0777,true);
        }
        foreach ($_FILES['files']['name'] as $i => $name) {
            if (strlen($_FILES['files']['name'][$i]) > 1) {
                move_uploaded_file($_FILES['files']['tmp_name'][$i], "images/" . $title . "/" . $name);
            }
        }
        echo '<script>alert("Folder uploaded successfully")</script>';
    } else
        echo "<br>Event name is empty<br>";


    //sql query to create a table named Service with three columns
    $query = 'INSERT INTO photodb (path,event_name,event_date,no_of_files) values("' . $path . '","' . $event_name . '","' . $event_date . '","' . $no_of_files . '")';
    if (!mysqli_query($conn, $query)) {
        echo "Error:" . mysqli_error($conn);
    }
}
//receiving data through POST and assigning to variables 
else if ($_POST["checkphoto"]=="edit") {
    $reciev=$_POST["checkphoto"];
    $event_name = $_POST['title'];
    $event_date = date('Y-m-d', strtotime($_POST['eventdate']));
    $idWhereEdit=intval($_POST['editThisId']);



    //sql query to create a table named Service with three columns
    $sql = "UPDATE `photodb`  SET  event_name = '$event_name', event_date =  ' $event_date ' WHERE id='$idWhereEdit' ";

    if (!mysqli_query($conn, $query)) {
        echo "Error:" . mysqli_error($conn);
    }
}
?>