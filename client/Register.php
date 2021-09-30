<?php
session_start();
require_once "../BUS/AccountBUS.php";
require_once "../BUS/CartBUS.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="css/StyleRegister.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>La Imperial Registration</title>
</head>

<body>
    <br />
    <h1 align="center">Create Account</h1>
    <br />
    <div class="container">

        <!-- Registration processing -->
        <?php
        if (isset($_POST["register"])) {
            $fullName = trim(($_POST["fullName"]));
            $email = trim($_POST["email"]);
            $passwd = trim($_POST["passwd"]);
            $passwd2 = trim($_POST["passwd2"]);
            $dob = $_POST["dob"];
            $gender = $_POST["gender"];
            $pattern = '/\W/';
            $erro = "";
            if ($fullName === "") {
                $erro .= "Enter your name.";
            }
            if ($email === "") {
                $erro .= "Enter your email.";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $erro .= "Enter a valid email address.";
            }
            if ($passwd === "") {
                $erro .= "Enter your password.";
            }
            if ($passwd2 === "") {

                $erro .= "Type your password again.";
            }
            if ($passwd2 != $passwd) {
                $erro .= "Password must match.";
            }

            if ($erro == "") {
                $passwdHash = password_hash($passwd, PASSWORD_BCRYPT);
                if (AccountBUS::Add($fullName, $email, $passwdHash, $dob, $gender, 0)) {
                   if(!isset($_SESSION['idpro'])){
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
                } else {
        ?>
                    <script>
                        alert("Email already in use.");
                        location.assign("Register.php");
                    </script>
                <?php
                }
            } else {
                echo "<script>alert('" . $erro . "')</script>";
                ?>
                <script>
                    location.assign("Register.php");
                </script>
        <?php
            }
        }
        ?>
        <div class="row">
            <div class="col-md-3" style="background-color: rgb(153, 153, 153); border-radius: 10px">
                <center><strong class="welcome">Welcome!</strong><br /> to my Website</center>
            </div>
            <div class="col-md-9">
                <form method="post" id="registerForm">
                    <fieldset class="border p-2 fieldset1">
                        <legend class="w-auto">Account</legend>
                        <div class="row">
                            <div class="col-md-12">
                                <span>Your name</span><br />
                                <input type="text" id="fullName" name="fullName" class="form-control" placeholder="Your name" onkeyup="check()">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" id="z-firstname"></div>
                            <div class="col-md-6" id="z-lastname"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <span>Email</span>
                                <input type="text" id="email" name="email" class="form-control" placeholder="Your email" onkeyup="check()">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" id="z-username"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <span>Password</span>
                                <input type="password" id="passwd" name="passwd" class="form-control" placeholder="Password" onkeyup="check()">
                            </div>
                        </div>
                        <div id="z-password"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <span>Confirm Password</span>
                                <input type="password" id="passwd2" name="passwd2" class="form-control" placeholder="Confirm Password" onkeyup="checkpassword()">
                            </div>
                        </div>
                        <div id="z-password2"></div>
                        <div class="row">
                            <div class="col-md-5">
                                <span>Birthday</span>
                                <input type="date" name="dob" class="form-control">
                            </div>
                            <div class="col-md-2 custom-control custom-radio" align="right">
                                <br />
                                <input type="radio" id="male" name="gender" checked value="male" class="custom-control-input">
                                <label for="male" class="custom-control-label">Male</label><br>
                            </div>
                            <div class="col-md-5 custom-control custom-radio">
                                <br />
                                <input type="radio" id="female" name="gender" value="female" class="custom-control-input">
                                <label for="female" class="custom-control-label">Female</label><br>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <input name="register" type="submit" value="Register" id="register" class="btn btn-success">
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div align="center">Already have an account, log in <a href="Signin.php">here</a></div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</body>

</html>