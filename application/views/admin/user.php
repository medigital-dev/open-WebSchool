<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengguna</h1>
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
            <li class="breadcrumb-item active" aria-current="page"><a class="text-decoration-none text-secondary" href="<?= base_url('admin/user'); ?>">Pengguna</a></li>
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
                    <h6 class="m-0 font-weight-bold text-primary" id="judul">Tambah/Edit Pengguna</h6>
                </a>
                <div class="collapse show" id="collapseTambah">
                    <form action="" method="POST" id="formTag" autocomplete="off">
                        <input type="hidden" name="idUser" id="idUser">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control <?php if (form_error('nama')) {
                                                                            echo 'is-invalid';
                                                                        } ?>" id="nama" name="nama" value="<?= set_value('nama'); ?>" aria-describedby="namaFeedback">
                                <div id="namaFeedback" class="invalid-feedback">
                                    <?= form_error('nama'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control <?php if (form_error('username')) {
                                                                            echo 'is-invalid';
                                                                        } ?>" id="username" name="username" value="<?= set_value('username'); ?>" aria-describedby="usernameFeedback">
                                <div id="usernameFeedback" class="invalid-feedback">
                                    <?= form_error('username'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telepon">Telepon</label>
                                <input type="text" class="form-control <?php if (form_error('telepon')) {
                                                                            echo 'is-invalid';
                                                                        } ?>" id="telepon" name="telepon" value="<?= set_value('telepon'); ?>" aria-describedby="teleponFeedback">
                                <div id="teleponFeedback" class="invalid-feedback">
                                    <?= form_error('telepon'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control <?php if (form_error('email')) {
                                                                            echo 'is-invalid';
                                                                        } ?>" id="email" name="email" value="<?= set_value('email'); ?>" aria-describedby="emailFeedback">
                                <div id="emailFeedback" class="invalid-feedback">
                                    <?= form_error('email'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="level">Level User</label>
                                <select class="custom-select <?php if (form_error('level')) {
                                                                    echo 'is-invalid';
                                                                } ?>" id="level" name="level" aria-describedby="levelFeedback">
                                    <option selected disabled>Pilih</option>
                                    <?php if ($_SESSION['user']['level'] == 'root') : ?>
                                        <?php foreach ($userLevel as $row) : ?>
                                            <option value="<?= $row['id_level']; ?>"><?= $row['nama_level']; ?></option>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <?php foreach ($userLevel as $row) : ?>
                                            <?php if ($row['nama_level'] == $_SESSION['user']['level']) : ?>
                                                <option value="<?= $row['id_level']; ?>"><?= $row['nama_level']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <div id="levelFeedback" class="invalid-feedback">
                                    <?= form_error('level'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password <small class="passInfo"></small></label>
                                <input type="password" class="form-control form-password <?php if (form_error('password')) {
                                                                                                echo 'is-invalid';
                                                                                            } ?>" id="password" name="password" value="<?= set_value('password'); ?>" aria-describedby="passwordFeedback">
                                <div id="passwordFeedback" class="invalid-feedback">
                                    <?= form_error('password'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password2">Ulangi Password <small class="passInfo"></small></label>
                                <input type="password" class="form-control form-password <?php if (form_error('password2')) {
                                                                                                echo 'is-invalid';
                                                                                            } ?>" id="password2" name="password2" value="<?= set_value('password2'); ?>" aria-describedby="password2Feedback">
                                <div id="password2Feedback" class="invalid-feedback">
                                    <?= form_error('password2'); ?>
                                </div>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="showPassword">
                                <label class="form-check-label" for="showPassword">
                                    Lihat password
                                </label>
                            </div>
                            <div class="d-flex justify-content-between">
                                <!-- <div id="batalArea"></div> -->
                                <button type="button" class="btn btn-outline-info" onclick="resetFormUser()">Reset</button>
                                <button type="submit" class="btn btn-primary" id="buttonSimpan">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card shadow mb-4">
                <a href="#collapseTag" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseTag">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pengguna Aktif</h6>
                </a>
                <div class="collapse show" id="collapseTag">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover display" id="dataTable-post" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center bg-primary text-light">
                                        <th style="width: 20px;">No</th>
                                        <th>Pengguna</th>
                                        <th style="width: 150px;">Username</th>
                                        <th style="width: 100px;">Level</th>
                                        <th style="width: 100px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1; ?>
                                    <?php foreach ($user as $row) : ?>
                                        <?php if ($row['active'] > 0) : ?>
                                            <tr>
                                                <td class="text-center"><?= $nomor; ?></td>
                                                <td>
                                                    <h4><?= $row['nama']; ?></h4>
                                                    <p>
                                                        <small><?= $row['email']; ?><br><?= $row['telepon']; ?></small>
                                                    </p>
                                                </td>
                                                <td class="text-center"><?= $row['username']; ?></td>
                                                <td class="text-center"><?= $row['level']; ?></td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-warning" title="Edit <?= $row['username']; ?>" onclick="editUser('<?= $row['id']; ?>')"><i class="fas fa-edit fa-fw"></i></button>
                                                    <a href="<?= base_url('admin/changeUserActive/' . $row['id']); ?>" class="btn btn-sm btn-<?= $row['colorIconStatus']; ?>" title="<?= $row['iconTitle']; ?>" id="toggleActive"><?= $row['iconStatus']; ?></a>
                                                </td>
                                            </tr>
                                            <?php $nomor++; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($_SESSION['user']['level'] == 'root') : ?>
                <div class="card shadow mb-4">
                    <a href="#collapseNonAktive" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseNonAktive">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Pengguna Tidak Aktif</h6>
                    </a>
                    <div class="collapse" id="collapseNonAktive">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover display" id="dataTable-post" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-center bg-primary text-light">
                                            <th style="width: 20px;">No</th>
                                            <th>Pengguna</th>
                                            <th style="width: 150px;">Username</th>
                                            <th style="width: 100px;">Level</th>
                                            <th style="width: 100px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $nomor = 1; ?>
                                        <?php foreach ($user as $row) : ?>
                                            <?php if ($row['active'] == 0) : ?>
                                                <tr>
                                                    <td class="text-center"><?= $nomor; ?></td>
                                                    <td>
                                                        <h4><?= $row['nama']; ?></h4>
                                                        <p>
                                                            <small><?= $row['email']; ?><br><?= $row['telepon']; ?></small>
                                                        </p>
                                                    </td>
                                                    <td class="text-center"><?= $row['username']; ?></td>
                                                    <td class="text-center"><?= $row['level']; ?></td>
                                                    <td class="text-center">
                                                        <button class="btn btn-sm btn-warning" title="Edit <?= $row['username']; ?>" onclick="editUser('<?= $row['id']; ?>')"><i class="fas fa-edit fa-fw"></i></button>
                                                        <a href="<?= base_url('admin/changeUserActive/' . $row['id']); ?>" class="btn btn-sm btn-<?= $row['colorIconStatus']; ?>" title="<?= $row['iconTitle']; ?>" id="toggleActive"><?= $row['iconStatus']; ?></a>
                                                    </td>
                                                </tr>
                                                <?php $nomor++; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->