<?php
	session_start();
	$_SESSION = array();
    
	$db = mysqli_connect('127.0.0.1', 'root') or die(mysqli_connect_error());
            mysqli_query($db, "DROP DATABASE IF EXISTS craigslist");
            mysqli_query($db, "DROP DATABASE IF EXISTS school");
    
	if(isset($cookie['username'])){
		setcookie('username', date("d")."/11/".date("M")." 15th", time() - 120);
	}
	session_destroy();
	echo '<a href="Index.php">Login!</a>';