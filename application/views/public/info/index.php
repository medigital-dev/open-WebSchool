<div id="data-keyword" data-flashdata="<?= $this->session->flashdata('keyword'); ?>"></div>
<div class="col-lg-9" id="blogs">
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php if ($posts) : ?>
            <?php foreach ($posts as $row) : ?>
                <div class="col">
                    <div class="card mb-2 shadow">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <a href="<?= $row['link']; ?>"><img class="card-img-top w-100 pt-3 pb-3" src="<?= $row['sampul']; ?>" alt="..." style="height: 200px; object-fit: cover; object-position: center center;"></a>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="small text-muted w-100"><i class="fas fa-calendar-alt fa-fw"></i><?= $row['tanggal']; ?> - <i class="fas fa-user fa-fw"></i> <?= $row['author']; ?></div>
                                    <h2 class="card-title h4">
                                        <a href="<?= $row['link']; ?>" class="text-dark text-decoration-none">
                                            <?= $row['judul']; ?>
                                        </a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <h5 class="text-danger"><i>Mohon maaf, tidak ada informasi</i></h5>
        <?php endif; ?>
    </div>
    <?= $this->pagination->create_links(); ?>
</div>