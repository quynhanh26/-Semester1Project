<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php require_once '../BUS/CategoryBUS.php'; ?>
<?php require_once '../BUS/BrandsBUS.php'; ?>
<?php require_once '../BUS/ProductBUS.php'; ?>
<?php
if (isset($_GET["idpro"])) {
    $idPro = $_GET["idpro"];
    if (ProductBUS::checkPro($idPro)) {
        $result = ProductBUS::getDataById($idPro);
        foreach ($result as $result) {
?>
            <script>
                $(document).ready(function() {
                    $("#category").val("<?= $result["IdCategory"] ?>");
                    $("#brands").val("<?= $result["IdBrands"] ?>");
                });
            </script>
<?php
        }
    } else {
        header("location: productlist.php");
        echo "<script>alert('Product does not exist')</script>";
    }
}

if (isset($_POST["submit"])) {
    $idPro = $_POST["idPro"];
    $namePro = $_POST["namePro"];
    $idCategory = $_POST["idCategory"];
    $idBrands = $_POST["idBrands"];
    $price = $_POST["Price"];
    $quantity = $_POST["Quantity"];
    $description = $_POST["Description"];
    $Status = isset($_POST["Status"]) ? 1 : 0;
    $time = getdate()[0];
    //check file upload
    $error = "";
    if ($_FILES["Img"]["name"] != "") {
        $img = $idPro . $time . ".jpg";
        $path = "../client/images/" . $img;

        // Check that the file is a picture file
        if (getimagesize($_FILES["Img"]["tmp_name"]) == false) {
            $error .= "The selected file is not the image file.";
        }
    } else {
        $img = $_POST["imgold"];
    }
    if ($error == "") {
        if (isset($path)) {
            move_uploaded_file($_FILES["Img"]["tmp_name"], $path);
        }
        if (ProductBUS::repairPro($namePro, $idCategory, $idBrands, $price, $quantity, $img, $description, $Status, $idPro)) {
            header("Location: productlist.php");
        } else echo "<script>alert('False')</script>";
    } else {
        echo "<script>alert('" . $error . "')</script>";
    }
}

if (isset($_POST["back"])) {
    header("location: productlist.php");
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Repair Product</h2>
        <div class="block">
            <form method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label>ID</label>
                        </td>
                        <td>
                            <input type="text" class="medium" name="idPro" value="<?= isset($result) ? $result["IdPro"] : ""; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" class="medium" name="namePro" value="<?= isset($result) ? $result["NamePro"] : ""; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select id="category" name="idCategory">
                                <?php
                                $category = CategoryBUS::getData();
                                foreach ($category as $category) {
                                ?>
                                    <option value="<?= $category["IdCategory"]; ?>"><?= $category["NameCategory"] ?></option>

                                <?php
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Brand</label>
                        </td>
                        <td>
                            <select id="brands" name="idBrands">
                                <?php
                                $brands = BrandsBUS::getData();
                                foreach ($brands as $brands) {
                                ?>
                                    <option value="<?= $brands["IdBrands"] ?>"><?= $brands["NameBrands"] ?></option>
                                <?php }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Description</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="Description"><?= isset($result) ? $result["Description"] : "" ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Price</label>
                        </td>
                        <td>
                            <input type="text" class="medium" name="Price" value="<?= isset($result) ? $result["Price"] : ""; ?>" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Quantity</label>
                        </td>
                        <td>
                            <input type="text" class="medium" name="Quantity" value="<?= isset($result) ? $result["Quantity"] : ""; ?>" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <input type="file" name="Img" onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])" />
                            <img src="../client/images/<?= isset($result) ? $result["Img"] : "" ?>" alt="img" id="img" height="100" width="120">
                            <input type="hidden" name="imgold" value="<?= isset($result) ? $result["Img"] : "" ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Status</label>
                        </td>
                        <td>
                            <input type="checkbox" name="Status" <?php if (isset($result)) {
                                                                        echo ($result["Status"] == 1) ? "checked" : "";
                                                                    } ?>>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="SAVE" />
                            <input type="submit" name="back" value="BACK">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>



<!-- Load TinyMCE -->
<?php include 'inc/footer.php'; ?>