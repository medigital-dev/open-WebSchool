<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Postingan</h1>
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
            <li class="breadcrumb-item"><a href="<?= base_url('admin/post/list'); ?>">Post</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a class="text-decoration-none text-secondary" href="<?= base_url('admin/post/add'); ?>">Tambah</a></li>
        </ol>
    </nav>

    <!-- Content Row -->
    <?= form_open_multipart(); ?>
    <input type="hidden" name="author" id="author" value="<?= $user['id']; ?>">
    <div class="row">
        <div class="col-lg-9 mb-4">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <input type="text" class="form-control mb-2 <?php if (form_error('judul')) {
                                                                    echo 'is-invalid';
                                                                }; ?>" name="judul" id="judul" placeholder="Tambahkan judul..." aria-describedby="judulValidation" value="<?= set_value('judul'); ?>" autocomplete="off">
                    <div id="judulValidation" class="invalid-feedback">
                        <?= form_error('judul'); ?>
                    </div>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Link:</span>
                        </div>
                        <input type="text" class="form-control <?php if (form_error('link')) {
                                                                    echo 'is-invalid';
                                                                }; ?>" aria-describedby="LinkValidation" id="link" name="link" readonly value="<?= set_value('link'); ?>">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="editLink">Edit</button>
                        </div>
                        <div id="LinkValidation" class="invalid-feedback">
                            <?= form_error('link'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <textarea name="isi" id="summernote"></textarea>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="card shadow mb-4">
                <a href="#collapsePublish" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapsePublish">
                    <h6 class="m-0 font-weight-bold text-primary">Terbitkan</h6>
                </a>
                <div class="collapse show" id="collapsePublish">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="status" class="col-sm-auto col-form-label">Status:</label>
                            <div class="col-sm">
                                <select name="status" id="status" class="form-control">
                                    <option value="1" selected>Aktif</option>
                                    <option value="0">Draft</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="jam">Tanggal dan waktu <span id="labelCustomDate">penerbitan:</span></label>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control text-center" name="jam" id="jam" readonly>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="editDateTime">Edit</button>
                                </div>
                            </div>
                        </div>
                        <span id="customDateTime"></span>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success btn-block" id="publish" name="publish">Terbitkan</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <a href="#collapseSampul" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseSampul">
                    <h6 class="m-0 font-weight-bold text-primary"><span class="text-warning" id="iconPreview"><i class="fas fa-exclamation-triangle fa-fw mr-2"></i></span>Gambar Sampul</h6>
                </a>
                <div class="collapse" id="collapseSampul">
                    <div class="card-body">
                        <div class="input-group mb-4">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="file" aria-describedby="inputGroupFileAddon01" onchange="gambarPratinjau()">
                                <label class="custom-file-label" for="gambar">Pilih gambar</label>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-12 text-center">
                                <img src="<?= base_url(); ?>assets/global/images/image-sample-post.png" class="img-thumbnail img-preview" alt="Contoh Gambar" title="Contoh Gambar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <a href="#collapseKategori" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseKategori">
                    <h6 class="m-0 font-weight-bold text-primary"><span id="iconKategori" class="text-warning"><i class="fas fa-exclamation-triangle fa-fw mr-2"></i></span>Kategori</h6>
                </a>
                <div class="collapse" id="collapseKategori">
                    <div class="card-body">
                        <div class="form-group">
                            <select class="custom-select singleTagsSelect2" data-placeholder="Pilih/tambah kategori" id="kategori" name="kategori">
                                <option></option>
                                <?php foreach ($kategori as $row) : ?>
                                    <option value="<?= $row['nama_kategori']; ?>"><?= $row['nama_kategori']; ?></option>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <a href="#collapseTag" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseTag">
                    <h6 class="m-0 font-weight-bold text-primary"><span class="text-warning" id="iconTags"><i class="fas fa-exclamation-triangle fa-fw mr-2"></i></span>Tag</h6>
                </a>
                <div class="collapse" id="collapseTag">
                    <div class="card-body">
                        <select class="form-control multiTagsSelect2" multiple="multiple" id="tag" name="tag[]">
                            <?php foreach ($tag as $row) : ?>
                                <option value="<?= $row['nama_tag']; ?>"><?= $row['nama_tag']; ?></option>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </select>
                        <small>Pilih atau ketik untuk tag baru</small>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <button type="submit" class="btn btn-success btn-block" id="publish" name="publish">Terbitkan</button>
                </div>
            </div>
        </div>
    </div>
    </form>

</div>
<!-- /.container-fluid -->