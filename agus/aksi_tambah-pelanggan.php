<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['PelangganID'];
$NamaPelanggan = $_POST['NamaPelanggan'];
$Alamat = $_POST['Alamat'];
$NomorTelpon = $_POST['NomorTelpon'];
 
// menginput data ke database
mysqli_query($connection,"INSERT INTO pelanggan VALUES('$id','$NamaPelanggan','$Alamat','$NomorTelpon')");
 
// mengalihkan halaman kembali ke index.php
header("location:pembelian.php");
 
?>