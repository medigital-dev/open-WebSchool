<!--
=========================================================
* Argon Design System - v1.2.2
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-design-system
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- favicon -->
    <?php if ($webConfig) : ?>
        <?php if ($webConfig[0]['icon']) : ?>
            <link rel="shortcut icon" href="<?= $webConfig[0]['icon']; ?>" type="image/x-icon">
        <?php else : ?>
            <link rel="shortcut icon" href="<?= base_url('dist/images/medigitaldev-green.png'); ?>" type="image/x-icon">
        <?php endif; ?>
    <?php else : ?>
        <link rel="shortcut icon" href="<?= base_url('dist/images/medigitaldev-green.png'); ?>" type="image/x-icon">
    <?php endif; ?>
    <title>
        <?= $title; ?>
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome/css/all.min.css'); ?>">
    <!-- <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet"> -->
    <!-- Nucleo Icons -->
    <!-- <link href="<?= base_url('plugins/argon/css/nucleo-icons.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('plugins/argon/css/nucleo-svg.css'); ?>" rel="stylesheet" /> -->
    <!-- Font Awesome Icons -->
    <!-- <link href="<?= base_url('plugins/argon/css/font-awesome.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('plugins/argon/css/nucleo-svg.css'); ?>" rel="stylesheet" /> -->
    <!-- CSS Files -->
    <link href="<?= base_url('plugins/argon/css/argon-design-system.css?v=1.2.2'); ?>" rel="stylesheet" />

    <link rel="stylesheet" href="<?= base_url('plugins/carousel-07/css/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/carousel-07/css/owl.theme.default.min.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <!-- <link rel="stylesheet" href="<?= base_url('plugins/carousel-07/css/style.css'); ?>"> -->

    <style>
        .counter-section i {
            display: block;
            margin: 0 0 10px
        }

        .counter-section span.counter {
            font-size: 40px;
            color: #000;
            line-height: 60px;
            display: block;
            /* font-family: "Oswald", sans-serif; */
            letter-spacing: 2px
        }

        .counter-title {
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase
        }

        .counter-icon {
            top: 25px;
            position: relative
        }

        .counter-style2 .counter-title {
            letter-spacing: 0.55px;
            float: left;
        }

        .counter-style2 span.counter {
            letter-spacing: 0.55px;
            float: left;
            margin-right: 10px;
        }

        .counter-style2 i {
            float: right;
            line-height: 26px;
            margin: 0 10px 0 0
        }

        .counter-subheadline span {
            float: right;
        }

        .medium-icon {
            font-size: 40px !important;
            margin-bottom: 15px !important;
        }

        /* owl carousel */
        .ftco-section {
            padding: 7em 0;
        }

        .ftco-no-pt {
            padding-top: 0;
        }

        .ftco-no-pb {
            padding-bottom: 0;
        }

        .heading-section {
            font-size: 28px;
            color: #000;
        }

        /* .img {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }

        .btn {
            font-size: 14px;
        }

        .btn.btn-primary {
            background: #ff487e;
            border-color: #ff487e;
        } */

        .owl-carousel {
            position: relative;
        }

        .owl-carousel .owl-item {
            opacity: 1;
        }

        .owl-carousel .owl-item.active {
            opacity: 1;
        }

        .owl-carousel .owl-nav {
            position: absolute;
            top: 50%;
            width: 100%;
        }

        .owl-carousel .owl-nav .owl-prev,
        .owl-carousel .owl-nav .owl-next {
            position: absolute;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            margin-top: -10px;
            color: rgba(0, 0, 0, 0.1) !important;
            -webkit-transition: 0.7s;
            -o-transition: 0.7s;
            transition: 0.7s;
            opacity: 0;
        }

        @media (prefers-reduced-motion: reduce) {

            .owl-carousel .owl-nav .owl-prev,
            .owl-carousel .owl-nav .owl-next {
                -webkit-transition: none;
                -o-transition: none;
                transition: none;
            }
        }

        .owl-carousel .owl-nav .owl-prev span:before,
        .owl-carousel .owl-nav .owl-next span:before {
            font-size: 30px;
        }

        .owl-carousel .owl-nav .owl-prev {
            left: 0;
        }

        .owl-carousel .owl-nav .owl-next {
            right: 0;
        }

        .owl-carousel .owl-dots {
            text-align: center;
            margin-top: 20px;
        }

        .owl-carousel .owl-dots .owl-dot {
            width: 10px;
            height: 10px;
            margin: 5px;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .owl-carousel .owl-dots .owl-dot:hover,
        .owl-carousel .owl-dots .owl-dot:focus {
            outline: none !important;
        }

        .owl-carousel .owl-dots .owl-dot.active {
            background: #5e72e4;
        }

        .owl-carousel:hover .owl-nav .owl-prev,
        .owl-carousel:hover .owl-nav .owl-next {
            opacity: 1;
        }

        .owl-carousel:hover .owl-nav .owl-prev {
            left: -25px;
        }

        .owl-carousel:hover .owl-nav .owl-next {
            right: -25px;
        }

        .owl-carousel.owl-drag .owl-item {
            -ms-touch-action: pan-y;
            touch-action: pan-y;
        }

        .block-20 {
            overflow: hidden;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            height: 275px;
            position: relative;
            display: block;
        }

        .blog-entry {
            width: 100%;
            background: #fff;
        }

        .blog-entry .text {
            position: relative;
            border-top: 0;
            border-radius: 2px;
        }

        .blog-entry .text .heading {
            font-size: 20px;
            margin-bottom: 16px;
            font-weight: 600;
        }

        .blog-entry .text .heading a {
            color: #000;
        }

        .blog-entry .text .heading a:hover,
        .blog-entry .text .heading a:focus,
        .blog-entry .text .heading a:active {
            color: #ff487e;
        }

        .blog-entry .text .meta-chat {
            color: #b3b3b3;
        }

        .blog-entry .text .read {
            color: #000;
            font-size: 14px;
        }

        .blog-entry .meta-date {
            display: inline-block;
            background: #343a40;
        }

        .blog-entry .meta-date span {
            display: block;
            color: #fff;
        }

        .blog-entry .meta-date .day {
            font-weight: 700;
            font-size: 20px;
        }

        .blog-entry .meta-date .mos,
        .blog-entry .meta-date .yr {
            font-size: 13px;
        }

        .blog-entry .meta>div {
            display: block;
            margin-right: 5px;
            margin-bottom: 0px;
            font-size: 15px;
        }

        .blog-entry .meta>div a {
            color: #b3b3b3;
            font-size: 13px;
        }

        .blog-entry .meta>div a:hover {
            color: #cccccc;
        }

        .blog-entry .meta2 a {
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 1px;
            color: rgba(0, 0, 0, 0.4);
        }

        /* end owl carousel */
    </style>
</head>

<body class="landing-page">
    <?php if ($dataMedsos || $identitas) : ?>
        <div class="container">
            <div class="row">
                <div class="col-12 py-2">
                    <div class="d-flex justify-content-between text-primary">
                        <?php if ($dataMedsos) : ?>
                            <div class="btn-group shadow" role="group">
                                <?php foreach ($dataMedsos as $dataMedsos) : ?>
                                    <?php if ($dataMedsos['is_active'] != 0) : ?>
                                        <a href="<?= $dataMedsos['url']; ?>" target="_blank" class="btn btn-sm btn-primary"><?= $dataMedsos['icon']; ?></a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($identitas) : ?>
                            <div class="btn-group shadow" role="group">
                                <?= ($identitas['telepon']) ? '<a href="tel:' . $identitas['telepon'] . '" class="btn btn-sm btn-success"><i class="fas fa-phone"></i></a>' : '' ?>
                                <?= ($identitas['email']) ? '<a href="tel:' . $identitas['email'] . '" class="btn btn-sm btn-success"><i class="fas fa-envelope"></i></a>' : '' ?>
                                <?= ($identitas['url_maps']) ? '<a href="tel:' . $identitas['url_maps'] . '" class="btn btn-sm btn-success"><i class="fas fa-map-marker-alt"></i></a>' : '' ?>
                                <?= ($identitas['whatsapp']) ? '<a href="tel:' . $identitas['whatsapp'] . '" class="btn btn-sm btn-success"><i class="fab fa-whatsapp"></i></a>' : '' ?>
                                <?= ($identitas['telegram']) ? '<a href="tel:' . $identitas['telegram'] . '" class="btn btn-sm btn-success"><i class="fas fa-telegram"></i></a>' : '' ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- Navbar -->
    <nav id="navbar-main" class="navbar position-sticky bg-gradient-primary shadow navbar-main navbar-expand-lg navbar-transparent navbar-light py-2">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url(); ?>">
                <?php if ($webConfig) : ?>
                    <table class="table table-borderless text-white table-sm m-0">
                        <tr>
                            <?php if ($webConfig[0]['logo']) : ?>
                                <td <?= ($webConfig[0]['tagline']) ? 'rowspan="2"' : ''; ?> class="p-0 align-middle">
                                    <img src="<?= $webConfig[0]['logo']; ?>" class="mr-2" height="50" alt="Logo">
                                </td>
                            <?php endif;  ?>
                            <?php if ($webConfig[0]['judul']) : ?>
                                <td class="p-0  <?= ($webConfig[0]['tagline']) ? '' : 'align-middle'; ?>" style="line-height: 1;">
                                    <span class="h5 p-0 m-0 font-weight-bold"><?= $webConfig[0]['judul']; ?></span>
                                </td>
                            <?php else : ?>
                                <td class="p-0  <?= ($webConfig[0]['tagline']) ? '' : 'align-middle'; ?>" style="line-height: 1;">
                                    <span class="h5 p-0 m-0 font-weight-bold text-white">WebSchool</span>
                                </td>
                            <?php endif; ?>
                        </tr>
                        <?php if ($webConfig[0]['tagline']) : ?>
                            <tr>
                                <td class="p-0 <?= ($webConfig[0]['judul']) ? '' : 'align-middle'; ?>" style="line-height: 1;">
                                    <span class="h6 m-0"><?= $webConfig[0]['tagline']; ?></span>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </table>
                <?php else : ?>
                    <span class="h5 p-0 m-0 font-weight-bold text-white">WebSchool</span>
                <?php endif ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-ellipsis-v"></i>
            </button>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="<?= base_url(); ?>">
                                <?php if ($webConfig) : ?>
                                    <?php if ($webConfig[0]['logo'] !== null) : ?>
                                        <img src="<?= base_url($webConfig[0]['logo']); ?>">
                                    <?php else : ?>
                                        <img src="<?= base_url('dist/images/medigitaldev-green.png'); ?>">
                                    <?php endif; ?>
                                <?php else : ?>
                                    <img src="<?= base_url('dist/images/medigitaldev-green.png'); ?>">
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>

                <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="ni ni-ui-04 d-lg-none"></i>
                            <span class="nav-link-inner--text">SmartSchool</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl">
                            <div class="dropdown-menu-inner">
                                <a href="https://demos.creative-tim.com/argon-design-system/docs/getting-started/overview.html" class="media d-flex align-items-center">
                                    <div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
                                        <i class="ni ni-spaceship"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="heading text-primary mb-md-1">Getting started</h6>
                                        <p class="description d-none d-md-inline-block mb-0">Learn how to use compiling Scss, change brand colors and more.</p>
                                    </div>
                                </a>
                                <a href="https://demos.creative-tim.com/argon-design-system/docs/foundation/colors.html" class="media d-flex align-items-center">
                                    <div class="icon icon-shape bg-gradient-success rounded-circle text-white">
                                        <i class="ni ni-palette"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="heading text-primary mb-md-1">Foundation</h6>
                                        <p class="description d-none d-md-inline-block mb-0">Learn more about colors, typography, icons and the grid system we used for .</p>
                                    </div>
                                </a>
                                <a href="https://demos.creative-tim.com/argon-design-system/docs/components/alerts.html" class="media d-flex align-items-center">
                                    <div class="icon icon-shape bg-gradient-warning rounded-circle text-white">
                                        <i class="ni ni-ui-04"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h5 class="heading text-warning mb-md-1">Components</h5>
                                        <p class="description d-none d-md-inline-block mb-0">Browse our 50 beautiful handcrafted components offered in the Free version.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <?php foreach ($menuUtama as $row) : ?>
                        <?php if ($row['tipe'] == 'Default') : ?>
                            <li class="nav-item"><a href="<?= $row['href']; ?>" class="nav-link" <?= ($row['new_tab'] == 1) ? 'target="_blank"' : '' ?>><?= $row['title']; ?></a></li>
                        <?php elseif ($row['tipe'] == 'Dropdown') : ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                    <?= $row['title']; ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php foreach ($allMenu as $allMenu1) : ?>
                                        <?php if ($allMenu1['parent_id'] == $row['id_menu']) : ?>
                                            <?php if ($allMenu1['tipe'] == 'Default') : ?>
                                                <li><a class="dropdown-item" href="<?= $allMenu1['href']; ?>" <?= ($allMenu1['new_tab'] == 1) ? 'target="_blank"' : ''; ?>><?= $allMenu1['title']; ?></a></li>
                                            <?php elseif ($allMenu1['tipe'] == 'Dropdown') : ?>
                                                <li class="dropend">
                                                    <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                        <?= $allMenu1['title']; ?>
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        <?php foreach ($allMenu as $allMenu2) : ?>
                                                            <?php if ($allMenu2['parent_id'] == $allMenu1['id_menu']) : ?>
                                                                <?php if ($allMenu2['tipe'] == 'Default') : ?>
                                                                    <li><a class="dropdown-item" href="<?= $allMenu2['href']; ?>" <?= ($allMenu2['new_tab'] == 1) ? 'target="_blank"' : ''; ?>><?= $allMenu2['title']; ?></a></li>
                                                                <?php elseif ($allMenu2['tipe'] == 'Dropdown') : ?>
                                                                    <li class="nav-item dropdown dropend">
                                                                        <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                            <?= $allMenu2['title']; ?>
                                                                        </a>
                                                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                            <?php foreach ($allMenu as $allMenu3) : ?>
                                                                                <?php if ($allMenu3['parent_id'] == $allMenu2['id_menu']) : ?>
                                                                                    <?php if ($allMenu3['tipe'] == 'Default') : ?>
                                                                                        <li><a class="dropdown-item" href="<?= $allMenu3['href']; ?>" <?= ($allMenu3['new_tab'] == 1) ? 'target="_blank"' : ''; ?>><?= $allMenu3['title']; ?></a></li>
                                                                                    <?php elseif ($allMenu3['tipe'] == 'Dropdown') : ?>
                                                                                        <li class="nav-item dropdown dropend">
                                                                                            <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                                                <?= $allMenu3['title']; ?>
                                                                                            </a>
                                                                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                                                <?php foreach ($allMenu as $allMenu4) : ?>
                                                                                                    <?php if ($allMenu4['parent_id'] == $allMenu3['id_menu']) : ?>
                                                                                                        <?php if ($allMenu4['tipe'] == 'Default') : ?>
                                                                                                            <li><a class="dropdown-item" href="<?= $allMenu4['href']; ?>" <?= ($allMenu4['new_tab'] == 1) ? 'target="_blank"' : ''; ?>><?= $allMenu4['title']; ?></a></li>
                                                                                                        <?php elseif ($allMenu4 == 'Dropdown') : ?>
                                                                                                            <li class="nav-item dropdown dropend">
                                                                                                                <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                                                                    <?= $allMenu4['title']; ?>
                                                                                                                </a>
                                                                                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                                                                    <?php foreach ($allMenu as $allMenu5) : ?>
                                                                                                                        <?php if ($allMenu5['parent_id'] == $allMenu4['id_menu']) : ?>
                                                                                                                            <?php if ($allMenu5['tipe'] == 'Default') : ?>
                                                                                                                                <li><a class="dropdown-item" href="<?= $allMenu5['href']; ?>" <?= ($allMenu5['new_tab'] == 1) ? 'target="_blank"' : ''; ?>><?= $allMenu5['title']; ?></a></li>
                                                                                                                            <?php elseif ($allMenu5['tipe'] == 'Dropdown') : ?>
                                                                                                                                <li class="nav-item dropdown dropend">
                                                                                                                                    <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                                                                                        <?= $allMenu5['title']; ?>
                                                                                                                                    </a>
                                                                                                                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                                                                                        <?php foreach ($allMenu as $allMenu6) : ?>
                                                                                                                                            <?php if ($allMenu6['parent_id'] == $allMenu5['id_menu']) : ?>
                                                                                                                                                <?php if ($allMenu6['tipe'] == 'Default') : ?>
                                                                                                                                                    <li><a class="dropdown-item" href="<?= $allMenu6['href']; ?>" <?= ($allMenu6['new_tab'] == 1) ? 'target="_blank"' : ''; ?>><?= $allMenu6['title']; ?></a></li>
                                                                                                                                                <?php elseif ($allMenu6['tipe'] == 'Dropdown') : ?>
                                                                                                                                                    <li class="nav-item dropdown dropend">
                                                                                                                                                        <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                                                                                                            <?= $allMenu6['title']; ?>
                                                                                                                                                        </a>
                                                                                                                                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                                                                                                            <?php foreach ($allMenu as $allMenu7) : ?>
                                                                                                                                                                <?php if ($allMenu7['parent_id'] == $allMenu6['id_menu']) : ?>
                                                                                                                                                                    <li><a class="dropdown-item" href="<?= $allMenu7['href']; ?>" <?= ($allMenu7['new_tab'] == 1) ? 'target="_blank"' : ''; ?>><?= $allMenu7['title']; ?></a></li>
                                                                                                                                                                <?php endif; ?>
                                                                                                                                                            <?php endforeach; ?>
                                                                                                                                                        </ul>
                                                                                                                                                    </li>
                                                                                                                                                <?php endif; ?>
                                                                                                                                            <?php endif; ?>
                                                                                                                                        <?php endforeach; ?>
                                                                                                                                    </ul>
                                                                                                                                </li>
                                                                                                                            <?php endif; ?>
                                                                                                                        <?php endif; ?>
                                                                                                                    <?php endforeach; ?>
                                                                                                                </ul>
                                                                                                            </li>
                                                                                                        <?php endif; ?>
                                                                                                    <?php endif; ?>
                                                                                                <?php endforeach; ?>
                                                                                            </ul>
                                                                                        </li>
                                                                                    <?php endif; ?>
                                                                                <?php endif; ?>
                                                                            <?php endforeach; ?>
                                                                        </ul>
                                                                    </li>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
                <form method="POST" id="formCari" autocomplete="off" action="<?= base_url(); ?>blogs" class="d-flex me-2 ml-auto">
                    <div class="input-group">
                        <input class="form-control" type="search" id="keyword" name="keyword" placeholder="Cari" aria-label="Search">
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="wrapper">
        <div class="section section-hero section-shaped">
            <div class="shape shape-style-1 shape-primary">
                <span class="span-150"></span>
                <span class="span-50"></span>
                <span class="span-50"></span>
                <span class="span-75"></span>
                <span class="span-100"></span>
                <span class="span-75"></span>
                <span class="span-50"></span>
                <span class="span-100"></span>
                <span class="span-50"></span>
                <span class="span-100"></span>
            </div>
            <div class="page-header">
                <div class="container shape-container d-flex align-items-center py-lg">
                    <div class="col px-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 class="text-white">Selamat Datang di</h4>
                                <h1 class="font-weight-bold text-white">Laman SMP Negeri 2 Wonosari</h1>
                                <p class="lead text-white small">
                                    "Terwujudnya sekolah yang unggul dalam prestasi, terampil, mandiri, sehat, dan berbudaya adiluhung berlandaskan Iman dan taqwa"
                                </p>
                            </div>
                            <div class="col-lg-6">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="https://unsplash.com/photos/g1Kr4Ozfoac/download?ixid=MnwxMjA3fDB8MXxzZWFyY2h8NXx8ZWR1Y2F0aW9ufGVufDB8fHx8MTY3MzU1MzU2OQ&force=true&w=640" alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="https://unsplash.com/photos/zFSo6bnZJTw/download?ixid=MnwxMjA3fDB8MXxzZWFyY2h8OHx8c2Nob29sfGVufDB8fHx8MTY3MzU0MzUxNg&force=true&w=640" alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="https://unsplash.com/photos/8CqDvPuo_kI/download?ixid=MnwxMjA3fDB8MXxzZWFyY2h8Nnx8c2Nob29sfGVufDB8fHx8MTY3MzU0MzUxNg&force=true&w=640" alt="Third slide">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <div class="section">
            <div class="container-fluid px-5">
                <div class="row mb-4">
                    <div class="col-md-8 mx-auto text-center">
                        <span class="badge badge-primary badge-pill mb-3">#Features</span>
                        <h3 class="display-3 text-primary font-weight-bold">Mengapa memilih sekolah ini?</h3>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-4">
                    <div class="col mb-4">
                        <div class="card h-100 shadow bg-success text-white">
                            <div class="card-body text-white text-center">
                                <div class="mb-4">
                                    <i class="fas fa-grin-stars fa-5x"></i>
                                </div>
                                <h5 class="card-title text-white">Sekolah Favorit</h5>
                                <p class="card-text">SMP Negeri 2 Wonosari merupakan sekolah favorit di kota Wonosari bahkan di Kabupaten Gunungkidul.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card h-100 shadow bg-warning text-white">
                            <div class="card-body text-white text-center">
                                <div class="mb-4">
                                    <i class="fas fa-star fa-5x"></i>
                                </div>
                                <h5 class="card-title text-white">Akreditasi A</h5>
                                <p class="card-text">SMP Negeri 2 Wonosari mendapat akreditasi A (Unggul) dengan nilai 96 dari Badan Akreditasi Nasional Sekolah/Madrasah tahun 2021</p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card h-100 shadow bg-primary text-white">
                            <div class="card-body text-white text-center">
                                <div class="mb-4">
                                    <i class="fas fa-chalkboard-teacher fa-5x"></i>
                                </div>
                                <h5 class="card-title text-white">Guru dan Staff</h5>
                                <p class="card-text">SMP Negeri 2 Wonosari memiliki guru profesional dan staff kompeten dan berpengalaman dalam melayani kegiatan belajar mengajar peserta didik.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card h-100 shadow bg-info text-white">
                            <div class="card-body text-white text-center">
                                <div class="mb-4">
                                    <i class="fas fa-school fa-5x"></i>
                                </div>
                                <h5 class="card-title text-white">Fasilitas</h5>
                                <p class="card-text">SMP Negeri 2 Wonosari memiliki fasilitas yang lengkap untuk mendukung kegiatan belajar mengajar.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card h-100 shadow bg-danger text-white">
                            <div class="card-body text-white text-center">
                                <div class="mb-4">
                                    <i class="fas fa-bookmark fa-5x"></i>
                                </div>
                                <h5 class="card-title text-white">Kurikulum Merdeka</h5>
                                <p class="card-text">SMP Negeri 2 Wonosari menerapkan implementasi kurikulum merdeka dengan prinsip Merdeka Berbagi.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <span class="badge badge-primary badge-pill mb-3">#About</span>
                    <h3 class="display-3 text-primary font-weight-bold">Tentang kami</h3>
                </div>
            </div>
            <div class="row flex-row-reverse">
                <div class="col-md-4">
                    <p class="text-center align-middle">
                        <img src="<?= base_url('dist/images/medigitaldev-green.png'); ?>" class="img-fluid" width="400" alt="Logo">
                    </p>
                </div>
                <div class="col-md-8">
                    <p class="lead">SMP Negeri 2 Wonosari atau yang biasa di panggil Espero merupakan Sekolah Menengah Pertama di pusat Kota Wonosari tepatnya di Jalan Veteran 8, Kepek, Wonosari, Gunungkidul, DI Yogyakarta. SMP Negeri 2 Wonosari yang didirikan sejak 1 April 1979 menjadi sekolah favorit di Kecamatan Wonosari bahkan di Kabupaten Gunungkidul. Sekolah yang sebelumnya bernama SMEP Negeri Wonosari ini memiliki peserta didik sejumlah 629, 43 Guru dan 11 Karyawan. Selain itu, setiap tahun beragam prestasi akademik maupun non akademik diperoleh.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="section bg-dark text-white shadow">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-8 mx-auto text-center">
                    <span class="badge badge-light badge-pill mb-3">#Data</span>
                    <h3 class="display-3 text-white font-weight-bold">Data Statistik Sekolah</h3>
                </div>
            </div>
            <div class="row justify-content-center" id="counter">
                <!-- counter -->
                <div class="col-md-3 col-sm-6 mb-4 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated" data-wow-duration="600ms" style="visibility: visible; animation-duration: 600ms; animation-name: fadeInUp;">
                    <i class="fa fa-chalkboard-teacher medium-icon"></i>
                    <span class="timer counter alt-font appear text-white" data-to="43" data-speed="5000">43</span>
                    <span class="counter-title">GTK</span>
                </div>
                <!-- end counter -->
                <!-- counter -->
                <div class="col-md-3 col-sm-6 mb-4 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated" data-wow-duration="300ms" style="visibility: visible; animation-duration: 300ms; animation-name: fadeInUp;">
                    <i class="fa fa-users medium-icon"></i>
                    <span id="anim-number-pizza" class="counter-number"></span>
                    <span class="timer counter alt-font appear text-white" data-to="629" data-speed="5000">629</span>
                    <p class="counter-title">Peserta Didik</p>
                </div>
                <!-- end counter -->
                <!-- counter -->
                <div class="col-md-3 col-sm-6 mb-4 bottom-margin-small text-center counter-section wow fadeInUp xs-margin-bottom-ten animated" data-wow-duration="900ms" style="visibility: visible; animation-duration: 900ms; animation-name: fadeInUp;">
                    <i class="fa fa-user-graduate medium-icon"></i>
                    <span class="timer counter alt-font appear text-white" data-to="100" data-speed="5000">100</span>
                    <span class="counter-title">% Kelulusan</span>
                </div>
                <!-- end counter -->
                <!-- counter -->
                <div class="col-md-3 col-sm-6 mb-4 text-center counter-section wow fadeInUp animated" data-wow-duration="1200ms" style="visibility: visible; animation-duration: 1200ms; animation-name: fadeInUp;">
                    <i class="fa fa-shapes medium-icon"></i>
                    <span class="timer counter alt-font appear text-white" data-to="21" data-speed="5000">21</span>
                    <span class="counter-title">Rombongan belajar</span>
                </div>
                <!-- end counter -->
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto text-center">
                    <span class="badge badge-primary badge-pill mb-3">#News</span>
                    <h3 class="display-3">Berita terbaru</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="featured-carousel owl-carousel">
                        <div class="item">
                            <div class="blog-entry">
                                <a href="#" class="block-20 d-flex align-items-start" style="background-image: url(<?= base_url('plugins/carousel-07/images/image_1.jpg'); ?>);">
                                    <div class="meta-date text-center p-2">
                                        <span class="day">26</span>
                                        <span class="mos">Nov.</span>
                                        <span class="yr">2019</span>
                                    </div>
                                </a>
                                <div class="text border border-top-0 p-4">
                                    <h3 class="heading"><a href="#">Finance And Legal Working Streams Occur Throughout</a></h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center mt-4">
                                        <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                                        <p class="ml-auto meta2 mb-0">
                                            <a href="#" class="mr-2">Admin</a>
                                            <a href="#" class="meta-chat"><span class="ion-ios-chatboxes"></span> 3</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="blog-entry">
                                <a href="#" class="block-20 d-flex align-items-start" style="background-image: url(<?= base_url('plugins/carousel-07/images/image_2.jpg'); ?>);">
                                    <div class="meta-date text-center p-2">
                                        <span class="day">26</span>
                                        <span class="mos">Nov.</span>
                                        <span class="yr">2019</span>
                                    </div>
                                </a>
                                <div class="text border border-top-0 p-4">
                                    <h3 class="heading"><a href="#">Finance And Legal Working Streams Occur Throughout</a></h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center mt-4">
                                        <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                                        <p class="ml-auto meta2 mb-0">
                                            <a href="#" class="mr-2">Admin</a>
                                            <a href="#" class="meta-chat"><span class="ion-ios-chatboxes"></span> 3</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="blog-entry">
                                <a href="#" class="block-20 d-flex align-items-start" style="background-image: url(<?= base_url('plugins/carousel-07/images/image_3.jpg'); ?>);">
                                    <div class="meta-date text-center p-2">
                                        <span class="day">26</span>
                                        <span class="mos">Nov.</span>
                                        <span class="yr">2019</span>
                                    </div>
                                </a>
                                <div class="text border border-top-0 p-4">
                                    <h3 class="heading"><a href="#">Finance And Legal Working Streams Occur Throughout</a></h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center mt-4">
                                        <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                                        <p class="ml-auto meta2 mb-0">
                                            <a href="#" class="mr-2">Admin</a>
                                            <a href="#" class="meta-chat"><span class="ion-ios-chatboxes"></span> 3</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="blog-entry">
                                <a href="#" class="block-20 d-flex align-items-start" style="background-image: url(<?= base_url('plugins/carousel-07/images/image_4.jpg'); ?>);">
                                    <div class="meta-date text-center p-2">
                                        <span class="day">26</span>
                                        <span class="mos">Nov.</span>
                                        <span class="yr">2019</span>
                                    </div>
                                </a>
                                <div class="text border border-top-0 p-4">
                                    <h3 class="heading"><a href="#">Finance And Legal Working Streams Occur Throughout</a></h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center mt-4">
                                        <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                                        <p class="ml-auto meta2 mb-0">
                                            <a href="#" class="mr-2">Admin</a>
                                            <a href="#" class="meta-chat"><span class="ion-ios-chatboxes"></span> 3</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="blog-entry">
                                <a href="#" class="block-20 d-flex align-items-start" style="background-image: url(<?= base_url('plugins/carousel-07/images/image_5.jpg'); ?>);">
                                    <div class="meta-date text-center p-2">
                                        <span class="day">26</span>
                                        <span class="mos">Nov.</span>
                                        <span class="yr">2019</span>
                                    </div>
                                </a>
                                <div class="text border border-top-0 p-4">
                                    <h3 class="heading"><a href="#">Finance And Legal Working Streams Occur Throughout</a></h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center mt-4">
                                        <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                                        <p class="ml-auto meta2 mb-0">
                                            <a href="#" class="mr-2">Admin</a>
                                            <a href="#" class="meta-chat"><span class="ion-ios-chatboxes"></span> 3</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="blog-entry">
                                <a href="#" class="block-20 d-flex align-items-start" style="background-image: url(<?= base_url('plugins/carousel-07/images/image_6.jpg'); ?>);">
                                    <div class="meta-date text-center p-2">
                                        <span class="day">26</span>
                                        <span class="mos">Nov.</span>
                                        <span class="yr">2019</span>
                                    </div>
                                </a>
                                <div class="text border border-top-0 p-4">
                                    <h3 class="heading"><a href="#">Finance And Legal Working Streams Occur Throughout</a></h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center mt-4">
                                        <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                                        <p class="ml-auto meta2 mb-0">
                                            <a href="#" class="mr-2">Admin</a>
                                            <a href="#" class="meta-chat"><span class="ion-ios-chatboxes"></span> 3</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section features-1">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto text-center">
                    <span class="badge badge-primary badge-pill mb-3">Insight</span>
                    <h3 class="display-3">Full-Funnel Social Analytics</h3>
                    <p class="lead">The time is now for it to be okay to be great. For being a bright color. For standing out.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="info">
                        <div class="icon icon-lg icon-shape icon-shape-primary shadow rounded-circle">
                            <i class="ni ni-settings-gear-65"></i>
                        </div>
                        <h6 class="info-title text-uppercase text-primary">Social Conversations</h6>
                        <p class="description opacity-8">We get insulted by others, lose trust for those others. We get back stabbed by friends. It becomes harder for us to give others a hand.</p>
                        <a href="javascript:;" class="text-primary">More about us
                            <i class="ni ni-bold-right text-primary"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info">
                        <div class="icon icon-lg icon-shape icon-shape-success shadow rounded-circle">
                            <i class="ni ni-atom"></i>
                        </div>
                        <h6 class="info-title text-uppercase text-success">Analyze Performance</h6>
                        <p class="description opacity-8">Don't get your heart broken by people we love, even that we give them all we have. Then we lose family over time. As we live, our hearts turn colder.</p>
                        <a href="javascript:;" class="text-primary">Learn about our products
                            <i class="ni ni-bold-right text-primary"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info">
                        <div class="icon icon-lg icon-shape icon-shape-warning shadow rounded-circle">
                            <i class="ni ni-world"></i>
                        </div>
                        <h6 class="info-title text-uppercase text-warning">Measure Conversions</h6>
                        <p class="description opacity-8">What else could rust the heart more over time? Blackgold. The time is now for it to be okay to be great. or being a bright color. For standing out.</p>
                        <a href="javascript:;" class="text-primary">Check our documentation
                            <i class="ni ni-bold-right text-primary"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br /><br />
    <footer class="footer">
        <div class="container">
            <div class="row row-grid align-items-center mb-5">
                <div class="col-lg-6">
                    <h3 class="text-primary font-weight-light mb-2">Thank you for supporting us!</h3>
                    <h4 class="mb-0 font-weight-light">Let's get in touch on any of these platforms.</h4>
                </div>
                <div class="col-lg-6 text-lg-center btn-wrapper">
                    <button target="_blank" href="https://twitter.com/creativetim" rel="nofollow" class="btn btn-icon-only btn-twitter rounded-circle" data-toggle="tooltip" data-original-title="Follow us">
                        <span class="btn-inner--icon"><i class="fa fa-twitter"></i></span>
                    </button>
                    <button target="_blank" href="https://www.facebook.com/CreativeTim/" rel="nofollow" class="btn-icon-only rounded-circle btn btn-facebook" data-toggle="tooltip" data-original-title="Like us">
                        <span class="btn-inner--icon"><i class="fab fa-facebook"></i></span>
                    </button>
                    <button target="_blank" href="https://dribbble.com/creativetim" rel="nofollow" class="btn btn-icon-only btn-dribbble rounded-circle" data-toggle="tooltip" data-original-title="Follow us">
                        <span class="btn-inner--icon"><i class="fa fa-dribbble"></i></span>
                    </button>
                    <button target="_blank" href="https://github.com/creativetimofficial" rel="nofollow" class="btn btn-icon-only btn-github rounded-circle" data-toggle="tooltip" data-original-title="Star on Github">
                        <span class="btn-inner--icon"><i class="fa fa-github"></i></span>
                    </button>
                </div>
            </div>
            <hr>
            <div class="row align-items-center justify-content-md-between">
                <div class="col-md-6">
                    <div class="copyright">
                        &copy; 2023 <a href="<?= base_url(); ?>">SMP Negeri 2 Wonosari</a>.
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="copyright float-right">
                        <a class="text-muted" target="_blank" href="https://medigital.dev/webschool">WebSchool v1.0</a> | <a class="text-muted" target="_blank" href="https://www.creative-tim.com/product/argon-design-system">Creative Tim</a>.
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>
    <!--   Core JS Files   -->
    <script src="<?= base_url('plugins/argon/js/core/jquery.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('plugins/argon/js/core/popper.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('plugins/argon/js/core/bootstrap.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('plugins/argon/js/plugins/perfect-scrollbar.jquery.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/argon/js/argon-design-system.min.js?v=1.2.2'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('plugins/carousel-07/js/owl.carousel.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/carousel-07/js/main.js'); ?>"></script>
    <script>
        var a = 0;
        $(window).scroll(function() {
            var oTop = $('#counter').offset().top - window.innerHeight;
            if (a == 0 && $(window).scrollTop() > oTop) {
                $('.counter').each(function() {
                    $(this).prop('Counter', 0).animate({
                        Counter: $(this).text()
                    }, {
                        duration: 4000,
                        easing: 'swing',
                        step: function(now) {
                            $(this).text(Math.ceil(now));
                        }
                    });
                });
                a = 1;
            }
        });
    </script>
</body>

</html>