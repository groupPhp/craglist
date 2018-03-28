<?php
    $db = mysqli_connect('127.0.0.1', 'root') or die(mysqli_connect_error());
    mysqli_select_db($db, 'craigslist') or header("location: Error.php");

    if(isset($_POST["search"])){
        $search = mysqli_query($db, "SELECT * FROM posts WHERE 
        title LIKE '%".$_POST["search"]."%' OR description = '".$_POST["search"]."'") or die(mysqli_error($db));
        $record = mysqli_fetch_assoc($search);
        if($record != NULL){
            foreach($record as $title => $describe){
                echo "<h1>".$title."</h1><p>".$describe."</p>"
            }
            
        }else{
            echo "wrong username or wrong password";
            unset($_POST["name"]);
            unset($_POST["password"]);
            refresh();
        }
    }