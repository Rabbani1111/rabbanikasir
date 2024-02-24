<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Dashboard Template · Bootstrap v4.6</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">



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
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    


<div class="table-responsive">
  <a href="tampilan.php" class="btn btn-success "style="margin-left: 500px;">Beranda</a>
  <a href="penjualan.php" class="btn btn-success "style="">Data Pelanggan</a>
  <a href="stok.php" class="btn btn-success "style="">Stok Barang</a>
  <a href="logout.php" class="btn btn-danger "style="">Keluar</a>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Barang</h1>  
      </div>

    
   <div class="card mt-2">
        <div class="card-body">
         
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              <a href="tambahdata.php" class="btn btn-primary ">Tambah Data</a>
            </a>
      
          
    </div>
  </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>NO</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Stok Barang</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            
          <?php
      include 'koneksi.php';
      $tampil_data=mysqli_query($connection,"SELECT * FROM produk");
      $no=0;
      while($row=mysqli_fetch_array($tampil_data)){
      $no++
      ?>
          <tr>
          <td><?php echo $no?></td>
          <!--<?php echo $row['PenjualanID']?></td>-->
          <td><?php echo $row['NamaProduk']?></td>
          <td><?php echo $row['Harga']?></td>
          <td><?php echo $row['Stok']?></td>
          <td><a class="btn btn-primary" href="edit_produk.php?ProdukID=<?php echo $row['ProdukID']?>">EDIT</a>
          <a class="btn btn-outline-success" href="aksi-delete.php?ProdukID=<?php echo $row['ProdukID']?>">HAPUS</a></td></td>
      </tr>
      </tbody>
      <?php
      }
      ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
        <script src="dashboard.js"></script>
  </body>
