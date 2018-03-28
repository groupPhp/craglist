<html>
    <head>
        <link rel="stylesheet" type="text/css" href="theme.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
        <?php
            $db = mysqli_connect('127.0.0.1', 'root') or die(mysqli_connect_error());
            mysqli_select_db($db, 'craigslist') or header("location: Error.php");
            session_start();
        ?>
        <script>
            $(function(){
                $('form').validate();
            });
        </script>
    </head>
    <body>
        <?php
            if(isset($_POST["name"]) && isset($_POST["password"])){
                $search = mysqli_query($db, "SELECT * FROM account WHERE 
                username = '".$_POST["name"]."' AND password = '".$_POST["password"]."'") or die(mysqli_error($db));
                $record = mysqli_fetch_assoc($search);
                if($record != NULL){
                    $_SESSION["username"] = $_POST["name"];
                    $_SESSION["password"] = $_POST["password"];
				    echo "Hello, ".$_SESSION["username"].", your password is ".$_SESSION["password"];
                    header("refresh: 3; url=Index.php");
                }else{
                    echo "username = '".$_POST["name"]."' AND password = '".$_POST["password"]."'";
                    echo "<br>wrong username or wrong password";
                    unset($_POST["name"]);
                    unset($_POST["password"]);
                    header("refresh: 3");
                }
            }else{
        ?>
                <h1 class="title">Login</h1>
                <div class="outside">
                    <div class="inside">
                        <form action="Login.php" method="post">
                            <div class="left_column">
                                <label for="name">Username: </label><br>
                                <label for="digits">Password:	</label><br>
                            </div>
                            <div class="right_column">
                                <input name="name" minlength="4" type="text" required><br>
                                <input type="password" name="password" minlength="8" required><br>
                            </div>
                            <div class="buttom">
                                <input type="submit" value="Login">
                                <input type="submit" onclick="refresh" value="Cancel"><br>
                                <a href="Signin.php">Create A new Account!</a>
                            </div>
                        </form>
                    </div>
                </div>
        <?php
            }
        ?>
    </body>
</html>