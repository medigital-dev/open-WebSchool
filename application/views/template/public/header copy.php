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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuUtama" aria-controls="menuUtama" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="menuUtama">
                <ul class="navbar-nav navbar-nav-scroll">
                    <?php if ($page == 'homepage') : ?>
                        <li class="nav-item"><a class="nav-link" href="#page-top">Welcome</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#sambutan">Sambutan</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Why Us?</a></li>
                        <li class="nav-item"><a class="nav-link" href="#info">Informasi</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="#galeri">Galeri</a></li> -->
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                        <!-- <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-search   fa-fw"></i></a></li> -->
                    <?php else : ?>
                        <?php foreach ($menuUtama as $row) : ?>
                            <?php if ($row['tipe'] == 'Default') : ?>
                                <li class="nav-item"><a href="<?= $row['href']; ?>" class="nav-link" <?php if ($row['new_tab'] == 1) {
                                                                                                            echo 'target="_blank"';
                                                                                                        } ?>><?= $row['title']; ?></a></li>
                            <?php elseif ($row['tipe'] == 'Dropdown') : ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                        <?= $row['title']; ?>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <?php foreach ($allMenu as $allMenu1) : ?>
                                            <?php if ($allMenu1['parent_id'] == $row['id_menu']) : ?>
                                                <?php if ($allMenu1['tipe'] == 'Default') : ?>
                                                    <li><a class="dropdown-item" href="<?= $allMenu1['href']; ?>" <?php if ($allMenu1['new_tab'] == 1) {
                                                                                                                        echo 'target="_blank"';
                                                                                                                    } ?>><?= $allMenu1['title']; ?></a></li>
                                                <?php elseif ($allMenu1['tipe'] == 'Dropdown') : ?>
                                                    <li class="dropend">
                                                        <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                            <?= $allMenu1['title']; ?>
                                                        </a>
                                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                            <?php foreach ($allMenu as $allMenu2) : ?>
                                                                <?php if ($allMenu2['parent_id'] == $allMenu1['id_menu']) : ?>
                                                                    <?php if ($allMenu2['tipe'] == 'Default') : ?>
                                                                        <li><a class="dropdown-item" href="<?= $allMenu2['href']; ?>" <?php if ($allMenu2['new_tab'] == 1) {
                                                                                                                                            echo 'target="_blank"';
                                                                                                                                        } ?>><?= $allMenu2['title']; ?></a></li>
                                                                    <?php elseif ($allMenu2['tipe'] == 'Dropdown') : ?>
                                                                        <li class="nav-item dropdown dropend">
                                                                            <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                                <?= $allMenu2['title']; ?>
                                                                            </a>
                                                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                                <?php foreach ($allMenu as $allMenu3) : ?>
                                                                                    <?php if ($allMenu3['parent_id'] == $allMenu2['id_menu']) : ?>
                                                                                        <?php if ($allMenu3['tipe'] == 'Default') : ?>
                                                                                            <li><a class="dropdown-item" href="<?= $allMenu3['href']; ?>" <?php if ($allMenu3['new_tab'] == 1) {
                                                                                                                                                                echo 'target="_blank"';
                                                                                                                                                            } ?>><?= $allMenu3['title']; ?></a></li>
                                                                                        <?php elseif ($allMenu3['tipe'] == 'Dropdown') : ?>
                                                                                            <li class="nav-item dropdown dropend">
                                                                                                <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                                                    <?= $allMenu3['title']; ?>
                                                                                                </a>
                                                                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                                                    <?php foreach ($allMenu as $allMenu4) : ?>
                                                                                                        <?php if ($allMenu4['parent_id'] == $allMenu3['id_menu']) : ?>
                                                                                                            <?php if ($allMenu4['tipe'] == 'Default') : ?>
                                                                                                                <li><a class="dropdown-item" href="<?= $allMenu4['href']; ?>" <?php if ($allMenu4['new_tab'] == 1) {
                                                                                                                                                                                    echo 'target="_blank"';
                                                                                                                                                                                } ?>><?= $allMenu4['title']; ?></a></li>
                                                                                                            <?php elseif ($allMenu4 == 'Dropdown') : ?>
                                                                                                                <li class="nav-item dropdown dropend">
                                                                                                                    <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                                                                        <?= $allMenu4['title']; ?>
                                                                                                                    </a>
                                                                                                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                                                                        <?php foreach ($allMenu as $allMenu5) : ?>
                                                                                                                            <?php if ($allMenu5['parent_id'] == $allMenu4['id_menu']) : ?>
                                                                                                                                <?php if ($allMenu5['tipe'] == 'Default') : ?>
                                                                                                                                    <li><a class="dropdown-item" href="<?= $allMenu5['href']; ?>" <?php if ($allMenu5['new_tab'] == 1) {
                                                                                                                                                                                                        echo 'target="_blank"';
                                                                                                                                                                                                    } ?>><?= $allMenu5['title']; ?></a></li>
                                                                                                                                <?php elseif ($allMenu5['tipe'] == 'Dropdown') : ?>
                                                                                                                                    <li class="nav-item dropdown dropend">
                                                                                                                                        <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                                                                                            <?= $allMenu5['title']; ?>
                                                                                                                                        </a>
                                                                                                                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                                                                                            <?php foreach ($allMenu as $allMenu6) : ?>
                                                                                                                                                <?php if ($allMenu6['parent_id'] == $allMenu5['id_menu']) : ?>
                                                                                                                                                    <?php if ($allMenu6['tipe'] == 'Default') : ?>
                                                                                                                                                        <li><a class="dropdown-item" href="<?= $allMenu6['href']; ?>" <?php if ($allMenu6['new_tab'] == 1) {
                                                                                                                                                                                                                            echo 'target="_blank"';
                                                                                                                                                                                                                        } ?>><?= $allMenu6['title']; ?></a></li>
                                                                                                                                                    <?php elseif ($allMenu6['tipe'] == 'Dropdown') : ?>
                                                                                                                                                        <li class="nav-item dropdown dropend">
                                                                                                                                                            <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                                                                                                                <?= $allMenu6['title']; ?>
                                                                                                                                                            </a>
                                                                                                                                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                                                                                                                <?php foreach ($allMenu as $allMenu7) : ?>
                                                                                                                                                                    <?php if ($allMenu7['parent_id'] == $allMenu6['id_menu']) : ?>
                                                                                                                                                                        <li><a class="dropdown-item" href="<?= $allMenu7['href']; ?>" <?php if ($allMenu7['new_tab'] == 1) {
                                                                                                                                                                                                                                            echo 'target="_blank"';
                                                                                                                                                                                                                                        } ?>><?= $allMenu7['title']; ?></a></li>
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

                    <?php endif ?>
                </ul>
                <ul class="navbar-nav navbar-nav-scroll ms-auto">
                    <form method="POST" autocomplete="off" action="<?= base_url(); ?>cari">
                        <div class="d-flex justify-content-end mt-2">
                            <input class="form-control me-2" type="search" id="keyword" name="keyword" placeholder="Cari informasi" aria-label="Search">
                        </div>
                    </form>

                    <li class="nav-item dropdown mt-2" style="max-height: 200px;">
                        <a class="nav-link text-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" title="Menu">

                            <i class="fas fa-chevron-circle-down fa-fw"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarDropdown">
                            <?php if ($page == 'homepage') : ?>
                                <?php if ($menuUtama) : ?>
                                    <?php foreach ($menuUtama as $row) : ?>
                                        <?php if ($row['tipe'] == 'Default') : ?>
                                            <li><a href="<?= $row['href']; ?>" class="dropdown-item" <?php if ($row['new_tab'] == 1) {
                                                                                                            echo 'target="_blank"';
                                                                                                        } ?>><?= $row['title']; ?></a></li>
                                        <?php elseif ($row['tipe'] == 'Dropdown') : ?>
                                            <li class="dropstart">
                                                <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                    <?= $row['title']; ?>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <?php foreach ($allMenu as $allMenu1) : ?>
                                                        <?php if ($allMenu1['parent_id'] == $row['id_menu']) : ?>
                                                            <?php if ($allMenu1['tipe'] == 'Default') : ?>
                                                                <li><a class="dropdown-item" href="<?= $allMenu1['href']; ?>" <?php if ($allMenu1['new_tab'] == 1) {
                                                                                                                                    echo 'target="_blank"';
                                                                                                                                } ?>><?= $allMenu1['title']; ?></a></li>
                                                            <?php elseif ($allMenu1['tipe'] == 'Dropdown') : ?>
                                                                <li class="dropstart">
                                                                    <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                        <?= $allMenu1['title']; ?>
                                                                    </a>
                                                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                        <?php foreach ($allMenu as $allMenu2) : ?>
                                                                            <?php if ($allMenu2['parent_id'] == $allMenu1['id_menu']) : ?>
                                                                                <?php if ($allMenu2['tipe'] == 'Default') : ?>
                                                                                    <li><a class="dropdown-item" href="<?= $allMenu2['href']; ?>" <?php if ($allMenu2['new_tab'] == 1) {
                                                                                                                                                        echo 'target="_blank"';
                                                                                                                                                    } ?>><?= $allMenu2['title']; ?></a></li>
                                                                                <?php elseif ($allMenu2['tipe'] == 'Dropdown') : ?>
                                                                                    <li class="dropstart">
                                                                                        <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                                            <?= $allMenu2['title']; ?>
                                                                                        </a>
                                                                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                                            <?php foreach ($allMenu as $allMenu3) : ?>
                                                                                                <?php if ($allMenu3['parent_id'] == $allMenu2['id_menu']) : ?>
                                                                                                    <?php if ($allMenu3['tipe'] == 'Default') : ?>
                                                                                                        <li><a class="dropdown-item" href="<?= $allMenu3['href']; ?>" <?php if ($allMenu3['new_tab'] == 1) {
                                                                                                                                                                            echo 'target="_blank"';
                                                                                                                                                                        } ?>><?= $allMenu3['title']; ?></a></li>
                                                                                                    <?php elseif ($allMenu3['tipe'] == 'Dropdown') : ?>
                                                                                                        <li class="dropstart">
                                                                                                            <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                                                                <?= $allMenu3['title']; ?>
                                                                                                            </a>
                                                                                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                                                                <?php foreach ($allMenu as $allMenu4) : ?>
                                                                                                                    <?php if ($allMenu4['parent_id'] == $allMenu3['id_menu']) : ?>
                                                                                                                        <?php if ($allMenu4['tipe'] == 'Default') : ?>
                                                                                                                            <li><a class="dropdown-item" href="<?= $allMenu4['href']; ?>" <?php if ($allMenu4['new_tab'] == 1) {
                                                                                                                                                                                                echo 'target="_blank"';
                                                                                                                                                                                            } ?>><?= $allMenu4['title']; ?></a></li>
                                                                                                                        <?php elseif ($allMenu4 == 'Dropdown') : ?>
                                                                                                                            <li class="dropstart">
                                                                                                                                <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                                                                                    <?= $allMenu4['title']; ?>
                                                                                                                                </a>
                                                                                                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                                                                                    <?php foreach ($allMenu as $allMenu5) : ?>
                                                                                                                                        <?php if ($allMenu5['parent_id'] == $allMenu4['id_menu']) : ?>
                                                                                                                                            <?php if ($allMenu5['tipe'] == 'Default') : ?>
                                                                                                                                                <li><a class="dropdown-item" href="<?= $allMenu5['href']; ?>" <?php if ($allMenu5['new_tab'] == 1) {
                                                                                                                                                                                                                    echo 'target="_blank"';
                                                                                                                                                                                                                } ?>><?= $allMenu5['title']; ?></a></li>
                                                                                                                                            <?php elseif ($allMenu5['tipe'] == 'Dropdown') : ?>
                                                                                                                                                <li class="dropstart">
                                                                                                                                                    <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                                                                                                        <?= $allMenu5['title']; ?>
                                                                                                                                                    </a>
                                                                                                                                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                                                                                                        <?php foreach ($allMenu as $allMenu6) : ?>
                                                                                                                                                            <?php if ($allMenu6['parent_id'] == $allMenu5['id_menu']) : ?>
                                                                                                                                                                <?php if ($allMenu6['tipe'] == 'Default') : ?>
                                                                                                                                                                    <li><a class="dropdown-item" href="<?= $allMenu6['href']; ?>" <?php if ($allMenu6['new_tab'] == 1) {
                                                                                                                                                                                                                                        echo 'target="_blank"';
                                                                                                                                                                                                                                    } ?>><?= $allMenu6['title']; ?></a></li>
                                                                                                                                                                <?php elseif ($allMenu6['tipe'] == 'Dropdown') : ?>
                                                                                                                                                                    <li class="dropstart">
                                                                                                                                                                        <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                                                                                                                            <?= $allMenu6['title']; ?>
                                                                                                                                                                        </a>
                                                                                                                                                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                                                                                                                            <?php foreach ($allMenu as $allMenu7) : ?>
                                                                                                                                                                                <?php if ($allMenu7['parent_id'] == $allMenu6['id_menu']) : ?>
                                                                                                                                                                                    <li><a class="dropdown-item" href="<?= $allMenu7['href']; ?>" <?php if ($allMenu7['new_tab'] == 1) {
                                                                                                                                                                                                                                                        echo 'target="_blank"';
                                                                                                                                                                                                                                                    } ?>><?= $allMenu7['title']; ?></a></li>
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
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>

                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="d-flex justify-content-around pt-2" style="min-width: 200px;">
                                <a href="<?= base_url(); ?>admin" class="nav-link" title="Admin Page"><i class="fas fa-user-cog fa-fw text-success"></i> <?php if (!isset($_SESSION['user'])) {
                                                                                                                                                                echo '<span class="text-success">Admin Page</span>';
                                                                                                                                                            } ?></a>
                                <?php if (isset($_SESSION['user'])) : ?>
                                    <a href="<?= base_url(); ?>admin/pesan" class="nav-link position-relative" title="Pesan">
                                        <i class="fas fa-inbox fa-fw text-success"></i>
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?= count($pesanBaru); ?></span>
                                    </a>
                                    <a href="<?= base_url(); ?>admin/komentar" class="nav-link position-relative" title="Komentar">
                                        <i class="fas fa-comment fa-fw text-success"></i>
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?= count($komentarBaru); ?></span>
                                    </a>
                                    <a href="<?= base_url(); ?>logout" class="nav-link" title="Logout">
                                        <i class="fas fa-sign-out-alt fa-fw text-success"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php if ($page != 'homepage') : ?>
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
            <?php endif; ?>