
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

<div class="container" style="margin-bottom: 5%;margin-top: 5%">
  <div class="row">
    <div class="col-md-2">
      <div class="row">
        <div class="col-md-12">
          <h3>Browse</h3>
          <hr style="width: 30%;float: left;margin-top: 0%">
        </div>
        <?php
          $data=mysqli_query($koneksi,"select * from kategori order by nama_kategori ASC");
          $cek= mysqli_num_rows($data);
          if($cek>0){
            $list_kategori = array();
              while ($row = mysqli_fetch_assoc($data)) {
              $list_kategori[] = $row;
               }
               $id_kategori=$list_kategori[0]['id_kategori'];
               foreach ($list_kategori as $row) {
                 ?>
        <div class="col-md-12">
          <p><?=$row['nama_kategori']?></p>
          <hr>
        </div>
                 <?php
               }
          }
          else{
            echo 'Belum ada kategori';
          }
        ?>
      </div>
    </div>
    <div class="col-md-10">
      <div class="row">

        <?php
        if(isset($_GET['id_kategori']) && $_GET['id_kategori']!=''){
          $id_kategori=$_GET['id_kategori'];
        }
          $data=mysqli_query($koneksi,"select * from produk join kategori on produk.id_kategori=kategori.id_kategori where produk.id_kategori='$id_kategori' order by produk.id_kategori ASC ");
           $cek= mysqli_num_rows($data);
           if($cek>0){
            $list_produk = array();
              while ($row = mysqli_fetch_assoc($data)) {
              $list_produk[] = $row;
               }
               foreach ($list_produk as $row) {
                 ?>
        <div class="col-md-4">
          <div class="card" >
             <a href="produk-detail.php?id=<?=$row['id_produk']?>"><img src="/assets/img/produk/<?=$row['gambar']?>" class="card-img-top" alt="..."></a>
                  <div class="card-body">
              <p class="card-text text-center">
              <span style="color: #333;font-size: 90%"><?=$row['nama_kategori']?></span><br><?=$row['nama_produk']?><br><b>Rp <?=number_format($row['harga'])?></b>
              </p>
                </div>
            </div>
        </div>
                 <?php
               }
           }
           else{
            echo 'No available products on this category';
           }
        ?>
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