<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
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

        function click() {
            document.getElementById("aaa").innerHTML = "hello";
        }
    </script>
</head>

<body>
    <div class="wrap">
        <?php require_once "Inc\Header.php";
        require_once "../BUS/ProductBUS.php";
        require_once "../BUS/BrandsBUS.php";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['bbb'];
            $getdata = ProductBUS::getdtBrands($id);
        } else {
            $getdata = ProductBUS::getData();
        }

        ?>
        <br/>
        <div class="main">
            <div id="myBtnContainer">
                <select id="boxbrands" class="form-control" name="boxbrand">
                    <?php $getbrands = BrandsBUS::GetBrands();
                    foreach ($getbrands as $getBrand) { ?>
                        <option value="<?= $getBrand['IdBrands']?>"><a href="Topbrands.php?id=<?= $getBrand['IdBrands'] ?>"><?= $getBrand['NameBrands'] ?></a></option>
                    <?php } ?>
                </select>
            </div>
            <div class="content row">
                <div class="section group col-md-3 ">
                    <?php

                    foreach ($getdata as $getdata) {
                    ?>
                        <div class="grid_1_of_4 images_1_of_4 ">
                            <h3><?= $getdata["NameBrands"] ?></h3>
                            <div style="width: 80%; height: 80%"><a href="Detail.php?Id=<?= $getdata["IdPro"]; ?>"><img src="Images/<?= $getdata["Img"]; ?>" /></a></div>
                            <span><a href="Detail.php?Id=<?= $getdata["IdPro"]; ?>">
                                    <h2><?= $getdata["NamePro"] ?></h2>
                                </a></span>
                            <p><span class="price"><?= number_format($getdata["Price"]) ?> VND</span></p>
                            <p><?= $getdata["NameCategory"]; ?></p>
                            <div class="button"><span><a href="Detail.php" class="details">Details</a></span></div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <?php require_once "Inc\Footer.html"; ?>
        </div>
    </div>

    <script>
        function click() {
            document.getElementById("aaa").innerHTML = "hello";
        }
    </script>
</body>

</html>