<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$NamaProduk = $_POST['NamaProduk'];
$Harga = $_POST['Harga'];
$Stok = $_POST['Stok'];
 
// menginput data ke database
mysqli_query($connection,"INSERT INTO produk VALUES('','$NamaProduk','$Harga','$Stok')");
 
// mengalihkan halaman kembali ke index.php
header("location:dashboard.php");
 
?>