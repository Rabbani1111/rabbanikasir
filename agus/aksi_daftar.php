<?php 
session_start();
include "koneksi.php";


$nama_petugas = $_POST['NamaLengkap'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

//cek data
$sql = "INSERT INTO petugas VALUES ('','$nama_petugas','$username', '$password','$level')";
$qry = mysqli_query($connection,$sql);


if(!empty($sql))
{
 $_SESSION['id_petugas']   = $usr['id_petugas'];
 $_SESSION['nama_petugas'] = $usr['nama_petugas'];
 $_SESSION['username'] = $usr['username'];
 $_SESSION['password']     = $usr['password'];
 $_SESSION['level']     = $usr['level'];
 $pesan = "Registrasi Berhasil, Silahkan Loginn!!";
}
else {
    $pesan = "Registrasi Gagal";
}
?>
<script>
 alert('<?php echo $pesan;?>');
 location='index.php';
</script>