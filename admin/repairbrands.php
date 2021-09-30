<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php require_once '../BUS/BrandsBUS.php';

// get data by id 
if (isset($_GET["idBrands"])) {
    $idBrands = $_GET["idBrands"];
    if (BrandsBUS::checkBrands($idBrands)) {
        $brands = BrandsBUS::getDataById($idBrands);
        foreach ($brands as $brands) {
        }
    } else echo "<script>alert('Brands does not exist')</script>";
}

//repar brands
if (isset($_POST["submit"])) {
    $idBrands = $_POST["idBrands"];
    $nameBrands = $_POST["nameBrands"];
    $origin = $_POST["origin"];
    $status = isset($_POST["status"]) ? 1 : 0;
    if (BrandsBUS::repairBrands($nameBrands, $origin, $status, $idBrands)) {
        header("Location:brandslist.php");
    } else echo "<script>alert('Repair fail')</script>";
}

if (isset($_POST["back"])) {
    header("location: brandslist.php");
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Repair Brands</h2>
        <div class="block">
            <form method="post">
                <table class="form">
                    <tr>
                        <td>
                            <label>ID Brands</label>
                        </td>
                        <td>
                            <input type="text" class="medium" name="idBrands" readonly value="<?= isset($brands['IdBrands']) ? $brands['IdBrands'] : ""; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Name Brands</label>
                        </td>
                        <td>
                            <input type="text" class="medium" name="nameBrands" value="<?= isset($brands['NameBrands']) ? $brands['NameBrands'] : ""; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Origin</label>
                        </td>
                        <td>
                            <input type="text" class="medium" name="origin" value="<?= isset($brands['Origin']) ? $brands['Origin'] : ""; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Status</label>
                        </td>
                        <td>
                            <input type="checkbox" class="medium" name="status" <?php if (isset($brands['Status']) &&  $brands['Status'] == 1) {
                                                                                    echo "checked";
                                                                                } ?> />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" value="SAVE" />
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