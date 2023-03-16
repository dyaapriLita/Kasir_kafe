<?php

if ($_POST) {

    $nama_user = $_POST['nama_user'];

    $role = $_POST['role'];

    $username = $_POST['username'];

    $password = $_POST['password'];
    $password = md5($password);

    include "../../../koneksi.php";

    $cekuser = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE username='$username'"));

    if ($cekuser > 0) {
        echo "<script>window.alert('Username umum, mohon cari yang lain.')
        window.location='../tambah/tambah_user.php'</script>";
    } else {

        if (empty($nama_user)) {
            echo "<script>alert('nama user tidak boleh kosong');location.href='../tambah/tambah_user.php';</script>";
        } elseif (empty($role)) {
            echo "<script>alert('role tidak boleh kosong');location.href='../tambah/tambah_user.php';</script>";
        } elseif (empty($username)) {
            echo "<script>alert('username tidak boleh kosong');location.href='../tambah/tambah_user.php';</script>";
        } elseif (empty($password)) {
            echo "<script>alert('password tidak boleh kosong');location.href='../tambah/tambah_user.php';</script>";
        } else {

            $insert = mysqli_query($conn, "insert into user (nama_user, role, username, password) value ('" . $nama_user . "','" . $role . "','" . $username . "','" . $password . "')");
            if ($insert) {
                echo "<script>alert('Sukses menambahkan user');location.href='../user.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan user');location.href='../tambah/tambah_user.php';</script>";
            }
        }
    }
}
