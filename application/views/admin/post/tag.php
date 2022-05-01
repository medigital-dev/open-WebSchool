<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tag</h1>
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
            <li class="breadcrumb-item active" aria-current="page"><a class="text-decoration-none text-secondary" href="<?= base_url('admin/post/tag'); ?>">Tag</a></li>
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
                    <form action="" method="POST" id="formTag">
                        <input type="hidden" name="id" id="id_tag">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label class="form-label" for="namaTag">Nama Tag</label>
                                <input type="text" class="form-control <?php if (form_error('namaTag')) {
                                                                            echo 'is-invalid';
                                                                        }; ?>" name="namaTag" id="namaTag" aria-describedby="validationnamaTag" value="<?= set_value('namaTag'); ?>">
                                <div id="validationnamaTag" class="invalid-feedback">
                                    <?= form_error('namaTag'); ?>
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
                                <button type="submit" class="btn btn-primary" id="buttonAddTag">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card shadow mb-4">
                <a href="#collapseTag" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseTag">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Tag</h6>
                </a>
                <div class="collapse show" id="collapseTag">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped display" id="dataTable-post" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 20px;">No</th>
                                        <th>Nama Tag</th>
                                        <th>Url Slug</th>
                                        <th style="width: 20px;">Jumlah</th>
                                        <th style="width: 80px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($tags as $row) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $row['nama']; ?></td>
                                            <td><?= $row['slug']; ?></td>
                                            <td class="text-center">
                                                <a href="<?= $row['link']; ?>" class="text-decoration-none" target="blank" title="Lihat postingan">
                                                    <?= $row['jumlah']; ?>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" id="editButton" class="btn btn-sm btn-warning" onclick="editTag('<?= $row['id']; ?>', '<?= $row['nama']; ?>', '<?= $row['slug']; ?>')" title="Edit tag <?= $row['nama']; ?>?"><i class="fas fa-edit fa-fw"></i></button>
                                                <a href="<?= base_url(); ?>admin/deleteTag/<?= $row['id']; ?>" class="btn btn-sm btn-danger deleteThis"><i class="fas fa-trash-alt fa-fw"></i></a>
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