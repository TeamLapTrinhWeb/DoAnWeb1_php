<?php 
	if (!isset($_GET["id"])) {
		header('Location: TrangIndex.php');
	}

	$page_title = "Web Bán Hàng";
	$page_body_file = "Detail.php";
	include 'Layout_.php';
 ?>