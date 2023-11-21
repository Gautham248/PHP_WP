
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <form action="#" method="post">

        
        Enter ID to update: <select name="id_update" id="id_update">
            <!-- <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option> -->
            <?php
                $conn=mysqli_connect("localhost","root","","gautham");
                $sql="select * from testtable";
                $res=mysqli_query($conn,$sql);

                if(mysqli_num_rows($res)>0)
                {
                    while($row = mysqli_fetch_assoc($res))
                    {
                        echo "<option  value=".$row['id'] .">" .$row['id'] ."</option>";
                    }
                }
                 
            ?>
        </select>
        <br> <br>Enter new name : <input type="text" name="name" id="name"> <br><br>
        <br> <br>Enter new marks : <input type="number" name="marks" id="marks"> <br><br>
            <input type="submit" value="UPDATE" name="submit" id="submit">
    </form>
    <br><br><br>
                <?php
                $conn=mysqli_connect("localhost","root","","gautham");
                    if(isset($_POST['submit']))
                    {
                        if($conn)
                        {
                            if(!empty($_POST['name']))
                            {
                                // $sql="update  testtable set name='.$_POST['name']. ' where id=.$_POST['id_update'].";
                                $sql="update  testtable set name='".$_POST['name']."' where id=".$_POST['id_update']." ";
                                $res=mysqli_query($conn,$sql);  

                                

                                
                                if(!empty($_POST['marks']))
                                {
                                    // $marks="update  testtable set mark='".$_POST['marks']."' where id=".$_POST['id_update']." ";
                                    $marks="update  testtable set mark=".$_POST['marks']." where id=".$_POST['id_update']." ";
                                    $res_marks=mysqli_query($conn,$marks);
                                    // $marks="update  testtable set mark='".$_POST['marks']."' where id=".$_POST['id_update']." ";
                                    // $res_marks=mysqli_query($conn,$marks);  
                                }
                                $new="select * from testtable";
                                $result=mysqli_query($conn,$new);
    
                                if(mysqli_num_rows($result)>0)
                                {
                                    echo "<table border='border' width='300'>
                                                    <tr>
                                                        <th>id</th>
                                                        <th>name</th>
                                                        <th>age</th>
                                                        <th>mark</th>
                                                    </tr>";
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        echo "<tr>
                                            <td>".$row['id']."</td>
                                            <td>".$row['name']."</td>
                                            <td>".$row['age']."</td>
                                            <td>".$row['mark']."</td>
                                        </tr>";
                                    }
                                    echo "</table>";
    
                                }
                                else{
                                    echo "0 results";
                                }
                            }
                            else{
                                echo "Enter Name";
                            }
                           

                        }
                        else{
                            die("Connection Error". mysqli_connect_error());
                        }
                    }
                    
                ?>
</body>
</html>


<?php
                // $conn=mysqli_connect("localhost","root","","gautham");
            //     if(!empty($_POST['name']))
            //     {
            //         $sql="update  testtable set name='$_POST[name]' where id='.$_POST[id_update].'";
            //         $res=mysqli_query($conn,$sql);  
                      
            //     }
            //     else
            //     {
            //         echo "Enter Name!";
            //     }
            // ?>

<?php 

// $conn=mysqli_connect("localhost","root","","gautham");
// if($conn)
// {
//     // echo "Connected";
//     $sql="select * from testtable";
//     $res=mysqli_query($conn,$sql);
//     if(mysqli_num_rows($res)>0)
//     {
//         echo "<table border='border' width='300'>
//         <tr>
//             <th>id</th>
//             <th>name</th>
//             <th>age</th>
//             <th>mark</th>
//         </tr>";
//         while($row = mysqli_fetch_assoc($res))
//         {
//             echo "<tr>
//                 <td>".$row['id']."</td>
//                 <td>".$row['name']."</td>
//                 <td>".$row['age']."</td>
//                 <td>".$row['mark']."</td>
//             </tr>";
//         }
//         echo "</table>";
//     }
//     else{
//         echo "0 results";
//     }

//     $num_of_rows=mysqli_num_rows($res);
//     echo "<h3> My table has ".$num_of_rows." rows</h3>";


// }
// else
// {
//     die("Connection failed".mysqli_connect_error());
// }
// mysqli_close($conn); -->


?>
