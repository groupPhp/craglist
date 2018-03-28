<html>
    <header>
        <link rel="stylesheet" type="text/css" href="theme.css">
    </header>
    <body>
        <?php
            $db = mysqli_connect('127.0.0.1', 'root') or die(mysqli_connect_error());
            mysqli_select_db($db, 'craigslist') or header("location: Error.php");
            
        /*
            if(isset($_SESSION["username"])  && isset($_SESSION["password"])){
                echo "Hello ".$_SESSION["username"]."Welcome !";
        */
        ?>
                    <nav class="left_column">
                        <div class="menu" style="height: 80%">
                            <ul>
                                <li>
                                    1
                                </li>
                                <li>
                                    2
                                </li>
                                <li>
                                    3
                                </li>
                            </ul>
                        </div>
                    </nav>
        <?php
            //}else{
                //header("location: Error.php");
            //}
        ?>
        <footer class="button" style="clear: both">
            <a href="Logout.php">Logout</a>
            <a href="Destroy.php">Destory</a>
        </footer>
    </body>
</html>
    