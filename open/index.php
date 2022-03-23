<?php
    if(isset($_POST['msg'])){

        $msg = $_POST['msg'];
        echo "<h1 style='color:red;'>$msg</h1>";
    }
    
$path = '../saved/';
$files = glob($path."*.txt");

echo '<link rel="stylesheet" href="../style.css">';
$parent = "../new/";
$notes = "../";
echo "<button type='button' style='background-color:purple;' onclick='myfunc()'>NEW FILE</button>
<button type='button' style='background-color: cornflowerblue;' onclick='myfunc2()'>NOTEPAD</button>
<script>
function myfunc2(){
  window.location.href ='$notes';
}
function myfunc(){
  window.location.href = '$parent';
}</script>";
echo '<form action="open.php" method="POST">';
foreach ($files as $file) {
  $pure =str_replace(".txt","",str_replace($path,"",$file));
  echo '<input name="filename" type="submit" value="'. $pure .'">
  </input>
  
  <input hidden  id="del'.$pure.'" style="background-color: red;"type="submit" name="delete" value="'. $pure .'"></input>
  <label style="background-color:red;    font-weight: bold;
  font-style: italic; width: 48.5%;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;
  cursor: pointer;"for="del'. $pure.'" >DELETE</label>
  <br>';
}
echo "</form>";
?>