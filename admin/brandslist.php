<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
require_once '../BUS/BrandsBUS.php';
if (isset($_POST["del"])) {
	$idBrands = $_POST['del'];
	if (BrandsBUS::delBrands($idBrands)) {
		echo "<script>alert('Del success')</script>";
	} else echo "<script>alert('Del failure')</script>";
}
?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Brands List</h2>
		<div class="block">
			<form method="post">
				<table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name Brands</th>
							<th>Origin</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						require_once '../BUS/BrandsBUS.php';
						$brands = BrandsBUS::getData();
						foreach ($brands as $brands) {
						?>
							<tr>
								<td><?= $brands["IdBrands"]; ?></td>
								<td><?= $brands["NameBrands"]; ?></td>
								<td><?= $brands["Origin"]; ?></td>
								<td>
									<div class="custom-control custom-checkbox">
										<input class="custom-control-input" type="checkbox" disabled <?= ($brands["Status"] == 1) ? "checked" : ""; ?>>
										<label class="custom-control-label"></label>
									</div>
								</td>
								<td style="align-content: center;">
									<button class="btn btn-primary" type="submit" name="del" value="<?= $brands["IdBrands"] ?>">DEL</button>
									<button class="btn btn-primary"> <a href="repairbrands.php?idBrands=<?= $brands["IdBrands"]; ?>">REPAIR</a></button>
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