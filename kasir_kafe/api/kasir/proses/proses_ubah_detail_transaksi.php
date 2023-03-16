<?php
include "../../../koneksi.php";

if ($_POST) {
    $id_transaksi = $_POST['id_transaksi'];
    $tgl_transaksi = $_POST['tgl_transaksi'];
    $user = $_POST['user'];
    $meja = $_POST['meja'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $status = $_POST['status'];
    $cekmeja = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM transaksi WHERE id_meja='$meja'"));

    if ($cekmeja > 1) {
        echo "<script>window.alert('Meja sudah terisi, mohon cari yang lain.')
        window.location='../ubah/ubah_transaksi.php?id_transaksi=" . $id_transaksi . "'</script>";
    } else {
        //query insert dijalankan

        if (empty($tgl_transaksi)) {
            echo "<script>alert('tgl transaksi tidak boleh kosong');location.href='../ubah/ubah_transaksi.php?id_transaksi=" . $id_transaksi . "';</script>";
        } elseif (empty($user)) {
            echo "<script>alert('user tidak boleh kosong');location.href='../ubah/ubah_transaksi.php?id_transaksi=" . $id_transaksi . "';</script>";
        } elseif (empty($meja)) {
            echo "<script>alert('meja tidak boleh kosong');location.href='../ubah/ubah_transaksi.php?id_transaksi=" . $id_transaksi . "';</script>";
        } elseif (empty($nama_pelanggan)) {
            echo "<script>alert('nama pelanggan tidak boleh kosong');location.href='../ubah/ubah_transaksi.php?id_transaksi=" . $id_transaksi . "';</script>";
        } elseif (empty($status)) {
            echo "<script>alert('status tidak boleh kosong');location.href='../ubah/ubah_transaksi.php?id_transaksi=" . $id_transaksi . "';</script>";
        } else {
            $update = mysqli_query($conn, "update transaksi set tgl_transaksi='" . $tgl_transaksi . "',id_user='" . $user . "', id_meja='" . $meja . "', nama_pelanggan='" . $nama_pelanggan . "', status='" . $status . "' where id_transaksi = '" . $id_transaksi . "'") or die(mysqli_error($conn));

            if ($update) {
                echo "<script>alert('Sukses update transaksi');location.href='../transaksi.php';</script>";
            } else {
                echo "<script>alert('Gagal update transaksi');location.href='../ubah/ubah_transaksi.php?id_transaksi=" . $id_transaksi . "';</script>";
            }
        }
    }
}
