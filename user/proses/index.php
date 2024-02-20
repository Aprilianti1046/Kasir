<?php
    include "koneksi.php";
    session_start();
    $query = mysqli_query($conn,'SELECT * FROM kategori_produk');
    $query1 = mysqli_query($conn, 'SELECT * FROM users');
    $query2 = mysqli_query($conn, 'SELECT * FROM produk');
    $query3 = mysqli_query($conn, 'SELECT * FROM toko');
    $query4 = mysqli_query($conn, 'SELECT * FROM produk');
    $query5 = mysqli_query($conn, 'SELECT * FROM pelanggan');
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
            <li><a href="data_pelanggan.php">Pelanggan</a></li>
            <li><a href="pembelian.php">Pembelian</a></li>
            <li><a href="penjualan.php">Penjualan</a></li>
            <li><a href="stok_barang.php">Stok Barang</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
        </div>
    </header>

    <!--content-->
    <div class="section">
        <div class="container">
            <div class="box">
                <form action="menampilkan.php" method="POST" enctype="multipart/form-data">
                    <!--petugas-->
                    <div class='' style='display:flex;flex-wrap:wrap;gap:3em'>
                        <div>
                            <h5>Nama Petugas</h5>
                            <select name='id_user' class='input-control' style="width:170px;">
                                <?php while($users = mysqli_fetch_assoc($query1)):?>
                                    <option value="<?= $users['id_user']?>"><?= $users['username']?></option> 
                                <?php endwhile ?>
                            </select>

                         </div>

                         <div>
                             <!--toko-->
                             <h5>ID Toko</h5>
                             <select name='nama_toko' class='input-control' style="width:170px;">
                                 <?php while($toko = mysqli_fetch_assoc($query3)):?>
                                     <option value="<?= $toko['nama_toko']?>"><?= $toko['id_toko']?></option> 
                                 <?php endwhile ?>
                             </select>
                          </div>

                    

                    <div>
                    <!--kategori-->
                    <h5>Kategori Produk</h5>
                    <select name='id_kategori' class='input-control' style="width:170px;">
                        <?php while($kategori = mysqli_fetch_assoc($query)):?>
                            <option value="<?= $kategori['id_kategori']?>"><?= $kategori['nama_kategori']?></option> 
                        <?php endwhile ?>
                    </select>
                    </div>

                    
                    <div>
                    <!--produk-->
                    <h5>Nama Produk</h5>
                    <select name='id_produk' class='input-control' style="width:170px;">
                        <?php while($produk = mysqli_fetch_assoc($query2)):?>
                            <option value="<?= $produk['id_produk']?>"><?= $produk['nama_produk']?></option> 
                        <?php endwhile ?>
                    </select>
                    </div>


                    <div>
                     <!--pelanggan-->
                     <h5>Pelanggan</h5>
                    <select name='id_pelanggan' class='input-control' style="width:170px;">
                        <?php while($pelanggan = mysqli_fetch_assoc($query5)):?>
                            <option value="<?= $pelanggan['id_pelanggan']?>"><?= $pelanggan['nama_pelanggan']?></option> 
                        <?php endwhile ?>
                    </select>
                    </div>

                    <div>
                    <!--harga-->
                    <h5>Harga Satuan</h5>
                    <select name='id_produk' class='input-control' style="width:170px;">
                        <?php while($produk = mysqli_fetch_assoc($query4)):?>
                            <option value="<?= $produk['id_produk']?>"><?= $produk['harga_jual']?></option> 
                        <?php endwhile ?>
                    </select>
                    </div>

                    <div>
                        <!--satuan-->
                        <h5>Satuan</h5>
                    <input type="text" name="id_produk" placeholder="" class="input-control" style="width:170px;" value="">
                    </div>

                    <div>
                    <!--tanggal-->
                    <h5>Tanggal</h5>
                    <input type="text" name="id_produk" placeholder="" class="input-control" style="width:170px;" value="">
                    </div>

                    <div>
                    <!--nofaktur-->
                    <h5>No Faktur</h5>
                    <input type="text" name="id_produk" placeholder="" class="input-control" style="width:170px;" value="">
                    </div>
                    </div>
                    <input type="submit" name="submit" value="OKE" class="btn"> 

                    
                    </div>
                   
            </form>
           
        </div>
    </div>
</body>
</html>