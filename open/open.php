<?php

if(isset($_POST['filename'])){
$filename = $_POST["filename"];
 $filename =  $filename.".txt";
 fwrite(fopen('../opened.txt','w'),"saved/$filename");
 header("Location: ../");
}
elseif(isset($_POST['delete'])){
    $filename = $_POST['delete'];
    if($filename=="saved"){
    $die1 ="<form action='../open/' method='POST' id='form' hidden><input type='text' name='msg' value ='";
    $die2 = "'></form><script>document.querySelector('#form').submit();</script>";

    $msg = "CANNOT DELETE (SAVED.TXT)";
    die("$die1$msg$die2");

    }
    unlink("../saved/$filename.txt");
    // echo "<script>window.location.replace('../');</script>";
    $die1 ="<form action='../open/' method='POST' id='form' hidden><input type='text' name='msg' value ='";
    $die2 = "'></form><script>document.querySelector('#form').submit();</script>";

    $msg = "DELETED ($filename.txt)";
    die("$die1$msg$die2");
}
else{
    die("no input");
}
?>