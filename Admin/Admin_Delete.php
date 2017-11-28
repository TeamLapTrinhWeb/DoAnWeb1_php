<?php 
	require_once "../lib/db.php";

	if (isset($_GET["id"])) {
		$id = $_GET["id"];
		$sql = "delete from nhasx where id = $id";
		write($sql);
		header('Location: TrangAdmin.php');
	}
 ?>