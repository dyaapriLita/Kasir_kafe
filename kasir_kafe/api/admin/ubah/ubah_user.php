<?php include '../template/head-nav_folder.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard Ubah User</h1>
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
                            Ubah User
                        </div>
                        <div class="card-body">
                            <table>
                                <?php
                                include "../../../koneksi.php";
                                $qry_get_user = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '" . $_GET['id_user'] . "'");
                                $dt_user = mysqli_fetch_array($qry_get_user);
                                ?>


                                <form action="../proses/proses_ubah_user.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_user" value="<?= $dt_user['id_user'] ?>">

                                    Nama User :

                                    <input type="text" name="nama_user" value="<?= $dt_user['nama_user'] ?>" class="form-control">
                                    <br>

                                    Role :
                                    <?php
                                    $arr_role = array('admin' => 'admin', 'kasir' => 'kasir', 'manajer' => 'maanajer');
                                    ?>
                                    <select name="role" class="form-control">
                                        <option></option>
                                        <?php foreach ($arr_role as $key_role => $val_role) :
                                            if ($key_role == $dt_user['role']) {
                                                $selek = "selected";
                                            } else {
                                                $selek = "";
                                            }
                                        ?>
                                            <option value="<?= $key_role ?>" <?= $selek ?>><?= $val_role ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <br>

                                    Username :

                                    <input type="text" name="username" value="<?= $dt_user['username'] ?>" class="form-control">
                                    <br>

                                    Password :

                                    <input type="password" name="password" value="" placeholder="Password Tereset, Input Kembali" class="form-control">
                                    <br>

                                    <input type="submit" name="simpan" value="Ubah User" class="btn btn-primary">

                                </form>
                            </table>
                        </div>
                    </div>
                </div>
    </main>

    <?php include '../template/footer.php'; ?>