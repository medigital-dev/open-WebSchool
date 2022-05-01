<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Halaman</h1>
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
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a class="text-decoration-none text-secondary" href="<?= base_url('admin/page/list'); ?>">Pages</a></li>
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
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Halaman</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover display" id="dataTable-post" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center bg-primary text-light">
                                    <th style="width: 20px">No</th>
                                    <th>Judul</th>
                                    <th style="width: 70px">Penulis</th>
                                    <th style="width: 150px;">Status</th>
                                    <th style="width: 100px;">ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pages as $row) : ?>
                                    <tr>
                                        <td class="text-center"><?= $row['nomor']; ?></td>
                                        <td>
                                            <h5 class="mb-1">
                                                <a href="<?= $row['editLink']; ?>">
                                                    <?= $row['judul']; ?>
                                                </a>
                                            </h5>
                                            <small>
                                                <a href="<?= $row['editLink']; ?>" class="text-decoration-none">Edit</a> |
                                                <a href="<?= $row['deleteLink']; ?>" class="text-decoration-none deleteThis">Hapus</a> |
                                                <a href="<?= $row['link']; ?>" class="text-decoration-none" target="_blank">Tampilkan</a>
                                            </small>
                                        </td>
                                        <td class="text-center"><?= $row['author']; ?></td>
                                        <td class="text-center"><?= $row['status']; ?><br><?= $row['date']; ?></td>
                                        <td class="text-center" style="font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;"><?= $row['id']; ?></td>
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
<!-- /.container-fluid -->