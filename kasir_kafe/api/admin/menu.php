<?php include 'head-nav_admin.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard Menu</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Selamat makan dan selamat menikmati waktu anda </li>
            </ol>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Menu
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis</th>
                                        <th>Deskripsi</th>
                                        <th>Gambar</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include "../../koneksi.php";
                                    $qry_menu = mysqli_query($conn, "select * from menu");
                                    $no = 0;
                                    while ($data_menu = mysqli_fetch_array($qry_menu)) {
                                        $no++; ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $data_menu['nama_menu'] ?></td>
                                            <td><?= $data_menu['jenis'] ?></td>
                                            <td><?= $data_menu['deskripsi'] ?></td>
                                            <td><?php echo "<img src='../../file_foto/Menu/$data_menu[gambar]' width='150' height='150' />"; ?></td>
                                            <td><?= $data_menu['harga'] ?></td>
                                            <td> |
                                                <a href="ubah/ubah_menu.php?id_menu=<?= $data_menu['id_menu'] ?>" class="btn btn-success">Ubah</a> |
                                                <a href="../../hapus.php?id_menu=<?= $data_menu['id_menu'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a> |
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    <tr><a href="tambah/tambah_menu.php" class="btn btn-success">Tambah</a></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </main>
    <?php include 'footer.php'; ?>