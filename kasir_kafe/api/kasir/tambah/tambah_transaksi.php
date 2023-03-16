<?php include '../template/head-nav_folder.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard Tambah Transaksi</h1>
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
                            Tambah Transaksi
                        </div>
                        <div class="card-body">
                            <table>

                                <form action="../proses/proses_tambah_transaksi.php" method="post" enctype="multipart/form-data">

                                    Tgl Transaksi :
                                    <input type="datetime-local" name="tgl_transaksi" value="" class="form-control">
                                    <br>

                                    User :
                                    <select name="user" class="form-control">
                                        <!-- <option></option> -->
                                        <?php
                                        // include "../../../koneksi.php";
                                        // $qry_user = mysqli_query($conn, "select * from user where role='kasir'");
                                        // while ($data_user = mysqli_fetch_array($qry_user)) {
                                        //     echo '<option value="' . $data_user['id_user'] . '">' . $data_user['nama_user'] . '</option>';
                                        // }
                                        ?>
                                    </select>
                                    <br>

                                    Meja :
                                    <select name="meja" class="form-control">
                                        <option></option>
                                        <?php
                                        include "../../../koneksi.php";
                                        $qry_meja = mysqli_query($conn, "select * from meja");
                                        while ($data_meja = mysqli_fetch_array($qry_meja)) {
                                            echo '<option value="' . $data_meja['id_meja'] . '">' . $data_meja['nomor_meja'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <br>

                                    Nama Pelanggan :
                                    <input type="text" name="nama_pelanggan" value="" class="form-control">
                                    <br>

                                    Status :
                                    <select name="status" class="form-control">
                                        <option value="belum_bayar">Belum Bayar</option>
                                    </select>
                                    <br>

                                    <input type="submit" name="simpan" value="Tambah transaksi" class="btn btn-primary">

                                </form>
                            </table>
                        </div>
                    </div>
                </div>
    </main>

    <?php include '../template/footer.php'; ?>