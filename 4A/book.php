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
    		<div class="col-12">
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