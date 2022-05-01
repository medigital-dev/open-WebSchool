<div id="data-keyword" data-flashdata="<?= $this->session->flashdata('keyword'); ?>"></div>
<!-- Page header with logo and tagline-->
<header class="py-5 bg-gradient-success bg-success border-bottom mb-4">
    <div class="container">
        <div class="text-center text-light mt-5">
            <h1 class="fw-bolder">Pencarian Informasi Sekolah</h1>
            <p class="lead mb-0">Pusat data Informasi dan Dokumentasi SMP Negeri 2 Wonosari</p>
        </div>
    </div>
</header>
<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-9" id="blogs">
            <!-- Nested row for non-featured blog posts-->
            <div class="row">
                <!-- 
                <?php $i = 1; ?>
                <?php foreach ($searchResult as $row) : ?>
                    <div class="col-lg-6">



                    </div>
                    <?php $i++; ?>
                <?php endforeach; ?> -->


                <?php
                $kolom = 2;
                $baris = 0;
                $id = 0;
                for ($i = 0; $i < ceil(count($searchResult) / $kolom); $i++) : ?>
                    <?php if ((count($searchResult) - ($baris * $kolom)) >= $kolom) {
                        $batas = 2;
                    } else {
                        $batas = 1;
                    } ?>
                    <div class="col-lg-6">

                        <?php for ($j = 0; $j < $batas; $j++) : ?>

                            <div class="card mb-4">
                                <a href="<?= $searchResult[$id]['link']; ?>"><img class="card-img-top" src="<?= $searchResult[$id]['sampul']; ?>" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted"><?= $searchResult[$id]['tanggal']; ?></div>
                                    <h2 class="card-title h4"><?= $searchResult[$id]['judul']; ?></h2>
                                    <a class="btn btn-primary" href="<?= $searchResult[$id]['link']; ?>">Detail →</a>
                                </div>
                            </div>

                        <?php $id++;
                        endfor; ?>

                    </div>
                    <?php $baris++; ?>
                <?php endfor; ?>

            </div>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-3">
            <!-- Search widget-->
            <div class="card mb-4">
                <div class="card-header">Search</div>
                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Cari informasi" id="cari" aria-label="Cari informasi" aria-describedby="button-search" />
                        <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                    </div>
                </div>
            </div>
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">Web Design</a></li>
                                <li><a href="#!">HTML</a></li>
                                <li><a href="#!">Freebies</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">JavaScript</a></li>
                                <li><a href="#!">CSS</a></li>
                                <li><a href="#!">Tutorials</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side widget-->
            <div class="card mb-4">
                <div class="card-header">Side Widget</div>
                <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
            </div>
        </div>
    </div>
</div>