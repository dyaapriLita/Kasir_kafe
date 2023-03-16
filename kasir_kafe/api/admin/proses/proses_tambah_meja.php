<?php

if ($_POST) {

    $nomor_meja = $_POST['nomor_meja'];

    include "../../../koneksi.php";

    $cekmeja = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM meja WHERE nomor_meja='$nomor_meja'"));

    if ($cekmeja > 0) {
        echo "<script>window.alert('Nomor meja sudah ada.')
        window.location='../tambah/tambah_meja.php'</script>";
    } else {

        if (empty($nomor_meja)) {
            echo "<script>alert('nomor meja tidak boleh kosong');location.href='../tambah/tambah_meja.php';</script>";
        } else {

            $insert = mysqli_query($conn, "insert into meja (nomor_meja) value ('" . $nomor_meja . "')");
            if ($insert) { 
                echo "<script>alert('Sukses menambahkan meja');location.href='../meja.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan meja');location.href='../tambah/tambah_meja.php';</script>";
            }
        }
    }
}
