<?php
	include('../db_connect.php');

	$id=$_GET['id'];
	$image=$_GET['image'];

	$product=delete_product($conn,$image,$id);
	header('location: view-product.php');

?>