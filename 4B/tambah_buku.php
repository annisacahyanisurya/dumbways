<?php
  include 'koneksi.php';

    {
      $namafolder="img/";  //tempat menyimpan file
      if (!empty($_FILES["gambar"]["tmp_name"]))  
      {     
        $jenis_gambar=$_FILES['gambar']['type'];  
        $id=$_POST['id'];
        $nama=$_POST['nama'];    
        $id_kategori=$_POST['id_kategori'];
        $id_penulis=$_POST['id_penulis'];
        $tahun_terbit=$_POST['tahun_terbit'];
        if($jenis_gambar=="image/jpeg"|| $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")     
        {                    
          $gambar = $namafolder . basename($_FILES['gambar']['name']);                
          if (move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar)) 
          {                      
            mysqli_query($koneksi,"INSERT into book_tb SET
            id = '$id',
            nama= '$nama',
            id_kategori='$id_kategori',
            id_penulis='$id_penulis',
            tahun_terbit='$tahun_terbit',
            gambar= '$gambar'");     
            header("location:add_book.php");
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
        $default = "img/default.jpg";
        mysqli_query($koneksi, "INSERT INTO book_tb SET
          nama = '$nama',
          gambar = '$default'");
        header("Location: add_book.php");
      }
    }
?><?php 
	
	

 ?>