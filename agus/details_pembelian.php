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
<link href="assets//css/bootstrap.min.css" rel="stylesheet">



    <style>
  
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: url("bandung.jpg");
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      body{
        background-color: #grey;
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="asset/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
  
    </li>
  </ul>
</nav>
        <div class="card mt-2">
	<div class="card-body">
		
    <?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $PelangganID = $_POST['PelangganID'];
  $PenjualanID = $_POST['PenjualanID'];
  $ProdukID = $_POST['ProdukID'];
  $JumlahProduk = $_POST['JumlahProduk'];

  // Calculate Subtotal based on your business logic
  $Subtotal = calculateSubtotal($ProdukID, $JumlahProduk);

  // Insert data into tb_detailpenjualan
  $insertQuery = "INSERT INTO tb_detailpenjualan (PenjualanID, ProdukID, JumlahProduk, Subtotal) VALUES ('$PenjualanID', '$ProdukID', '$JumlahProduk', '$Subtotal')";
  mysqli_query($connection, $insertQuery);

  // Redirect back to your original page
  header("Location: pembelian.php");
  exit();
}

function calculateSubtotal($ProdukID, $JumlahProduk) {
  // Implement your logic to calculate Subtotal based on ProdukID and JumlahProduk
  // You may need to fetch the product price from the database and calculate the subtotal
  // For example:
  // $product = mysqli_query($connection, "SELECT Harga FROM produk WHERE ProdukID = '$ProdukID'");
  // $productData = mysqli_fetch_assoc($product);
  // $subtotal = $productData['Harga'] * $JumlahProduk;
  // return $subtotal;
}
?>

				<!-- Inside the existing form or create a new one -->
<form method="post" action="tambah_data_detailpenjualan.php">
  <div class="form-group">
    <label for="ProdukID">Produk:</label>
    <select name="ProdukID" class="form-control">
      <!-- Populate options from your database -->
      <?php
        include 'koneksi.php';
        $produkQuery = mysqli_query($connection, "SELECT * FROM produk");
        while ($row = mysqli_fetch_assoc($produkQuery)) {
          echo "<option value='" . $row['ProdukID'] . "'>" . $row['NamaProduk'] . "</option>";
        }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="JumlahProduk">Jumlah Produk:</label>
    <input type="number" name="JumlahProduk" class="form-control" required>
  </div>
  <input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
  <input type="text" name="PenjualanID" value="<?php echo $d['PenjualanID']; ?>" hidden>
  <button type="submit" class="btn btn-primary">Tambah Data</button>
</form>

				<table class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Produk</th>
							<th>Jumlah Beli</th>
							<th>Total Harga</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						include 'koneksi.php';
						$nos = 1;
						$detailpenjualan = mysqli_query($connection,"SELECT * FROM detailpenjualan");
						while($d_detailpenjualan = mysqli_fetch_array($detailpenjualan)){
							?>
							<?php 
							if ($d_detailpenjualan['PenjualanID'] == $d['PenjualanID']) { ?>
								<tr>
									<td><?php echo $nos++; ?></td>
									<td>
										<form action="simpan_barang_beli.php" method="post">
											<div class="form-group">
												<input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
												<input type="text" name="DetailID" value="<?php echo $d_detailpenjualan['DetailID']; ?>" hidden>
												<select name="ProdukID" class="form-control" onchange="this.form.submit()">
													<option>--- Pilih Produk ---</option>
													<?php 
													include 'koneksi.php';
													$no = 1;
													$produk = mysqli_query($connection,"SELECT * FROM produk");
													while($d_produk = mysqli_fetch_array($produk)){
														?>
														<option value="<?php echo $d_produk['ProdukID']; ?>" <?php if ($d_produk['ProdukID']==$d_detailpenjualan['ProdukID']) { echo "selected"; } ?>><?php echo $d_produk['NamaProduk']; ?></option>
													<?php } ?>
												</select>
											</div>
										</form>
									</td>
									<td>
										<form method="post" action="hitung_subtotal.php">
											<?php 
											include 'koneksi.php';
											$produk = mysqli_query($connection,"SELECT * FROM produk");
											while($d_produk = mysqli_fetch_array($produk)){
												?>
												<?php 
												if ($d_produk['ProdukID']==$d_detailpenjualan['ProdukID']) { ?>
													<input type="text" name="Harga" value="<?php echo $d_produk['Harga']; ?>" hidden>
													<input type="text" name="ProdukID" value="<?php echo $d_produk['ProdukID']; ?>" hidden>
													<input type="text" name="Stok" value="<?php echo $d_produk['Stok']; ?>" hidden>
													<?php 
												}
											}
											?>
											<div class="form-group">
												<input type="number" name="JumlahProduk" value="<?php echo $d_detailpenjualan['JumlahProduk']; ?>" class="form-control">
											</div>
										</td>
										<td><?php echo $d_detailpenjualan['Subtotal']; ?></td>
										<td>
											<input type="text" name="DetailID" value="<?php echo $d_detailpenjualan['DetailID']; ?>" hidden>
											<input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
											<button type="submit" class="btn btn-warning btn-sm">Proses</button>
										</form>
										<form method="post" action="hapus_detail_pembelian.php">
											<input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
											<input type="text" name="DetailID" value="<?php echo $d_detailpenjualan['DetailID']; ?>" hidden>
											<button type="submit" class="btn btn-danger btn-sm">Hapus</button>
										</form>
									</td>
								</tr>
							<?php } else {
								?>
								<?php 
							}
						} 
						?>
					</tbody>
				</table>
				<form method="post" action="simpan_total_harga.php">
					<?php 
					include 'koneksi.php';
					$detailpenjualan = mysqli_query($connection, "SELECT SUM(Subtotal) AS TotalHarga FROM detailpenjualan WHERE 	PenjualanID='$d[PenjualanID]'"); 
					$row = mysqli_fetch_assoc($detailpenjualan); 
					$sum = $row['TotalHarga'];
					?>
					<div class="row">
						<div class="col-sm-10">
							<div class="form-group">
								<input type="text" class="form-control" name="TotalHarga" value="<?php echo $sum; ?>">
								<input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
								<input type="text" name="PenjualanID" value="<?php echo $d['PenjualanID']; ?>" hidden>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<button class="btn btn-info btn-sm form-control" type="submit">Simpan</button>
								
							</div>
						</div>
					</div>
				</form>
			<?php 
			
		
		?>		
	</div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
        <script src="asset/js/dashboard.js"></script>
  </body>
</html>