<?php include '../template/head-nav_folder.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard Tambah User</h1>
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
                            Tambah User
                        </div>
                        <div class="card-body">
                            <table>

                                <form action="../proses/proses_tambah_user.php" method="post" enctype="multipart/form-data">

                                    Nama User :

                                    <input type="text" name="nama_user" value="" class="form-control">
                                    <br>

                                    Role :

                                    <select name="role" class="form-control">

                                        <option></option>

                                        <option value="admin">admin</option>

                                        <option value="kasir">kasir</option>

                                        <option value="manajer">manajer</option>

                                    </select>
                                    <br>

                                    Username :

                                    <input type="text" name="username" value="" class="form-control">
                                    <br>

                                    Password :

                                    <input type="password" name="password" value="" class="form-control">
                                    <br>

                                    <input type="submit" name="simpan" value="Tambah User" class="btn btn-primary">

                                </form>
                            </table>
                        </div>
                    </div>
                </div>
    </main>

    <?php include '../template/footer.php'; ?>