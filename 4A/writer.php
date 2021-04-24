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
                            <th> Id Penulis </th>
                            <th> Nama Penulis  </th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $kode = "SELECT * FROM writer_tb";
                            $query = mysqli_query($koneksi, $kode);
                            while($data = mysqli_fetch_object($query)) {
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data->id; ?></td>
                            <td><?= $data->nama_penulis; ?></td>
                            
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