<?php include 'head-nav_admin.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard User</h1>
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
                            User
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Role</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include "../../koneksi.php";
                                    $qry_user = mysqli_query($conn, "select * from user");
                                    $no = 0;
                                    while ($data_user = mysqli_fetch_array($qry_user)) {

                                        $role = $data_user['role'];
                                        if ($role == 'empty') {
                                        } else {
                                            $no++;
                                    ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $data_user['nama_user'] ?></td>
                                                <td><?= $role ?></td>
                                                <td><?= $data_user['username'] ?></td>
                                                <td><?= $data_user['password'] ?></td>
                                                <td> |
                                                    <a href="ubah/ubah_user.php?id_user=<?= $data_user['id_user'] ?>" class="btn btn-success">Ubah</a> |
                                                    <a href="../../hapus.php?id_user=<?= $data_user['id_user'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a> |
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <tr><a href="tambah/tambah_user.php" class="btn btn-success">Tambah</a></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </main>
    <?php include 'footer.php'; ?>