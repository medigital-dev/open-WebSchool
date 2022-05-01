<div class="col-lg-9">
    <!-- Post content-->
    <article>
        <!-- Post header-->
        <header class="mb-2">
            <!-- Post title-->
            <h1 class="fw-bolder mb-1"><?= $post['judul']; ?></h1>
            <!-- Post meta content-->
            <div class="text-muted fst-italic mb-2"><i class="fas fa-calendar-alt fa-fw"></i> <?= $post['tanggal']; ?> - <i class="fas fa-user fa-fw"></i> <?= $post['author']; ?> - <i class="fas fa-eye fa-fw"></i> <?= $post['dibaca']; ?>x</div>
            <!-- Post categories-->
            <a class="text-decoration-none link-success" href="<?= $post['linkKategori']; ?>">Kategori: <?= $post['kategori']; ?></a>
        </header>
        <!-- Preview image figure-->
        <figure class="mb-2"><img class="img-fluid rounded" src="<?= $post['sampul']; ?>" style="height: 500px; width: 100%; object-fit: cover; object-position: center center" alt="..." /></figure>
        <!-- Post content-->
        <section class="mb-2">
            <p class="fs-3"><?= $post['isi']; ?></p>
            <p class="mt-5">
                Tag:
                <?php foreach ($post['tags'] as $row) : ?>
                    <a class="badge bg-secondary text-decoration-none link-light" href="<?= $row['link']; ?>"><?= $row['nama_tag']; ?></a>
                <?php endforeach; ?>
            </p>
        </section>
    </article>
    <hr class="my-0">
    <!-- Comments section-->
    <section class="mb-5">
        <div class="card bg-light">
            <div class="card-body">
                <!-- Comment form-->
                <form action="<?= base_url(); ?>addKomentarPublik" method="POST" autocomplete="off" id="form" class="needs-validation" novalidate>
                    <input type="hidden" name="idBlog" id="idBlog" value="<?= $post['id']; ?>">
                    <input type="hidden" name="link" id="link" value="<?= $post['url']; ?>">

                    <div class="row g-3 mb-2">
                        <div id="idKomentar"></div>
                        <div class="col-sm-5" id="divInputName">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatingInputNama" name="nama" placeholder="Nama anda">
                                <label for="floatingInputNama">Nama <span class="form-text"><small>*) Opsional</small></span></label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-floating mb-2">
                                <input type="email" class="form-control" id="floatingInputEmail" name="email" placeholder="Email: nama@example.com">
                                <label for="floatingInputEmail">Email address <span class="form-text"><small>*) Opsional</small></span></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatingInputWA" name="wa" placeholder="Nomor Whatsapp anda">
                                <label for="floatingInputWA">Nomor WA <span class="form-text"><small>*) Opsional</small></span></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="komentar" name="komentar" style="height: 100px;"></textarea>
                        <label for="komentar">Komentar <span class="form-text"><small>*) Wajib</small></span></label>
                        <div class="invalid-feedback">
                            Komentar belum diisi!
                        </div>
                        <div class="form-text">
                            <small>*) Informasi yang anda kirimkan kami jamin keamanannya.</small>
                        </div>
                    </div>
                    <button type="submit" id="kirim" class="btn btn-primary mb-5">Kirim</button>
                </form>
                <!-- Comment with nested comments-->
                <div id="pesan">
                    <?= $this->session->userdata('message'); ?>
                </div>
                <div id="blokKomentar">

                    <?php for ($i = 0; $i < count($komentar); $i++) : ?>
                        <div class="d-flex mb-4" id="blokKomentar">
                            <div class="flex-shrink-0 pt-3"><?= $komentar[$i]['icon']; ?></div>
                            <div class="ms-3">
                                <div class="fw-bold"><?= $komentar[$i]['nama']; ?></div>
                                <div class="row">
                                    <div class="col mb-1">
                                        <p>
                                            <?= $komentar[$i]['pesan']; ?>
                                        </p>
                                        <small><?= date_create_from_format('Y-m-d H:i:s', $komentar[$i]['date_comment'])->format('d/m/Y H:i:s') ?></small>
                                    </div>
                                </div>
                                <a role="button" class="text-decoration-none text-primary" onclick="balasKomentar(<?= $komentar[$i]['id_komentar']; ?>)">Balas</a>
                                <?php foreach ($komenBalasan as $row) : ?>
                                    <?php if ($row['parent_comment'] == $komentar[$i]['id_komentar']) : ?>
                                        <div class="d-flex mt-4">
                                            <div class="flex-shrink-0 pt-3"><?= $row['icon']; ?></div>
                                            <div class="ms-3">
                                                <div class="fw-bold"><?= $row['nama']; ?></div>
                                                <div class="row">
                                                    <div class="col mb-1">
                                                        <p>
                                                            <?= $row['pesan']; ?>
                                                        </p>
                                                        <small><?= date_create_from_format('Y-m-d H:i:s', $row['date_comment'])->format('d/m/Y H:i:s') ?></small>
                                                    </div>
                                                </div>
                                                <a role="button" class="text-decoration-none text-primary" onclick="balasKomentar(<?= $komentar[$i]['id_komentar']; ?>)">Balas</a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </section>
</div>