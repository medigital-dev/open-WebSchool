<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Media</h1>
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
            <li class="breadcrumb-item active" aria-current="page"><a class="text-decoration-none text-secondary" href="<?= base_url('admin/media'); ?>">Media</a></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">

        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="card shadow mb-4">
                <a href="#collapseTambah" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseTambah">
                    <h6 class="m-0 font-weight-bold text-primary" id="judul">Upload Media</h6>
                </a>
                <div class="collapse show" id="collapseTambah">
                    <?= form_open_multipart('admin/setMedia', 'id="form"'); ?>
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="ext" id="ext">
                    <input type="hidden" name="hrefOld" id="hrefOld">
                    <input type="hidden" name="type" id="type">

                    <div class="card-body">
                        <div class="custom-file mb-4">
                            <input type="file" class="custom-file-input <?php if (form_error('file')) {
                                                                            echo 'is-invalid';
                                                                        } ?>" id="file" name="file">
                            <label class="custom-file-label" for="file">Pilih file...</label>
                            <div class="invalid-feedback"><?= form_error('file'); ?></div>
                        </div>
                        <div class="form-group">
                            <label for="filename">Nama File</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control <?php if (form_error('filename')) {
                                                                            echo 'is-invalid';
                                                                        } ?>" id="filename" name="filename" aria-describedby="basic-filename" readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-filename">ext</span>
                                </div>
                            </div>
                            <div id="basic-filename" class="invalid-feedback">
                                <?= form_error('filename'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control <?php if (form_error('title')) {
                                                                        echo 'is-invalid';
                                                                    } ?>" id="title" name="title" aria-describedby="titleFeedback" readonly>
                            <div id="titleFeedback" class="invalid-feedback">
                                <?= form_error('title'); ?>
                            </div>
                        </div>
                        <div class="input-group input-group-sm">
                            <label class="form-label" for="alt">Alternative Text (Alt)</label>
                            <div class="input-group mb-3">
                                <textarea name="alt" id="alt" rows="5" class="form-control" readonly></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <!-- <button type="button" class="btn btn-outline-info" id="reset">Reset Form</button> -->
                            <button type="submit" class="btn btn-primary" id="simpan">Upload</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card shadow mb-4">
                <a href="#collapseTag" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseTag">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Media di Upload</h6>
                </a>
                <div class="collapse show" id="collapseTag">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover display" id="dataTable-post" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center bg-primary text-light">
                                        <th style="width: 20px;">No</th>
                                        <th style="width: 220px;">Preview</th>
                                        <th style="width: 150px;">Judul</th>
                                        <th>Alt</th>
                                        <!-- <th>Tanggal Upload</th> -->
                                        <th style="width: 70px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($daftarMedia as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?= $row['nomor']; ?></td>
                                            <td class="text-center">
                                                <?= $row['thumbnail']; ?>
                                                <p class="small text-break"><?= $row['filename']; ?></p>
                                                <p class="small text-break w-100" id="href<?= $row['id']; ?>"><?= $row['url']; ?></p>
                                            </td>
                                            <td class="text-center">
                                                <h6 class="text-break"><?= $row['title']; ?></h6>
                                                <p class="small">Tanggal upload: <?= $row['date']; ?></p>
                                            </td>
                                            <td class="text-break"><?= $row['alt']; ?></td>
                                            <td class="text-center">
                                                <div class="mb-1">
                                                    <a download="" href="<?= $row['url']; ?>" target="_blank" class="btn btn-sm btn-info" title="Download file <?= $row['filename']; ?>"><i class="fas fa-download fa-fw"></i></a>
                                                    <button type="button" class="btn btn-sm btn-primary btn-cancel" title="Copy Link" onclick="copyLink('<?= $row['id']; ?>');"><i class="fas fa-copy fa-fw"></i></button>
                                                </div>
                                                <div>
                                                    <button type="button" class="btn btn-sm btn-warning btn-edit" data-file="<?= $row['dataFile']; ?>"><i class="fas fa-edit fa-fw"></i></button>
                                                    <a href="<?= base_url('admin/deleteFile/') . $row['id']; ?>" class="btn btn-sm btn-danger deleteThis"><i class="fas fa-trash-alt fa-fw"></i></a>
                                                </div>
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