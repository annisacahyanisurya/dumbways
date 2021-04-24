<?php 
	include('../koneksi.php');

	$id = $_GET['id'];

	$query = mysqli_query($koneksi, "DELETE FROM category_tb WHERE id = '$id'");

	header("Location: ../add_kategori.php");
 ?>