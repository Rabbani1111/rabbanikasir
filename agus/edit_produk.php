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
      $id=$_GET['ProdukID'];
        $tampil_data=mysqli_query($connection,"SELECT * FROM produk WHERE ProdukID='$id'");
        while($row=mysqli_fetch_array($tampil_data)){
            ?>
<form class="form-signin" method="post" action="proses_edit_produk.php">
  <img class="mb-4" src="assets/img/kasir.PNG" alt="" width="72" height="72">
  <h2 class="h3 mb-3 font-weight-normal">Silahkan EDIT</h2>

  <label for="inputEmail" class="sr-only">NamaProduk</label>
  <input type="hidden" id="text" name="ProdukID" value="<?php echo $row['ProdukID']; ?>" class="form-control" name="NamaProduk" placeholder="NamaProduk" required autofocus>
  <input type="text" id="text" name="NamaProduk" value="<?php echo $row['NamaProduk']; ?>" class="form-control" name="NamaProduk" placeholder="NamaProduk" required autofocus>
  <label for="inputPassword" class="sr-only">Harga</label>
  <input type="text" id="text" name="Harga" value="<?php echo $row['Harga']; ?>" class="form-control" name="Harga" placeholder="Harga" required autofocus>
  <label for="inputStok" class="sr-only">Stok</label>
  <input type="number" id="text" name="Stok" value="<?php echo $row['Stok']; ?>" class="form-control" name="Stok" placeholder="Stok" required autofocus>
  
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
