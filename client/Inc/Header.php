<?php
session_start();
if (isset($_POST["out"])) {
    session_destroy();
    header("Location: Index.php");
}

if (isset($_POST['profile'])) {
    header("Location: ProFile.php");
}

if (isset($_POST['order'])) {
    header("Location: Cart.php");
}

if(isset($_GET["search"])){
    $_SESSION["inputsearch"] = $_GET["inputsearch"];
    header("Location: SearchPage.php");
}
?>

<div class="header_top row">
    <div class="logo col-1">
        <img src="Images/logo.jpg" />
    </div>
    <div class="header_top_right col-11">
        <div class="search_box col-5">
            <form>
                <input id="key "type="text" name="inputsearch" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input name="search" type="submit" value="SEARCH">
            </form>
        </div>
        <div class="shopping_cart col-3">
                <div class="cart">
                    <a title="View my shopping cart" rel="nofollow" href="Cart.php">
                        <span class="cart_title">Cart</span>
                        <span class="no_product">(empty)</span>
                    </a>
                </div>
        </div>
        <div class="account col-2">
            <?php
            if (!isset($_SESSION["name"])) {
            ?>
                <a href="Signin.php"><button class="accountbtn">Hi, Sign In</button></a>
            <?php
            } elseif (isset($_SESSION["name"])) {
            ?>
                <form method="post">
                    <button class="accountbtn">Hello <?= $_SESSION["name"] ?><i class="fas fa-caret-down"></i></button>
                    <div class="account-content">
                        <button name="profile">Your Account</button>
                        <button name="order">Your Orders</button>
                        <button name="out">Sign Out</button>
                    </div>
                </form>
            <?php
            }
            ?>

        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<div class="menu">
    <ul id="dc_mega-menu-orange" class="dc_mm-orange">
        <li><a href="Index.php">Home</a></li>
        <li><a href="Products.php">Products</a> </li>
        <li><a href="Topbrands.php">Brands</a></li>
        <li><a href="Contact.php">Contact</a> </li>
        <div class="clear"></div>
    </ul>
</div>