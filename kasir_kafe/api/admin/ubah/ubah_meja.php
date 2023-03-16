<?php include '../template/head-nav_folder.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard Ubah Meja</h1>
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
                            Ubah Meja
                        </div>
                        <div class="card-body">
                            <table>
                                <?php
                                include "../../../koneksi.php";
                                $qry_get_meja = mysqli_query($conn, "SELECT * FROM meja WHERE id_meja = '" . $_GET['id_meja'] . "'");
                                $dt_meja = mysqli_fetch_array($qry_get_meja);
                                ?>


                                <form action="../proses/proses_ubah_meja.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_meja" value="<?= $dt_meja['id_meja'] ?>">

                                    Nomor Meja :

                                    <input type="number" name="nomor_meja" value="<?= $dt_meja['nomor_meja'] ?>" class="form-control">
                                    <br>

                                    <input type="submit" name="simpan" value="Ubah Meja" class="btn btn-primary">

                                </form>
                            </table>
                        </div>
                    </div>
                </div>
    </main>

    <?php include '../template/footer.php'; ?>