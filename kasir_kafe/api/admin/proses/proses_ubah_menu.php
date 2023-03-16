<?php
if ($_POST) {
    $id_menu = $_POST['id_menu'];
    $nama_menu = $_POST['nama_menu'];
    $jenis = $_POST['jenis'];
    $deskripsi = $_POST['deskripsi'];
    $nama_gambar = $_POST['nama_gambar'];
    $harga = $_POST['harga'];

    if (empty($nama_menu)) {
        echo "<script>alert('nama menu tidak boleh kosong');location.href='../ubah/ubah_menu.php?id_menu=" . $id_menu . "';</script>";
    } elseif (empty($jenis)) {
        echo "<script>alert('jenis tidak boleh kosong');location.href='../ubah/ubah_menu.php?id_menu=" . $id_menu . "';</script>";
    } elseif (empty($deskripsi)) {
        echo "<script>alert('deskripsi tidak boleh kosong');location.href='../ubah/ubah_menu.php?id_menu=" . $id_menu . "';</script>";
    } elseif (empty($harga)) {
        echo "<script>alert('harga tidak boleh kosong');location.href='../ubah/ubah_menu.php?id_menu=" . $id_menu . "';</script>";
    } else {

        include "../../../koneksi.php";

        $update = mysqli_query($conn, "update menu set nama_menu='" . $nama_menu . "',jenis='" . $jenis . "', deskripsi='" . $deskripsi . "', gambar='" . $nama_gambar . "', harga='" . $harga . "' where id_menu = '" . $id_menu . "'") or die(mysqli_error($conn));
        if ($update) {
            echo "<script>alert('Sukses update menu');location.href='../menu.php';</script>";
        } else {
            echo "<script>alert('Gagal update menu');location.href='../ubah/ubah_menu.php?id_menu=" . $id_menu . "';</script>";
        }
    }
}
