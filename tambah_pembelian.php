<?php
    include "koneksi.php";
    session_start();
    if (!$_SESSION ['id']){
        header('location:index.php');
    }
    $query = mysqli_query($conn,'SELECT * FROM detail_pembelian');
    
   
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
            <li><a href="dashboard/index.html">Dashboard</a></li>
            <li><a href="pembelian.php">Pembelian</a></li>
        </ul>
        </div>
    </header>

    <!--content-->
    <div class="section">
        <div class="container">
            <h3>Tambah Data Pembelian</h3>
            <div class="box">
                <form action="proses_tambah_produk.php" method="POST" enctype="multipart/form-data">
                    <select name='id_kategori' class='input-control'>
                        <?php while($kategori = mysqli_fetch_assoc($query)):?>
                            <option value="<?= $kategori['id_kategori']?>"><?= $kategori['nama_kategori']?></option>
                        <?php endwhile ?>
                    </select>
                    <input type="text" name="id_detail_beli" placeholder="Nama Barang" class="input-control" value="">
                    <input type="text" name="id_pembelian" placeholder="Tanggal" class="input-control" value="">
                    <input type="text" name="harga_beli" placeholder="Harga Beli" class="input-control" value="">
                    <input type="submit" name="submit" value="SIMPAN" class="btn"> 
                    
            </div>
            </form>
        </div>
    </div>
</body>
</html>
