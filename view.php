<?php
include 'dbBridge.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
 
</head>
<body>
<table border="1">
<tr>
  <th>ID</th>
  <th>FIRSTNAME</th>
  <th>MIDDLENAME</th>
  <th>LASTNAME</th>
  <th>ADDRESS</th>
  <th>GENDER</th>
  <th colspan="2">ACTIONS</th>

</tr>
  <?php
  $query="SELECT * FROM tb_userprofile ";
  $statement=$conn->prepare($query);
  $statement->execute();
  $result= $statement->fetchAll();


  if($result){
    foreach($result as $row)
    echo'<tr>
          <td>'.$row['Employee_ID'].'</td>
          <td>'.$row['Emp_Firstname'].'</td>
          <td>'.$row['Emp_Middlename'].'</td>
          <td>'.$row['Emp_Lastname'].'</td>
          <td>'.$row['Emp_Address'].'</td>
          <td>'.$row['Emp_Gender'].'</td>
          <td><a href="edit.php?id='.$row['Employee_ID'].'">Edit</a></td>
          <td><a href="edit.php?id='.$row['Employee_ID'].'">delete</a></td>';

         
  }else{
    echo'<td colspan="2"> no record found </td>';
  }
    ?>
</table>  
</body>
</html>