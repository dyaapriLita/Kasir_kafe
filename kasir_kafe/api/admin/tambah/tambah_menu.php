<?php include '../template/head-nav_folder.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard Tambah Menu</h1>
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
                            Tambah Menu
                        </div>
                        <div class="card-body">
                            <table>

                                <form action="../proses/proses_tambah_menu.php" method="post" enctype="multipart/form-data">

                                    Nama Menu :

                                    <input type="text" name="nama_menu" value="" class="form-control">
                                    <br>

                                    Jenis :

                                    <select name="jenis" class="form-control">

                                        <option></option>

                                        <option value="makanan">Makanan</option>

                                        <option value="minuman">Minuman</option>

                                    </select>
                                    <br>

                                    Deskripsi :

                                    <input type="text" name="deskripsi" value="" class="form-control">
                                    <br>

                                    Gambar :
                                    <br>

                                    <input type="file" name="filegambar" id="filegambar">
                                    <br>
                                    <br>

                                    Harga :

                                    <input type="number" name="harga" value="" class="form-control">
                                    <br>

                                    <input type="submit" name="simpan" value="Tambah Menu" class="btn btn-primary">

                                </form>
                            </table>
                        </div>
                    </div>
                </div>
    </main>

    <?php include '../template/footer.php'; ?>