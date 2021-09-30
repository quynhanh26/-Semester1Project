<?php
session_start();
require_once "../BUS/AccountBUS.php";
require_once "../BUS/CartBUS.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
    <link rel="stylesheet" href="css/StyleSignin.css" />
    <link rel="shortcut icon" type="image/jpg" href="images/logo.jpg" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>La Imperial Sign-in</title>
</head>

<body>
    <div class="container">

        <!-- Prevent the back button on the browser -->
        <?php
        if (empty($_SESSION["name"])) {
            if (isset($_COOKIE["name"])) {
                header("Location: Index.php");
            }
        } else {
            header("Location: Index.php");
        }
        ?>

        <!-- Redirect to index page -->
        <?php
        if (isset($_POST["signin"])) {
            $email = trim($_POST["email"]);
            $passwd = trim($_POST["passwd"]);
            if (AccountBUS::Login($email, $passwd)) {
                if (!isset($_SESSION["idpro"])) {
                    $info = AccountBUS::TakeInfo($email);
                    $_SESSION["name"] = $info["FullName"];
                    $_SESSION["id"] = $info["IdAccount"];
                    header("Location: Index.php");
                }else{
                    $info = AccountBUS::TakeInfo($email);
                    $_SESSION["name"] = $info["FullName"];
                    $_SESSION["id"] = $info["IdAccount"];
                    CartBUS::addCart($_SESSION["idpro"],$_SESSION["id"],1);
                    unset($_SESSION["idpro"]);
                    header("Location: Cart.php");
                }
            }
        }
        ?>

        <!-- Show the form -->
        <div class="header">
            <h1>Sign-In</h1>
        </div>
        <div class="main">
            <form method="post">
                <span>
                    <i class="fa fa-user"></i>
                    <input type="text" placeholder="Email" id="user" name="email" value="<?php if (isset($_POST["username"])) {
                                                                                                echo $_POST["username"];
                                                                                            } ?>">
                </span>
                <br />
                <span>
                    <i class="fa fa-lock"></i>
                    <input type="password" placeholder="Password" name="passwd">
                </span>
                <br />
                <button type="submit" name="signin">Sign-In</button>
                <div class="row check">
                    <div class="col-md-6 custom-control custom-checkbox">
                        <input name="remember" type="checkbox" id="checkbox" class="custom-control-input">
                        <label for="checkbox" class="custom-control-label">Remember me</label>
                    </div>
                    <div class="col-md-6">
                        <a href="">Forgot password?</a>
                    </div>
                    <div id="WrongPassword"></div>
                </div>
                <br />
                <span>You do not have an account, register <a href="Register.php">here</a></span>
            </form>
        </div>
        <br />
        <div class="social">
            <a><i class="fab fa-facebook-f a1"></i></a>
            <a><i class="fab fa-twitter a2"></i></a>
            <a><i class="fab fa-google a3"></i></a>
        </div>
    </div>
</body>

</html>