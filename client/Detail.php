<?php
require_once "../BUS/ProductBUS.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="shortcut icon" type="image/jpg" href="images/logo.jpg" />
    <link rel="stylesheet" href="Css/Detail.css">
    <link rel="stylesheet" href="Css/Style.css">
    <link rel="stylesheet" href="Css/Menu.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Detail Product</title>
</head>

<body>
    <div class="container aaa">
        <?php require_once "Inc\Header.php";
        require_once "../BUS/CartBUS.php";
        if (!isset($_GET["Id"])) {
            header("Location: Products.php");
        } else {
            if (!ProductBUS::checkPro($_GET["Id"])) {
                header("Location: Products.php");
            } else {
                $result = ProductBUS::GetPro($_GET["Id"]);
                foreach ($result as $result) {
                }
            }

            if (isset($_POST["add"])) {
                $idAccount = $_SESSION['id'];
                $idPro = $_GET["Id"];
                if (!isset($_SESSION["id"])) {
                    $_SESSION["idpro"] = $idPro;
                    header("Location: Signin.php");
                } elseif (CartBUS::addCart($idPro, $idAccount, 1)) {
                    echo "<script>alert('Seccuss')</script>";
                }
            }

            $Imgs = ProductBUS::ShowImgesBUS($_GET["Id"]);
        }


        ?>
        <div class="container styleCss">
            <h1 align="center" class="detpro">PRODUCT DETAIL</h1>
            <div class="row">
                <div class="col-md-4">
                    <img src="Images/<?= $result["Img"]; ?>" alt="photo" height="260px" style="margin-left: 20px" id="ExpandedImg">
                    <div class="row" style="margin-left: 20px">
                        <div class="column">
                            <img src="Images/<?= $result["Img"]; ?>" onclick="myFunction(this);" height="60px">
                        </div>
                        &nbsp;
                        <?php foreach ($Imgs as $Imgs) { ?>
                            <div class="column">
                                <img src="Images/<?= $Imgs["NameImg"] ?>" onclick="myFunction(this);" height="60px" width="60px">
                            </div>
                            &nbsp;
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-8">
                    <table>
                        <tr>
                            <td>ID Product:</td>
                            <td><?= $result["IdPro"]; ?></td>
                        </tr>
                        <tr>
                            <td>Name Product:</td>
                            <td><?= $result["NamePro"]; ?></td>
                        </tr>
                        <tr>
                            <td>Name Brand:</td>
                            <td><?= $result["NameBrands"]; ?></td>
                        </tr>
                        <tr>
                            <td>Name Category:</td>
                            <td><?= $result["NameCategory"]; ?></td>
                        </tr>
                        <tr>
                            <td>Price:</td>
                            <td><?= $result["Price"]; ?></td>
                        </tr>
                        <tr>
                            <td>Description:</td>
                            <td><?= $result["Description"]; ?></td>
                        </tr>
                        <tr>
                            <form method="post">
                                <td>
                                    <a href="Cart.php"><button type="submit" name="add">Add to Cart</button></a>
                                    <button type="submit"><a href="Products.php" style="text-decoration:none">Back</a></button>
                                </td>
                            </form>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <?php
        require_once "Inc\Footer.html";
        ?>
    </div>

    <script>
        function myFunction(imgs) {
            // Get the expanded image
            var expandImg = document.getElementById("ExpandedImg");
            // Use the same src in the expanded image as the image being clicked on from the grid
            expandImg.src = imgs.src;
            // Show the container element (hidden with CSS)
            expandImg.parentElement.style.display = "block";
        }
    </script>

</body>

</html>