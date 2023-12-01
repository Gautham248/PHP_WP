
<!DOCTYPE html>
<html>
<head>
    <title>My Website www.smith.com</title>
<link href="mystyle.css" rel="stylesheet"/>
</head>
<body>
    <?php
    include 'myheader.html';
    ?>
  
</body>
</html>
<?php
include 'config.php';
?>
<?php
include 'config.php';
 $new="select * from student";
 $result=mysqli_query($conn,$new);

 if(mysqli_num_rows($result)>0)
 {
     echo "<table id='table_student' border='border' width='300'>
                     <tr>
                         <th>id</th>
                         <th>name</th>
                         <th>branch</th>
                         <th>age</th>
                         <th>batch</th>
                     </tr>";
     while($row=mysqli_fetch_assoc($result))
     {
         echo "<tr>
             <td>".$row['stdid']."</td>
             <td>".$row['stdname']."</td>
             <td>".$row['branch']."</td>
             <td>".$row['batch']."</td>
             <td>".$row['age']."</td>
         </tr>";
     }
     echo "</table>";

 }
 else{
     echo "0 results";
 }

?>