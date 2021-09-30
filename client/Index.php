<!DOCTYPE HTML>
<html>

<head>
	<title>Store Website</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="shortcut icon" type="image/jpg" href="images/logo.jpg" />
	<script src="js/jquerymain.js"></script>
	<script src="js/script.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/nav.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript" src="js/nav-hover.js"></script>
	<link href='Css/Monda.css' rel='stylesheet' type='text/css'>
	<link href='Css/Doppio.css' rel='stylesheet' type='text/css'>
	<script type="text/javascript">
		$(document).ready(function($) {
			$('#dc_mega-menu-orange').dcMegaMenu({
				rowItems: '4',
				speed: 'fast',
				effect: 'fade'
			});
		});
	</script>
</head>

<body>
	<div class="wrap">
		<?php require_once "Inc\Header.php";
		require_once "../BUS/ProductBUS.php";

		?>
		<div class="header_bottom">
			<div class="header_bottom_right_images">

				<!-- FlexSlider -->
				<section class="slider">
					<div class="flexslider">
						<ul class="slides">
							<li><img src="Images/banner.jpg" height="400" /></li>
							<li><img src="Images/banner1.jpg" height="400" /></li>
							<li><img src="Images/banner2.jpg" height="400" /></li>
							<li><img src="Images/banner3.jpg" height="400" /></li>
							<li><img src="Images/banner4.jpg" height="400" /></li>
							<li><img src="Images/banner5.jpg" height="400" /></li>
						</ul>
					</div>
				</section>
			</div>
			<div class="clear"></div>
		</div>
		<div class="main">
			<div class="content_top">
				<div class="heading">
					<h3 >Featured products</h3>
				</div>
				<div class="clear"></div>
			</div>
			<div class="content row">
				<div class="section group col-md-3 ">
					<?php
					$getdata = ProductBUS::GetData();
					for ($i = 0; $i < sizeof($getdata); $i++) {
					?>
						<div class="grid_1_of_4 images_1_of_4">
							<div style="width: 80%; height: 80%"><img src="Images/<?= $getdata[$i]["Img"]; ?>" /></a></div>
							<span>
								<h2><?= $getdata[$i]["NamePro"] ?></h2>
							</span>
							<p><span class="price"><?= number_format($getdata[$i]["Price"]) ?> VND</span></p>
							<p><?= $getdata[$i]["NameCategory"]; ?></p>
							<div class="button"><span><a href="Detail.php?Id=<?= $getdata[$i]["IdPro"]; ?>" class="details">Details</a></span>
							</div>

						</div>
					<?php
						if ($i == 3) {
							break;
						}
					}
					?>

				</div>

			</div>
		</div>
		<div class="main">
			<div class="content_top">
				<div class="heading" >
					<h3>New products</h3>
				</div>
				<div class="clear"></div>
			</div>
			<div class="content row">
				<div class="section group col-md-3 ">
					<?php
					$getdat = ProductBUS::GetData();
					for ($i = sizeof($getdat) - 1; $i > 0; $i--) {
					?>
						<div class="grid_1_of_4 images_1_of_4">
							<div style="width: 80%; height: 80%"><img src="Images/<?= $getdat[$i]["Img"]; ?>" /></a></div>
							<span>
								<h2><?= $getdat[$i]["NamePro"] ?></h2>
							</span>
							<p><span class="price"><?= number_format($getdat[$i]["Price"]) ?> VND</span></p>
							<p><?= $getdata[$i]["NameCategory"]; ?></p>
							<div class="button"><span><a href="Detail.php?Id=<?= $getdat[$i]["IdPro"]; ?>" class="details">Details</a></span>
							</div>

						</div>
					<?php
						if ($i == sizeof($getdat) - 4) {
							break;
						}
					}
					?>

				</div>

			</div>
		</div>
		<?php require_once "Inc\Footer.html"; ?>
	</div>
	<link href="css/flexslider.css" rel='stylesheet' type='text/css' />
	<script defer src="js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(function() {
			SyntaxHighlighter.all();
		});
		$(window).load(function() {
			$('.flexslider').flexslider({
				animation: "slide",
				start: function(slider) {
					$('body').removeClass('loading');
				}
			});
		});
	</script>
</body>

</html>