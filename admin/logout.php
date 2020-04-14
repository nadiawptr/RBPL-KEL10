<?php 
// mengaktifkan session

session_start();

// menghapus semua session

session_destroy();

header("Location: /admin/login.php");
 ?>