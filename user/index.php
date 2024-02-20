<?php
 include "koneksi.php";
 session_start();
 $query = mysqli_query($conn,'SELECT * FROM kategori_produk');
 $query1 = mysqli_query($conn, 'SELECT * FROM users');
 $query2 = mysqli_query($conn, 'SELECT * FROM produk');
 $query3 = mysqli_query($conn, 'SELECT * FROM toko');
 $query4 = mysqli_query($conn, 'SELECT * FROM produk');
 $query5 = mysqli_query($conn, 'SELECT * FROM pelanggan');

// koneksi
$conn = new mysqli('localhost', 'root', '', 'kasir');

// simpan data
if (isset($_POST['submit'])) {
$kt = $_POST['nama_kategori'];
$nb = $_POST['nama_barang'];
$hrg = $_POST['harga'];
$qty = $_POST['qty'];
$total_bayar = $_POST['total'];
$totalbayar = $_POST['totalbayar'];
 
$q = mysqli_query($conn, "INSERT INTO hitung (nama_kategori, nama_barang, harga, qty) VALUES ('$kt', '$nb', '$hrg', '$qty')");
$resultstok = mysqlI_query($conn,"SELECT stok FROM produk WHERE nama_produk = '$nb'");
$datastok = mysqli_fetch_assoc($resultstok);
$stok = $datastok['stok'];
$hitungstok = $stok - $qty;
$kurang_jumlah = mysqli_query($conn,"UPDATE produk SET stok='$hitungstok' WHERE nama_produk='$nb'");
 
if($q) {
header('Location: index.php');
} else {
echo "<script>alert('Gagal menambahkan data'); window.location.href = index.php;</script>";
}
}

if(isset($_POST['SIMPAN'])){
    $total = $_POST['total'];
    $bayar = $_POST['bayar'];
    $sisa = $_POST['sisa'];
    $nama_barang = $_POST['nama_barang'];
    $created_at = $_POST['created_at'];
    
    $result = mysqli_query($conn,"INSERT INTO hitung ('nama_kategori', 'nama_barang', 'harga', 'qty', 'created_at') VALUES ('$total','$bayar','$sisa','$nama_barang','$created_at')");
    
    if ($q) {
            header('Location: penjualan.php');
            exit();
        } 
    } else {
        
    }


if(isset($_POST['sisa'])){
    $total = $_POST['total'];
    $bayar = $_POST['bayar'];
    $sisa = $_POST['sisa'];
    $resultMoveData = mysqli_query($conn, "INSERT INTO penjualan ( nama_barang, total, bayar,sisa, created_at) SELECT  nama_barang, total, bayar,sisa, created_at FROM hitung");
    
    if ($resultMoveData) {
        // Data berhasil dipindahkan, lanjutkan dengan menghapus data di tabel hitung jika diperlukan
        // Misalnya: mysqli_query($conn, "DELETE FROM hitung");

        header('Location: penjualan.php');
        exit();
    } else {
        var_dump($conn);
        //echo "<script>alert('Gagal memindahkan data ke tabel penjualan');</script>";
    }
}

?>
 
<!DOCTYPE html>
<html>
<head>
 
<!-- Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<title>Dashboard</title>
    <link rel="stylesheet" href="dekorasi.css">
</head>
<body>
    <!--header-->
    <header>
        <div class="container">
        <h1>Kampuh Jaya</h1>
        <ul>
            
            <li><a href="data_pelanggan.php">Pelanggan</a></li>
            <li><a href="pembelian.php">Pembelian</a></li>
            <li><a href="penjualan.php">Penjualan</a></li>
            <li><a href="detail_penjualan.php">Detail Penjualan</a></li>
            <li><a href="data_barang.php">Barang</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
        </div>
    </header>

<div class="card mt-5">
<div class="card-body mx-auto" style='display:flex;flex-wrap:wrap;gap:3em'>
<form method="POST" action="" class="form-inline mt-3">


 <div class='' style='display:flex;flex-wrap:wrap;gap:3em'>

                    <!--pelanggan-->
                    <div>
                     <h5>Pelanggan</h5>
                    <select name='id_pelanggan' class='input-control' style="width:170px;">
                        <?php while($pelanggan = mysqli_fetch_assoc($query5)):?>
                            <option value="<?= $pelanggan['id_pelanggan']?>"><?= $pelanggan['nama_pelanggan']?></option> 
                        <?php endwhile ?>
                    </select>
                    </div>
                     

                      <!--kategori-->
                    <div>
                    <h5>Kategori Produk</h5>
                    <select name='nama_kategori' class='input-control' style="width:170px">
                        <?php while($kategori = mysqli_fetch_assoc($query)):?>
                            <option value="<?= $kategori['nama_kategori']?>"><?= $kategori['nama_kategori']?></option> 
                        <?php endwhile ?>
                    </select>
                    </div>

                    
                    <!--produk-->
                    <div>
                    <h5>Nama Produk</h5>
                    <select name='nama_barang' class='input-control' style="width:170px;">
                        <?php while($produk = mysqli_fetch_assoc($query2)):?>
                            <option value="<?= $produk['nama_produk']?>"><?= $produk['nama_produk']?></option> 
                        <?php endwhile ?>
                    </select>
                    </div>

                    
<div>
<!--harga-->
<h5>Harga</h5>
<input type="number" name="harga" id="harga" class="input-control mr-sm-2" style="width:170px; height:41px;">
</div>

<div>
<!--jumlah-->
<h5>Jumlah</h5>
<input type="number" name="qty" id="qty" class="input-control mr-sm-2" style="width:170px; height:41px;">
</div>

<!--button-->
<button type="submit" style="width:100px; margin-right:100px; position:relative; margin-top:32px; margin-bottom:30px" name="submit" class="btn btn-primary">Hitung</button>



<!--Total Bayar-->
<div>
<h5>Total Bayar</h5>
<input type="number" name="totalbayar" id="totalbayar" class="input-control mr-sm-2" style="width:170px; height:41px;">
</div>

<!--button-->
</form>
<hr/>
<button type='button' id='totalbayarbutton' style="width:100px; position:relative; margin-top:32px; margin-left:-50px; margin-bottom:30px"  class="btn btn-primary">Hitung</button>




<!--code menampilkan data-->
<?php
$q = mysqli_query($conn, "SELECT * FROM pelanggan");
?>
<table class="table table-bordered mt-5" >
<tr>
<th>No</th>
<th>Kategori</th>
<th>Nama Barang</th>
<th>Harga Satuan</th>
<th>Jumlah</th>
<th>Total</th>

</tr>
 
<?php
// perintah tampil data
$q = mysqli_query($conn, "SELECT * FROM hitung");
 
$total = 0;
$tot_bayar = 0;
$no = 0;
$jumlahdata = mysqli_num_rows($q);
while ($r = $q->fetch_assoc()) {
// total adalah hasil dari harga x qty
$total = $r['harga'] * $r['qty'];
// total bayar adalah penjumlahan dari keseluruhan total
$tot_bayar += $total;
$no++;
?>
 
<tr>
<td><?= $no ?></td>
<td><?= ucwords($r['nama_kategori']) ?></td>
<td><?= ucwords($r['nama_barang']) ?></td>
<td><?= $r['harga'] ?></td>
<td><?= $r['qty'] ?></td>
<td id=''><?= $total ?></td>
</tr>
 
<?php
}
?>
 
 <?php
// perintah tampil data totalbayar
$q = mysqli_query($conn, "SELECT * FROM hitung");
 
$totalbayar = 0;
$total = 0;
$no = 1;
 
?>
 
<?php

?>
<form method='POST' action="">
    <tr>
    <th colspan="5">Total Barang</th>
    <th ><input name='total' id='total_barang' disabled value='<?= $tot_bayar ?>' /></th>
    </tr>
    <tr >
    <th colspan="5">Total Bayar</th>
    <th ><input name='bayar' id='total_bayar' disabled value='<?= $totalbayar ?>' /></th>
    </tr>
    <tr >
    <th colspan="5">Sisa</th>
    <th ><input name='sisa' value=''id='sisa' disabled /></th>
</tr>
    
</table>
<button type="submit" name="sisa"  class="btn">Simpan </button>  
</form>
</style=>
</div>
</div>

<script>
    const totalbayarinput = document.getElementById("totalbayar");
    const totalbayar = document.getElementById("total_bayar")
    const totalbayarbutton = document.getElementById("totalbayarbutton")
    const totalbarang = document.getElementById("total_barang")
    const sisa = document.getElementById("sisa")
    let totalbarangvalue = totalbarang.value
    
    totalbayarbutton.addEventListener("click",() => {
        let totalbayarvalue = totalbayar.value
        totalbayar.value = totalbayarinput.value
        sisa.value = totalbarangvalue - totalbayar.value    
    })
    
    
</script>

 
</body>
</html>