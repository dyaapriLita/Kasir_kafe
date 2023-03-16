<?php
if ($_POST) {
    $id_user = $_POST['id_user'];
    $nama_user = $_POST['nama_user'];
    $role = $_POST['role'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);

    include "../../../koneksi.php";
    $cekuser = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE username='$username'"));

    if ($cekuser > 1) {
        echo "<script>alert('Username umum.');location.href='../ubah/ubah_user.php?id_user=" . $id_user . "';</script>";
    } else {
        if (empty($nama_user)) {
            echo "<script>alert('nama user tidak boleh kosong');location.href='../ubah/ubah_user.php?id_user=" . $id_user . "';</script>";
        } elseif (empty($role)) {
            echo "<script>alert('role tidak boleh kosong');location.href='../ubah/ubah_user.php?id_user=" . $id_user . "';</script>";
        } elseif (empty($username)) {
            echo "<script>alert('username tidak boleh kosong');location.href='../ubah/ubah_user.php?id_user=" . $id_user . "';</script>";
        } elseif (empty($password)) {
            echo "<script>alert('password tidak boleh kosong');location.href='../ubah/ubah_user.php?id_user=" . $id_user . "';</script>";
        } else {

            $update = mysqli_query($conn, "update user set nama_user='" . $nama_user . "',role='" . $role . "', username='" . $username . "', password='" . $password . "' where id_user = '" . $id_user . "'") or die(mysqli_error($conn));
            if ($update) {
                echo "<script>alert('Sukses update user');location.href='../user.php';</script>";
            } else {
                echo "<script>alert('Gagal update user');location.href='../ubah/ubah_user.php?id_user=" . $id_user . "';</script>";
            }
        }
    }
}
