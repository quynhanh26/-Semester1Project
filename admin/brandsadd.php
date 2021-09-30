<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    require_once ("../BUS/BrandsBUS.php");
    if(isset($_POST["submit"])){
        $nameBrands = $_POST["nameBrands"];
        $origin = $_POST["origin"];
        if(BrandsBUS::addBrands($nameBrands, $origin)){
            echo "<script>alert('T')</script>";
        }else echo "<script>alert('F')</script>";
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Slider</h2>
    <div class="block">               
         <form method="post">
            <table class="form">     
                <tr>
                    <td>
                        <label>Name Brands</label>
                    </td>
                    <td>
                        <input type="text" name="nameBrands" class="medium" />
                    </td>
                </tr>           
    
                <tr>
                    <td>
                        <label>Origin</label>
                    </td>
                    <td>
                        <input type="text" name="origin"/>
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
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>