<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title; ?></title>
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/global/images/logo_bg.png" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url(); ?>assets/sbpages/css/styles.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar shadow navbar-expand-lg navbar-dark bg-success fixed-top" id="mainNav">
        <div class="container px-4">
            <a class="navbar-brand" href="<?= base_url(); ?>">#EsperoJaya</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Homepage
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?= base_url(); ?>#page-top">Welcome</a></li>
                            <li><a class="dropdown-item" href="<?= base_url(); ?>#about">About</a></li>
                            <li><a class="dropdown-item" href="<?= base_url(); ?>#sambutan">Sambutan</a></li>
                            <li><a class="dropdown-item" href="<?= base_url(); ?>#services">Why Us?</a></li>
                            <li><a class="dropdown-item" href="<?= base_url(); ?>#info">Informasi</a></li>
                            <!-- <li><a class="dropdown-item" href="<?= base_url(); ?>#galeri">Galeri</a></li> -->
                            <li><a class="dropdown-item" href="<?= base_url(); ?>#contact">Contact</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url(); ?>info">Informasi</a>
                    </li>
                </ul>
                <form class="d-flex" method="POST" autocomplete="off" action="<?= base_url(); ?>info/cari">
                    <input class="form-control me-2" type="search" id="keyword" name="keyword" placeholder="Cari informasi" aria-label="Search">
                    <button class="btn btn-light" type="submit">Cari</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-gradient-success bg-success border-bottom mb-4">
        <div class="container">
            <div class="text-center text-light mt-5">
                <h1 class="fw-bolder"><?= $header; ?></h1>
                <p class="lead mb-0"><?= $deskripsi; ?></p>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->