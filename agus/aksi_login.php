<?php 
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

//cek data
$sql = "SELECT * FROM petugas WHERE username='$username' ";
$qry = mysqli_query($connection,$sql);
$usr = mysqli_fetch_array($qry);

if( 
 md5($username) == md5($usr['username'])
 AND
 md5($password) == md5($usr['password'])
  )
{
 $_SESSION['id_petugas']   = $usr['id_petugas'];
 $_SESSION['nama_petugas'] = $usr['nama_petugas'];
 $_SESSION['username']     = $usr['username'];
 $_SESSION['level']     = $usr['level'];
 $_SESSION['login']    = 1;
 $pesan = "Login berhasil, selamat datang $username";
} else {
 $pesan1 = "Login gagal, Silahkan Masukan Kembali Username Atau Password Anda!";
}

?>
<script>
 alert('<?php echo $pesan;?>');
 location='tampilan.php';
</script>
<script>
 alert('<?php echo $pesan1;?>');
 location='index.php';
</script>