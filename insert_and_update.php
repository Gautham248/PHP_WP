
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .update_box{
            border:solid;
            display: inline-block;
            padding:10px;
        }
        .insertion_box{
            border:solid;
            display: inline-block;
            padding:10px;
        }
    </style>
</head>
<body>


<!-- updation box -->
        <div class="update_box">       
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
        <br> <br>Enter new name : <input type="text" name="new_name" > <br><br>
        <br> <br>Enter new marks : <input type="number" name="new_marks" > <br><br>
            <input type="submit" value="UPDATE" name="submit_new" >
    </form>
        </div>
    <br><br><br>


<!-- insertion box -->
<div class="insertion_box">
<form action="#" method="post" name="form1">
        <!-- ID: <input type="number" name="id" size="5"><br>
        NAME: <input type="text" name="name" size="50"><br>
        AGE: <input type="number" name="age" size="3"><br>
        MARK: <input type="number" name="mark" size="2"><br>
        <input type="submit" name="submit" id="submit"> -->

        <table>
            <tr>
                <td>ID :</td>
                <td><input type="number" name="id" size="5"></td>
            </tr>
            <tr>
                <td>NAME:</td>
                <td><input type="text" name="name" size="28"></td>
            </tr>
            <tr>
                <td>
                    AGE:
                </td>
                <td><input type="number" name="age" max="99"></td>
            </tr>
            <tr>
                <td>MARK:</td>
                <td><input type="number" name="mark" max="100" min="0"></td>
            </tr>
        </table>
        <input type="submit" value="INSERT" name="submit" >
    </form>
    
</div>
<br><br><br>
<!-- updation_php -->
                <?php
                $conn=mysqli_connect("localhost","root","","gautham");
                    if(isset($_POST['submit_new']))
                    {
                        if($conn)
                        {
                            if(!empty($_POST['new_name']))
                            {
                                // $sql="update  testtable set name='.$_POST['name']. ' where id=.$_POST['id_update'].";
                                $sql="update  testtable set name='".$_POST['new_name']."' where id=".$_POST['id_update']." ";
                                $res=mysqli_query($conn,$sql);  

                                

                                
                                if(!empty($_POST['new_marks']))
                                {
                                    // $marks="update  testtable set mark='".$_POST['marks']."' where id=".$_POST['id_update']." ";
                                    $marks="update  testtable set mark=".$_POST['new_marks']." where id=".$_POST['id_update']." ";
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
                    if(isset($_POST['submit']))
                    {
                        if($conn)
                        {
                            if(!empty($_POST['id'])&&!empty($_POST['name'])&&!empty($_POST['age'])&&!empty($_POST['mark']))
                            {
                                $insert_query="insert into testtable values('$_POST[id]','$_POST[name]','$_POST[age]','$_POST[mark]')";
                                $insert_execute=mysqli_query($conn,$insert_query);
                                if($insert_execute===TRUE)
                                {
                                    $select_query="select * from testtable";
                                    $select_execute=mysqli_query($conn,$select_query);
                                    if(mysqli_num_rows($select_execute)>0)
                                         {
                                            echo "<table border='border' width='300'>
                                                            <tr>
                                                                <th>id</th>
                                                                <th>name</th>
                                                                <th>age</th>
                                                                <th>mark</th>
                                                            </tr>";
                                            while($row=mysqli_fetch_assoc($select_execute))
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
                                else
                                        {
                                            echo "0 results";
                                        }
                                }

                            }
                            else
                            {
                                echo "<p>Enter data in all the fields !</p>";
                            }

                        }
                        else
                        {
                            die("Connection Error". mysqli_connect_error());
                        }
                    }
                    
                ?>


<!-- insertion_php -->
<!-- <?php
//$conn=mysqli_connect("localhost","root","","gautham");
// if($conn)
// {
//     //echo "<h1>Connected to gautham</h1>";
// }
// else{
//     die("Connection failed".mysqli_connect_error());
// }

// if(isset($_POST['submit']))
// {

//     if(!empty($_POST['id'])&&!empty($_POST['name'])&&!empty($_POST['age'])&&!empty($_POST['mark']))

//     {
//         $sql = "insert into testtable values('$_POST[id]','$_POST[name]','$_POST[age]','$_POST[mark]')";
//         $res=mysqli_query($conn,$sql);
//         if($res===TRUE)
//         {
//             // echo "<br/>Data inserted ";
//             $new="select * from testtable";
//             $result=mysqli_query($conn,$new);
        
//             if(mysqli_num_rows($result)>0)
//             {
//                 echo "<table border='border' width='300'>
//                                 <tr>
//                                     <th>id</th>
//                                     <th>name</th>
//                                     <th>age</th>
//                                     <th>mark</th>
//                                 </tr>";
//                 while($row=mysqli_fetch_assoc($result))
//                 {
//                     echo "<tr>
//                         <td>".$row['id']."</td>
//                         <td>".$row['name']."</td>
//                         <td>".$row['age']."</td>
//                         <td>".$row['mark']."</td>
//                     </tr>";
//                 }
//                 echo "</table>";
        
//             }
//             else{
//                 echo "0 results";
//             }
//         }
//         else{
//             echo "Error".mysqli_error($conn);
//         }
//         mysqli_close($conn);
        
//     }else
//     {
       
//         echo "<p>Enter data in all the fields !</p>";
//         //to go back to the original page
//         // header('Location: ' $_SERVER['HTTP_REFERER']);
//         // exit();
//     }
   

// }
    ?> -->

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
