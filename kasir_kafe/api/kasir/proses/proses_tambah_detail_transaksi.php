<?php
include "../../../koneksi.php";

if ($_POST) {

    $pelanggan = $_POST['pelanggan'];

    if (empty($pelanggan)) {
        echo "<script>alert('pelanggan tidak boleh kosong');location.href='../tambah/tambah_detail_transaksi.php';</script>";
    } else {

        $insert = mysqli_query($conn, "insert into detail_transaksi (id_transaksi) value ('" . $pelanggan . "')");
        if ($insert) {
            echo "<script>alert('Sukses menambahkan id transaksi');location.href='../transaksi.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan transaksi');location.href='../tambah/tambah_detail_transaksi.php';</script>";
        }
    }
}
