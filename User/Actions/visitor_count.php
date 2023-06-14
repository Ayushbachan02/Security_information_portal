<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "security_portal";

//connection to database
$connect = mysqli_connect($hostname, $username, $password, $databaseName);
if (mysqli_connect_errno()) {
    die("error connecting to the database");
}

//adding new visitor
$visitor_ip = $_SERVER['REMOTE_ADDR'];

//checking if the visitor is unique
$query = "SELECT * FROM visitor_counter WHERE ip_address='$visitor_ip'";
$result = mysqli_query($connect, $query);

//checking query error
if (!$result) {
    die("Retriving Query Error<br>" . $query);
}
$total_visitors = mysqli_num_rows($result);
if ($total_visitors < 1) {
    $query = "INSERT INTO visitor_counter(ip_address) VALUES('$visitor_ip')";
    $result = mysqli_query($connect, $query);
}

//retriving exiting visitors
$query = "SELECT * FROM visitor_counter ";
$result = mysqli_query($connect, $query);
if (!$result) {
    die("Retriving Query Error<br>" . $query);
}
$total_visitors = mysqli_num_rows($result);


?>