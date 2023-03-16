<?php include 'head-nav_admin.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard Meja</h1>
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
                            Meja
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Meja</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include "../../koneksi.php";
                                    $qry_meja = mysqli_query($conn, "select * from meja");
                                    $no = 0;
                                    while ($data_meja = mysqli_fetch_array($qry_meja)) {
                                        $no++; ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $data_meja['nomor_meja'] ?></td>
                                            <td> |
                                                <a href="ubah/ubah_meja.php?id_meja=<?= $data_meja['id_meja'] ?>" class="btn btn-success">Ubah</a> |
                                                <a href="../../hapus.php?id_meja=<?= $data_meja['id_meja'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a> |
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    <tr><a href="tambah/tambah_meja.php" class="btn btn-success">Tambah</a></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </main>
    <?php include 'footer.php'; ?>