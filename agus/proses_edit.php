<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$PelangganID = $_POST['PelangganID'];
$NamaPelanggan = $_POST['InputNamaPelanggan'];
$Alamat = $_POST['Alamat'];
$NomorTelpon = $_POST['NomorTelpon'];

 
// menginput data ke database
$query =mysqli_query($connection,"UPDATE pelanggan SET NamaPelanggan='$NamaPelanggan', Alamat='$Alamat', NomorTelpon='$NomorTelpon' WHERE PelangganID='$PelangganID'");
    if(!empty($query)){
        echo '<script>
            alert("Data diubah");
            window.location="penjualan.php";
            </script>'; 
    }
            ?>