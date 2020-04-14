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
           <a href="pesanan.php" class="custom-font"> List Produk </a>
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
        <?php
$id_admin=$_SESSION['id_admin'];
$data = mysqli_query($koneksi,"select * from admin where id_admin='$id_admin'");
$user_data = mysqli_fetch_array($data);
?>
    <div class="col-md-8">
      <form method="post" action="">
        <div class="row"> 
           <div class="col-md-3">
                 Username
            </div>
            <div class="col-md-8">
            <input type="text" name="username" class="form-control" value="<?=$user_data['username']?>" required>
            </div>
             <div class="col-md-3 custom-margin">
                 Password
            </div>
            <div class="col-md-8">
            <input type="password" name="password" class="form-control custom-margin">
            </div>
             <div class="col-md-3 custom-margin" >
                 Confirm Password
            </div>
            <div class="col-md-8">
            <input type="password" name="confirm" class="form-control custom-margin" >
            </div>
            <div class="col-md-3 custom-margin" >
                 No. Whatsapp
            </div>
            <div class="col-md-8">
            <input type="text" name="no_wa" class="form-control custom-margin" value="<?=$user_data['no_wa']?>" required>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-6 custom-margin" >
              <input type="submit" name="submit" value="Update" class="btn btn-black">
            </div>
            <div class="col-md-3"></div>
        </div>
      </form>
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
if(isset($_POST['submit'])){
  $id_admin=$_SESSION['id_admin'];
  $username=$_POST['username'];
  $no_wa=$_POST['no_wa'];
  if($_POST['password']==''){
     $_SESSION['username']=$username;
    $data = mysqli_query($koneksi,"UPDATE admin SET username='$username',no_wa='$no_wa' WHERE id_admin='$id_admin'");
    echo '<script>alert("Berhasil update!");window.location.replace("detail-akun.php"); </script>';
  }
  else{
    $password=$_POST['password'];
    $confirm=$_POST['confirm'];
    if($password!=$confirm){
    echo '<script>alert("Password tidak sama");window.location.replace("detail-akun.php"); </script>';
    }
    else{
       $_SESSION['username']=$username;
      $data = mysqli_query($koneksi,"UPDATE admin SET username='$username',password='$password',no_wa='$no_wa' WHERE id_admin='$id_admin'");
    echo '<script>alert("Berhasil update!");window.location.replace("detail-akun.php"); </script>';

    }
  }
}
?>