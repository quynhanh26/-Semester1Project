<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
require_once '../BUS/CategoryBUS.php';
if (isset($_POST["del"])) {
	$idCategory = $_POST['del'];
	if (CategoryBUS::delCategory($idCategory)) {
		echo "<script>alert('Del success')</script>";
	} else echo "<script>alert('Del failure')</script>";
}
?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Category List</h2>
		<div class="block">
			<form method="post">
				<table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>IdCategory</th>
							<th>Category Name</th>
							<th>Origin</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						require_once("../BUS/CategoryBUS.php");
						$results = CategoryBUS::getData();
							foreach ($results as $results) {
								?>
									<tr>
										<td><?= $results["IdCategory"]; ?></td>
										<td><?= $results["NameCategory"]; ?></td>
										<td>
											<div class="custom-control custom-checkbox">
												<input class="custom-control-input" type="checkbox" disabled readonly <?= ($results["Status"] == 1) ? "checked" : ""; ?>>
												<label class="custom-control-label"></label>
											</div>
										</td>
										<td style="align-content: center;">
											<button class="btn btn-primary" type="submit" name="del" value="<?= $results["IdCategory"] ?>">DEL</button>
											<button class="btn btn-primary"> <a href="repaircat.php?idCategory=<?= $results["IdCategory"]; ?>">REPAIR</a></button>
										</td>
									</tr>
								<?php
								} ?>
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