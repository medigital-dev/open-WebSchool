<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pesan</h1>
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
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a class="text-decoration-none text-secondary" href="<?= base_url('admin/pesan'); ?>">Pesan</a></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <?= $this->session->flashdata('post'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <a href="#collapseTag" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseTag">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pesan</h6>
                </a>
                <div class="collapse show" id="collapseTag">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover display" id="dataTable-post" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 20px">No</th>
                                        <th style="width: 200px;">Pengirim</th>
                                        <th>Pesan</th>
                                        <th style="width: 70px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dataPesan as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?= $row['nomor']; ?></td>
                                            <td>
                                                <h5><?= $row['nama']; ?></h5>
                                                <p>
                                                    <small>
                                                        <a href="<?= $row['hrefWA']; ?>" class="text-decoration-none" target="_blank"><?= $row['nomorWA']; ?></a><br>
                                                        <a href="<?= $row['hrefEmail']; ?>" class="text-decoration-none" target="_blank"><?= $row['email']; ?></a>
                                                    </small>
                                                </p>
                                            </td>
                                            <td><?= $row['pesan']; ?></td>
                                            <td class="text-center">
                                                <a href="<?= $row['hrefRead']; ?>" class="btn btn-sm btn-primary <?= $row['status']; ?>" title="<?= $row['iconTitle']; ?>"><?= $row['iconBaca']; ?></a>
                                                <a href="<?= $row['hrefDelete']; ?>" class="btn btn-sm btn-danger deleteThis"><i class="fas fa-trash-alt fa-fw"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->