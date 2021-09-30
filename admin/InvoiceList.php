<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php require_once '../BUS/InvoiceBUS.php'; ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Category List</h2>
        <div class="block">
            <form method="post">
                <table class="data display datatable" id="example">
                    <thead>
                        <tr>
                            <th>IdInvoice</th>
                            <th>IdAccount</th>
                            <th>DATE BUY</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = InvoiceBUS::getData();
                        foreach ($result as $result){ 
                        ?>
                        <tr>
                            <td><?= $result["IdInvoice"]?></td>
                            <td><?= $result["IdAccount"]?></td>
                            <td><?= $result["DateBuy"]?></td>
                            <td><?= number_format($result["Total"])?> VND</td>
                            <td><a href="details.php?id=<?= $result["IdInvoice"]?>">Details</a></td>
                        </tr>
                        <?php }?>
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