<?php
include '../../config.php';
    $table= '<table class="table">
    <thead>
      <tr>
        <th scope="col">Sl.No</th>
        <th scope="col">title</th>
        <th scope="col">name</th>
        <th scope="col">Opeartions</th>
      </tr>
    </thead>';
    $sql="SELECT * FROM `videodb`";   
    $result=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $table .= '<tr>
          <th scope="row">'.$row['id'].'</th>
          <td>'.$row['title'].'</td>
          <td>'.$row['name'].'</td>
          <td >'.'<button id_name="'.$row['id'].'" class="btn btn-primary editBtn" data-bs-toggle="modal" data-bs-target="#videoeditModal">edit</button>'." ".'<button id_name="'.$row['id'].'" class="btn btn-danger editBtn" data-bs-toggle="modal" data-bs-target="#videodeleteModal">delete</button>'.'</td>
        </tr>';
    }
    $table .= '</table>';
    echo $table;

?>