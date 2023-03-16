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

                            <br>
                            <br>
                            <form method="GET" action="tampil_transaksi.php">
                                <label>User Filter : </label>
                                <input type="text" name="user_filter" value="<?php if (isset($_GET['user_filter'])) {
                                                                                    echo $_GET['user_filter'];
                                                                                } ?>">
                                <button type="submit">Search</button>
                            </form>
                            <br>
                            <form method="GET" action="tampil_transaksi.php">
                                <label>Date Filter : </label>
                                <input type="text" name="tahun_filter" placeholder="tttt-bb-hh" value="<?php if (isset($_GET['tahun_filter'])) {
                                                                                                            echo $_GET['tahun_filter'];
                                                                                                        } ?>">
                                <button type="submit">Search</button>
                            </form>
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
                                        <th>Harga</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include "../../koneksi.php";

                                    if (isset($_GET['user_filter'])) {
                                        $searching = $_GET['user_filter'];
                                        $qry_transaksi = "select * from detail_transaksi inner join transaksi on transaksi.id_transaksi=detail_transaksi.id_transaksi INNER JOIN user ON transaksi.id_user = user.id_user INNER JOIN meja ON transaksi.id_meja = meja.id_meja WHERE nama_user LIKE '%" . $searching . "%'";
                                    } elseif (isset($_GET['tahun_filter'])) {
                                        $searching = $_GET['tahun_filter'];
                                        $qry_transaksi = "select * from detail_transaksi inner join transaksi on transaksi.id_transaksi=detail_transaksi.id_transaksi INNER JOIN user ON transaksi.id_user = user.id_user INNER JOIN meja ON transaksi.id_meja = meja.id_meja WHERE tgl_transaksi LIKE '" . $searching . "%'";
                                    } else {
                                        $qry_transaksi = "select * from detail_transaksi inner join transaksi on transaksi.id_transaksi=detail_transaksi.id_transaksi INNER JOIN user ON transaksi.id_user = user.id_user INNER JOIN meja ON transaksi.id_meja = meja.id_meja order by tgl_transaksi desc";
                                    }

                                    $no = 0;
                                    $tampil = mysqli_query($conn, $qry_transaksi);
                                    while ($data_transaksi = mysqli_fetch_array($tampil)) {
                                        $no++;
                                        // $menu_dipesan = "<ol>";
                                        // $qry_menu = mysqli_query($conn, "select * from  detail_transaksi inner join transaksi on transaksi.id_transaksi=detail_transaksi.id_transaksi inner join menu on menu.id_menu=detail_transaksi.id_menu where id_detail_transaksi = '" . $data_transaksi['id_detail_transaksi'] . "'");
                                        // while ($dt_menu = mysqli_fetch_array($qry_menu)) {
                                        //     $menu_dipesan .= "<li>" . $dt_menu['nama_menu'] . "</li>";
                                        // }
                                        // $menu_dipesan .= "</ol>";

                                        $user = $data_transaksi['nama_user'];

                                        $harga = $data_transaksi['harga_total'];


                                        if ($data_transaksi['status'] == 'lunas') {
                                            $status = "<label class='alert alert-success'>Lunas</label>";
                                        } else {
                                            $status = "<label class='alert alert-danger'>Belum Lunas</label>";
                                        } ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $data_transaksi['tgl_transaksi'] ?></td>
                                            <td><?= $user ?></td>
                                            <td><?= $data_transaksi['nomor_meja'] ?></td>
                                            <td><?= $data_transaksi['nama_pelanggan'] ?></td>
                                            <!-- <td><?= $menu_dipesan ?></td> -->
                                            <td>Rp <?= $harga ?></td>
                                            <td><?= $status ?></td>
                                        </tr>
                                    <?php
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </main>
    <?php include 'footer.php'; ?>