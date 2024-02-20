<?php
     include "koneksi.php";
     session_start();
     if (!$_SESSION ['id']){
        header('location:index.php');
    }
    $query = mysqli_query($conn,'SELECT * FROM pembelian');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dekorasi.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>
    <!--header-->
    <header>
        <div class="container">
        <h1><a href="dashboard.php">Kampuh Jaya</a></h1>
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="pembelian.php">Pembelian</a></li>
        </ul>
        </div>
    </header>

    <!--content-->
    <div class="section">
        <div class="container">
            <h3>Data Pembelian Barang</h3>
            <div class="box">
                <p><a href="tambah_pembelian.php">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>ID Pembelian</th>
                            <th>ID Toko</th>
                            <th>ID User</th>
                            <th>ID Suplier</th>
                            <th>No Faktur</th> 
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Bayar</th>
                            <th>Sisa</th>   
                            <th>Keterangan</th>           
                            <th width="100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    while($pembelian = mysqli_fetch_assoc($query)):?>
                        <tr>
                        <th><?php echo $no++ ?></th>
                        <th><?php echo $pembelian["id_pembelian"] ?></th>
                        <th><?php echo $pembelian["id_toko"] ?></th>
                        <th><?php echo $pembelian["id_user"] ?></th>
                        <th><?php echo $pembelian["id_suplier"] ?></th>
                        <th><?php echo $pembelian["no_faktur"] ?></th>
                        <th><?php echo $pembelian["tanggal_pembelian"] ?></th>
                        <th><?php echo $pembelian["total"] ?></th>
                        <th><?php echo $pembelian["bayar"] ?></th>
                        <th><?php echo $pembelian["sisa"] ?></th>
                        <th><?php echo $pembelian["keterangan"] ?></th>
                       
                        <td>

                        
                            <a href="./proses/edit_pelanggan.php?id=<?php echo $data_pelanggan['id_pelanggan'] ?>">Edit</a>||<a href="./proses/hapus_pelanggan.php?id=<?php echo $data_pelanggan['id_pelanggan'] ?>" onclick="return confirm('Anda yakin ingin menghapus data ini??')">Hapus</a>
                        </td>
                        
                        </tr>
                    <?php endwhile ?>
                    
</tbody>
    
</body>
</html>