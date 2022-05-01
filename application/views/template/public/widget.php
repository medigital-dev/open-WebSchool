<!-- Side widgets-->
<div class="col-lg-3">
    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Postingan terakhir</div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <?php foreach ($widgetPostinganTerakhir as $row) : ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="<?= $row['link']; ?>" class="text-decoration-none text-dark"><?= $row['judul'] . ' ' . $row['status']; ?></a>
                        <small class="text-muted"><?= $row['terbit']; ?></small>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">Arsip</div>
        <div class="card-body">
            <div class="list-group list-group-flush">
                <?php foreach ($widgetArchive as $row) : ?>
                    <a href="<?= $row['link'] ?>" class="list-group-item list-group-item-action">
                        <?= $row['tahunBulan']; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">Kategori</div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <?php foreach ($widgetKategori as $row) : ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="<?= $row['link']; ?>" class="text-decoration-none">
                            <?= $row['judul']; ?>
                        </a>
                        <span class="badge bg-primary rounded-pill"><?= $row['jumlah']; ?></span>
                    </li>
                <?php endforeach; ?>

            </ul>
        </div>
    </div>
    <!-- Side widget-->
    <div class="card mb-4">
        <div class="card-header">Tags</div>
        <div class="card-body">
            <?php foreach ($widgetTag as $row) : ?>
                <a class="badge rounded-pill bg-secondary text-decoration-none" href="<?= $row['link']; ?>"><?= $row['judul']; ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>
</div>