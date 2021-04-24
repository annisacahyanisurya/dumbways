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
    					<h2> Add Book </h2>
    					<form action="tambah_buku.php" method="POST" enctype="multipart/form-data">

							<input type="hidden" class="form-control" id="id" name="id" placeholder="Id"></input>

    						<div class="form-group">
	    						<label for="nama"> Judul </label>
	    						<input type="text" class="form-control" id="nama" name="nama" placeholder="Judul"></input> <br>
    						</div>

                            <div class="form-group">
                                <label for="id_kategori"> Id Kategori </label>
                                <select class="form form-control" name="id_kategori">
                                    <option> ID Kategori</option>
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
                                <select class="form form-control" name="id_penulis">
                                    <option> ID Penulis</option>
                                    <?php
                                        $query = "SELECT * FROM writer_tb";
                                        $hasil = mysqli_query($koneksi, $query);
                                        while ($data = mysqli_fetch_object($hasil)) 
                                        {
                                    ?>
                                    <option value=<?php echo "'$data->nama_penulis'";?>><?="$data->id";?> - <?= "$data->nama_penulis" ?> </option>

                                <?php } ?>
                                </select>
                            </div> <br>

                            <div class="form-group">
                                <label for="tahun_terbit"> Tahun Terbit </label>
                                <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" placeholder="Tahun Terbit"></input>
                            </div> <br>


                            <div class="form-group">
                                <label for="gambar"> Gambar </label>
                               <input type="file" name="gambar">
                                <input type="hidden" name="namabaru">
                            </div> <br>

    						<button type="submit" class="btn btn-success"> Add </button>
    						<button type="reset" class="btn btn-danger"> Reset </button>

    					</form>
    				</div>
    			</div>
    		</div>
    		<div class="col-8">
    			<table id="example" class="table table-bordered">
                    <thead>
                        <tr>
                            <th> No </th>
                            <th> Nama  </th>
                            <th> Id Kategori </th>
                            <th> Id Penulis </th>
                            <th> Tahun Terbit </th>
                            <th> Gambar </th>
                            <th> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $kode = "SELECT * FROM book_tb";
                            $query = mysqli_query($koneksi, $kode);
                            while($data = mysqli_fetch_object($query)) {
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data->nama; ?></td>
                            <td><?= $data->id_kategori; ?></td>
                            <td><?= $data->id_penulis; ?></td>
                            <td><?= $data->tahun_terbit; ?></td>
                            <td> <img src="<?= $data->gambar; ?>" width="100" height="140"> </td>
                            <td> 
                                
                                <a href="edit/edit_buku.php?id=<?=$data->id?>" class="btn btn-primary"> Edit </a>
                                <a href="hapus/delete_buku.php?id=<?=$data->id;?>" class="btn btn-danger"> Hapus </a> <br>
                                
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
    		</div>
    	</div>
    </div>
	
</body>
</html>