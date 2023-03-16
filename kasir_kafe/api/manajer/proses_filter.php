<?php
include '../../koneksi.php';

if (isset($_GET['search'])) :
    $search = $_GET['search'];
    $query = "SELECT * FROM transaksi WHERE user LIKE '%$search%'";
endif;
