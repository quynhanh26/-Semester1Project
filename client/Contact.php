<!DOCTYPE HTML>
<html>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $content = $_POST["content"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email')</script>";
    } else {
        $mail = new PHPMailer();
        $mail->IsSMTP();

        $mail->SMTPDebug  = 0;
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port       = 587;
        $mail->Host       = "smtp.gmail.com";
        $mail->Username   = "dinhnam0629@gmail.com";
        $mail->Password   = "truclinh2000";

        $mail->IsHTML(true);
        $mail->AddAddress("dinhnam0629@gamil.com");
        $mail->SetFrom($email, "customer:" . $username);
        $mail->Subject = "Feedback";
        $content =  "<b>" . $content . "</b>";

        $mail->MsgHTML($content);
        if ($mail->Send()) {
            echo "<script>alert('Thank you very much')</script>";
        }
    }
}
?>

<head>
    <meta charset="UTF-8">
    <title>Store Website</title>
    <link href="Css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="Css/menu.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="shortcut icon" type="image/jpg" href="Images/logo.jpg" />
    <script src="js/jquerymain.js"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/nav.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/nav-hover.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Monda
' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One
' rel='stylesheet' type='text/css'>
    <script type="text/javascript">
        $(document).ready(function($) {
            $('#dc_mega-menu-orange').dcMegaMenu({
                rowItems: '4',
                speed: 'fast',
                effect: 'fade'
            });
        });
    </script>
</head>

<body>
    <div class="wrap">
        <div class="menu">
            <ul id="dc_mega-menu-orange" class="dc_mm-orange">
                <li><a href="Index.php">Home</a></li>
                <li><a href="Products.php">Products</a> </li>
                <li class="dropbtn"><a href="Topbrands.php">Brands</a></li>
                <li><a href="Contact.php">Contact</a> </li>
                <div class="clear"></div>
            </ul>
        </div>
        <div class="main">
            <div class="content">
                <div class="support">
                    <div class="support_desc">
                        <h3>Live Support</h3>
                        <p><span>24 hours | 7 days a week | 365 days a year &nbsp;&nbsp; Live Technical Support</span></p>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.There are
                            many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage
                            of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                    </div>
                    <img src="images/contact.png" />
                    <div class="clear"></div>
                </div>
                <div class="section group">
                    <div class="col span_2_of_3">
                        <div class="contact-form">
                            <h2>Contact Us</h2>
                            <form method="POST">
                                <div>
                                    <span><label>NAME</label></span>
                                    <span><input type="text" name="username"></span>
                                </div>
                                <div>
                                    <span><label>E-MAIL</label></span>
                                    <span><input type="text" name="email"></span>
                                </div>
                                <div>
                                    <span><label>MOBILE.NO</label></span>
                                    <span><input type="text"></span>
                                </div>
                                <div>
                                    <span><label>SUBJECT</label></span>
                                    <span><textarea name="content"></textarea></span>
                                </div>
                                <div>
                                    <span><input type="submit" name="submit" value="SUBMIT"></span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col span_1_of_3">
                        <div class="company_address">
                            <h2>LA IMPERIAL :</h2>
                            <p>212-214 Nguyen Dinh Chieu,</p>
                            <p>Ward 6, Distric 3, Ho Chi Minh City</p>
                            <p>Viet Nam</p>
                            <p>Phone:(00) 222 666 444</p>
                            <p>Fax: (000) 000 00 00 0</p>
                            <p>Email: <span>laimperial@gmail.com</span></p>
                            <p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
                        </div>
                        <div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4244704632124!2d106.68783431474893!3d10.778765892319953!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f3a9d92c4a7%3A0x6293396afcadc8a5!2zMjEyIE5ndXnhu4VuIMSQw6xuaCBDaGnhu4N1LCBQaMaw4budbmcgNiwgUXXhuq1uIDMsIEjhu5MgQ2jDrSBNaW5oLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1592818296040!5m2!1sen!2s
" width="90%" height="95%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once "Inc\Footer.html"; ?>
    </div>
</body>

</html>