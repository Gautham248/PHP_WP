<?php
$conn= mysqli_connect("localhost","root","","gautham");
if($conn)
{
    $sql="create table if not exists new_table(id int not null primary key,name varchar(50),age int)";
    $res=mysqli_query($conn,$sql);
    if($res)
    {
        echo "Table created Successfully";

    }
    else
    {
        echo "Table not created";
        exit();
    }

}
mysqli_close($conn);

?>
