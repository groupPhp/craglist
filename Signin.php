<html>
    <head>
        <link rel="stylesheet" type="text/css" href="theme.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
        <?php
            $db = mysqli_connect('127.0.0.1', 'root', '1234') or die(mysqli_connect_error());
            mysqli_query($db, "CREATE DATABASE IF NOT EXISTS craigslist");
            mysqli_select_db($db, 'craigslist') or die(mysqli_error($db));
            mysqli_query($db, "
                CREATE TABLE IF NOT EXISTS account(
                    username VARCHAR(45) NOT NULL,
                    password VARCHAR(20) NOT NULL,
                    emailaddress VARCHAR(255) NOT NULL
                )") or die(mysqli_error($db));
        ?>
        <script>
            $(function(){
                $('form').validate();
            });
        </script>
    </head>
    <body>
        <?php
            if(isset($_POST["name"]) || isset($_POST["password"]) || isset($_POST["email"])){
                mysqli_query($db, "
                INSERT INTO account(
                    username,
                    password,
                    emailaddress
                ) VALUES(
                    '".$_POST["name"]."',
                    '".$_POST["password"]."',
                    '".$_POST["email"]."'
                )") or die(mysqli_error($db));
				//echo "Hello, ".$_POST["name"].", you've create a new account successfully";
                header("Location: Login.php");
            }else{
        ?>
                <h1 class="title">Sign Up</h1>
                <div class="outside">
                    <div class="inside">
                        <form action="Signin.php" method="post">
                            <div class="left_column">
                                <label for="name">Name: </label><br>
                                <label for="digits">Password:	</label><br>
                                <label for="email">E-mail: </label><br>
                            </div>
                            <div class="right_column">
                                <input name="name" minlength="4" type="text" required><br>
                                <input type="password" name="password" minlength="8" required><br>
                                <input  type="email" class="boxes" name="email" required><br>
                            </div>
                            <div class="buttom">
                                <input type="submit" value="Create Account">
                                <input type="button" onclick="refresh" value="Cancel">
                            </div>
                        </form>
                    </div>
                </div>
        <?php
            }
        ?>
    </body>
</html>