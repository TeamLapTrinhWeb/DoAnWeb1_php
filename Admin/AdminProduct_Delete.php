<?php 
	require_once "../lib/db.php";

	if (isset($_GET["id"])) {
		$id = $_GET["id"];
		$sql = "delete from sanpham where id = $id";
		write($sql);
		header('Location: TrangAdminProducts.php');
	}
 ?>