<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php require_once 'BUS/CategoryBUS.php'; ?>
<?php require_once 'BUS/BrandsBUS.php'; ?>
<?php require_once 'BUS/ProductBUS.php'; ?>
<?php
if (isset($_POST["submit"])) {
    $idPro = $_POST["IdPro"];
    $namePro = $_POST["NamePro"];
    $idCategory = $_POST["idCategory"];
    $idBrands = $_POST["idBrands"];
    $price = $_POST["Price"];
    $quantity = $_POST["Quantity"];
    $description = $_POST["Description"];

    // Xử lý upload ảnh minh họa
    $error = "";
    if ($_FILES["Img"]["name"] != "") {
        $Img = $idPro . ".jpg";
        $path = "../client/images/" . $Img;

        // Kiểm tra phải file ảnh không
        $check = getimagesize($_FILES["Img"]["tmp_name"]);
        if ($check == false) {
            $error .= "The selected file is not an image file";
        }
    } else {
        $Img =" ";
    }

    // Upload file ảnh
    if ($error == "") {
        if (!ProductBUS::Add($idPro, $namePro, $idCategory, $idBrands, $price, $quantity, $Img, $description,1)) {
            echo " <script>alert('Add product failed')</script>";
        } else {
            if (isset($path)) {
                move_uploaded_file($_FILES["Img"]["tmp_name"], $path);
            }
            echo " <script>alert('Add product successfully ')</script>";
        }
    } else {
        echo " <script>alert('" . $error . "');</script>";
    }
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">
            <form method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label>ID</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Enter Product ID..." class="medium" name="IdPro" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Enter Product Name..." class="medium" name="NamePro" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select id="select" name="idCategory">
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
                            <select id="select" name="idBrands">
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
                            <textarea class="tinymce" name="Description"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Price</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Enter Price..." class="medium" name="Price" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Quantity</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Enter Quantity..." class="medium" name="Quantity" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <input type="file" name="Img" />
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
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