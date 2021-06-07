<?php

include "header.php";

// cek login
if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}


// cek apakah tombol hapus sudah ditekan atau belum
if (isset($_POST["jhapus"])) {
    // cek apakah data berhasi di tambahkan atau tidak
    if (delete($_POST, "store") > 0) {
        echo "
        <script>
            alert('Produk berhasil dihapus.');
            document.location.href = 'admin.php#portfolio';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Produk gagal di dihapus.');
        </script>
        ";
    }
}

// cek apakah tombol jual sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasi di tambahkan atau tidak
    if (jual($_POST) > 0) {
        echo "
        <script>
            alert('Produk berhasil di upload.');
            document.location.href = 'admin.php#portfolio';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Produk gagal di upload.');
        </script>
        ";
    }
}

// cek apakah tombol ubah sudah ditekan atau belum
if (isset($_POST["ubah"])) {
    // cek apakah data berhasi di tambahkan atau tidak
    if (update($_POST) > 0) {
        echo "
        <script>
            alert('Produk berhasil di diubah.');
            document.location.href = 'admin.php#portfolio';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Produk gagal di diubah.');
        </script>
        ";
    }
}

?>
<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <div class="masthead-subheading">Welcome To Valda Store</div>
        <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
        <a class="btn btn-primary btn-xl text-uppercase" href="#portfolio">Continue</a>
    </div>
</header>
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Sell Produck</h2>
            <h3 class="section-subheading text-muted">
                <button class="btn btn-primary" data-bs-toggle="modal" href="#jual">Sell Now</button>
            </h3>
        </div>
        <div class="row">
            <!-- Portfolio item 1-->
            <?php foreach ($store as $s) : ?>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="portfolio-item">
                        <a class="portfolio-link klik" data-id="<?= $s['id']; ?>" data-nama_barang="<?= $s['nama_barang']; ?> " data-merek="<?= $s['merek']; ?> " data-ukuran="<?= $s['ukuran']; ?> " data-harga="<?= $s['harga']; ?> " data-gambar="<?= $s['gambar']; ?> " data-description="<?= $s['description']; ?> " data-bs-toggle="modal" href="#portfolioModal1">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/produk/<?= $s['gambar']; ?>" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading"><?= $s['nama_barang']; ?></div>
                            <div class="portfolio-caption-subheading text-muted">Rp. <?= $s['harga']; ?></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Team-->
<section class="page-section bg-light" id="about">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">the orders table</h2>
            <h3 class="section-subheading text-muted">Please check it.</h3>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Merek</th>
                        <th scope="col">Ukuran</th>
                        <th scope="col">Nama Pembeli</th>
                        <th scope="col">No Hp</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pesanan as $p) : ?>
                        <tr>
                            <th>1</th>
                            <td><?= $p['nama_barang']; ?></td>
                            <td><?= $p['merek']; ?></td>
                            <td><?= $p['ukuran']; ?></td>
                            <td><?= $p['nama_pembeli']; ?></td>
                            <td><?= $p['no_hp']; ?></td>
                            <td><?= $p['alamat']; ?></td>
                            <td>Rp. <?= $p['harga']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- Portfolio Modals-->
<!-- Modal untuk jual-->
<div class="portfolio-modal modal fade" id="jual" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project details-->
                            <h2 class="text-uppercase">Selling Products</h2>
                            <p class="item-intro text-muted">Complete sales data</p>
                            <img id="img" class="img-fluid d-block mx-auto img-preview" src="assets/img/defauld.png" alt="..." />
                            <form method="POST" action="" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="nama_barang" class="form-label file-label">Gambar</label>
                                    <input style="text-align: center;" type="file" name="gambar" class="form-control" id="jgambar" onchange="previewImg()">
                                </div>
                                <div class="mb-3">
                                    <label for="nama_barang" class="form-label">Nama Barang</label>
                                    <input style="text-align: center;" type="text" name="nama_barang" class="form-control" id="jnama_barang">
                                </div>
                                <div class="mb-3">
                                    <label for="merek" class="form-label">Merek</label>
                                    <input style="text-align: center;" type="text" name="merek" class="form-control" id="jmerek">
                                </div>
                                <div class="mb-3">
                                    <label for="ukuran" class="form-label">Ukuran</label>
                                    <input style="text-align: center;" type="text" name="ukuran" class="form-control" id="jukuran">
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input style="text-align: center;" type="text" name="harga" class="form-control" id="jharga">
                                </div>
                                <button class="btn btn-primary btn-xl text-uppercase" type="submit" name="submit">
                                    Sell Now
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal untuk edit-->
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project details-->
                            <h2 class="text-uppercase">Edit Produck</h2>
                            <p class="item-intro text-muted">Complete the data to continue the sale.</p>
                            <img id="image" class="img-fluid d-block mx-auto preview" src="" alt="..." />
                            <form method="POST" action="">
                                <input type="hidden" name="gambar_lama" id="valda">
                                <input type="hidden" name="id" id="id">
                                <div class="mb-3">
                                    <label for="nama_barang" class="form-label file-label label">Gambar</label>
                                    <input style="text-align: center;" type="file" name="gambar" class="form-control" id="egambar" onchange="editImg()">
                                </div>
                                <div class="mb-3">
                                    <label for="nama_barang" class="form-label">Nama Barang</label>
                                    <input style="text-align: center;" type="text" name="nama_barang" class="form-control" id="nama_barang">
                                </div>
                                <div class="mb-3">
                                    <label for="merek" class="form-label">Merek</label>
                                    <input style="text-align: center;" type="text" name="merek" class="form-control" id="merek">
                                </div>
                                <div class="mb-3">
                                    <label for="ukuran" class="form-label">Ukuran</label>
                                    <input style="text-align: center;" type="text" name="ukuran" class="form-control" id="ukuran">
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input style="text-align: center;" type="text" name="harga" class="form-control" id="harga">
                                </div>
                                <button class="btn btn-danger text-uppercase" type="submit" name="jhapus">
                                    Delete Data
                                </button>
                                <button class="btn btn-primary text-uppercase" type="submit" name="ubah">
                                    Edit Now
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>