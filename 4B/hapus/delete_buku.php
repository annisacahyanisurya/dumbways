<?php 
	include '../koneksi.php'

	$id = $_GET['id'];
		$data1 = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * from book_tb where id='$id'"));
		$dir_base = $data1['gambar'];
		$query= mysqli_query($koneksi,"DELETE FROM book_tb WHERE id = $id");
		if($query)
		{
			if($dir_base != 'img/default.jpg')
			{
				unlink($dir_base);
			}
		
			 header("Location:add_book.php");
		}
 ?>