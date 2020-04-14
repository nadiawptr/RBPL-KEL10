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
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahKategori">
  Tambah Kategori
</button>

<!-- Modal -->
<div class="modal fade" id="tambahKategori" tabindex="-1" role="dialog" aria-labelledby="tambahKategoriLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <label>Nama Kategori : </label>
          <input type="text" name="nama_kategori" required>
          <button type="submit" class="btn btn-success" name="submitKategori">Tambah</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


           <h4><br>List Kategori</h4>

           <table class="table">
              <thead>
              <th>No.</th>
              <th>Nama Kategori</th>
              <th>Action</th>
              </thead>
              <tbody>
           <?php
           $data=mysqli_query($koneksi,"select * from kategori");
           $cek= mysqli_num_rows($data);
           if($cek>0){
              $list_kategori = array();
              while ($row = mysqli_fetch_assoc($data)) {
              $list_kategori[] = $row;
               }
               $i=1;
               foreach ($list_kategori as $row) {
                 ?>
                 <tr>
                  <td><?=$i?></td>
                  <td><?=$row['nama_kategori']?></td>
            <td>
                 <button type="button" class="btn btn-primary" style="width: 20%"  data-toggle="modal" data-target="#editKategori<?=$i?>">Edit</button>

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
        <form method="post" action="">
          <label>Nama Kategori : </label>
          <input type="hidden" name="id_kategori" value="<?=$row['id_kategori']?>">
          <input type="text" name="nama_kategori" value="<?=$row['nama_kategori']?>" required>
          <button type="submit" class="btn btn-primary" name="editKategori">Update</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


                 <a href="delete-kategori.php?id=<?=$row['id_kategori']?>"><button type="button" class="btn btn-danger" style="width: 30%">Hapus</button></a>
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
if(isset($_POST['submitKategori'])){
  $nama_kategori=$_POST['nama_kategori'];
  $result = mysqli_query($koneksi, "INSERT INTO kategori(nama_kategori) VALUES('$nama_kategori')");
    echo '<script>alert("Berhasil Menambah Kategori");window.location.replace("kategori.php"); </script>';
}

if(isset($_POST['editKategori'])){
  $nama_kategori=$_POST['nama_kategori'];
  $id_kategori=$_POST['id_kategori'];
  $result = mysqli_query($koneksi, "UPDATE kategori set nama_kategori='$nama_kategori' where id_kategori='$id_kategori'");
    echo '<script>alert("Berhasil Mengupdate Kategori");window.location.replace("kategori.php"); </script>';
}
?>