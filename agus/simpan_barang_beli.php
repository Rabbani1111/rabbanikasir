<?php 
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$ProdukID = $_POST['ProdukID'];
$DetailID = $_POST['DetailID'];
$PelangganID = $_POST['PelangganID'];

// menginput data ke database

mysqli_query($connection,"update detailpenjualan set ProdukID='$ProdukID' where DetailID='$DetailID'");

// mengalihkan halaman kembali ke detail_pembelian.php
header("location:tambah_penjualan.php?PelangganID=$PelangganID");
?>