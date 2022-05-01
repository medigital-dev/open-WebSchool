<div id="data-keyword" data-flashdata="<?= $this->session->flashdata('keyword'); ?>"></div>
<?php if ($post) : ?>
    <div class="col-lg-9" id="blogs">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php foreach ($post as $row) : ?>
                <div class="col">
                    <div class="card mb-4 shadow">
                        <a href="<?= $row['link']; ?>"><img class="card-img-top" src="<?= $row['sampul']; ?>" alt="..." style="width: 100%; height: 300px; object-fit: cover; object-position: center center;"></a>
                        <div class="card-body">
                            <div class="small text-muted"><?= $row['tanggal']; ?></div>
                            <h2 class="card-title h4">
                                <a href="<?= $row['link']; ?>" class="text-dark text-decoration-none">
                                    <?= $row['judul']; ?>
                                </a>
                            </h2>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?= $this->pagination->create_links(); ?>
    </div>
<?php else : ?>
    <div class="col-lg-9" id="blogs">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <h3>Maaf tidak ada postingan...</h3>
        </div>
    </div>
<?php endif; ?>