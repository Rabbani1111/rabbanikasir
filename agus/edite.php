<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Signin Template · Bootstrap v4.6</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <?php include 'koneksi.php';
        $PelangganID= $_GET['PelangganID'];
        $tampil_data=mysqli_query($connection,"SELECT * FROM pelanggan WHERE PelangganId='$PelangganID'");
        while($row=mysqli_fetch_array($tampil_data)){
            ?>
<form class="form-signin" method="post" action="proses_edit.php">
  <img class="mb-4" src="assets/img/kasir.PNG" alt="" width="72" height="72">
  <h2 class="h3 mb-3 font-weight-normal">Silahkan EDIT</h2>

  <input type="hidden" name="PelangganID" value="<?php echo $row['PelangganID'];?>">
  <label for="inputEmail" class="sr-only">Nama Pelanggan</label>
  <input type="text" id="text" name="InputNamaPelanggan" value="<?php echo $row['NamaPelanggan']; ?>" name="NamaPelanggan" class="form-control" placeholder="NamaPelanggan" required autofocus>
  <label for="inputPassword" class="sr-only">Alamat</label>
  <input type="text" id="text" name="Alamat" value="<?php echo $row['Alamat']; ?>" name="Alamat" class="form-control" placeholder="Alamat" required autofocus>
  <label for="inputPassword" class="sr-only">NomorTelpon</label>
  <input type="text" id="text" name="NomorTelpon" value="<?php echo $row['NomorTelpon']; ?>" name="NomorTelpon" class="form-control" placeholder="NomorTelpon" required autofocus>
  <label for="inputPassword" class="sr-only">Alamat</label>
  <input type="text" id="text" name="Alamat" value="<?php echo $row['Alamat']; ?>" name="Alamat" class="form-control" placeholder="Alamat" required autofocus>
  
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <p><button class="btn btn-lg btn-primary btn-block" type="submit">EDIT</button></p>
  <p class="mt-5 mb-3 text-muted">&copy; 2023-2025</p>
</form>   
<?php
        }
        ?>
  </body>
</html>
