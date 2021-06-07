<?php

include "fungsi.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>201971021</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- untuk image preview upload -->
    <script>
        function previewImg() {
            const gambar = document.querySelector("#jgambar");
            const label = document.querySelector(".file-label");
            const imgPreview = document.querySelector(".img-preview");

            label.textContent = gambar.files[0].name;

            const gambarBaru = new FileReader();
            gambarBaru.readAsDataURL(gambar.files[0]);

            gambarBaru.onload = function(e) {
                imgPreview.src = e.target.result;
            };
        }
    </script>
    <!-- untuk image preview update -->
    <script>
        function editImg() {
            const gambar = document.querySelector("#egambar");
            const label = document.querySelector(".label");
            const imgPreview = document.querySelector(".preview");

            label.textContent = gambar.files[0].name;

            const gambarBaru = new FileReader();
            gambarBaru.readAsDataURL(gambar.files[0]);

            gambarBaru.onload = function(e) {
                imgPreview.src = e.target.result;
            };
        }
    </script>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">
                <h1 style="font-family: 'Courier New', Courier, monospace;">ValdaStore</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item dashboard"><a class="nav-link" href="#page-top">Dashboard</a></li>
                    <li class="nav-item store"><a class="nav-link" href="#portfolio">Store</a></li>
                    <li class="nav-item about"><a class="nav-link" href="#about">About</a></li>
                    <li id="admin" class="nav-item"><a class="nav-link" data-bs-toggle="modal" href="#formlogin">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>