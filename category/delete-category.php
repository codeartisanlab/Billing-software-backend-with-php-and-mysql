<?php

	include('../db_connect.php');

	$id=$_GET['id'];

	$category=delete_category($conn,$id);
	header('location: view-category.php');
?>