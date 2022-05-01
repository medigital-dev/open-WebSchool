<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Postingan</h1>
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
            <li class="breadcrumb-item active" aria-current="page"><a class="text-decoration-none text-secondary" href="<?= base_url('admin/post/list'); ?>">Post</a></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <?= $this->session->flashdata('post'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <!-- <div class="row mb-2">
                        <div class="col-md-auto mb-2">
                            <div class="input-group">
                                <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                    <option selected>Pilih tindakan tercentang</option>
                                    <option value="1">Hapus</option>
                                    <option value="2">Terbitkan</option>
                                    <option value="3">Draft</option>
                                    <option value="4">Non Aktifkan</option>
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="actionButton">Terapkan</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-auto mb-2 ml-auto">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-outline-primary">Semua <span class="badge badge-primary">4</span></button>
                                <button type="button" class="btn btn-outline-success">Terbit <span class="badge badge-success">4</span></button>
                                <button type="button" class="btn btn-outline-warning">Draft <span class="badge badge-warning">4</span></button>
                                <button type="button" class="btn btn-outline-danger">Non Aktif <span class="badge badge-danger">4</span></button>
                            </div>
                        </div>
                    </div>
                    <hr> -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped display" id="dataTable-post" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center bg-primary text-light">
                                    <th style="width: 20px">No</th>
                                    <th>Judul</th>
                                    <th style="width: 100px;">Kategori</th>
                                    <th style="width: 70px">Penulis</th>
                                    <th style="width: 20px;"><i class="fas fa-comment fa-fw"></i></th>
                                    <th style="width: 20px;"><i class="fas fa-eye fa-fw"></i></th>
                                    <th style="width: 130px;">Status</th>
                                    <th>ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1; ?>
                                <?php foreach ($allPost as $row) : ?>
                                    <tr>
                                        <td class="text-center"><?= $a; ?></td>
                                        <td>
                                            <h5 class="mb-1">
                                                <a href="<?= base_url(); ?>admin/editPost/<?= $row['id']; ?>">
                                                    <?= $row['judul']; ?>
                                                </a>
                                            </h5>
                                            <small>
                                                <a href="<?= base_url(); ?>admin/editPost/<?= $row['id']; ?>" class="text-decoration-none">Edit</a> |
                                                <a href="<?= base_url(); ?>admin/deletePost/<?= $row['id']; ?>" class="text-decoration-none deleteThis">Hapus</a> |
                                                <a href="<?= base_url($row['link']); ?>" class="text-decoration-none" target="_blank">Tampilkan</a>
                                            </small>
                                        </td>
                                        <td class="text-center">
                                            <?= $row['kategori']; ?>
                                        </td>
                                        <td class="text-center"><?= $row['penulis']; ?></td>
                                        <td class="text-center"><?= $row['jumlahKomentar']; ?></td>
                                        <td class="text-center"><?= $row['dilihat']; ?></td>
                                        <td class="text-center">
                                            <h5 class="mb-1 font-weight-bold <?= $row['iconStatus']; ?>"><?= $row['status']; ?></h5>
                                            <small><?= $row['tanggal'] . ' | ' . $row['waktu']; ?></small>
                                        </td>
                                        <td class="text-center" style="font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;"><?= $row['id']; ?></td>
                                    </tr>
                                    <?php $a++; ?>
                                <?php endforeach; ?>

                            </tbody>
                            <!-- <tfoot>
                                <tr class="text-center bg-primary text-light">
                                    <th>Status</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Penulis</th>
                                    <th><i class="fas fa-comment fa-fw"></i></th>
                                    <th>ID</th>
                                </tr>
                            </tfoot> -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->