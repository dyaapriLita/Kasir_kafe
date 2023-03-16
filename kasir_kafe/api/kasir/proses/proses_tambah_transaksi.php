<?php
include "../../../koneksi.php";

if ($_POST) {

    $tgl_transaksi = $_POST['tgl_transaksi'];

    $user = $_POST['user'];

    $meja = $_POST['meja'];

    $nama_pelanggan = $_POST['nama_pelanggan'];

    $status = $_POST['status'];

    $cekmeja = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM transaksi WHERE id_meja='$meja'"));

    if ($cekmeja > 0) {
        echo "<script>window.alert('Meja sudah terisi, mohon cari yang lain.')
        window.location='../tambah/tambah_transaksi.php'</script>";
    } else {
        //query insert dijalankan

        if (empty($tgl_transaksi)) {
            echo "<script>alert('tgl transaksi tidak boleh kosong');location.href='../tambah/tambah_transaksi.php';</script>";
        } elseif (empty($user)) {
            echo "<script>alert('user tidak boleh kosong');location.href='../tambah/tambah_transaksi.php';</script>";
        } elseif (empty($meja)) {
            echo "<script>alert('meja tidak boleh kosong');location.href='../tambah/tambah_transaksi.php';</script>";
        } elseif (empty($nama_pelanggan)) {
            echo "<script>alert('nama_pelanggan tidak boleh kosong');location.href='../tambah/tambah_transaksi.php';</script>";
        } elseif (empty($status)) {
            echo "<script>alert('status tidak boleh kosong');location.href='../tambah/tambah_transaksi.php';</script>";
        } else {

            $insert = mysqli_query($conn, "insert into transaksi (tgl_transaksi, id_user, id_meja, nama_pelanggan, status) value ('" . $tgl_transaksi . "','" . $user . "','" . $meja . "','" . $nama_pelanggan . "', '" . $status . "')");

            if ($insert) {
                echo "<script>alert('Sukses menambahkan transaksi');location.href='../tambah/tambah_detail_transaksi.php?nama_pelanggan=$nama_pelanggan';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan transaksi');location.href='../tambah/tambah_transaksi.php';</script>";
            }
        }
    }
}
