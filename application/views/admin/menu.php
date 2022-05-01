<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Menu</h1>
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
            <li class="breadcrumb-item active" aria-current="page"><a class="text-decoration-none text-secondary" href="<?= base_url('admin/menu'); ?>">Menu</a></li>
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
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Menu</h6>
                </a>
                <div class="collapse show" id="collapseTambah">
                    <form action="" method="POST" id="form" autocomplete="off">
                        <input type="hidden" name="idMenu" id="idMenu">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label" for="parent">Parent</label>
                                <select class="custom-select defaultSelect2" name="parent" id="parent">
                                    <option value="0" selected>(Menu Utama)</option>
                                    <?php foreach ($allMenu as $row) : ?>
                                        <option value="<?= $row['id_menu']; ?>"><?= $row['title']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="urutan">Urutan</label>
                                <input type="number" class="form-control <?php if (form_error('urutan')) {
                                                                                echo 'is-invalid';
                                                                            } ?>" name="urutan" id="urutan" aria-describedby="urutanFeedback">
                                <div id="urutanFeedback" class="invalid-feedback">
                                    <?= form_error('urutan'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="link">URL <small>*) Pilih halaman/Input URL Lain"</small></label>
                                <select class="singleTagsSelect2 custom-select" id="link" name="link">
                                    <option value="#!" selected>#!</option>
                                    <optgroup label="Static Pages">
                                        <option value="<?= base_url(); ?>">Homepage</option>
                                        <option value="<?= base_url(); ?>blogs">Blog</option>
                                    </optgroup>
                                    <optgroup label="Pages">
                                        <?php foreach ($pages as $row) : ?>
                                            <option value="<?= base_url() . $row['link']; ?>"><?= $row['judul']; ?></option>
                                        <?php endforeach; ?>
                                    </optgroup>
                                    <optgroup label="Postingan">
                                        <?php foreach ($posts as $row) : ?>
                                            <option value="<?= $row['link']; ?>"><?= $row['judul']; ?></option>
                                        <?php endforeach; ?>
                                    </optgroup>
                                    <optgroup label="Kategori">
                                        <?php foreach ($kategori as $row) : ?>
                                            <option value="<?= $row['link']; ?>"><?= $row['judul']; ?></option>
                                        <?php endforeach; ?>
                                    </optgroup>
                                </select>
                                <small>*) Url must contain http/https!</small>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="judul">Title</label>
                                <input type="text" class="form-control <?php if (form_error('judul')) {
                                                                            echo 'is-invalid';
                                                                        } ?>" name="judul" id="judul" aria-describedby="judulFeedback">
                                <div id="judulFeedback" class="invalid-feedback">
                                    <?= form_error('judul'); ?>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="tipe">Tipe</label>
                                <select class="custom-select defaultSelect2" id="tipe" name="tipe">
                                    <option value="Default" selected>Default</option>
                                    <option value="Dropdown">Dropdown</option>
                                    <!-- <option value="Link" selected>Default</option> -->
                                </select>
                            </div>
                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="new_tab" name="new_tab">
                                <label class="custom-control-label" for="new_tab">Open link in new tab</label>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div id="batalArea"></div>
                                <div id="deleteArea"></div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" id="buttonAddTag">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- <style>
            ul {
                list-style: "〉 ";
                /* margin-left: 0; */
                padding: 5px 20px 5px 20px;
            }

            li ul {
                list-style: "↳ ";
            }
        </style> -->
        <div class="col-lg-9">
            <div class="card shadow mb-4">
                <a href="#collapseTag" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseTag">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Menu</h6>
                </a>
                <div class="collapse show" id="collapseTag">
                    <div class="card-body">
                        <ul class="list-group">
                            <?php foreach ($mainMenu as $row) : ?>
                                <?php if ($row['tipe'] == 'Default') : ?>
                                    <li class="list-group-item">
                                        <a class="text-decoration-none font-weight-bold" title="Klik untuk Edit/Hapus" role="button" onclick="editMenu('<?= $row['id_menu']; ?>')">
                                            <?= $row['urutan'] . '. ' . $row['title']; ?>
                                        </a>
                                    </li>
                                <?php elseif ($row['tipe'] == 'Dropdown') : ?>
                                    <li class="list-group-item">
                                        <a class="text-decoration-none font-weight-bold" title="Klik untuk Edit/Hapus" role="button" onclick="editMenu('<?= $row['id_menu']; ?>')">
                                            <?= $row['urutan'] . '. ' . $row['title']; ?>
                                        </a>
                                        <ul class="list-group mt-1">
                                            <?php foreach ($allMenu as $allMenu2) : ?>
                                                <?php if ($allMenu2['parent_id'] == $row['id_menu']) : ?>
                                                    <li class="list-group-item">
                                                        <a class="text-decoration-none" title="Klik untuk Edit/Hapus" role="button" onclick="editMenu('<?= $allMenu2['id_menu']; ?>')">
                                                            <?= $allMenu2['urutan'] . '. ' . $allMenu2['title']; ?>
                                                        </a>
                                                        <ul class="list-group mt-1">
                                                            <?php foreach ($allMenu as $allMenu3) : ?>
                                                                <?php if ($allMenu3['parent_id'] == $allMenu2['id_menu']) : ?>
                                                                    <li class="list-group-item">
                                                                        <a class="text-decoration-none" title="Klik untuk Edit/Hapus" role="button" onclick="editMenu('<?= $allMenu3['id_menu']; ?>')">
                                                                            <?= $allMenu3['urutan'] . '. ' . $allMenu3['title']; ?>
                                                                        </a>
                                                                        <ul class="list-group mt-1">
                                                                            <?php foreach ($allMenu as $allMenu4) : ?>
                                                                                <?php if ($allMenu4['parent_id'] == $allMenu3['id_menu']) : ?>
                                                                                    <li class="list-group-item">
                                                                                        <a class="text-decoration-none" title="Klik untuk Edit/Hapus" role="button" onclick="editMenu('<?= $allMenu4['id_menu']; ?>')">
                                                                                            <?= $allMenu4['urutan'] . '. ' . $allMenu4['title']; ?>
                                                                                        </a>
                                                                                        <ul class="list-group mt-1">
                                                                                            <?php foreach ($allMenu as $allMenu5) : ?>
                                                                                                <?php if ($allMenu5['parent_id'] == $allMenu4['id_menu']) : ?>
                                                                                                    <li class="list-group-item">
                                                                                                        <a class="text-decoration-none" title="Klik untuk Edit/Hapus" role="button" onclick="editMenu('<?= $allMenu5['id_menu']; ?>')">
                                                                                                            <?= $allMenu5['urutan'] . '. ' . $allMenu5['title']; ?>
                                                                                                        </a>
                                                                                                    </li>
                                                                                                <?php endif; ?>
                                                                                            <?php endforeach; ?>
                                                                                        </ul>
                                                                                    </li>
                                                                                <?php endif; ?>
                                                                            <?php endforeach; ?>
                                                                        </ul>
                                                                    </li>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->