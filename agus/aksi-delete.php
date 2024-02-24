<?php
include 'koneksi.php';
if(isset($_GET['ProdukID'])){
    $id = $_GET['ProdukID'];

    $query = "DELETE FROM produk WHERE ProdukID='$id'";
    $result = mysqli_query($connection,$query);
}
?>
<script>
    alert('Berhasil Menghapus Data');
location.href="dashboard.php?page=produk";
</script>