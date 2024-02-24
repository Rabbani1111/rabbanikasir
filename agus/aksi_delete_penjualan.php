<?php
include 'koneksi.php';
if(isset($_GET['PelangganID'])){
    $id = $_GET['PelangganID'];

    $query = "DELETE FROM pelanggan WHERE PelangganID='$id'";
    $result = mysqli_query($connection,$query);
}
?>
<script>
    alert('Berhasil Menghapus Data');
location.href="penjualan.php?page=pelanggan";
</script>