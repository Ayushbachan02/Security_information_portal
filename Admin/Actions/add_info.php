<?php
require "../../config.php";

if ($_POST["addinfo"] != null) {
    $reciev = $_POST["addinfo"];

    // The user addition form data
    $heading = $_POST['heading'];
    $content = $_POST['content'];

    $sql = "INSERT INTO infodb (heading,content) values ('$heading','$content')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $response = [
            'status' => "ok",
            'success' => true,
            'message' => 'The user has been added successfully',
            "heading" => $heading,
            "content" => $content,
        ];
    } else {
        $response = [
            'status' => "not ok",
            'success' => true,
            'message' => 'The user could not added successfully. Please try again',
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
} else {
    $response = [
        'status' => 'ok',
        'success' => false,
        'message' => 'Something went wrong'
    ];
    print_r(json_encode($response));
}
?>
<?php
require "../../config.php";

if ($_POST["editinfo"] != null) {
    $reciev = $_POST["editinfo"];

    // The user addition form data
    $heading = $_POST['title'];
    $content = $_POST['info'];

    $sql = "UPDATE `infodb`  SET  `heading` = '" . $heading . "'  , `content` =  '" . $content . "' ";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $response = [
            'status' => "ok",
            'success' => true,
            'message' => 'The user has been added successfully',
            "heading" => $heading,
            "content" => $content,
        ];
    } else {
        $response = [
            'status' => "not ok",
            'success' => true,
            'message' => 'The user could not added successfully. Please try again',
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
} else {
    $response = [
        'status' => 'ok',
        'success' => false,
        'message' => 'Something went wrong'
    ];
    print_r(json_encode($response));
}
?>