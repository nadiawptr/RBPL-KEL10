  
<?php
include 'db/koneksi.php';
session_start();
$data = mysqli_query($koneksi,"select no_wa from admin where id_admin='1'");
$data_wa = mysqli_fetch_array($data);
?>

  <nav class="navbar navbar-expand-lg shadow-sm bg-white rounded" style="height: 80px">
  <a class="navbar-brand" href="/" style="width: 5%;margin-left: 10%"><img src="/assets/img/logo.jpeg" style="width: 100%"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link custom-font" href="/" >Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link custom-font" href="/produk">Produk</a>
      </li>
    </ul>
  </div>
</nav>
