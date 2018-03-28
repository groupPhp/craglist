<?php
    $db = mysqli_connect('127.0.0.1', 'root') or die(mysqli_connect_error());
    mysqli_select_db($db, 'craigslist') or header("Location: Error.php");
    mysqli_query($db, "
        CREATE TABLE IF NOT EXISTS posts(
            title VARCHAR(45) NOT NULL,
            user VARCHAR(20) NOT NULL,
            describe VARCHAR(255) NOT NULL,
            
        )") or die(mysqli_error($db));
?>