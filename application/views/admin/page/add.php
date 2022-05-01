<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Halaman</h1>
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
            <li class="breadcrumb-item"><a href="<?= base_url('admin/page'); ?>">Pages</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a class="text-decoration-none text-secondary" href="<?= base_url('admin/page/add'); ?>">Tambah</a></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <?= $this->session->flashdata('post'); ?>
        </div>
    </div>

    <form action="" method="POST" autocomplete="off">
        <input type="hidden" name="idAuthor" value="<?= $author['id']; ?>">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <input type="text" class="form-control mb-2 <?php if (form_error('judul')) {
                                                                        echo 'is-invalid';
                                                                    }; ?>" name="judul" id="judul" placeholder="Tambahkan judul..." aria-describedby="judulValidation" value="<?= set_value('judul'); ?>" autocomplete="off">
                        <div id="judulValidation" class="invalid-feedback">
                            <?= form_error('judul'); ?>
                        </div>
                        <div class="input-group input-group-sm mb-2">
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
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Deskripsi</span>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" aria-describedby="basic-addon3">
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <textarea name="summernote" id="summernote"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>
<!-- /.container-fluid -->