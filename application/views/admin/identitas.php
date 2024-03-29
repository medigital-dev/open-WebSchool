<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Identitas Sekolah</h1>
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
            <li class="breadcrumb-item active" aria-current="page"><a class="text-decoration-none text-secondary" href="<?= base_url('admin/identitas'); ?>">Identitas</a></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <?= $this->session->flashdata('post'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <a href="#collapseTag" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseTag">
                    <h6 class="m-0 font-weight-bold text-primary">Data Identitas Sekolah</h6>
                </a>
                <div class="collapse show" id="collapseTag">
                    <div class="card-body">
                        <form method="POST" action="<?= base_url(); ?>admin/setIdentitas">
                            <input type="hidden" name="id" value="<?= $data['id']; ?>">
                            <div class="form-group">
                                <label for="nama">Nama Sekolah</label>
                                <input type="text" class="form-control <?php if (form_error('nama')) {
                                                                            echo 'is-invalid';
                                                                        } ?>" id="nama" name="nama" aria-describedby="namaFeedback" value="<?= $data['nama']; ?>">
                                <div id="namaFeedback" class="invalid-feedback">
                                    <?= form_error('nama'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tagline">Tagline</label>
                                <textarea name="tagline" id="tagline" class="form-control" rows="5"><?= $data['tagline']; ?></textarea>
                                <div id="taglineFeedback" class="invalid-feedback">
                                    <?= form_error('tagline'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control <?php if (form_error('alamat')) {
                                                                            echo 'is-invalid';
                                                                        } ?>" id="alamat" name="alamat" aria-describedby="alamatFeedback" value="<?= $data['alamat']; ?>">
                                <div id="alamatFeedback" class="invalid-feedback">
                                    <?= form_error('alamat'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="telepon">Telepon</label>
                                    <input type="text" class="form-control <?php if (form_error('telepon')) {
                                                                                echo 'is-invalid';
                                                                            } ?>" id="telepon" name="telepon" aria-describedby="teleponFeedback" value="<?= $data['telepon']; ?>">
                                    <div id="teleponFeedback" class="invalid-feedback">
                                        <?= form_error('telepon'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control <?php if (form_error('email')) {
                                                                                echo 'is-invalid';
                                                                            } ?>" id="email" name="email" aria-describedby="emailFeedback" value="<?= $data['email']; ?>">
                                    <div id="emailFeedback" class="invalid-feedback">
                                        <?= form_error('email'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="website">Alamat Website</label>
                                    <input type="text" class="form-control <?php if (form_error('website')) {
                                                                                echo 'is-invalid';
                                                                            } ?>" id="website" name="website" aria-describedby="websiteFeedback" value="<?= $data['website']; ?>">
                                    <div id="websiteFeedback" class="invalid-feedback">
                                        <?= form_error('website'); ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <a href="#collapseLogo" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseLogo">
                    <h6 class="m-0 font-weight-bold text-primary" id="judul">Logo</h6>
                </a>
                <div class="collapse show" id="collapseLogo">
                    <?= form_open_multipart(base_url('admin/setLogo')); ?>
                    <input type="hidden" name="id" value="<?= $data['id']; ?>">
                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-thumbnail w-50 mb-3 img-preview" id="preview" src="<?= $data['logo']; ?>" alt="Logo">
                        </div>
                        <label class="form-label" for="file">Ganti logo</label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="file">
                                <label class="custom-file-label" for="file">Pilih file</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary" id="buttonSimpan">Simpan</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="card shadow mb-4">
                <a href="#collapseLogo" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseLogo">
                    <h6 class="m-0 font-weight-bold text-primary" id="judul">Media Sosial</h6>
                </a>
                <div class="collapse" id="collapseLogo">
                    <div class="card-body">
                        <form action="<?= base_url('admin/setMedsos'); ?>" method="POST" id="formTag">
                            <label>Tambah Media Sosial</label>
                            <div class="input-group mb-3">
                                <select class="custom-select col-3" id="selectMedsos" name="icon">
                                    <option value="0" selected>Icon</option>
                                    <option value="<i class='fab fa-facebook'></i>">Facebook</option>
                                    <option value="<i class='fab fa-instagram'></i>">Instagram</option>
                                    <option value="<i class='fab fa-telegram'></i>">Telegram</option>
                                    <option value="<i class='fab fa-twitter'></i>">Twitter</option>
                                    <option value="<i class='fab fa-youtube'></i>">Youtube</option>
                                    <option value="<i class='fab fa-whatsapp'></i>">Whatsapp</option>
                                </select>
                                <input type="text" class="form-control" placeholder="Url" name="url" aria-label="Text input with dropdown button">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary" id="buttonSimpan"><i class="fas fa-save"></i></button>
                                </div>
                            </div>
                        </form>
                        <label>Daftar Media Sosial</label>
                        <table class="table table-sm table-bordered table-hover w-100">
                            <tr>
                                <th class="text-center" style="width: 10px;">Icon</th>
                                <th class="text-center">Url</th>
                                <th class="text-center" style="width: 10px;">Aksi</th>
                            </tr>
                            <?php foreach ($medsos as $medsos) : ?>
                                <tr>
                                    <td class="text-center align-middle"><?= $medsos['icon']; ?></td>
                                    <td class="align-middle text-break"><a href="<?= $medsos['url']; ?>" target="_blank" class="text-decoration-none"><?= $medsos['url']; ?></a></td>
                                    <td class="text-center align-middle"><a href="<?= base_url('admin/deleteMedsos/') . $medsos['id']; ?>" class="text-danger text-decoration-none deleteMedsos" id="deleteMedsos"><i class="fas fa-trash"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->