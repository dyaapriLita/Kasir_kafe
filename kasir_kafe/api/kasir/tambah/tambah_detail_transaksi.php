<?php include '../template/head-nav_folder.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard Tambah Detail Transaksi Id</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Selamat makan dan selamat menikmati waktu anda </li>
            </ol>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tambah Transaksi Id
                        </div>
                        <div class="card-body">
                            <table>

                                <form action="../proses/proses_tambah_detail_transaksi.php" method="post" enctype="multipart/form-data">

                                    Nama Pelanggan :
                                    <select name="pelanggan" class="form-control">
                                        <?php
                                        include "../../../koneksi.php";
                                        $qry_get_transaksi = mysqli_query($conn, "SELECT * FROM transaksi WHERE nama_pelanggan = '" . $_GET['nama_pelanggan'] . "'");
                                        while ($data_transaksi = mysqli_fetch_array($qry_get_transaksi)) {
                                            echo '<option value="' . $data_transaksi['id_transaksi'] . '">' . $data_transaksi['nama_pelanggan'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <br>

                                    <input type="submit" name="simpan" value="Tambah Transaksi Id" class="btn btn-primary">

                                </form>
                            </table>
                        </div>
                    </div>
                </div>
    </main>

    <?php include '../template/footer.php'; ?>