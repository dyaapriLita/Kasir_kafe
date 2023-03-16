<?php include 'head-nav_admin.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard Transaksi</h1>
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
                            Transaksi
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tgl Transaksi</th>
                                        <th>User</th>
                                        <th>No Meja</th>
                                        <th>Nama Pelanggan</th>
                                        <!-- <th>Menu</th> -->
                                        <th>Harga Bayar</th>
                                        <th>Status</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include "../../koneksi.php";
                                    $qry_detail_transaksi = mysqli_query($conn, "select * from detail_transaksi INNER JOIN transaksi ON detail_transaksi.id_transaksi=transaksi.id_transaksi INNER JOIN user ON transaksi.id_user = user.id_user INNER JOIN meja ON transaksi.id_meja = meja.id_meja order by id_detail_transaksi desc");
                                    $no = 0;
                                    unset($_SESSION['id']);
                                    while ($data_transaksi = mysqli_fetch_array($qry_detail_transaksi)) {
                                        $nomor_meja = $data_transaksi['nomor_meja'];
                                        $user = $data_transaksi['nama_user'];
                                        $tgl = $data_transaksi['tgl_transaksi'];


                                        $harga = $data_transaksi['harga_total'];
                                        $no++;

                                        if ($data_transaksi['status'] == 'lunas') {
                                            $status = "<label class='alert alert-success'>Lunas</label>";
                                            $button1 = "<a href='nota.php?id_transaksi=" . $data_transaksi['id_transaksi'] . "' class='btn btn-info'>Nota</a>";
                                            $button2 = "";
                                            $button3 = "";
                                        } else {
                                            $status = "<label class='alert alert-danger'>Belum Bayar</label>";
                                            $button1 = "<a href='index.php?id_transaksi=" . $data_transaksi['id_transaksi'] . "' class='btn btn-warning'>Pesan</a>";
                                            $button2 = "<a href='ubah/ubah_transaksi.php?id_transaksi=" . $data_transaksi['id_transaksi'] . "' class='btn btn-success'>Ubah</a>";
                                            $button3 = "<a href='../../hapus.php?id_detail_transaksi=" . $data_transaksi['id_detail_transaksi'] . "' onclick='return confirm('Apakah anda yakin menghapus data ini?')' class='btn btn-danger'>Hapus</a>";
                                        }

                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $tgl ?></td>
                                            <td><?= $user ?></td>
                                            <td><?= $nomor_meja ?></td>
                                            <td><?= $data_transaksi['nama_pelanggan'] ?></td>
                                            <!-- <td><?= $menu_dipesan ?></td> -->
                                            <td>Rp <?= $harga ?></td>
                                            <td><?= $status ?></td>
                                            <td>
                                                <?= $button1; ?>
                                                <?= $button2; ?>
                                                <?= $button3; ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    <tr><a href="tambah/tambah_transaksi.php" class="btn btn-success">Tambah</a></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </main>
    <?php include 'footer.php'; ?>