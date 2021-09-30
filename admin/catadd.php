<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
require_once '../BUS/CategoryBUS.php';
if (isset($_POST['submit'])) {
    $nameCategory = $_POST['nameCategory'];
    if (CategoryBUS::addCategory($nameCategory)) {
        echo "<script>alert('Add success')</script>";
    } else echo "<script>alert('Add failure')</script>";
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Category</h2>
        <div class="block copyblock">
            <form method="POST">
                <table class="form">
                    <tr>
                        <td>
                            <input type="text" placeholder="Enter Category Name..." class="medium" name="nameCategory" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>