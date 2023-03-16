<?php include 'template/head-nav_folder.php'; ?>
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
                                include($_SERVER['DOCUMENT_ROOT']."/koneksi.php");
                                $conn = mysqli_connect('localhost', 'root', '', 'ukk_php_native_h');
                                
                                $qry_get_transaksi = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_transaksi = '" . $_GET['id_transaksi'] . "'");
                                $dt_transaksi = mysqli_fetch_array($qry_get_transaksi);
                                ?>

                                <form action="../proses/proses_ubah_transaksi.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_transaksi" value="<?= $dt_transaksi['id_transaksi'] ?>">

                                    Tgl Transaksi :
                                    <input type="datetime-local" name="tgl_transaksi" value="<?= $dt_transaksi['tgl_transaksi'] ?>" class="form-control">
                                    <br>

                                    User :

                                    <select name="user" class="form-control">
                                        <option></option>
                                        <?php
                                        include "../../../koneksi.php";
                                        $qry_user = mysqli_query($conn, "select * from user where role='kasir'");
                                        while ($data_user = mysqli_fetch_array($qry_user)) {
                                            if ($data_user['id_user'] == $dt_transaksi['id_user']) {
                                                $selek = "selected";
                                            } else {
                                                $selek = "";
                                            }
                                            echo '<option value="' . $data_user['id_user'] . '" ' . $selek . '>' . $data_user['nama_user'] . '</option>';
                                        }
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
                                            if ($data_meja['id_meja'] == $dt_transaksi['id_meja']) {
                                                $selek = "selected";
                                            } else {
                                                $selek = "";
                                            }
                                            echo '<option value="' . $data_meja['id_meja'] . '" ' . $selek . '>' . $data_meja['nomor_meja'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <br>

                                    Nama Pelanggan :
                                    <input type="text" name="nama_pelanggan" value="<?= $dt_transaksi['nama_pelanggan'] ?>" class="form-control">
                                    <br>

                                    Status :
                                    <?php
                                    $arr_status = array('belum_bayar' => 'belum_bayar', 'lunas' => 'lunas');
                                    ?>

                                    <select name="status" class="form-control">
                                        <option></option>
                                        <?php foreach ($arr_status as $key_status => $val_status) :
                                            if ($key_status == $dt_transaksi['status']) {
                                                $selek = "selected";
                                            } else {
                                                $selek = "";
                                            }
                                        ?>
                                            <option value="<?= $key_status ?>" <?= $selek ?>><?= $val_status ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <br>

                                    <input type="submit" name="simpan" value="Ubah transaksi" class="btn btn-primary">

                                </form>
                            </table>
                        </div>
                    </div>
                </div>
    </main>

    <?php include '../template/footer.php'; ?>