<?php
    session_start();
    include 'koneksi.php';

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");

    $cek = mysqli_num_rows($sql);
    
    if($cek > 0){
        $data = mysqli_fetch_assoc($sql);

     $_SESSION['username'] = $data['username'];
     $_SESSION['userid'] = $data['UserID'];
     $_SESSION['status'] = 'login';
     
     echo "<script>
     alert('Login Berhasil');
     location.href='../dashboard/index.html';
     </script>";   
    } else {
        echo "<script>
        alert('Username atau password anda salah!!);
        location.href='../login.php';
        </script>";
        echo "gagal";
    }

?>