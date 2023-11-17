<?php

// $conn=new mysqli($servername,$username,$password,$dbname);
// if($conn->connect_error)
// {
//     die("Connection Failed : ".$conn->connect_error);
// }

// $conn=mysqli_connect("localhost","root","","gautham");
// if($conn)
// {
//     //echo "<h1>Connected to gautham</h1>";
// }
// else{
//     die("Connection failed".mysqli_connect_error());
// }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
     .form{
        padding: 10px;
        border : solid;
        border-color:red;
        display: flex;
        justify-content: center;
        align-items: center;
        

     }
    </style>
</head>
<body>

<div class="form">
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
                <td><input type="text" name="name" size="50"></td>
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
        <input type="submit" name="submit" id="submit">
    </form>
</div>



    <?php



$conn=mysqli_connect("localhost","root","","gautham");
if($conn)
{
    //echo "<h1>Connected to gautham</h1>";
}
else{
    die("Connection failed".mysqli_connect_error());
}

if(isset($_POST['submit']))
{

    if(!empty($_POST['id'])&&!empty($_POST['name'])&&!empty($_POST['age'])&&!empty($_POST['mark']))

    {
        $sql = "insert into testtable values('$_POST[id]','$_POST[name]','$_POST[age]','$_POST[mark]')";
        $res=mysqli_query($conn,$sql);
        if($res===TRUE)
        {
            echo "<br/>Data inserted ";
        }
        else{
            echo "Error".mysqli_error($conn);
        }
        mysqli_close($conn);
        
    }else
    {
       
        echo "<p>Enter data in all the fields !</p>";
        //to go back to the original page
        // header('Location: ' $_SERVER['HTTP_REFERER']);
        // exit();
    }

}



    ?>
</body>
</html>

