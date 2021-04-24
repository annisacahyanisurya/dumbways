<?php 
    include '../koneksi.php';

    $id = $_GET['id'];
    $data_kategori = mysqli_query($koneksi, "SELECT * FROM category_tb WHERE id = '$id'");

    $data = mysqli_fetch_object($data_kategori);

    if(isset($_POST['submit'])){

    $id = $_POST['id']; 
    $nama = $_POST['nama'];
    
    $query = mysqli_query($koneksi, "UPDATE category_tb SET id='$id', nama='$nama' WHERE id='$data->id'");

    header("location: ../add_kategori.php");
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
    <!-- memanggil file javascript  -->
    <script src="bootstrap/js/bootstrap.js"></script>
    <!-- kode  -->

        <br>
       <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h2> Edit Category</h2>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="id"> Id </label>
                                    <input type="text" class="form-control" id="id" name="id" value="<?= $_GET['id']?>"></input>
                                </div>

                                <div class="form-group">
                                    <label for="nama"> Nama </label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $data->nama?>"></input>
                                </div> <br>


                                <button type="submit" class="btn btn-success" name="submit"> Save </button>
                                <button type="reset" class="btn btn-danger" > Back </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>