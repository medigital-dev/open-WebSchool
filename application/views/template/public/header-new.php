<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('plugins/bootstrap/css/bootstrap.min.css'); ?>">
    <!-- fontawesome -->
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome/css/all.min.css'); ?>">
    <!-- Custom CSS -->
    <style>

    </style>
    <title><?= $title; ?></title>
</head>

<body>
    <section id="top-header" class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between py-2">
                        <div id="medsos-icon">
                            <?php foreach ($dataMedsos as $dataMedsos) : ?>
                                <?php if ($dataMedsos['is_active'] != 0) : ?>
                                    <a href="<?= $dataMedsos['url']; ?>" target="_blank" class="text-decoration-none"><?= $dataMedsos['icon']; ?></a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <div id="date-header">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <nav class="navbar sticky-top shadow navbar-expand-lg navbar-dark bg-primary">
        <div class="container py-2 px-0">
            <a class="navbar-brand d-flex" href="<?= base_url(); ?>">
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
                                    <span class="h5 p-0 m-0 font-weight-bold">WebSchool</span>
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
                    WebSchool
                <?php endif ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav navbar-nav-scroll">
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