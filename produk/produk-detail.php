<?php
if(!isset($_GET['id']) || $_GET['id']==''){
  header("Location: ../index.php");
}
?>
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
  $id_produk=$_GET['id'];
  $data=mysqli_query($koneksi,"select * from produk join kategori on produk.id_kategori=kategori.id_kategori where id_produk='$id_produk'");
   $cek= mysqli_num_rows($data);
   $avail_stok=0;
   if($cek>0){
$produk_data = mysqli_fetch_array($data);
$ukuran=explode(',', $produk_data['ukuran']);
  ?>


<div class="container" style="margin-bottom: 5%;margin-top: 5%">
  <div class="row">
    <div class="col-md-6" style="margin-top: 5%">
        <!--Carousel Wrapper-->
    <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
      <!--Slides-->
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img class="d-block w-100" src="/assets/img/produk/<?=$produk_data['gambar']?>" alt="First slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      <ol class="carousel-indicators">
        <li data-target="#carousel-thumb" data-slide-to="0" class="active"></li>
      </ol>
    </div>
    </div>
    <div class="col-md-6" style="padding: 3%">
      <a href="#" style="color:grey">Beranda / <?=$produk_data['nama_kategori']?></a>
      <h3> <?=$produk_data['nama_produk']?></h3><hr>
      <h4>Rp <?=number_format($produk_data['harga'])?></h4>
      <h5>Sisa Stok : 
        <?php
        $tmp=$produk_data['stok'];
        if($tmp==0){
          echo 'Kosong';
        }
        else{
          echo $tmp;
        }
        ?>
      </h5><br>
      <div class="row">
        <div class="col-md-3">
          <label >Ukuran Tersedia</label>
        </div>
        <div class="col-md-9">
      
      <select class="form-control" name="ukuran">
        <?php
        $avail_stok+=$produk_data['stok'];
        foreach ($ukuran as $row) {
          ?>
<option value="<?=$row?>"><?=$row?></option>
          <?php
        }
        ?> 
      </select>
        </div>
      </div>
      <div class="row" style="margin-top: 5%">
        <div class="col-md-3">
          <?php
          if($tmp==0){
            echo 'Maaf stok belum tersedia';
          }
          else{
            ?>
          <a href="https://api.whatsapp.com/send?phone=<?=$data_wa['no_wa']?>&text=Hai%2C%20saya%20Alfina%20admin%20happyto.buy.%0A%20%0ASebelumnya%20tolong%20hati-hati%20dalam%20transaksi%2C%20happyto.buy%20hanya%20punya%201%20rekening%20asli%20yaitu%20BANK%20MANDIRI%20atas%20nama%20ALFINA%20SHAHIRA%20PUTRI.%0A%0ASilakan%20diisi%20format%20order%20berikut%3A%0A%0ANama%3A%20%0AAlamat%20lengkap%3A%20%0ANo%20hp%3A%20%0ANama%20produk%20%2F%20size%20%2F%20warna%3A%20%0A%0A%0APengiriman%20pakai%20JNT%20%2F%20sicepat"><button type="button" class="btn btn-primary form-control" name="submit">Beli</button></a>
            <?php
          }
          ?>
        </div>
      </div>
      <hr>
      <p>Kategori : <?=$produk_data['nama_kategori']?></p>
      <hr>
    </div>
  </div>
  <hr>
   <h3 class="text-center" style="margin-top:2%">Deskripsi</h3>
  <div class="row" style="margin-top:5%">
    <div class="col-md-12">
      <p>
<?=$produk_data['deskripsi']?>
      </p>
    </div>
  </div>
  <?php
}
else{
  header("Location: ../index.php");
}
  ?>
 <hr>
 <h3 class="text-center" style="margin-top:2%">Produk Lainnya</h3>
 <div class="row">
  <?php
  $data=mysqli_query($koneksi,"select id_kategori from produk where id_produk='$id_produk'");
  $kategori = mysqli_fetch_array($data);
  $id_kategori=$kategori['id_kategori'];
  $data=mysqli_query($koneksi,"select * from produk join kategori on produk.id_kategori=kategori.id_kategori where produk.id_kategori='$id_kategori' and id_produk!='$id_produk'");
  $cek= mysqli_num_rows($data);
            if($cek>0){
              $list_produk = array();
              while ($row = mysqli_fetch_assoc($data)) {
              $list_produk[] = $row;
            }
            foreach ($list_produk as $row) {
              ?>
   <div class="col-md-3">
     <div class="card">
      <img src="/assets/img/produk/<?=$row['gambar']?>" class="card-img-top" alt="...">
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
            echo '<h6 class="text-center">There are no other products in this category</h6>';
          }
  ?>
 </div>
</div>


<?php
include '../footer.php';
?>
<script src="/assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>