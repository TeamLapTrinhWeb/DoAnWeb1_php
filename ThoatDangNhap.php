<?php
session_start();
if (isset($_SESSION["User_ID"])) {
	unset($_SESSION["User_ID"]);
	unset($_SESSION["User"]);

	// xoá cookie auth_user_id
	setcookie("auth_user_id", "", time() - 3600);
}

header('Location: TrangDangNhap.php');