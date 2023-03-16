<?php

session_start();

include "koneksi.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $check = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' and password='$password'");
    $count = mysqli_num_rows($check);


    if ($count > 0) {
        //Berhasil Login

        $_SESSION['login'] = 'true';
        $data = mysqli_fetch_assoc($check);

        if ($data['role'] == "kasir") {
            // buat session login dan username
            $_SESSION['username'] = $username;
            $_SESSION['role'] = "kasir";
            // alihkan ke halaman dashboard kasir
            header('location:api/kasir/transaksi.php');
        } elseif ($data['role'] == "manajer") {
            // buat session login dan username
            $_SESSION['username'] = $username;
            $_SESSION['role'] = "manajer";
            // alihkan ke halaman dashboard manajer
            header('location:api/manajer/tampil_transaksi.php');
        } elseif ($data['role'] == "admin") {
            // buat session login dan username
            $_SESSION['username'] = $username;
            $_SESSION['role'] = "admin";
            // alihkan ke halaman dashboard admin
            header('location:api/admin/user.php');
        } elseif ($data['role'] == "empty") {
            echo '
        <script>alert("user tidak terdaftar mas/mbak");
        window.location.href="index.php"
        </script>
        ';
        } else {
            echo '
        <script>alert("role tidak terdaftar mas/mbak");
        window.location.href="index.php"
        </script>
        ';
        }
    } else {
        //gagal login
        echo '
        <script>alert("Username atau Password salah mas/mbak");
        window.location.href="index.php"
        </script>
        ';
    }
}
