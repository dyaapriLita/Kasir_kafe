<?php
if ($_GET['id_menu']) {
    include "koneksi.php";
    $qry_hapus = mysqli_query($conn, "delete from menu where id_menu='" . $_GET['id_menu'] . "'");
    if ($qry_hapus) {
        echo "<script>alert('Sukses hapus menu');location.href='api/admin/menu.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus menu');location.href='api/admin/menu.php';</script>";
    }
} elseif ($_GET['id_user']) {
    include "koneksi.php";
    $role = 'empty';
    $username = '';
    $update = mysqli_query($conn, "update user set role='" . $role . "',username='" . $username . "' where id_user='" . $_GET['id_user'] . "'") or die(mysqli_error($conn));
    if ($update) {
        echo "<script>alert('Sukses hapus user');location.href='api/admin/user.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus user');location.href='api/admin/user.php';</script>";
    }
} elseif ($_GET['id_meja']) {
    include "koneksi.php";
    $qry_hapus = mysqli_query($conn, "delete from meja where id_meja='" . $_GET['id_meja'] . "'");
    if ($qry_hapus) {
        echo "<script>alert('Sukses hapus meja');location.href='api/admin/meja.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus meja');location.href='api/admin/meja.php';</script>";
    }
} elseif ($_GET['id_detail_transaksi']) {
    include "koneksi.php";
    $qry_get_transaksi = mysqli_query($conn, "SELECT * FROM detail_transaksi JOIN transaksi ON detail_transaksi.id_transaksi=transaksi.id_transaksi WHERE id_detail_transaksi = '" . $_GET['id_detail_transaksi'] . "'");
    $dt_transaksi = mysqli_fetch_array($qry_get_transaksi);
    $qry_hapus = mysqli_query($conn, "delete from detail_transaksi where id_detail_transaksi='" . $_GET['id_detail_transaksi'] . "'");
    $qry_hapus2 = mysqli_query($conn, "delete from transaksi where id_transaksi='" . $dt_transaksi['id_transaksi'] . "'");
    if ($qry_hapus && $qry_hapus2) {
        echo "<script>alert('Sukses hapus transaksi dan detail');location.href='api/kasir/transaksi.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus transaksi dan detail');location.href='api/kasir/transaksi.php';</script>";
    }
}
