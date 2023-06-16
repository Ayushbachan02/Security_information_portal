<?php
include '../../config.php';
    $table= '<table class="table">
    <thead>
      <tr>
        <th scope="col">Sl.No</th>
        <th scope="col">Heading</th>
        <th scope="col">content</th>
        <th scope="col">Operation</th>
      </tr>
    </thead>';
    $sql="SELECT * FROM `infodb`";   
    $result=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $table .= '<tr>
          <th scope="row">'.$row['id'].'</th>
          <td>'.$row['heading'].'</td>
          <td>'.$row['content'].'</td>
          <td >'.'<button id_name="'.$row['id'].'" class="btn btn-primary editBtn" data-bs-toggle="modal" data-bs-target="#infoeditModal">edit</button>'." ".'<button id_name="'.$row['id'].'" class="btn btn-danger deletebtn" >delete</button>'.'</td>
        </tr>';
    }
    $table .= '</table>';
    echo $table;

?>