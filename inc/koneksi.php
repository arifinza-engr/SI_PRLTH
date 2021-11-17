<?php
$koneksi = new mysqli("localhost", "root", "", "db_prutlah");

// Check connection 
if ($koneksi->connect_error) {
   die("Connection failed: " . $koneksi->connect_error);
}
?>

<!-- end -->