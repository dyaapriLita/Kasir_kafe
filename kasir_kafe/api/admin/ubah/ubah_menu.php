<?php include '../template/head-nav_folder.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard Ubah Menu</h1>
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
                            Ubah Menu
                        </div>
                        <div class="card-body">
                            <table>
                                <?php
                                include "../../../koneksi.php";
                                $qry_get_menu = mysqli_query($conn, "SELECT * FROM menu WHERE id_menu = '" . $_GET['id_menu'] . "'");
                                $dt_menu = mysqli_fetch_array($qry_get_menu);
                                ?>


                                <form action="../proses/proses_ubah_menu.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_menu" value="<?= $dt_menu['id_menu'] ?>">

                                    Nama Menu :

                                    <input type="text" name="nama_menu" value="<?= $dt_menu['nama_menu'] ?>" class="form-control">
                                    <br>

                                    Jenis :
                                    <?php
                                    $arr_jenis = array('makanan' => 'makanan', 'minuman' => 'minuman');
                                    ?>
                                    <select name="jenis" class="form-control">
                                        <option></option>
                                        <?php foreach ($arr_jenis as $key_jenis => $val_jenis) :
                                            if ($key_jenis == $dt_menu['jenis']) {
                                                $selek = "selected";
                                            } else {
                                                $selek = "";
                                            }
                                        ?>
                                            <option value="<?= $key_jenis ?>" <?= $selek ?>><?= $val_jenis ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <br>

                                    Deskripsi :

                                    <input type="text" name="deskripsi" value="<?= $dt_menu['deskripsi'] ?>" class="form-control">
                                    <br>

                                    Gambar :
                                    <br>
                                    ("sementara belum bisa mengubah gambar")
                                    <br>
                                    <input type="hidden" name="nama_gambar" value="<?= $dt_menu['gambar'] ?>">
                                    <br>

                                    Harga :

                                    <input type="number" name="harga" value="<?= $dt_menu['harga'] ?>" class="form-control">
                                    <br>

                                    <input type="submit" name="simpan" value="Ubah Menu" class="btn btn-primary">

                                </form>
                            </table>
                        </div>
                    </div>
                </div>
    </main>

    <?php include '../template/footer.php'; ?>