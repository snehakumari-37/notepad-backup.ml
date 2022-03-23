<?php
$die1 ="<form action='../new/' method='POST' id='form' hidden><input type='text' name='msg' value ='";
$die2 = "'></form><script>document.querySelector('#form').submit();</script>";


if(!isset($_POST['filename'])){
    $msg = "FILENAME IS REQUIRED";
    die("$die1$msg$die2");
}
if(empty($_POST['filename'])){
    $msg = "FILENAME IS REQUIRED <br> EMPTY!";
    die("$die1$msg$die2");
}
$empty_text = "THIS IS ONLINE NOTEPAD";
$dir = "../saved/";
$filename = $_POST['filename'].".txt";

if(!is_dir($dir)){
    echo $dir." created";
    mkdir($dir);
}

if(file_exists("$dir$filename")){
    $msg = "FILENAME ALREADY EXISTS";
    die("$die1$msg$die2");

}

$file = fopen("$dir$filename", 'w');
fwrite($file, $empty_text);
echo "$dir$filename";
fclose($file);
$newdir = "saved/";
$msgpath = "../";
$name = "openfile";
// $name2 = "filename";
$msg1 = "<head><form action='$msgpath' method='POST' id='form' hidden><input type='text' name='$name' value ='";
$files = "$newdir$filename";
$msg2 = "'></form><script>document.querySelector('#form').submit();</script></head>";
echo "$msg1$files$msg2";
?>