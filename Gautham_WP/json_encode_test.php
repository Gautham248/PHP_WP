<?php
class Book{
    public $title="";
    public $author="";
    public $yearofpublication="";
}
$book= new Book();
$book->title="World Wide Web";
$book->author="James Gosling";
$book->yearofpublication="2005";

$result=json_encode($book);
echo "The JSON representation is: ".$result."\n";
// $js_object=JSON.parse($result);
$obj=json_decode($result);
echo "<br><br>Title: ".$obj->title;
echo "<br>Author: ".$obj->author;
echo "<br>Year of publication: ".$obj->yearofpublication;

// var_dump($obj); 
?>



