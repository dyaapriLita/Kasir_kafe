<?php
if ($_POST) {
    $id_meja = $_POST['id_meja'];
    $nomor_meja = $_POST['nomor_meja'];
    include "../../../koneksi.php";
    $cekmeja = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM meja WHERE nomor_meja='$nomor_meja'"));

    if ($cekmeja > 1) {
        echo "<script>alert('Nomor meja sudah ada.');location.href='../ubah/ubah_meja.php?id_meja=" . $id_meja . "';</script>";
    } else {

        if (empty($nomor_meja)) {
            echo "<script>alert('nomor meja tidak boleh kosong');location.href='../ubah/ubah_meja.php?id_meja=" . $id_meja . "';</script>";
        } else {

            $update = mysqli_query($conn, "update meja set nomor_meja='" . $nomor_meja . "' where id_meja = '" . $id_meja . "'") or die(mysqli_error($conn));
            if ($update) {
                echo "<script>alert('Sukses update meja');location.href='../meja.php';</script>";
            } else {
                echo "<script>alert('Gagal update meja');location.href='../ubah/ubah_meja.php?id_meja=" . $id_meja . "';</script>";
            }
        }
    }
}
