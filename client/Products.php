<!DOCTYPE HTML>

<head>
    <title>Free Smart Store Website Template</title>
    <link href="Css/Style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="Css/Menu.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="shortcut icon" type="image/jpg" href="images/logo.jpg" />
    <script src="js/jquerymain.js"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/nav.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/nav-hover.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
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
        <?php require_once "Inc\Header.php";
        require_once "../BUS/ProductBUS.php";
        $getdata = ProductBUS::GetData();
        ?>
        <div class="main">
            <div class="content_top">
                <div class="heading" align="center">
                    <h3>Ours products</h3>
                </div>
                <div class="clear"></div>
            </div>

            <div class="content row">

                <div class="section group col-md-3 ">
                    <?php
                    foreach ($getdata as $getdata) {
                    ?>
                        <div class="grid_1_of_4 images_1_of_4  ">
                            <div style="width: 80%; height: 80%"><img src="Images/<?= $getdata["Img"]; ?>" /></a></div>
                            <span>
                                <h2><?= $getdata["NamePro"] ?></h2>
                            </span>
                            <p><span class="price"><?= number_format($getdata["Price"]) ?> VND</span></p>
                            <p><?= $getdata["NameCategory"]; ?></p>
                            <div class="button"><span><a href="Detail.php?Id=<?= $getdata["IdPro"]; ?>" class="details">Details</a></span></div>
                        </div>
                    <?php
                    }
                    ?>
                </div>

            </div>

        </div>
        <?php require_once "Inc\Footer.html"; ?>
</body>

</html>