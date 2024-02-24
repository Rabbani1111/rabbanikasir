<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$PelangganID = $_POST['PelangganID'];
$NamaPelanggan = $_POST['NamaPelanggan'];
$NomorTelpon = $_POST['NomorTelpon'];
$Alamat = $_POST['Alamat'];
$TanggalPenjualan= $_POST ["TanggalPenjualan"];
 
// menginput data ke database
$query =mysqli_query($connection,"INSERT INTO pelanggan VALUES ('$PelangganID','$NamaPelanggan','$NomorTelpon','$Alamat')");
$query =mysqli_query($connection,"INSERT INTO penjualan VALUES ('','$TanggalPenjualan','','$PelangganID')");
    if(!empty($query)){
        echo '<script>
            alert("Data ditambahkan");
            window.location="penjualan.php";
            </script>'; 
    }
            ?>