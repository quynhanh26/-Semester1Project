<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
require_once '../BUS/InvoiceBUS.php';
require_once '../BUS/InvoiceDetailsBUS.php';

?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Category List</h2>
        <div class="block">
            <form method="post">
                <table class="data display datatable" id="example">
                    <thead>
                        <tr>
                            <th>IdInvoice</th>
                            <th>IdProduct</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = InvoiceDetailsBUS::getDataById($_GET['id']);
                        foreach ($result as $result) {
                        ?>
                            <tr>
                                <td><?= $result["IdInvoice"] ?></td>
                                <td><?= $result["IdPro"] ?></td>
                                <td><?= $result["Quantity"] ?></td>
                                <td><?= number_format($result["Price"]) ?> VND</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php'; ?>