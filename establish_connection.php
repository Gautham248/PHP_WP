<?php

// $conn=new mysqli($servername,$username,$password,$dbname);
// if($conn->connect_error)
// {
//     die("Connection Failed : ".$conn->connect_error);
// }

$conn=mysqli_connect("localhost","root","","gautham");
// if($conn->connect_error)
// {
//     die("Connection Failed : ".$conn->connect_error);
// }
if($conn)
{
    echo "<h1>Connected to gautham</h1>";
}
else{
    die("Connection failed".mysqli_connect_error());
}



?>
