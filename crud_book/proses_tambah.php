<?php

include 'koneksi.php';

  
  $judul       = $_POST['judul'];
  $pengarang   = $_POST['pengarang'];
  $penerbit    = $_POST['penerbit'];
  $harga_buku  = $_POST['harga_buku'];
  $gambar_produk = $_FILES['gambar_produk']['name'];


if($gambar_produk != "") {
  $ekstensi_diperbolehkan = array('png','jpg');
  $x = explode('.', $gambar_produk); 
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar_produk']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$gambar_baru; 
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); 
                  
                  $query = "INSERT INTO produk (judul, pengarang, penerbit, harga_buku, gambar_produk) VALUES ('$judul', '$pengarang', '$penerbit', '$harga_buku', '$nama_gambar_baru')";
                  $result = mysqli_query($koneksi, $query);
                  
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }

            } else {     
             
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
            }
} else {
   $query = "INSERT INTO produk (judul, pengarang, penerbit, harga_buku, gambar_produk) VALUES ('$judul', '$pengarang', '$penerbit', '$harga_buku', null)";
                  $result = mysqli_query($koneksi, $query);
                  
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }
}