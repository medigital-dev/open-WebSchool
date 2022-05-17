<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- favicon -->
  <link rel="shortcut icon" href="<?= base_url('assets/global/images/favicon.png'); ?>" type="image/x-icon">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>">
  <!-- fontawesome -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome/css/all.min.css'); ?>">
  <!-- Custom CSS -->
  <style>
    section {
      padding-top: 3rem;
    }

    .feature_icon {
      width: 150px;
      height: 150px;
    }

    .navbar {
      min-height: 5rem;
    }

    .icon_link {
      text-decoration: none;
    }

    @media (max-width: 320px) {
      .icon {
        font-size: .3rem;
      }
    }

    @media (max-width: 700px) {
      .icon {
        font-size: .55rem;
      }
    }
  </style>
  <title>#SMP-Demo</title>
</head>

<body>
  <!-- <section id="navbar"> -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
    <div class="container px-4">
      <a class="navbar-brand" href="#">#SMP-Demo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Tentang</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
              Informasi
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Berita</a></li>
              <li class="dropend">
                <a class="dropdown-item dropdown-toggle" id="navbarDropdown2" href="#" data-bs-toggle="dropdown">Pengumuman</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                  <li><a class="dropdown-item" href="#">Berita</a></li>
                </ul>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Unduhan</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#!">Layanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#!">Kontak</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="text" placeholder="Cari postingan" aria-label="Search">
        </form>
      </div>
    </div>
  </nav>
  <!-- </section> -->
  <section id="heroes">
    <div class="container col-xxl-12 py-3 px-5">
      <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-lg-6">
          <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="<?= base_url('assets/global/images/banner_heroes_1.png'); ?>" class="d-block img-thumbnail img-fluid" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <div class="position-absolute bottom-0 start-50 translate-middle-x fw-bold"><small>1/3</small></div>
                </div>
              </div>
              <div class="carousel-item">
                <img src="<?= base_url('assets/global/images/banner_heroes_2.png'); ?>" class="d-block img-thumbnail img-fluid" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <div class="position-absolute bottom-0 start-50 translate-middle-x fw-bold"><small>2/3</small></div>
                </div>
              </div>
              <div class="carousel-item">
                <img src="<?= base_url('assets/global/images/banner_heroes_3.png'); ?>" class="d-block img-thumbnail img-fluid" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <div class="position-absolute bottom-0 start-50 translate-middle-x fw-bold"><small>3/3</small></div>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <div class="col-lg-6">
          <h1 class="display-5 fw-bold mb-4 lh-1 mb-3">Selamat Datang di SMP Demo</h1>
          <p class="lead fs-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, itaque aspernatur molestiae sapiente esse eos labore. Dignissimos similique numquam aliquid reiciendis, dolorem corporis laudantium ipsum. Laudantium enim architecto recusandae obcaecati?</p>
          <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <a href="#!" class="btn btn-primary btn-lg px-4">Link</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="feature">
    <div class="container px-4">
      <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        <div class="col">
          <div class="d-flex justify-content-center mb-3">
            <img src="<?= base_url('assets/global/images/features_icon_1.png'); ?>" class="feature_icon">
          </div>
          <h2>Title</h2>
          <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
          <a href="#" class="icon_link">
            Link
          </a>
        </div>
        <div class="col">
          <div class="d-flex justify-content-center mb-3">
            <img src="<?= base_url('assets/global/images/features_icon_2.png'); ?>" class="feature_icon">
          </div>
          <h2>Title</h2>
          <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
          <a href="#" class="icon_link">
            Link
          </a>
        </div>
        <div class="col">
          <div class="d-flex justify-content-center mb-3">
            <img src="<?= base_url('assets/global/images/features_icon_3.png'); ?>" class="feature_icon">
          </div>
          <h2>Title</h2>
          <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
          <a href="#" class="icon_link">
            Link
          </a>
        </div>
      </div>
    </div>
  </section>

  <section id="about">
    <div class="px-4 bg-dark text-white rounded-3">
      <div class="container py-5">
        <h1 class="display-5 fw-bold mb-4">Sekilas tentang kami</h1>
        <p class="col-md-12 fs-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda temporibus totam debitis libero optio saepe nam dolorum repellendus nisi nobis sunt impedit officiis aspernatur architecto sit itaque aliquid corporis, ea labore vero asperiores dolore. Nam at dolor placeat reiciendis numquam ab ratione doloremque facilis culpa id. Iure, consectetur? Eligendi, tenetur.</p>
        <a href="#!" class="btn btn-primary btn-lg">Link</a>
      </div>
    </div>
  </section>

  <section id="kepala-sekolah">
    <div class="px-4 bg-light rounded-3">
      <div class="container py-5">
        <h1 class="display-5 fw-bold mb-4">Sambutan Kepala Sekolah</h1>
        <div class="row">
          <div class="col-md-8">
            <p class="fs-4 mb-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores cumque aliquam, dolorum eaque illo repellendus veniam eligendi cum fugiat tenetur porro temporibus ab inventore aspernatur consectetur ex ratione quos exercitationem repudiandae eveniet delectus laboriosam eum. Pariatur, adipisci? Atque, voluptatum voluptate iste nostrum, corporis aut numquam aliquam repudiandae maiores, dolor nemo delectus velit. Maiores necessitatibus et totam dicta nostrum illo nihil quia dolorem sint harum velit modi, ducimus expedita architecto provident unde beatae culpa error sequi sapiente iure corrupti dignissimos debitis? Tenetur consectetur ratione quos deleniti nobis reprehenderit labore voluptatum exercitationem, eius molestiae iusto aspernatur sapiente culpa suscipit laudantium iste quasi.</p>
            <a href="#!" class="btn btn-primary btn-lg mb-3">Link</a>
          </div>
          <div class="col-md-4 mb-3">
            <img src="<?= base_url('assets/global/images/kepala_sekolah.png'); ?>" class="img-fluid rounded-circle img-thumbnail">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="recent-blog">
    <div class="px-4">
      <div class="container py-5">
        <h1 class="display-5 fw-bold mb-5">Postingan terakhir</h1>
        <div class="row">
          <div class="col-md-8">
            <div class="container">
              <div class="card shadow mb-3" id="featured_post">
                <img src="<?= base_url('assets/global/images/image_sample_post_1.png'); ?>" class="featured-blog" alt="...">
                <div class="card-body">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="card-title">Judul postingan</h5>
                    <h6>Berita</h6>
                  </div>
                  <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima numquam ab distinctio quos vero ullam. Ipsum, voluptatum. Dicta aperiam esse molestiae repellendus, corporis ea, explicabo facilis omnis accusantium consequatur voluptatem?</p>
                  <div class="d-flex justify-content-between">
                    <small class="text-primary"><i class="fa-solid fa-calendar-days fa-fw me-2"></i>21/05/2022</small>
                    <small class="text-success"><i class="fa-solid fa-user-pen fa-fw me-2"></i>mesaidlg</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="list-group shadow">
              <a href="#!" class="list-group-item list-group-item-action">
                <img src="<?= base_url('assets/global/images/image_sample_post_2.png'); ?>" class="featured-blog d-none" alt="...">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Judul Postingan 1</h5>
                  <small><i class="fa-solid fa-calendar-days fa-fw me-2"></i>21/05/2022</small>
                </div>
                <p class="mb-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore corporis quod earum assumenda repellendus distinctio magnam perferendis cupiditate error fugiat.</p>
                <small class="text-muted"><i class="fa-solid fa-user-pen fa-fw me-2"></i>mesaidlg</small>
              </a>
              <a href="#!" class="list-group-item list-group-item-action">
                <img src="<?= base_url('assets/global/images/image_sample_post_3.png'); ?>" class="featured-blog d-none" alt="...">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Judul Postingan 2</h5>
                  <small class="text-muted"><i class="fa-solid fa-calendar-days fa-fw me-2"></i>21/05/2022</small>
                </div>
                <p class="mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi voluptas et fuga? Eius, magnam commodi! Illum repellat officia enim exercitationem corrupti.</p>
                <small class="text-muted"><i class="fa-solid fa-user-pen fa-fw me-2"></i>mesaidlg</small>
              </a>
              <a href="#!" class="list-group-item list-group-item-action">
                <img src="<?= base_url('assets/global/images/image_sample_post_4.png'); ?>" class="featured-blog d-none" alt="...">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Judul Postingan 3</h5>
                  <small class="text-muted"><i class="fa-solid fa-calendar-days fa-fw me-2"></i>21/05/2022</small>
                </div>
                <p class="mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, provident aperiam! Ducimus tempore est qui autem? Cum maiores explicabo mollitia eum odio?</p>
                <small class="text-muted"><i class="fa-solid fa-user-pen fa-fw me-2"></i>mesaidlg</small>
              </a>
              <a href="#!" class="list-group-item list-group-item-action">
                <img src="<?= base_url('assets/global/images/image_sample_post_5.png'); ?>" class="featured-blog d-none" alt="...">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Judul Postingan 4</h5>
                  <small class="text-muted"><i class="fa-solid fa-calendar-days fa-fw me-2"></i>21/05/2022</small>
                </div>
                <p class="mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa commodi laborum provident eaque, numquam molestias, ad quas doloribus adipisci corrupti molestiae error! Itaque!</p>
                <small class="text-muted"><i class="fa-solid fa-user-pen fa-fw me-2"></i>mesaidlg</small>
              </a>
              <a href="#" class="list-group-item list-group-item-action text-center bg-primary text-white">Selengkapnya</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="contact">
    <div class="px-4">
      <div class="container py-5">
        <h1 class="display-5 fw-bold mb-4 text-center">Hubungi kami</h1>
        <div class="row">
          <div class="col mb-4">
            <a href="https://wa.me/62087839301572" target="_blank" class="text-success text-center text-decoration-none d-flex flex-column">
              <span class="icon">
                <i class="fa-brands fa-whatsapp fa-fw fa-6x"></i>
              </span>
              <span class="fw-bold">087839301572</span>
            </a>
          </div>
          <div class="col mb-4">
            <a href="https://t.me/mesaidlg" target="_blank" class="text-info text-center text-decoration-none d-flex flex-column">
              <span class="icon">
                <i class="fa-brands fa-telegram fa-fw fa-6x"></i>
              </span>
              <span class="fw-bold">@mesaidlg</span>
            </a>
          </div>
          <div class="col mb-4">
            <a href="https://facebook.com/mesaidlg" target="_blank" class="text-primary text-center text-decoration-none d-flex flex-column">
              <span class="icon">
                <i class="fa-brands fa-facebook-messenger fa-fw fa-6x"></i>
              </span>
              <span class="fw-bold">@mesaidlg</span>
            </a>
          </div>
          <div class="col mb-4">
            <a href="mailto:hi@example.com" target="_blank" class="text-warning text-center text-decoration-none d-flex flex-column">
              <span class="icon">
                <i class="fa-solid fa-envelope fa-fw fa-6x"></i>
              </span>
              <span class="fw-bold">hi@example.com</span>
            </a>
          </div>
          <div class="col mb-4">
            <a href="tel:+62274000000" target="_blank" class="text-secondary text-center text-decoration-none d-flex flex-column">
              <span class="icon">
                <i class="fa-solid fa-square-phone fa-fw fa-6x"></i>
              </span>
              <span class="fw-bold">(0274) 000000</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="container border-top">
    <footer class="pt-5">
      <div class="row">
        <div class="col-md-2 mb-4">
          <h5>SMP Demo</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Privacy Policies</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Akademik</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Kesiswaan</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Sarana Prasarana</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Humas</a></li>
          </ul>
        </div>
        <div class="col-md-2 mb-4">
          <h5>Kategori Populer</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Berita</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Galeri</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pengumuman</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Tutorial</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Surat Edaran</a></li>
          </ul>
        </div>

        <div class="col-md-2 mb-4">
          <h5>Tags Populer</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">#JadwalPelajaran</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">#KuotaGratis</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">#Lomba</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">#tryoutASPD</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">#hutSMPDemo</a></li>
          </ul>
        </div>

        <div class="col-md-2 mb-4">
          <h5>Tautan</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Kemdikbud</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Dapodikdasmen</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Info GTK</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Sekolah Kita</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Dinas Pendidikan</a></li>
          </ul>
        </div>

        <div class="col-md-4">
          <img src="<?= base_url('assets/global/images/default_logo.png'); ?>" alt="Logo SMP Demo" width="100" class="img-thumbnail mb-2">
          <h5>SMP DEMO</h5>
          <p>Alamat lengkap, Nama Jalan, Nama Desa, Nama Kecamatan, Nama Kabupaten/Kota, Nama Provinsi, Kode Pos</p>
        </div>
      </div>

      <div class="d-flex justify-content-between pt-4 my-2 border-top">
        <p>© 2022 <a href="<?= base_url(); ?>" target="_blank" class="text-dark text-decoration-none">SMP Demo</a>. Create and Development by <a href="https://me-digital.net" target="_blank" class="text-dark text-decoration-none" title="me-digital.net"><img src="<?= base_url('assets/global/images/favicon.png'); ?>" height="25" alt="Logo me-digital.net"></a></p>
        <ul class="list-unstyled d-flex">
          <li class="ms-3">
            <a class="link-dark" href="#">
              <i class="fa-brands fa-facebook fa-fw fa-xl"></i>
            </a>
          </li>
          <li>
            <a class="link-dark" href="#">
              <i class="fa-brands fa-twitter fa-fw fa-xl"></i>
            </a>
          </li>
          <li>
            <a class="link-dark" href="#">
              <i class="fa-brands fa-instagram fa-fw fa-xl"></i>
            </a>
          </li>
          <li>
            <a class="link-dark" href="#">
              <i class="fa-brands fa-youtube fa-fw fa-xl"></i>
            </a>
          </li>
          <li>
            <a class="link-dark" href="#">
              <i class="fa-solid fa-location-dot fa-fw fa-xl"></i>
            </a>
          </li>
        </ul>
      </div>
    </footer>
  </div>

  <!-- Bootstrap Bundle with Popper -->
  <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <!-- jquery -->
  <script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>

  <script>
    $('.list-group-item').click(function(e) {
      e.preventDefault();
      $('#featured_post h5').text($(this).find('h5').text());
      $('#featured_post p').text($(this).find('p').text());
      $('#featured_post img').attr('src', $(this).find('img').attr('src'));
      document.location.href = '#recent-blog';
    });
  </script>
</body>

</html>