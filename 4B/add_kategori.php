<?php 
    include 'koneksi.php';

    if (isset($_POST['submit'])) {
        $id = $_POST['id']; 
        $nama = $_POST['nama'];
    
        $query =  mysqli_query($koneksi, "INSERT INTO category_tb VALUES('$id','$nama')");

        header("location: add_kategori.php");
    }

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
    					<h2> Add Category </h2>
                        <br>
    					<form action="" method="post">

                            <div class="form-group">
                                <label for="id"> Id </label>
                                <input type="text" class="form-control" id="id" name="id" placeholder="Id Kategori"></input> <br>
                            </div>

    						<div class="form-group">
	    						<label for="nama"> Nama Kategori </label>
	    						<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Kategori"></input> <br>
    						</div>

    						<button type="submit" class="btn btn-success" name="submit"> Add </button>
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
                            <th> ID Kategori</th>
                            <th> Nama  </th>
                            <th> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $kode = "SELECT * FROM category_tb";
                            $query = mysqli_query($koneksi, $kode);
                            while($data = mysqli_fetch_object($query)) {
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data->id; ?></td>
                            <td><?= $data->nama; ?></td>

                            <td> 
                                
                                <a href="edit/edit_kategori.php?id=<?=$data->id?>" class="btn btn-primary"> Edit </a>
                                <a href="hapus/delete_kategori.php?id=<?=$data->id;?>" class="btn btn-danger"> Hapus </a> <br>
                                
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