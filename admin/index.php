
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
  if($_SESSION['status']=='not_login' || !isset($_SESSION['id_admin'])){
  header("Location: login.php");
}
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
      <p>
        Halo    <?=$_SESSION['username'];?>
<br><br>
Dari dasbor akun Anda, Anda dapat melihat pesanan terbaru, edit kata sandi,dan edit detail akun Anda
      </p>
      <div class="row">
        <div class="col-md-6">
          <a href="kategori.php"><button type="button" class="btn btn-white shadow p-3 mb-5 rounded form-control" style="height: 70px">List Kategori</button></a>
        </div>
        <div class="col-md-6">
          <a href="produk.php"><button type="button" class="btn btn-white shadow p-3 mb-5 rounded form-control" style="height: 70px">List Produk</button></a>
        </div>
          <div class="col-md-6">
          <a href="detail-akun.php"><button type="button" class="btn btn-white shadow p-3 mb-5 rounded form-control" style="height: 70px">Detail Akun</button></a>
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