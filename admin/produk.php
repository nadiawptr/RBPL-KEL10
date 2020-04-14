<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@500&family=Lobster&display=swap" rel="stylesheet"> 


    <title>Hello, world!</title>
  </head>
  <body>

  <?php
  include '../header.php';
  ?>
<div style="height: 120px;background-color: rgb(242, 242, 242);padding-top:2%;padding-left: 10%;">
  <h2>Akun Saya</h2>
  <p>Dasbor</p>
</div>
<div class="container" style="margin-top: 3%;margin-bottom: 3%">
  <div class="row">
    <div class="col-md-3">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-3">
                <img src="/assets/img/user/default.png" class="rounded-circle">
              </div>
              <div class="col-md-6">
                <h5 style="margin-top: 20%;margin-left: 15%">
                  <?=$_SESSION['username'];?>
                </h5>
              </div>
            </div>
          </div>
   <div class="col-md-12" style="margin-top: 8%">
           <a href="index.php" class="custom-font"> Dasbor</a>
          </div> 
          <hr style="width: 100%">
           <div class="col-md-12">
           <a href="produk.php" class="custom-font"> List Produk </a>
          </div> 
          <hr style="width: 100%">
            <div class="col-md-12">
           <a href="detail-akun.php" class="custom-font">  Detail Akun</a>
          </div> 
          <hr style="width: 100%">
            <div class="col-md-12">
          <a href="logout.php" class="custom-font">   Keluar</a>
          </div> 
          <hr style="width: 100%">
        </div>
    </div>
    <div class="col-md-1">
      <div class="vl"></div>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-md-12">
         <!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahProduk">
  Tambah Produk
</button>

<!-- Modal -->
<div class="modal fade" id="tambahProduk" tabindex="-1" role="dialog" aria-labelledby="tambahKategoriLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="" enctype="multipart/form-data" >
          <label>Kategori</label>
          <select name="id_kategori" class="form-control">
            <?php
            $data=mysqli_query($koneksi,"select * from kategori");
            $cek= mysqli_num_rows($data);
            if($cek>0){
              $list_kategori = array();
              while ($row = mysqli_fetch_assoc($data)) {
              $list_kategori[] = $row;
            }
            foreach ($list_kategori as $row) {
              ?>
              <option value="<?=$row['id_kategori']?>"><?=$row['nama_kategori']?></option>
              <?php
            }
            }
            else{
              echo "Tambahkan Kategori Terlebih Dahulu";
            }
            ?>
          </select>
          <label>Nama Produk </label>
          <input type="text" name="nama_produk" class="form-control" required>
          <label>Deskripsi </label>
          <textarea name="deskripsi" class="form-control" required></textarea>
          <label>Ukuran </label>
          <input type="text" name="ukuran" class="form-control" required>
          <label>Stok </label>
          <input type="number" name="stok" class="form-control" required>
          <label>Harga </label>
          <input type="number" name="harga" class="form-control" required>
          <label>Gambar </label>
          <input type="file" name="file" class="form-control" required>
          <button type="submit" class="btn btn-success" name="submitProduk" style="margin-top: 5%">Tambah</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


           <h4><br>List Produk</h4>

           <table class="table">
              <thead>
              <th>No.</th>
              <th>Nama Kategori</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>Action</th>
              </thead>
              <tbody>
           <?php
           $data=mysqli_query($koneksi,"select * from produk join kategori on produk.id_kategori=kategori.id_kategori order by produk.id_kategori ASC");
           $cek= mysqli_num_rows($data);
           if($cek>0){
              $list_produk = array();
              while ($row = mysqli_fetch_assoc($data)) {
              $list_produk[] = $row;
               }
               $i=1;
               foreach ($list_produk as $row) {
                 ?>
                 <tr>
                  <td><?=$i?></td>
                  <td><?=$row['nama_kategori']?></td>
                  <td><?=$row['nama_produk']?></td>
                  <td><?=$row['harga']?></td>
                  <td><?=$row['stok']?></td>
            <td>
                 <button type="button" class="btn btn-primary" style="width: 40%"  data-toggle="modal" data-target="#editKategori<?=$i?>">Edit</button>

<!-- Modal -->
<div class="modal fade" id="editKategori<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="editKategoriLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="post" action="" enctype="multipart/form-data" >
          <label>Kategori</label>
          <select name="id_kategori" class="form-control">
            <?php
            $data=mysqli_query($koneksi,"select * from kategori");
            $cek= mysqli_num_rows($data);
            if($cek>0){
              $list_kategori = array();
              while ($row2 = mysqli_fetch_assoc($data)) {
              $list_kategori[] = $row2;
            }
            foreach ($list_kategori as $row2) {
              ?>
              <option value="<?=$row2['id_kategori']?>" 
                <?php if($row['id_kategori']==$row2['id_kategori']){echo 'selected';}?> >
                 <?=$row['nama_kategori']?>
                 </option>
              <?php
            }
            }
            else{
              echo "Tambahkan Kategori Terlebih Dahulu";
            }
            ?>
          </select>
          <input type="hidden" name="id_produk" value="<?=$row['id_produk']?>" >
          <label>Nama Produk </label>
          <input type="text" name="nama_produk" class="form-control" value="<?=$row['nama_produk']?>" required>
          <label>Deskripsi </label>
          <textarea name="deskripsi" class="form-control" required><?=$row['deskripsi']?></textarea>
          <label>Ukuran </label>
          <input type="text" name="ukuran" class="form-control"  value="<?=$row['ukuran']?>" required>
          <label>Stok </label>
          <input type="number" name="stok" class="form-control" value="<?=$row['stok']?>" required>
          <label>Harga </label>
          <input type="number" name="harga" class="form-control" value="<?=$row['harga']?>" required>
          <label>Gambar </label>
          <img src="../assets/img/produk/<?=$row['gambar']?>" class="img-thumbnail">
          <input type="file" name="file" class="form-control">
          <button type="submit" class="btn btn-primary" name="editProduk" style="margin-top: 5%">Update</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
                 <a href="delete-produk.php?id=<?=$row['id_produk']?>"><button type="button" class="btn btn-danger" style="width: 50%">Hapus</button></a>
               </td>
                 </tr>
                 <?php
               $i++;
               }
           }
           else{
            echo 'Belum ada kategori';
           }
           ?>
              </tbody>
           </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include '../footer.php';
?>
<script src="/assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>

<?php
if(isset($_POST['submitProduk'])){
  $nama_produk=$_POST['nama_produk'];
  $deskripsi=$_POST['deskripsi'];
  $harga=$_POST['harga'];
  $stok=$_POST['stok'];
  $ukuran=$_POST['ukuran'];
  $id_kategori=$_POST['id_kategori'];
  $ekstensi_boleh = array('png','jpg','jpeg');
  $nama = $_FILES['file']['name'];
  $x = explode('.', $nama);
  $ekstensi = strtolower(end($x));
  $size = $_FILES['file']['size'];
  $file_tmp = $_FILES['file']['tmp_name'];  
    if(in_array($ekstensi, $ekstensi_boleh) === true){
        if($size < 1044070){      
      move_uploaded_file($file_tmp, '../assets/img/produk/'.$nama);
      $result = mysqli_query($koneksi, "INSERT INTO produk(nama_produk,deskripsi,harga,stok,ukuran,id_kategori,gambar) VALUES('$nama_produk','$deskripsi','$harga','$stok','$ukuran','$id_kategori','$nama')");
      if($result){
            echo '<script>alert("Berhasil Menambah Produk");window.location.replace("produk.php"); </script>';
      }else{
            echo '<script>alert("Gagal Menambah Produk");window.location.replace("produk.php"); </script>';
      }
        }else{
         echo '<script>alert("Ukuran Gambar Terlalu Besar");window.location.replace("produk.php"); </script>';
        }
         }else{
       echo '<script>alert("Ekstensi tidak diperbolehkan");window.location.replace("produk.php"); </script>';
         }
}

if(isset($_POST['editProduk'])){
  $id_produk=$_POST['id_produk'];
  $nama_produk=$_POST['nama_produk'];
  $deskripsi=$_POST['deskripsi'];
  $harga=$_POST['harga'];
  $stok=$_POST['stok'];
  $ukuran=$_POST['ukuran'];
  $id_kategori=$_POST['id_kategori'];
  if($_FILES['file']['name']==''){
     $result = mysqli_query($koneksi, "UPDATE produk set nama_produk='$nama_produk',deskripsi='$deskripsi',harga='$harga',stok='$stok',ukuran='$ukuran',id_kategori='$id_kategori' where id_produk='$id_produk'");
     echo $result;
    echo '<script>alert("Berhasil Mengupdate Produk");window.location.replace("produk.php"); </script>';
  }
  else{
    $ekstensi_boleh = array('png','jpg','jpeg');
    $nama = $_FILES['file']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];  
    if(in_array($ekstensi, $ekstensi_boleh) === true){
        if($size < 1044070){      
      move_uploaded_file($file_tmp, '../assets/img/produk/'.$nama);
      $result = mysqli_query($koneksi, "UPDATE produk set nama_produk='$nama_produk',deskripsi='$deskripsi',harga='$harga',stok='$stok',ukuran='$ukuran',id_kategori='$id_kategori',gambar='$nama' where id_produk='$id_produk'");
      if($result){
            echo '<script>alert("Berhasil Menambah Produk");window.location.replace("produk.php"); </script>';
      }else{
        echo $result;
            // echo '<script>alert("Gagal Menambah Produk");window.location.replace("produk.php"); </script>';
      }
        }else{
         echo '<script>alert("Ukuran Gambar Terlalu Besar");window.location.replace("produk.php"); </script>';
        }
         }else{
       echo '<script>alert("Ekstensi tidak diperbolehkan");window.location.replace("produk.php"); </script>';
         }
  }
}
?>