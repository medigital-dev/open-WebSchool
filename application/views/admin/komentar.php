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
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a class="text-decoration-none text-secondary" href="<?= base_url('admin/komentar'); ?>">Komentar</a></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <?= $this->session->flashdata('post'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="card shadow mb-4">
                <a href="#collapseTambah" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseTambah">
                    <h6 class="m-0 font-weight-bold text-primary" id="judul">Balas komentar</h6>
                </a>
                <div class="collapse show" id="collapseTambah">
                    <form action="<?= base_url(); ?>admin/balasKomentar" method="POST" id="formTag">
                        <input type="hidden" name="idPost" id="idPost">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label class="form-label" for="parentID">ID Komentar</label>
                                <input type="text" class="form-control" name="parentID" id="parentID" aria-describedby="validationparentID" readonly>
                            </div>
                            <div class="input-group input-group-sm">
                                <label class="form-label" for="slug">Balasan</label>
                                <div class="input-group mb-3">
                                    <textarea name="reply" id="reply" rows="5" class="form-control" readonly></textarea>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div id="batalArea"></div>
                                <button type="submit" class="btn btn-primary" disabled id="buttonSimpan">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card shadow mb-4">
                <a href="#collapseTag" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseTag">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Komentar</h6>
                </a>
                <div class="collapse show" id="collapseTag">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover display" id="dataTable-post" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center bg-primary text-light">
                                        <th style="width: 20px;">No</th>
                                        <th style="width: 100px;">Identitas</th>
                                        <th style="width: 150px;">Judul Postingan</th>
                                        <th>Komentar</th>
                                        <th style="width: 100px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dataKomentar as $row) : ?>
                                        <tr <?php if ($row['is_read'] == 0) {
                                                echo 'style="background-color: #EAF2F8"';
                                            } ?>>
                                            <td class="text-center"><?= $row['nomor']; ?></td>
                                            <td>
                                                <h5><?= $row['nama']; ?></h5>
                                                <small>
                                                    <a class="text-decoration-none" href="<?= $row['linkEmail']; ?>" target="blank">
                                                        <?= $row['email']; ?>
                                                    </a>
                                                    <br>
                                                    <a href="<?= $row['linkWA']; ?>" class="text-decoration-none" target="blank">
                                                        <?= $row['nomor_wa']; ?></h6>
                                                    </a>
                                            </td>
                                            <td>
                                                <a href="<?= $row['hrefPreview']; ?>" target="blank" class="text-decoration-none">
                                                    <?= $row['judul']; ?>
                                                </a>
                                            </td>
                                            <td>
                                                <small><?= $row['date']; ?></small>
                                                <p>
                                                    <?= $row['komentar']; ?>
                                                </p>
                                            </td>
                                            <td class=" d-flex justify-content-between">
                                                <button class="btn btn-sm btn-primary" title="<?= $row['iconTitle']; ?>" onclick="buttonRead('<?= $row['idKomentar']; ?>')" <?php if ($row['is_read'] == 1) {
                                                                                                                                                                                echo 'disabled';
                                                                                                                                                                            } ?>><?= $row['icon']; ?></button>
                                                <button class="btn btn-sm btn-success" id="buttonReply" onclick="buttonReply('<?= $row['idKomentar']; ?>','<?= $row['idPost']; ?>')" title="Balas komentar"><i class="fas fa-reply fa-fw"></i></button>
                                                <a href="<?= $row['hrefDelete']; ?>" class="btn btn-sm btn-danger deleteThis" title="Hapus komentar"><i class="fas fa-trash-alt fa-fw"></i></a>
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