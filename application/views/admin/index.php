<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Komentar</h1>
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Buat
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="<?= base_url(); ?>admin/post/add">Postingan</a>
                <a class="dropdown-item" href="<?= base_url(); ?>admin/page/add">Halaman</a>
            </div>
        </div>
    </div>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="<?= base_url('admin'); ?>">Home</a></li>
        </ol>
    </nav>

    <!-- Content Row -->
    <div class="row">

        <!-- Semua Postingan Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Postingan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dataDashboard['jumlahPostingan']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Semua Postingan Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Halaman</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dataDashboard['jumlahHalaman']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Semua Postingan Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Komentar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dataDashboard['jumlahKomentar']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Semua Postingan Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Pengguna</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dataDashboard['jumlahPengguna']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users-cog fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-8 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Postingan</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover display" id="dataTable-post" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center bg-primary text-light">
                                <th style="width: 75px;">Tanggal</th>
                                <th>Judul</th>
                                <th style="width: 20px;"><i class="fas fa-eye fa-fw"></i></th>
                                <th style="width: 20px;"><i class="fas fa-comment fa-fw"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dataDashboard['daftarPostingan'] as $row) : ?>
                                <tr>
                                    <td class="text-center"><?= $row['tanggal']; ?></td>
                                    <td><?= $row['judul']; ?></td>
                                    <td><?= $row['dilihat']; ?></td>
                                    <td><?= $row['jumlahKomentar']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Halaman</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover display" id="dataTable-post" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center bg-primary text-light">
                                <th style="width: 75px;">Tanggal</th>
                                <th>Judul</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dataDashboard['daftarHalaman'] as $row) : ?>
                                <tr>
                                    <td class="text-center"><?= $row['tanggal']; ?></td>
                                    <td><?= $row['judul']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Identitas Perusahaan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless table-sm table-hover" width="100%" cellspacing="0">
                            <tr>
                                <td colspan="3" class="text-center"><img src="<?= $dataDashboard['daftarIdentitas']['logo']; ?>" style="width: 60%;" alt="Logo"></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 120px">Nama Sekolah</td>
                                <td>:</td>
                                <td><?= $dataDashboard['daftarIdentitas']['nama']; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><?= $dataDashboard['daftarIdentitas']['alamat']; ?></td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td>:</td>
                                <td><?= $dataDashboard['daftarIdentitas']['telepon']; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><?= $dataDashboard['daftarIdentitas']['email']; ?></td>
                            </tr>
                            <tr>
                                <td>Website</td>
                                <td>:</td>
                                <td><a href="http://<?= $dataDashboard['daftarIdentitas']['website']; ?>" target="_blank" class="text-decoration-none"><?= $dataDashboard['daftarIdentitas']['website']; ?></a></td>
                            </tr>
                            <tr>
                                <td>Media Sosial</td>
                                <td>:</td>
                                <td>
                                    <a href="<?= $dataDashboard['daftarMedsos']['facebook']; ?>" target="_blank" class="btn btn-sm mb-1 btn-facebook <?php if ($dataDashboard['daftarMedsos']['facebook'] == '') {
                                                                                                                                                            echo 'disabled';
                                                                                                                                                        } ?>">
                                        <i class="fab fa-facebook-square fa-fw"></i>
                                    </a>
                                    <a href="<?= $dataDashboard['daftarMedsos']['twitter']; ?>" target="_blank" class="btn btn-sm mb-1 btn-info <?php if ($dataDashboard['daftarMedsos']['twitter'] == '') {
                                                                                                                                                    echo 'disabled';
                                                                                                                                                } ?>">
                                        <i class="fab fa-twitter-square fa-fw"></i>
                                    </a>
                                    <a href="<?= $dataDashboard['daftarMedsos']['instagram']; ?>" target="_blank" class="btn btn-sm mb-1 btn-warning <?php if ($dataDashboard['daftarMedsos']['instagram'] == '') {
                                                                                                                                                            echo 'disabled';
                                                                                                                                                        } ?>">
                                        <i class="fab fa-instagram fa-fw"></i>
                                    </a>
                                    <a href="<?= $dataDashboard['daftarMedsos']['youtube']; ?>" target="_blank" class="btn btn-sm mb-1 btn-danger <?php if ($dataDashboard['daftarMedsos']['youtube'] == '') {
                                                                                                                                                        echo 'disabled';
                                                                                                                                                    } ?>">
                                        <i class="fab fa-youtube fa-fw"></i>
                                    </a>
                                    <a href="<?= $dataDashboard['daftarMedsos']['whatsapp']; ?>" target="_blank" class="btn btn-sm mb-1 btn-success <?php if ($dataDashboard['daftarMedsos']['whatsapp'] == '') {
                                                                                                                                                        echo 'disabled';
                                                                                                                                                    } ?>">
                                        <i class="fab fa-whatsapp fa-fw"></i>
                                    </a>
                                    <a href="<?= $dataDashboard['daftarMedsos']['telegram']; ?>" target="_blank" class="btn btn-sm mb-1 btn-primary <?php if ($dataDashboard['daftarMedsos']['telegram'] == '') {
                                                                                                                                                        echo 'disabled';
                                                                                                                                                    } ?>">
                                        <i class="fab fa-telegram fa-fw"></i>
                                    </a>
                                    <a href="<?= $dataDashboard['daftarMedsos']['maps']; ?>" target="_blank" class="btn btn-sm mb-1 btn-info <?php if ($dataDashboard['daftarMedsos']['maps'] == '') {
                                                                                                                                                    echo 'disabled';
                                                                                                                                                } ?>">
                                        <i class="fas fa-map-marker-alt fa-fw"></i>
                                    </a>
                                </td>

                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pengguna</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-center">
                        <img class="img-profile rounded-circle w-25 mb-3" src="<?= base_url('assets/sbadmin/'); ?>img/undraw_profile.svg">

                        <h5><strong><?= $user['nama']; ?></strong> (<?= $user['username']; ?>)</h5>
                        <small><?= $user['level']; ?></small>
                        <p>
                            <?= $user['telepon']; ?> | <?= $user['email']; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->