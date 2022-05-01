<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Postingan di Pin</h1>
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
            <li class="breadcrumb-item active" aria-current="page"><a class="text-decoration-none text-secondary" href="<?= base_url('admin/post/pin'); ?>">Pin Post</a></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <?= $this->session->flashdata('post'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-9 mx-auto">
            <div class="card shadow mb-4">
                <a href="#collapseTag" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseTag">
                    <h6 class="m-0 font-weight-bold text-primary">Data Postingan yang di pin</h6>
                </a>
                <div class="collapse show" id="collapseTag">
                    <div class="card-body">
                        <form action="<?= base_url(); ?>admin/updatePinPost" method="POST">
                            <input type="hidden" name="oldId" value="<?= $idPinPost; ?>">
                            <div class="input-group">
                                <select class="custom-select" name="newID" aria-label="Example select with button addon">
                                    <option>Pilih judul postingan</option>
                                    <?php foreach ($posts as $row) : ?>
                                        <option value="<?= $row['id']; ?>" <?php if ($row['id'] == $idPinPost) {
                                                                                echo 'selected';
                                                                            } ?>><?= $row['judul']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit" id="simpan" name="simpan"><?php if (!$idPinPost) {
                                                                                                                echo 'Simpan';
                                                                                                            } else {
                                                                                                                echo 'Ganti';
                                                                                                            } ?></button>
                                    <button class="btn btn-danger" type="submit" id="reset" name="reset">Reset</button>
                                    <a href="<?= $linkPinnedPost; ?>" class="btn btn-primary" target="blank">Lihat</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->