<?php
    include "../koneksi.php";
    session_start();
    if (!$_SESSION ['id']){
        header('location:index.php');
    }
    $id = $_GET["id"];
    $result = mysqli_query($conn,"SELECT * FROM pelanggan WHERE id_pelanggan=$id");
    $data = mysqli_fetch_assoc($result);
   
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
            <li><a href="data_pelanggan.php">Pelanggan</a></li>
        </ul>
        </div>
    </header>

    <!--content-->
    <div class="section">
        <div class="container">
            <h3>Edit Data Suplier</h3>
            <div class="box">
            <form action="../proses_edit_pelanggan.php" method="POST" enctype="multipart/form-data">
                       
                    </select>
                    </select>
                    <input type="text" name="id_pelanggan" placeholder="ID" class="input-control" value="">
                    <input type="text" name="id_toko" placeholder="ID Toko" class="input-control" value="">
                    <input type="text" name="nama_pelanggan" placeholder="Nama" class="input-control" value="">
                    <input type="text" name="alamat" placeholder="Alamat" class="input-control" value="">
                    <input type="text" name="no_hp" placeholder="No Hp" class="input-control" value="">
                    <input type="submit" name="submit" value="SIMPAN" class="btn">   
                    </select>
                            
                    </select>
            </div>
</body>
</html>

