<div class="row">
    <?php
    include '../../koneksi.php';
    $sql = "select * from menu order by id_menu desc";
    $hasil = mysqli_query($conn, $sql);
    $jumlah = mysqli_num_rows($hasil);
    if ($jumlah > 0) {
        while ($data = mysqli_fetch_array($hasil)) :
    ?>
            <div class="col-sm-3">
                <div class="thumbnail">
                    <a href="#"><img src="../../file_foto/Menu/<?php echo $data['gambar']; ?>" width="100%" alt="Cinque Terre"></a>
                    <div class="caption">
                        <h3><?php echo $data['nama_menu']; ?></h3>
                        <h4>Rp. <?php echo number_format($data['harga'], 2, ',', '.'); ?> </h4>
                        <p><a href="index.php?halaman=keranjang-belanja&id_menu=<?php echo $data['id_menu']; ?>&aksi=tambah_menu&jumlah=1" class="btn btn-primary btn-block" role="button">Masukan Keranjang</a></p>
                    </div>
                </div>
            </div>
    <?php
        endwhile;
    } else {
        echo "<div class='alert alert-warning'> Tidak ada menu pada kategori ini.</div>";
    };
    ?>
</div>