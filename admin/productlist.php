<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
require_once("../BUS/ProductBUS.php");
if (isset($_POST["del"])) {
	$idPro = $_POST["del"];
	if (ProductBUS::delProduct($idPro)) {
		echo "<script>alert('Del success')</script>";
	} else echo "<script>alert('Del failure')</script>";
}
?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Post List</h2>
		<div class="block">
			<form method="post">
				<table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>IdProduct</th>
							<th>Name Product</th>
							<th>Category</th>
							<th>Brands</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$product = ProductBUS::getData();
						foreach ($product as $product) {
						?>
							<tr>
								<td><?= $product["IdPro"] ?></td>
								<td><?= $product["NamePro"] ?></td>
								<td><?= $product["NameCategory"] ?></td>
								<td><?= $product["NameBrands"] ?></td>
								<td>
									<div class="custom-control custom-checkbox">
										<input class="custom-control-input" type="checkbox" disabled <?= ($product[11] == 1) ? "checked" : ""; ?>> <label class="custom-control-label"></label> </div>
								</td>
								<td>
									<button class="btn btn-primary" type="submit" name="del" value="<?= $product["IdPro"] ?>">DEL</button>
									<button class="btn btn-primary"> <a href="repairpro.php?idpro=<?= $product["IdPro"]; ?>">REPAIR</a></button>

								</td>
							</tr>
						<?php
						}
						?>

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