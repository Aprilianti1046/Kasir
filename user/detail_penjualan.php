<?php
    include "koneksi.php";
    session_start();
    if (!$_SESSION ['id']){
        header('location:index.php');
    }
    $query = mysqli_query($conn,'SELECT * FROM detail_penjualan');
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
            <li><a href="detail_penjualan.php">Detail Penjualan</a></li>
        </ul>
        </div>
    </header>

    <!--content-->
    <div class="section">
        <div class="container">
            <h3>Detail Penjualan</h3>
            <div class="box">
            <p><a href="tambah_detailpenjualan.php">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>ID Produk</th>
                            <th>ID Penjualan</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th width="100px">Aksi</th>
                        </tr>
                        </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    while($detail_penjualan = mysqli_fetch_assoc($query)):?>
                        <tr>
                        <th><?php echo $no++ ?></th>
                        <th><?php echo $detail_penjualan["id_produk"] ?></th>
                        <th><?php echo $detail_penjualan["id_penjualan"] ?></th>
                        <th><?php echo $detail_penjualan["harga_beli"] ?></th>
                        <th><?php echo $detail_penjualan["harga_jual"] ?></th>
                       
                        <td>

                        
                            <a href="./proses/edit_penjualan.php?id=<?php echo $detail_penjualan['id_penjualan'] ?>">Edit</a>||<a href="./proses/hapus_penjualan.php?id=<?php echo $detail_penjualan['id_penjualan'] ?>" onclick="return confirm('Anda yakin ingin menghapus data ini??')">Hapus</a>
                        </td>
                        
                        </tr>
                    <?php endwhile ?>
                    
                    </thead>
                    <tbody>
    
</body>
</html>