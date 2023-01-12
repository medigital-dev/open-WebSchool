<div class="container">
    <?php foreach ($homeContent as $homeContent) : ?>
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <?= $homeContent['content']; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>