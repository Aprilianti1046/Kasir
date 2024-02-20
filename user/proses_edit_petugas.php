<?php 
include 'koneksi.php';

$ID_Petugas = $_POST['ID_Petugas'];
$ID_Toko = $_POST['ID_Toko'];
$Nama = $_POST['Nama'];
$Alamat = $_POST['Alamat'];
$No_Hp = $_POST['No_Hp'];

$result = mysqli_query($conn,"UPDATE petugas SET ID_Petugas='$ID_Petugas',ID_Toko='$ID_Toko',Nama='$Nama',Alamat='$Alamat' WHERE No_Hp=$No_Hp");
if($result){
    echo "<script>alert('Data berhasil diedit');window.location.href='petugas.php'</script>";
}else{
    echo "<script>Gagal menambahkan data</script>";
}

?>