<?php 
include 'koneksi.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title> index </title>
	<!-- memanggil file css -->
	<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.css">
	<style>
		body{
			background-color: black;
		}
	</style>
</head>
<body>

	<nav class="navbar navbar-dark bg-dark justify-content-between container">
	  <a class="navbar-brand"> <span class="h1">Dumb Library</span> </a>
	  <form class="form-inline">
	  	 <a href="add_book.php" class="btn btn-warning my-2 my-sm-0" style="color: white;"> Add Book</a>
	  	 <a href="add_kategori.php" class="btn btn-warning my-2 my-sm-0" style="color: white;"> Add Category</a>
	  	 <a href="add_penulis.php" class="btn btn-warning my-2 my-sm-0" style="color: white;"> Add Writer</a>
	  </form>
	</nav>

	<br><br>

	<div class="container">
		
		<div class="row">
			<?php 
				$query = mysqli_query($koneksi, "SELECT * FROM book_tb ORDER BY nama DESC");
				$no = 1;
				while($data = mysqli_fetch_object($query)){
			 ?>
			<div class="col-3">	
				<div class="card">
					<div class="card-body">
						<div style="padding-left: 60px;">
						<img src="<?= $data->gambar ?>" align="center" width="110" height="140" class="mx-auto">
						<h5> <?= $data->nama ?> </h5>
						<p> <?=$data->tahun_terbit ?> - <?= $data->id_penulis ?> </p>
						<a href="" class="btn btn-primary"> View Detail </a>
						</div>
				</div>
				</div>
			</div>
		<?php } ?>
		
		</div>

	</div>
</body>
</html>
