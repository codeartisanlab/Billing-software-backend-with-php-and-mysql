<?php
	include('../db_connect.php');

	$id=$_GET['id'];
	$image=$_GET['image'];

	$vendor=delete_vendor($conn,$image,$id);
	header('location: view-vendor.php');

?>