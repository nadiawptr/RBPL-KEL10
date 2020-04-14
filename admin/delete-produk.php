<?php 
include '../db/koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM produk WHERE id_produk='$id'")or die(mysql_error());
header("Location:produk.php");
?>