<?php
require_once "../BUS/ProductBUS.php"; ?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Store Website</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="shortcut icon" type="image/jpg" href="images/logo.jpg" />
    <script src="js/jquerymain.js"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/nav.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/nav-hover.js"></script>
    <link href='Css/Monda.css' rel='stylesheet' type='text/css'>
    <link href='Css/Doppio.css' rel='stylesheet' type='text/css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.slim.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/Autocomplete.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
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
        <?php require_once "Inc\Header.php"; ?>
        <div class="main">
            <div class="content_top">
                <div class="heading" align="center">
                    <h3>Featured products</h3>
                </div>
                <div class="clear"></div>
            </div>
            <div class="content row">
                <div class="section group col-md-3 ">
                    <?php
                    $namePro = $_SESSION["inputsearch"];
                    $result = ProductBUS::SearchGetInfo($namePro);
                    foreach($result as $result) {
                    ?>
                        <div class="grid_1_of_4 images_1_of_4">
                            <div style="width: 80%; height: 80%"><img src="Images/<?= $result["Img"]; ?>" /></a></div>
                            <span>
                                <h2><?= $result["NamePro"] ?></h2>
                            </span>
                            <p><span class="price"><?= number_format($result["Price"]) ?> VND</span></p>
                            <p><?= $result["NameCategory"]; ?></p>
                            <div class="button"><span><a href="Detail.php?Id=<?= $result["IdPro"]; ?>" class="details">Details</a></span>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php require_once "Inc\Footer.html"; ?>
    </div>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
    <script defer src="js/jquery.flexslider.js"></script>
    <script type="text/javascript">
        $(function() {
            SyntaxHighlighter.all();
        });
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                start: function(slider) {
                    $('body').removeClass('loading');
                }
            });
        });
    </script>
</body>

</html>