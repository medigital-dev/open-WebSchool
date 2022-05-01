<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
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
            <li class="breadcrumb-item active" aria-current="page"><a class="text-decoration-none text-secondary" href="<?= base_url('admin/post/kategori'); ?>">Kategori</a></li>
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
                    <h6 class="m-0 font-weight-bold text-primary" id="judul">Tambah baru</h6>
                </a>
                <div class="collapse show" id="collapseTambah">
                    <form action="" method="POST" id="formKategori">
                        <input type="hidden" name="id" id="id_kategori">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label class="form-label" for="namaKategori">Nama Kategori</label>
                                <input type="text" class="form-control <?php if (form_error('namaKategori')) {
                                                                            echo 'is-invalid';
                                                                        }; ?>" name="namaKategori" id="namaKategori" aria-describedby="validationNamaKategori" value="<?= set_value('namaKategori'); ?>">
                                <div id="validationNamaKategori" class="invalid-feedback">
                                    <?= form_error('namaKategori'); ?>
                                </div>
                            </div>
                            <div class="input-group input-group-sm">
                                <label class="form-label" for="slug">Url Slug</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control <?php if (form_error('slug')) {
                                                                                echo 'is-invalid';
                                                                            }; ?>" id="slug" name="slug" readonly aria-describedby="validationSlug" value="<?= set_value('slug'); ?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="buttonEditSlug">Edit</button>
                                    </div>
                                    <div id="validationSlug" class="invalid-feedback">
                                        <?= form_error('slug'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div id="batalArea"></div>
                                <button type="submit" class="btn btn-primary" id="buttonAddKategori">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card shadow mb-4">
                <a href="#collapseKategori" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseKategori">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Kategori</h6>
                </a>
                <div class="collapse show" id="collapseKategori">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped display" id="dataTable-post" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 20px;">No</th>
                                        <th>Nama Kategori</th>
                                        <th>Url Slug</th>
                                        <th style="width: 20px;">Jumlah</th>
                                        <th style="width: 80px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($kategori as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i; ?></td>
                                            <td><?= $row['nama_kategori']; ?></td>
                                            <td><?= $row['slug_kategori']; ?></td>
                                            <td class="text-center"><?= $row['jumlah_dipakai']; ?></td>
                                            <td class="text-center">
                                                <button type="button" id="editButton" class="btn btn-sm btn-warning" onclick="editKategori('<?= $row['id_kategori']; ?>', '<?= $row['nama_kategori']; ?>', '<?= $row['slug_kategori']; ?>')" title="Edit kategori: <?= $row['nama_kategori']; ?>"><i class="fas fa-edit fa-fw"></i></button>
                                                <a href="<?= base_url(); ?>admin/deleteKategori/<?= $row['id_kategori']; ?>" class="btn btn-sm btn-danger deleteThis"><i class="fas fa-trash-alt fa-fw"></i></a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
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