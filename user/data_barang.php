<?php
    include "koneksi.php";
    session_start();
    if (!$_SESSION ['id']){
        header('location:login.php');
    }
    $query = mysqli_query($conn,'SELECT * FROM produk');

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
            <li><a href="data_barang.php">Barang</a></li>
            <li><a href="pembelian.php">Pembelian</a></li>
            <li><a href="penjualan.php">Penjualan</a></li>
        </ul>
        </div>
    </header>

    <!--content-->
    <div class="section">
        <div class="container">
            <h3>Data Produk</h3>
            <div class="box">
                <p><a href="tambah-produk.php">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>ID Produk</th>
                            <th>ID Toko</th>
                            <th>ID Kategori</th>
                            <th>Nama Produk</th>
                            <th>Satuan</th>
                            <th>Harga Jual</th>
                            <th>Harga Beli</th>
                            <th>Stok Barang</th>
                            <th width="100px">Aksi</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    while($data_barang = mysqli_fetch_assoc($query)):?>
                        <tr>
                        <th><?php echo $no++ ?></th>
                        <th><?php echo $data_barang["id_produk"] ?></th>
                        <th><?php echo $data_barang["id_toko"] ?></th>
                        <th><?php echo $data_barang["id_kategori"] ?></th>
                        <th><?php echo $data_barang["nama_produk"] ?></th>
                        <th><?php echo $data_barang["satuan"] ?></th>
                        <th><?php echo $data_barang["harga_jual"] ?></th>
                        <th><?php echo $data_barang["harga_beli"] ?></th>
                        <th><?php echo $data_barang["stok"]?></th>
                        <td>
                                <a href="./proses/edit_barang.php?id_produk=<?php echo $data_barang['id_produk'] ?>">Edit</a>||<a href="./proses/hapus_barang.php?id=<?php echo $data_barang['id_produk'] ?>" onclick="return confirm('Anda yakin ingin menghapus data ini??')">Hapus</a>
                            </td>
                        
                        </tr>
                    <?php endwhile ?>
                    
                   
                    
</tbody>
    
</body>
</html>