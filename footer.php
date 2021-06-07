<!-- Footer-->
<footer class="footer py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-lg-start">
                Name : AURELLIA MARTHA MAVALDHA HUWAE
            </div>
            <div class="col-lg-4 my-3 my-lg-0">
                <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="col-lg-4 text-lg-end">
                Nim : 201971021
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<!-- jquery-->
<script src="js/jquery.min.js"></script>
<!-- untuk menu modal -->
<script>
    $(document).ready(function() {
        $(".klik").click(function() {
            const id = $(this).data("id");
            const nama_barang = $(this).data("nama_barang");
            const merek = $(this).data("merek");
            const ukuran = $(this).data("ukuran");
            const harga = $(this).data("harga");
            const gambar = $(this).data("gambar");

            $("#image").attr("src", "assets/produk/" + gambar);
            $("#valda").val(gambar);
            $("#nama_barang").val(nama_barang);
            $("#merek").val(merek);
            $("#ukuran").val(ukuran);
            $("#harga").val(harga);
            $("#id").val(id);
        });

        if (window.location.href == "http://localhost/201971021/admin.php") {
            $("#admin").html(`<a class="nav-link" href="logout.php">Logout</a>`);
            $(".dashboard").html(`<a class="nav-link" href="#page-top">Dashboard</a>`);
            $(".store").html(`<a class="nav-link" href="#portfolio">Store</a>`);
            $(".about").html(`<a class="nav-link" href="#about">Order</a>`);
        } else if (
            window.location.href == "http://localhost/201971021/admin.php#portfolio"
        ) {
            $("#admin").html(`<a class="nav-link" href="logout.php">Logout</a>`);
            $(".dashboard").html(`<a class="nav-link" href="#page-top">Dashboard</a>`);
            $(".store").html(`<a class="nav-link" href="#portfolio">Store</a>`);
            $(".about").html(`<a class="nav-link" href="#about">Order</a>`);
        } else if (
            window.location.href == "http://localhost/201971021/admin.php#page-top"
        ) {
            $("#admin").html(`<a class="nav-link" href="logout.php">Logout</a>`);
            $(".dashboard").html(`<a class="nav-link" href="#page-top">Dashboard</a>`);
            $(".store").html(`<a class="nav-link" href="#portfolio">Store</a>`);
            $(".about").html(`<a class="nav-link" href="#about">Order</a>`);
        } else if (
            window.location.href == "http://localhost/201971021/admin.php#about"
        ) {
            $("#admin").html(`<a class="nav-link" href="logout.php">Logout</a>`);
            $(".dashboard").html(`<a class="nav-link" href="#page-top">Dashboard</a>`);
            $(".store").html(`<a class="nav-link" href="#portfolio">Store</a>`);
            $(".about").html(`<a class="nav-link" href="#about">Order</a>`);
        }
    });
</script>

</body>

</html>