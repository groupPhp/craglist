<?php
    $db = mysqli_connect('localhost', 'root', '1234') or die(mysqli_connect_error());
    mysqli_select_db($db, 'craigslist') or header("location: Error.php");

    if(isset($_POST["search"])){
        $search = mysqli_query($db, "SELECT * FROM posts WHERE 
        title LIKE '%".$_POST["search"]."%' OR description = '".$_POST["search"]."'") or die("There is no post here yet!<br>Please <a href='index.php'>go back</a>!");
        $record = mysqli_fetch_assoc($search);
        if($record != NULL){
            foreach($record as $title => $describe){
                echo "<h1>".$title."</h1><p>".$describe."</p>";
            }
            
        }else{
            echo "There is no result here.";
            refresh();
        }
    }else{
        header("Location: index.php");
    }