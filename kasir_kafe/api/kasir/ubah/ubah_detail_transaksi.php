<?php include '../template/head-nav_folder.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard Ubah Transaksi</h1>
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
                            Ubah Transaksi
                        </div>
                        <div class="card-body">
                            <table>
                                <?php
                                include "../../../koneksi.php";
                                $qry_get_detailtransaksi = mysqli_query($conn, "SELECT * FROM detail_transaksi WHERE id_transaksi = '" . $_GET['id_transaksi'] . "'");
                                $dt_detail_transaksi = mysqli_fetch_array($qry_get_detailtransaksi);
                                ?>

                                <form action="../proses/proses_ubah_detail_transaksi.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_detail_transaksi" value="<?= $dt_detail_transaksi['id_detail_transaksi'] ?>">

                                    Pelanggan :

                                    <select name="pelanggan" class="form-control">
                                        <option></option>
                                        <?php
                                        include "../../../koneksi.php";
                                        $qry_pelanggan = mysqli_query($conn, "select * from detail_transaksi");
                                        while ($data_pelanggan = mysqli_fetch_array($qry_pelanggan)) {
                                            if ($data_pelanggan['id_pelanggan'] == $dt_detail_transaksi['id_pelanggan']) {
                                                $selek = "selected";
                                            } else {
                                                $selek = "";
                                            }
                                            echo '<option value="' . $data_pelanggan['id_transaksi'] . '" ' . $selek . '>' . $data_pelanggan['nama_pelanggan'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <br>

                                    <input type="submit" name="simpan" value="Ubah Transaksi" class="btn btn-primary">

                                </form>
                            </table>
                        </div>
                    </div>
                </div>
    </main>

    <?php include '../template/footer.php'; ?>