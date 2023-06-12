<?php
include '../../config.php';

if(isset($_POST['display'])){
    $table= '<table class="table">
    <thead>
      <tr>
        <th scope="col">sl no</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
        <th scope="col">user-type</th>
        <th scope="col">Operation</th>
      </tr>
    </thead>';
    $sql="SELECT * FROM `user_form`";   
    $result=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $table .= '<tr>
          <th scope="row">'.$row['id'].'</th>
          <td>'.$row['name'].'</td>
          <td>'.$row['email'].'</td>
          <td>'.$row['password'].'</td>
          <td>'.$row['user_type'].'</td>
        </tr>';
    }
    $table .= '</table>';
    echo $table;

}

?>