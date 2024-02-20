<?php
    include "../koneksi.php";
    session_start();
    if (!$_SESSION ['id']){
        header('location:index.php');
    }
    $id_produk = $_GET["id_produk"];
    $query = mysqli_query($conn,'SELECT * FROM kategori_produk');
    $query2 = mysqli_query($conn, 'SELECT * FROM toko');
    $result = mysqli_query($conn,"SELECT * FROM produk  WHERE id_produk = $id_produk");
    $data = mysqli_fetch_assoc($result);
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../dekorasi.css">
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
            <li><a href="../data_barang.php">Data Produk</a></li>
        </ul>
        </div>
    </header>

    <!--content-->
    <div class="section">
        <div class="container">
            <h3>Edit Produk</h3>
            <div class="box">
                <form action="../proses_edit_produk.php?id_produk=<?php echo $_GET["id_produk"] ?>" method="POST" enctype="multipart/form-data">
                    <select name='id_kategori' class='input-control'>
                        <?php while($kategori = mysqli_fetch_assoc($query)):?>
                            <option value="<?= $kategori['id_kategori']?>"><?= $kategori['nama_kategori']?></option>
                        <?php endwhile ?>
                    </select>

                    <select name='id_toko' class='input-control'>
                        <?php while($toko = mysqli_fetch_assoc($query2)):?>
                            <option value="<?= $toko['id_toko']?>"><?= $toko['id_toko']?></option> 
                        <?php endwhile ?>
                    </select>
                    <input type="text" name="id_produk" placeholder="ID Produk" class="input-control" value="<?php echo $data["id_produk"] ?>">
                    <input type="text" name="nama_produk" placeholder="Nama Produk" class="input-control" value="<?php echo $data["nama_produk"] ?>">
                    <input type="text" name="satuan" placeholder="Satuan" class="input-control" value="<?php echo $data["satuan"] ?>">
                    <input type="text" name="harga_beli" placeholder="Harga Beli" class="input-control" value="<?php echo $data["harga_beli"] ?>">
                    <input type="text" name="harga_jual" placeholder="Harga Jual" class="input-control" value="<?php echo $data["harga_jual"] ?>">
                    <input type="text" name="stok" placeholder="Stok Barang" class="input-control" value="<?php echo $data["stok"] ?>">
                    <input type="submit" name="submit" value="SIMPAN" class="btn">   
                    
                    
            </div>
            </form>
        </div>
    </div>
</body>
</html>