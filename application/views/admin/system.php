<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengaturan Sistem</h1>
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
            <li class="breadcrumb-item active" aria-current="page"><a class="text-decoration-none text-secondary" href="<?= base_url('admin/system'); ?>">Sistem</a></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <a href="#collapseUpload" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseUpload">
                    <h6 class="m-0 font-weight-bold text-primary" id="judul">File Upload</h6>
                </a>
                <div class="collapse" id="collapseUpload">
                    <div class="card-body">
                        <form action="<?= base_url('admin/setUploadConfig'); ?>" method="POST" id="form">
                            <input type="hidden" name="id" value="<?= $config['id_config_upload']; ?>">
                            <div class="form-group row">
                                <label for="direktori" class="col-sm-2 col-form-label">Direktori File</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="direktori" name="direktori" value="<?= $config['upload_path']; ?>">
                                    <small id="direktori" class="form-text text-muted">Direktori penyimpanan file yang telah diupload.</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="filetype" class="col-sm-2 col-form-label">Ekstensi file</label>
                                <div class="col-sm-10">
                                    <textarea name="extension" id="extension" class="form-control" rows="4"><?= $config['allowed_types']; ?></textarea>
                                    <small id="direktori" class="form-text text-muted">Ekstensi file yang diizinkan untuk diupload. (karakter | untuk memisahkan (contoh: mp3|mp4|dll), * untuk semua type file)</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ukuran" class="col-sm-2 col-form-label">Ukuran maksimal</label>
                                <div class="col-sm-10">
                                    <select class="custom-select" id="ukuran" name="ukuran">
                                        <option value="1024" <?php if ($config['max_size'] == 1024) {
                                                                    echo 'selected';
                                                                } ?>>1 MB</option>
                                        <option value="2048" <?php if ($config['max_size'] == 2048) {
                                                                    echo 'selected';
                                                                } ?>>2 MB</option>
                                        <option value="5120" <?php if ($config['max_size'] == 5120) {
                                                                    echo 'selected';
                                                                } ?>>5 MB</option>
                                        <option value="10240" <?php if ($config['max_size'] == 10240) {
                                                                    echo 'selected';
                                                                } ?>>10 MB</option>
                                        <option value="30720" <?php if ($config['max_size'] == 30720) {
                                                                    echo 'selected';
                                                                } ?>>30 MB</option>
                                        <option value="51200" <?php if ($config['max_size'] == 51200) {
                                                                    echo 'selected';
                                                                } ?>>50 MB</option>
                                    </select>
                                </div>
                            </div>
                            <fieldset class="form-group row">
                                <legend class="col-form-label col-sm-2 float-sm-left pt-0">Kustom nama file</legend>
                                <div class="col-sm-2">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input mb-2" id="customFileName" name="customFileName" <?php if ($config['file_name'] !== '') {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                        <label class="custom-control-label" for="customFileName" id="customFileNameLabel"><?php if ($config['file_name'] !== '') {
                                                                                                                                echo 'Aktif';
                                                                                                                            } else {
                                                                                                                                echo 'Tidak Aktif';
                                                                                                                            } ?></label>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="filename" name="filename" aria-describedby="filenameFeedback" readonly value="<?= $config['file_name']; ?>">
                                    <div id="filenameFeedback" class="invalid-feedback">
                                        Harus diisi!
                                    </div>
                                </div>
                            </fieldset>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="custom-control custom-switch mb-3">
                                        <input type="checkbox" class="custom-control-input" id="toLower" name="toLower" <?php if ($config['file_ext_tolower'] == 1) {
                                                                                                                            echo 'checked';
                                                                                                                        } ?> value="1">
                                        <label class="custom-control-label" for="toLower">Ubah ekstensi file ke huruf kecil</label>
                                    </div>
                                    <div class="custom-control custom-switch mb-3">
                                        <input type="checkbox" class="custom-control-input" id="overwrite" name="overwrite" <?php if ($config['over_write'] == 1) {
                                                                                                                                echo 'checked';
                                                                                                                            } ?> value="1">
                                        <label class="custom-control-label" for="overwrite">Overwrite File</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="custom-control custom-switch mb-3">
                                        <input type="checkbox" class="custom-control-input" id="encryptFile" name="encryptFile" <?php if ($config['encrypt_name'] == 1) {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?> value="1">
                                        <label class="custom-control-label" for="encryptFile">Enkripsi nama file</label>
                                    </div>
                                    <div class="custom-control custom-switch mb-3">
                                        <input type="checkbox" class="custom-control-input" id="removeSpace" name="removeSpace" <?php if ($config['remove_spaces'] == 1) {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?> value="1">
                                        <label class="custom-control-label" for="removeSpace">Hilangkan spasi nama file</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" id="simpanUploadConfig">Simpan</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <a href="#collapseBackupRestore" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseBackupRestore">
                    <h6 class="m-0 font-weight-bold text-primary">Backup-Restore</h6>
                </a>
                <div class="collapse" id="collapseBackupRestore">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                a
                            </div>
                            <div class="col-md-6">
                                a
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <a href="#collapseSistem" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseSistem">
                    <h6 class="m-0 font-weight-bold text-primary">Sistem Update</h6>
                </a>
                <div class="collapse" id="collapseSistem">
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->