<?php
    if(isset($_POST['msg'])){

        $msg = $_POST['msg'];
        echo "<h1 style='color:red;'>$msg</h1>";
    }
    
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New</title>
</head>

<body>

    <div>
        <form action="create.php" method="POST">
            <span style="font-size: 32.5px;font-style: italic;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;letter-spacing: 3px; display:inline-block;">FILE NAME :</span>
            <input id="input" style="width:80%;display: inline-block;" type="text" name="filename" value="(FILENAME WITHOUT EXTENSION)" autofocus>
            <input style="width:99%;display: inline-block;" type="submit" value="CREATE FILE">
        <?php
        $parent = "../open/";
        $notes = "../";
        echo "<button type='button' style='background-color:purple;' onclick='myfunc()'>MANAGE FILES</button>
        <button type='button' style='background-color: cornflowerblue;' onclick='myfunc2()'>NOTEPAD</button>
        <script>
        function myfunc2(){
            window.location.href = '$notes';
        }
            function myfunc(){
          window.location.href = '$parent';
        }</script>";
        ?>
        </form>
    </div>
    <script>
        document.querySelector('#input').select();
    </script>
</body>

</html>