<html>
    <header>
        <link rel="stylesheet" type="text/css" href="theme.css">
    </header>
    <body>
        <?php
            $db = mysqli_connect('127.0.0.1', 'root') or die(mysqli_connect_error());
            mysqli_select_db($db, 'craigslist') or header("location: Error.php");
            session_start();
            
            if(isset($_SESSION["username"])  && isset($_SESSION["password"])){
                echo "<p style='clear:both'>Hello ".$_SESSION["username"].", welcome !</p>";
        ?>
                    <nav class="left_column">
                        <div class="menu" style="height: 90%">
                            <h2>Craigslist</h2>
                                <a href="Post.php"><input type="button" value="Post"></a>
                            <br>
                            <br>
                            <form action="search.php" method="post">
                                <input type="search" name="search" placeholder="Search">
                                <input type="submit" value="Search">
                            </form>
                        </div>
                    </nav>
        <?php
            }else{
                echo "<h2>You haven't Login yet, Please Login frist!</h2>";
                header("refresh: 3; url=Login.php");
            }
        ?>
        <footer class="button" style="clear: both">
            <a href="Logout.php">Logout</a>
            <a href="Destroy.php">Destory</a>
        </footer>
    </body>
</html>
    