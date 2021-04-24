<?php 
	include('../koneksi.php');

	$id = $_GET['id'];

	$query = mysqli_query($koneksi, "DELETE FROM writer_tb WHERE id = '$id'");

	header("Location: ../add_penulis.php");
 ?>