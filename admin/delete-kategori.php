<?php 
include '../db/koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM kategori WHERE id_kategori='$id'")or die(mysql_error());
header("Location:kategori.php");
?>