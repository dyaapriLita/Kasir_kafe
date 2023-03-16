<?php

if ($_POST) {

    $nama_menu = $_POST['nama_menu'];

    $jenis = $_POST['jenis'];

    $deskripsi = $_POST['deskripsi'];

    //gambar akan di simpan di folder gambar
    $tempdir = "../../../file_foto/Menu/";
    $target_path = $tempdir . basename($_FILES['filegambar']['name']);
    //nama gambar
    $nama_gambar = $_FILES['filegambar']['name'];
    //ukuran gambar
    $ukuran_gambar = $_FILES['filegambar']['size'];
    $fileinfo = @getimagesize($_FILES["filegambar"]["tmp_name"]);

    $harga = $_POST['harga'];

    if (empty($nama_menu)) {
        echo "<script>alert('nama menu tidak boleh kosong');location.href='../tambah/tambah_menu.php';</script>";
    } elseif (empty($jenis)) {
        echo "<script>alert('jenis tidak boleh kosong');location.href='../tambah/tambah_menu.php';</script>";
    } elseif (empty($deskripsi)) {
        echo "<script>alert('deskripsi tidak boleh kosong');location.href='../tambah/tambah_menu.php';</script>";
    } elseif (empty($nama_gambar)) {
        echo "<script>alert('gambar tidak boleh kosong');location.href='../tambah/tambah_menu.php';</script>";
    } elseif ($ukuran_gambar > 1192000) {
        echo "<script>alert('Ukuran gambar melebihi 1mb');location.href='../tambah/tambah_menu.php';</script>";;
    } elseif (empty($harga)) {
        echo "<script>alert('harga tidak boleh kosong');location.href='../tambah/tambah_menu.php';</script>";
    } else {

        include "../../../koneksi.php";

        if (move_uploaded_file($_FILES['filegambar']['tmp_name'], $target_path)) {
            $insert = mysqli_query($conn, "insert into menu (nama_menu, jenis, deskripsi, gambar, harga) value ('" . $nama_menu . "','" . $jenis . "','" . $deskripsi . "','" . $nama_gambar . "','" . $harga . "')");
            if ($insert) {
                echo "<script>alert('Sukses menambahkan menu');location.href='../menu.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan menu');location.href='../tambah/tambah_menu.php';</script>";
            }
        } else {

            echo "<script>alert('Gagal menambahkan gambar');location.href='../tambah/tambah_menu.php';</script>";
        }
    }
}
