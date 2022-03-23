<?php
require "security.php"; //GETS THE IP OF USER AND CHECKS IT WITH (WHITE-LIST)

$default_path_txt = "saved/saved.txt";
$q= fopen("opened.txt","r");
$p = fread($q,filesize("opened.txt"));
fclose($q);

$openedName = "opened.txt";
$opened = fopen($openedName, "r");  
$opened_txt = fread($opened, filesize($openedName));
// echo " lolin $opened_txt linlsd ";
// $_POST["openfile"] = "saved/yahoo.txt"; // WORKING 
if(!isset($_POST["openfile"])){ // CHECKING IF THERE IS (OPEN ANOTHER FILE POST REQUEST)
    $txtFileName = $opened_txt; // OPEN DEFAULT PATH
    $purefilename = str_replace("saved/","",$txtFileName);
    $default_path_txt = $txtFileName;
}
elseif(empty($_POST["openfile"])){ // VERY RARE : IF GOT A REQUEST BUT IT IS EMPTY
    $txtFileName = $opened_txt; // OPEN DEFAULT PATH
    $purefilename = str_replace("saved/","",$txtFileName);
}

else{   // AFTER CHECKING THE $_POST[ANOTHER_FILE];
$txtFileName = $_POST["openfile"]; // OOPEN ANOTHER FILE (THE REQUESTED FILE)
$purefilename = str_replace("saved/","",$txtFileName);
$default_path_txt = $txtFileName;

$opened = fopen($openedName,"w");
fwrite($opened, $default_path_txt);
fclose($opened);

// echo "LOL : $default_path_txt : LOL";
}


    if(!file_exists($openedName)){
        $opened = fopen($openedName,"w");
        fwrite($opened,$default_path_txt);
        fclose($opened);
    }
    if(filesize($openedName)==0){
        // echo "writing in file : $openedName ";
        $opened = fopen($openedName,"w");
        fwrite($opened, $default_path_txt);
        fclose($opened);
    }   


// $default_path_txt = "saved/saved.log";

// $openeda = fopen($openedName,"w");
// echo "|  $default_path_txt  |";
// fwrite($openeda, $default_path_txt);
// fclose($openeda);

// $purefilename = str_replace("saved/","",$default_path_txt);
// $dir = str_replace($purefilename, "", $default_path_txt); // $dir = REMOVE /saved.txt FROM $default_path_txt
$dir = "saved";
if(!is_dir($dir)){  //   IF "saved/" path doesnt exist 
    mkdir($dir);    //   MAKE A NEW "saved/" DIR
}

if(!file_exists($txtFileName)){ // IF FILE "saved/fileName.txt" DOESNT EXIST
    $edit = fopen($txtFileName,"w");        // CREATE
    $empty_mgs = "THIS IS ONLINE NOTEPAD!"; // A NEW
    fwrite($edit,$empty_mgs);               // "saved/filename.txt" FILE
    fclose($edit);  // CLOSE FILE TO PREVENT ERROR
}
$opened = "opened.txt";
$txtFile = fopen($opened,"w");
fwrite($txtFile, $default_path_txt);
fclose($txtFile);
$txtFile = fopen($txtFileName,"r"); // OPEN "saved/fileName.txt" FOR READING
$text = fread( $txtFile, filesize($txtFileName) ); 
fclose($txtFile);

// $saved = "saved";
echo "OPENED : $purefilename";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="fileSaver.js"></script>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" user-scalable="no">
    <title>Saved Notes</title>
</head>

<body>
    <?php 
echo  "<span hidden>". $txtFileName ."</span>"; // PASS VAR $txtFileName TO JAVASCRIPT
?>

        <form action="form.php" method="POST">

    <!-- <form> -->
        <textarea name="text" id="text" cols="999" rows="999"><?php echo $text;?></textarea>
            <td>
                <tr>
                    <button name="func" type="submit" value="save">SAVE</button>
                </tr>
                <input type="hidden" name="filename" value="<?php echo $opened_txt; ?>"></input>
                <tr>
                    <button style="background-color:cadetblue;" type="submit" name="func" value="save" onclick="savu()">DOWNLOAD</button>
                </tr>

            <td>
                <tr>
                    <button style="background-color: chocolate;" type="submit" name="func" value="new">NEW FILE</button>
                </tr>
                <tr>
                    <button style="background-color: purple;" type="submit" name="func" value="open">MANAGE FILES</button>
                </tr>
            </td>
        </form>

    </div>
    <script>
        const textArea = document.querySelector("textarea");
        function savu() {
            var blob = new Blob([textArea.value], { type: "text/plain;charset=utf-8;", endings: "native" });
            saveAs(blob, filename);
        }

        var getFileName = document.querySelector("span");
        var filename = getFileName.innerText;
        getFileName.remove();
        var splitLength = filename.split("/").length - 1;
        filename = filename.split("/")[splitLength];

        const font_size = 5; // in %
        const submit_button_height = 150;
        var availHeight = window.innerHeight - submit_button_height;

        textArea.style.height = (availHeight) + "px";
        textArea.style.fontSize = ((window.innerHeight * font_size) / 100) + "px";
    </script>
</body>

</html>