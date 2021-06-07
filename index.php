<?php

include "header.php";

// cek login
if (isset($_SESSION["login"])) {
    header("Location: admin.php");
    exit;
}


// cek apakah tombol beli sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasi di tambahkan atau tidak
    if (beli($_POST) > 0) {
        echo "
        <script>
            alert('Pesanan sedang diproses, anda akan dikonfirmasi kurang dari 24 jam dari sekarang');
            document.location.href = 'index.php#portfolio';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Pesanan Gagal diproses');
        </script>
        ";
    }
}

// login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "admin") {
        if ($password == "admin") {
            $_SESSION["login"] = true;
            $_SESSION["user"] = $pass['id'];
            header("Location: admin.php");
            exit;
        }
    }

    $error = true;
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
            <h2 class="section-heading text-uppercase">VALDA STORE</h2>
            <h3 class="section-subheading text-muted">!!! Happy shopping !!!</h3>
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
            <h2 class="section-heading text-uppercase">About me</h2>
            <h3 class="section-subheading text-muted">My goal is to make this assignment.</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="assets/img/profil.jpg" alt="..." />
                    <h4>AURELLIA MARTHA MAVALDHA HUWAE</h4>
                    <p class="text-muted">Lead Designer & Programmer</p>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <p class="large text-muted">Hallo everyone, welcome to my page
                    I made this task to fulfill my tasks - a web based system in making web applications.</p>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio Modals-->
<!-- Portfolio item 1 modal popup-->
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project details-->
                            <h2 class="text-uppercase">Detail Produck</h2>
                            <p class="item-intro text-muted">Complete purchase data</p>
                            <img id="image" class="img-fluid d-block mx-auto" src="" alt="..." />
                            <form method="POST" action="index.php">
                                <div class="mb-3">
                                    <label for="nama_barang" class="form-label">Nama Barang</label>
                                    <input style="text-align: center;" type="text" name="nama_barang" class="form-control" id="nama_barang" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="merek" class="form-label">Merek</label>
                                    <input style="text-align: center;" type="text" name="merek" class="form-control" id="merek" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="ukuran" class="form-label">Ukuran</label>
                                    <input style="text-align: center;" type="text" name="ukuran" class="form-control" id="ukuran" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_pembeli" class="form-label">Nama Anda</label>
                                    <input style="text-align: center;" type="text" name="nama_pembeli" class="form-control" id="nama_pembeli">
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">Nomor Hp</label>
                                    <input style="text-align: center;" type="text" name="no_hp" class="form-control" id="no_hp">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input style="text-align: center;" type="text" name="alamat" class="form-control" id="alamat">
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input style="text-align: center;" type="text" name="harga" class="form-control" id="harga" readonly>
                                </div>
                                <button class="btn btn-primary btn-xl text-uppercase" type="submit" name="submit">
                                    Buy Now
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Portfolio item 1 modal popup-->
<div class="portfolio-modal modal fade" id="formlogin" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project details-->
                            <h2 class="text-uppercase">Login</h2>
                            <?php if (isset($error)) : ?>
                                <p class="item-intro text-muted" style="background-color: red;">Username / Password Salah</p>
                            <?php endif; ?>
                            <form method="POST" action="index.php">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input style="text-align: center;" type="text" name="username" class="form-control" id="username">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input style="text-align: center;" type="text" name="password" class="form-control" id="password">
                                </div>
                                <button class="btn btn-primary btn-xl text-uppercase" type="submit" name="login">
                                    Login Now
                                </button>
                            </form><br><br><br>
                            <p class="item-intro text-muted" style="background-color: yellow;">Username : admin | Password = admin</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>