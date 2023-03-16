<?php
session_start();
include "../../koneksi.php";


if ($_POST) {

    $total = $_POST['total'];

    //query insert dijalankan

    $update = mysqli_query($conn, "update detail_transaksi set harga_total='" . $total . "' where id_transaksi = '" . $_SESSION['id'] . "'") or die(mysqli_error($conn));

    if ($update) {
        unset($_SESSION['id']);
        unset($_SESSION['keranjang_belanja']);
        echo "<script>alert('Sukses checkout');location.href='transaksi.php';</script>";
    } else {
        echo "<script>alert('Gagal checkout');location.href='keranjang-belanja.php';</script>";
    }
}
