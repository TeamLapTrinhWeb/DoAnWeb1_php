<?php
	require_once 'cart.inc';

	if (isset($_POST["btnAddItemToCart"])) {
		$proId = $_POST["txtProID"];
		$q = $_POST["txtQuantity"];
		
		add_item($proId, $q);

		if (isset($_SERVER['HTTP_REFERER'])) {
		    $url = $_SERVER['HTTP_REFERER'];
		    header("location: $url");
		}
	}
	if (isset($_POST["btnAddTo"])) {
		$proId = $_POST["txtProID"];
		
		add_item($proId, 1);

		if (isset($_SERVER['HTTP_REFERER'])) {
		    $url = $_SERVER['HTTP_REFERER'];
		    header("location: $url");
		}
	}
	if (isset($_POST["btnAddToTo"])) {
		$proId = $_POST["txtProID"];
		
		add_item($proId, 1);

		if (isset($_SERVER['HTTP_REFERER'])) {
		    $url = $_SERVER['HTTP_REFERER'];
		    header("location: $url");
		}
	}