<?php
  
include 'koneksi.php';

  
  if (isset($_GET['id'])) {
    
    $id = ($_GET["id"]);

    
    $query = "SELECT * FROM produk WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
   
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    
    $data = mysqli_fetch_assoc($result);
      
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>EBOOK - Novels</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: royalblue;
      }
    button {
          background-color: royalblue;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: royalblue;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    </style>
  </head>
  <body>
      <center>
        <h1>Edit Produk <?php echo $data['judul']; ?></h1>
      <center>
      <form method="POST" action="proses_edit.php" enctype="multipart/form-data" >
      <section class="base">
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="id" value="<?php echo $data['id']; ?>"  hidden />
        <div>
          <label>Judul</label>
          <input type="text" name="judul" value="<?php echo $data['judul']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label>Pengarang</label>
         <input type="text" name="pengarang" value="<?php echo $data['pengarang']; ?>" />
        </div>
        <div>
          <label>Penerbit</label>
         <input type="text" name="penerbit" required=""value="<?php echo $data['penerbit']; ?>" />
        </div>
        <div>
          <label>Harga Buku</label>
         <input type="text" name="harga_buku" required="" value="<?php echo $data['harga_buku']; ?>"/>
        </div>
        <div>
          <label>Gambar Produk</label>
          <img src="gambar/<?php echo $data['gambar_produk']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" name="gambar_produk" />
          <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
        </div>
        <div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
  </body>
</html>