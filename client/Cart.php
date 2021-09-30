<?php require_once "../BUS/CartBUS.php"; ?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <title>Free Smart Store Website Template</title>
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
        if (!isset($_SESSION["id"])) {
            header("Location: Signin.php");
        }

        if (isset($_POST["editquantity"])) {
            $quantity = $_POST["quantity"];
            $idAccount = $_SESSION["id"];
            $idPro = $_POST["idPro"];
            CartDAO::updateSL($quantity, $idPro, $idAccount);
            header('Refresh: 0');
        }

        if (isset($_POST["delpro"])) {
            CartBUS::delCart($_POST["delpro"], $_SESSION["id"]);
            header('Refresh: 0');
        }

        if (isset($_POST["pay"])) {
            $idAccount = $_SESSION["id"];
            $gia = $_POST['sum'];
            CartBUS::Pay($idAccount, $gia);
            header("Refresh: 0");

        }

        $CartPro = CartBUS::ShowPro($_SESSION["id"]);
        $total = 0;
        $count = count($CartPro);
        if ($count > 0) {
        ?>
        <form method="POST">
            <div class="main">
                <div class="content">
                    <div class="cartoption">
                        <div class="cartpage" align="center">
                            <h2>Your Cart</h2>
                            <?php
                            foreach ($CartPro as $CartPro) {
                                $total += $CartPro["Price"] * $CartPro["2"];
                            ?>
                                <table class="tblone">
                                    <tr>
                                        <th width="20%">Product Name</th>
                                        <th width="10%">Image</th>
                                        <th width="15%">Price</th>
                                        <th width="25%">Quantity</th>
                                        <th width="20%">Total Price</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                    <tr>
                                        <td><?= $CartPro['NamePro']; ?></td>
                                        <td><img src="Images/<?= $CartPro['Img']; ?>" /></td>
                                        <td><label id="gsp"><?= number_format($CartPro['Price']); ?></label> VND</td>
                                        <td>
                                            <form method="post">
                                                <input type="text" name="idPro" value="<?= $CartPro["IdPro"] ?>" hidden>
                                                <input type="number" name="quantity" id="slsp" value="<?= $CartPro[2]; ?>" onkeypress='return false;' min='1' max='10'>
                                                <input type="submit" value="Edit" name="editquantity">
                                            </form>
                                        </td>
                                        <td><label id="tsp"><?= number_format($CartPro['Price'] * $CartPro[2]); ?></label> VND</td>
                                        <td>
                                            <button class="btn btn-danger" type="submit" name="delpro" value="<?= $CartPro["IdPro"]; ?>" onclick="return confirm('Are you sure you want to delete?');"><i class="fas fa-trash-alt" aria-hidden="true"></i>X</button>
                                        </td>
                                    </tr>
                                </table>
                            <?php
                            } ?>
                            <table style="float:right;text-align:left;" width="40%">
                                <tr>
                                    <th>Sub Total : </th>
                                    <td><label id="totals">
                                            <?php
                                            echo number_format($total);
                                            ?>
                                        </label></td>
                                </tr>
                                <tr>
                                    <th>VAT : </th>
                                    <td><label id="vats">10%</label></td>
                                </tr>
                                <tr>
                                    <th>Grand Total :</th>
                                    <td><label id="grandtotals">
                                            <?php
                                            echo number_format($total = $total + ($total * 10 / 100)) . " VND";
                                            ?>
                                            <input type="hidden" name="sum" value="<?= $total = $total + ($total * 10 / 100) ?>">
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: center;"><input type="submit" name="pay" value="PAY"></td>
                                </tr>
                            </table>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="shopping">
                        <div class="shopleft">
                            <a href="Products.php"><img src="images/shop.png" /></a>
                        </div>
                    </div>
                    </div>
                    <div class="clear"></div>
                    
                </div>
                
            </div>
        </form> 
        <?php require_once "Inc\Footer.html"; ?>       
    </div>
</body>

</html>