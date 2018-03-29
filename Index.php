<html>
    <header>
        <style>
            <?php include 'theme.css';?>
        </style>
    </header>
    <body>
        <?php
            $db = mysqli_connect('localhost', 'root', '1234') or die(mysqli_connect_error());
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
                //echo "<h2>You haven't Login yet, Please Login frist!</h2>";
                //header("refresh: 3; url=Login.php");
            }
        ?>
        
        <div class = "content">
            <nav>
                <div class = "titleLogin">
                    <h1>Craiglist</h1>
                    <p><a href = "Login.php">Login</a><span style="padding-left:10px;"></span><a href = "Logout.php">Logout</a></p>
                </div>
            </nav>
            <div class = "contentRight">
                <div class = "titleIndex">
                    <h1>Vancouver, BC</h1>
                </div>
                
                <div class = "community">
                    <h2>Community</h2>
                </div>
                
                <div class = "housing">
                    <h2>Housing</h2>
                </div>
                
                <div class = "Services">
                    <h2>Services</h2>
                </div>
                
                <div class = "Jobs">
                    <h2>Jobs</h2>
                </div>
            </div>
        </div>
        
        <footer class="button" style="clear: both">
            <a href="Logout.php">Logout</a>
            <a href="Destroy.php">Destory</a>
        </footer>
    </body>
</html>
    