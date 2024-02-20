<?php
    include "koneksi.php";
    session_start();
    if (!$_SESSION ['id']){
        header('location:index.php');
    }
    $query = mysqli_query($conn,'SELECT * FROM petugas');
    
   
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
            <li><a href="petugas.php">Petugas</a></li>
        </ul>
        </div>
    </header>

    <!--content-->
    <div class="section">
        <div class="container">
            <h3>Tambah Data Petugas</h3>
            <div class="box">
            <form action="proses_tambah_petugas.php" method="POST" enctype="multipart/form-data">
                    </select>
                    </select>
                    <input type="text" name="ID_Petugas" placeholder="ID" class="input-control" value="">
                    <input type="text" name="ID_Toko" placeholder="ID Toko" class="input-control" value="">
                    <input type="text" name="Nama" placeholder="Nama" class="input-control" value="">
                    <input type="text" name="Alamat" placeholder="Alamat" class="input-control" value="">
                    <input type="text" name="No_Hp" placeholder="No Hp" class="input-control" value="">
                    <input type="submit" name="submit" value="SIMPAN" class="btn">   
                    </select>
                            
                    </select>
            </div>
</body>
</html>

