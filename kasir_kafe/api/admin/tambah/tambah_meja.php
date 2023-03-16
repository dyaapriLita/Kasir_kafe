<?php include '../template/head-nav_folder.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard Tambah Meja</h1>
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
                            Tambah Meja
                        </div>
                        <div class="card-body">
                            <table>

                                <form action="../proses/proses_tambah_meja.php" method="post" enctype="multipart/form-data">

                                    Nomor Meja :

                                    <input type="number" name="nomor_meja" value="" class="form-control">
                                    <br>

                                    <input type="submit" name="simpan" value="Tambah Meja" class="btn btn-primary">

                                </form>
                            </table>
                        </div>
                    </div>
                </div>
    </main>

    <?php include '../template/footer.php'; ?>