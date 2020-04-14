<!DOCTYPE html>
<html>
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
<body style="background-color: #333">
  <?php
  include '../header.php';
  ?>
<div class="container">
	<div class="row" style="margin-top: 5%">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="card">
 				 <div class="card-header">
    				<h3 class="text-center">Admin Login</h3>
  				 </div>
  			<div class="card-body">
    		<form action="" method="post">
    		<label>Username</label>
    		<input type="text" name="username" class="form-control">
    		<label>Password</label>
    		<input type="password" name="password" class="form-control"><br>
    		<input type="submit" name="login" value="Login" class="form-control btn btn-black">
    		</form>
  			</div>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>
</body>
</html>

<?php


if(isset($_POST['login'])){

$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data user dengan email dan password yang sesuai
$data = mysqli_query($koneksi,"select * from admin where username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
if($cek > 0){
  echo '<script>alert("Login Berhasil");window.location.replace("index.php");</script>';
  $user_data = mysqli_fetch_array($data);
  $_SESSION['id_admin'] = $user_data['id_admin'];
  $_SESSION['username'] = $user_data['username'];
  $_SESSION['status'] = "login";
}else{
  echo '<script>alert("Login Gagal");window.location.replace("login.php");</script>';

}
}
?>