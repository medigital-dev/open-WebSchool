<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Homepage</h1>
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
            <li class="breadcrumb-item">Pengaturan</li>
            <li class="breadcrumb-item active" aria-current="page"><a class="text-decoration-none text-secondary" href="<?= base_url('admin/homepage'); ?>">Homepage</a></li>
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
                <a href="#collapseCard1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard1">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah/Edit Section</h6>
                </a>
                <div class="collapse show" id="collapseCard1">
                    <div class="card-body">
                        <form method="POST" action="<?= base_url(); ?>admin/setHomecontent">
                            <input type="hidden" name="id" id="id">
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="urutan">Urutan</label>
                                    <input type="number" class="form-control <?php if (form_error('urutan')) {
                                                                                    echo 'is-invalid';
                                                                                } ?>" id="urutan" name="urutan" aria-describedby="urutanFeedback">
                                    <div id="urutanFeedback" class="invalid-feedback">
                                        <?= form_error('urutan'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-10">
                                    <label for="idName">Nama ID</label>
                                    <input type="text" class="form-control <?php if (form_error('idName')) {
                                                                                echo 'is-invalid';
                                                                            } ?>" id="idName" name="idName" aria-describedby="idNameFeedback">
                                </div>
                                <div id="idNameFeedback" class="invalid-feedback">
                                    <?= form_error('urutan'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summernote">Isi</label>
                                <textarea name="summernote" id="summernote" class="form-control" rows="5"></textarea>
                                <div id="summernoteFeedback" class="invalid-feedback">
                                    <?= form_error('summernote'); ?>
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
                <a href="#collapseCard" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard">
                    <h6 class="m-0 font-weight-bold text-primary">Preview</h6>
                </a>
                <div class="collapse show" id="collapseCard">
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-hover w-100">
                            <tr>
                                <th class="text-center align-middle" style="width: 10px;">Urutan</th>
                                <th class="text-center align-middle">ID</th>
                                <th class="text-center align-middle" style="width: 120px;">Aksi</th>
                            </tr>
                            <?php foreach ($homeContent as $homeContent) : ?>
                                <tr>
                                    <td class="text-center align-middle"><?= $homeContent['urutan']; ?></td>
                                    <td class="align-middle text-wrap"><?= $homeContent['id_homepage']; ?></td>
                                    <td class="align-middle">
                                        <div class="input-group">
                                            <div class="input-group-append" id="button-addon4">
                                                <div class="custom-control custom-switch pt-2">
                                                    <input type="checkbox" <?= ($homeContent['is_active'] == 1) ? 'checked' : ''; ?> class="custom-control-input switchHomeContent" id="customSwitch[<?= $homeContent['id']; ?>]" name="<?= $homeContent['id']; ?>">
                                                    <label class="custom-control-label" for="customSwitch[<?= $homeContent['id']; ?>]"></label>
                                                </div>
                                                <button class="btn btn-outline-warning" onclick="editHomeContent(<?= $homeContent['id']; ?>)" type="button"><i class="fas fa-edit"></i></button>
                                                <a href="<?= base_url('admin/deleteHomecontent/') . $homeContent['id']; ?>" class="btn btn-outline-danger deleteHomecontent"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </td>
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