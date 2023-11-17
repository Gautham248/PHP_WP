<?php
$conn= mysqli_connect("localhost","root","","gautham");
if($conn)
{
    $sql="update  testtable set mark=90 where id='1'";
    $res=mysqli_query($conn,$sql);
    if($res)
    {
        // echo "Table created Successfully";
        echo "Table updated Successfully";

    }
    else
    {
        echo "Table not created";
        exit();
    }

}
mysqli_close($conn);

?>
