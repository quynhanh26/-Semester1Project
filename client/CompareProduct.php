<!DOCTYPE html>
<html lang="en">

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
    <title>Compare ProductProduct</title>
</head>

<body>

    <div class="wrap">
        <?php require_once "Inc\Header.php"; ?>
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="border-right: 1px black solid">
                    <img src="Images/MHB1.jpg" alt="photo" height="260px" style="margin-left: 20px" id="ExpandedImg">
                    <table>
                        <tr>
                            <td>ID Product:</td>
                            <td>123456789</td>
                        </tr>
                        <tr>
                            <td>Name Product:</td>
                            <td>msdhsjsbjshisjxsbxjs</td>
                        </tr>
                        <tr>
                            <td>Name Brand:</td>
                            <td>china</td>
                        </tr>
                        <tr>
                            <td>Name Category:</td>
                            <td>cbjudcjudhinxjcuddsc</td>
                        </tr>
                        <tr>
                            <td>Price:</td>
                            <td>999,999,999</td>
                        </tr>
                        <tr>
                            <td>Description:</td>
                            <td>Rất dởm</td>
                        </tr>
                        <tr>
                            <form method="post">
                                <td>
                                    <a href="Cart.php"><button type="submit" name="add">Add to Cart</button></a>
                                </td>
                            </form>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <img src="Images/MHB2.jpg" alt="photo" height="260px" style="margin-left: 20px" id="ExpandedImg">
                    <table>
                        <tr>
                            <td>ID Product:</td>
                            <td>123456789</td>
                        </tr>
                        <tr>
                            <td>Name Product:</td>
                            <td>msdhsjsbjshisjxsbxjs</td>
                        </tr>
                        <tr>
                            <td>Name Brand:</td>
                            <td>china</td>
                        </tr>
                        <tr>
                            <td>Name Category:</td>
                            <td>cbjudcjudhinxjcuddsc</td>
                        </tr>
                        <tr>
                            <td>Price:</td>
                            <td>999,999,999</td>
                        </tr>
                        <tr>
                            <td>Description:</td>
                            <td>Rất dởm luôn</td>
                        </tr>
                        <tr>
                            <form method="post">
                                <td>
                                    <a href="Cart.php"><button type="submit" name="add">Add to Cart</button></a>
                                </td>
                            </form>
                        </tr>
                    </table>
                </div>
            </div>
            <br />
            <div align="center">
            <button type="submit"><a href="Products.php" style="text-decoration:none">Back</a></button>
            </div>
            <br />
            <?php require_once "Inc\Footer.html"; ?>
        </div>
    </div>


</body>

</html>