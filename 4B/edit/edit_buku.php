<?php 
	include '../koneksi.php';

	$id = $_GET['id'];
	$data_buku = mysqli_query($koneksi, "SELECT * FROM book_tb WHERE id = $id");
	$data = mysqli_fetch_object($data_buku);

	if (isset($_POST['submit'])) {
	$id = $_POST['id'];
		$data = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM book_tb WHERE id='$id'"));
		$namafolder="img/"; //tempat menyimpan file
		if (!empty($_FILES["gambar"]["tmp_name"])) 
		{     
			$jenis_gambar=$_FILES['gambar']['type'];     
			$id=$_POST['id'];
	        $nama=$_POST['nama'];    
	        $id_kategori=$_POST['id_kategori'];
	        $id_penulis=$_POST['id_penulis'];
	        $tahun_terbit=$_POST['tahun_terbit'];
			if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")     
				{                    
					if($data['gambar'] != 'img/default.jpg')
					{
					unlink($data['gambar']);
					}
					$gambar=$namafolder . $_FILES['gambar']['name'];               
					if (move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar)) 
					{                     
						mysqli_query($koneksi,"UPDATE book_tb SET 
						id = '$id',
			            nama= '$nama',
			            id_kategori='$id_kategori',
			            id_penulis='$id_penulis',
			            tahun_terbit='$tahun_terbit',
						gambar= '$gambar'
						where id= $id");  
						header("Location:../add_book.php");
					} 
					else 
					{            
						echo "Gambar gagal dikirim";         
					}    
				} 
			else 
			{         
				echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";    
			} 
		} 
		else 
		{	     
			$id = $_POST['id'];
	        $nama = $_POST['nama'];
	        $id_kategori = $_POST['id_kategori'];
	        $id_penulis = $_POST['id_penulis'];
	        $tahun_terbit= $_POST['tahun_terbit'];
			$namabaru = $_POST['namabaru'];
			mysqli_query($koneksi,"UPDATE book_tb SET 
						judul= '$judul',
						gambar= '$namabaru'
						where id= $id");  
						header("Location:../add_book.php");
		}
}
 ?>
<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title> index </title>
	<!-- memanggil file css -->
	<link rel="stylesheet" type="text/css" href="../bootstrap/dist/css/bootstrap.css">
</head>
<body>
    <br>
	<!-- memanggil file javascript  -->
	<script src="bootstrap/js/bootstrap.js"></script>
	<!-- kode  -->
	    <div class="container">
    	<div class="row">
    		<div class="col-4">
    			<div class="card">
    				<div class="card-body">
    					<h2> Update Book </h2>
    					<form action="" method="POST" enctype="multipart/form-data">

							<input type="hidden" class="form-control" id="id" name="id" value="<?=$_GET['id'] ?>"></input>

    						<div class="form-group">
	    						<label for="nama"> Judul </label>
	    						<input type="text" class="form-control" id="nama" name="nama" placeholder="Judul" value="<?= $data->nama ?>"> </input> <br>
    						</div>

                            <div class="form-group">
                                <label for="id_kategori"> Id Kategori </label>
                                <select class="form form-control" name="id_kategori" value="<?= $data->id_kategori ?>">
                                    <option value="<?= $data->id_kategori ?>"> ID Kategori</option>
                                    <?php
                                        $query = "SELECT * FROM category_tb";
                                        $hasil = mysqli_query($koneksi, $query);
                                        while ($data = mysqli_fetch_object($hasil)) 
                                        {
                                    ?>
                                    <option value=<?php echo "'$data->id'";?>><?="$data->id";?> - <?= "$data->nama" ?> </option>

                                <?php } ?>
                                </select>
                            </div> <br>

                            <div class="form-group">
                                <label for="id_penulis"> Id Penulis </label>
                                <select class="form form-control" name="id_penulis" value="<?= $data->id_penulis ?>">
                                    <option value="<?= $data->id_penulis ?>"> ID Penulis</option>
                                    <?php
                                        $query = "SELECT * FROM writer_tb";
                                        $hasil = mysqli_query($koneksi, $query);
                                        while ($data = mysqli_fetch_object($hasil)) 
                                        {
                                    ?>
                                    <option value=<?php echo "'$data->id'";?>><?="$data->id";?> - <?= "$data->nama_penulis" ?> </option>

                                <?php } ?>
                                </select>
                            </div> <br>

                            <div class="form-group">
                                <label for="tahun_terbit"> Tahun Terbit </label>
                                <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?= $data->tahun_terbit; ?>"></input>
                            </div> <br>


                            <div class="form-group">
                                <label for="gambar"> Gambar </label>
                               <input type="file" name="gambar">
                                <input type="hidden" name="namabaru" value="$data->gambar">
                            </div> <br>

    						<button type="submit" class="btn btn-success" name="submit"> Add </button>
    						<button type="reset" class="btn btn-danger"> Reset </button>

    					</form>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
	
</body>
</html>
