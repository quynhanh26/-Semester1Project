<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php require_once '../BUS/CategoryBUS.php'; ?>
<?php
//get data by id
if (isset($_GET["idCategory"])) {
    $idCategory = $_GET["idCategory"];
    if (CategoryBUS::checkCategory($idCategory)) {
        $Category = CategoryBUS::getDataById($idCategory);
        foreach ($Category as $Category) {
        }
    } else {
        header("location: catlist.php");
    }
}
// repair category
if (isset($_POST["submit"])) {
    $idCategory = $_POST["idCategory"];
    $nameCategory = $_POST['nameCategory'];
    $status = isset($_POST["status"]) ? 1 : 0;
    if (CategoryBUS::repairCategory($nameCategory, $status, $idCategory)) {
        header("Location: catlist.php");
    } else echo "<script>alert('Repair fail')</script>";
}


if (isset($_POST["back"])) {
    header("location: catlist.php");
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
                            <label>ID Category</label>
                        </td>
                        <td>
                            <input type="text" class="medium" name="idCategory" readonly value="<?= isset($Category['IdCategory']) ? $Category['IdCategory'] : ""; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Name Category</label>
                        </td>
                        <td>
                            <input type="text" class="medium" name="nameCategory" value="<?= isset($Category['NameCategory']) ? $Category['NameCategory'] : ""; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Status</label>
                        </td>
                        <td>
                            <input type="checkbox" class="medium" name="status" <?php if (isset($Category['Status']) &&  $Category['Status'] == 1) {
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