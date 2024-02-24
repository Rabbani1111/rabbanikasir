<?php 
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$Stok = $_POST['Stok'];
$ProdukID = $_POST['ProdukID'];
$JumlahProduk = $_POST['JumlahProduk'];
$Harga = $_POST['Harga'];
$DetailID = $_POST['DetailID'];
$PelangganID = $_POST['PelangganID'];
$SubTotal = $JumlahProduk * $Harga;
$Stok_total = $Stok - $JumlahProduk;

// menginput data ke database

mysqli_query($connection,"update detailpenjualan set SubTotal='$SubTotal', JumlahProduk='$JumlahProduk' where DetailID='$DetailID'");
mysqli_query($connection,"update produk set Stok='$Stok_total' where ProdukID='$ProdukID'");

// mengalihkan halaman kembali ke detail_pembelian.php
header("location:pembelian.php?PelangganID=$PelangganID");
?>