<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- favicon -->
  <link rel="shortcut icon" href="<?= base_url('dist/images/favicon.png'); ?>" type="image/x-icon">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url('plugins/bootstrap/css/bootstrap.min.css'); ?>">
  <!-- fontawesome -->
  <link rel="stylesheet" href="<?= base_url('plugins/fontawesome/css/all.min.css'); ?>">
  <!-- Custom CSS -->
  <style>
    #medsos-icon,
    #date-header {
      /* color: white; */
      padding: 0.5rem 0 0.5rem 0;
    }

    @media (max-width: 768px) {
      #tanggal {
        display: none;
      }
    }
  </style>
  <title>open-WebSchool</title>
</head>

<body>
  <section id="top-header" class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="d-flex justify-content-between">
            <div id="medsos-icon">
              <i class="fab fa-facebook fa-fw"></i>
              <i class="fab fa-instagram fa-fw"></i>
              <i class="fab fa-youtube fa-fw"></i>
            </div>
            <div id="date-header">
              <!-- <span id="tanggal">Selasa, 31 Januari 2020 |</span> -->
              <span id="jam">31/12/2022 10:41:29</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <nav class="navbar sticky-top shadow navbar-expand-lg navbar-dark bg-primary">
    <div class="container py-2 px-0">
      <a class="navbar-brand font-weight-bold" href="#">Sekolah Kita</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        </form>
      </div>
    </div>
  </nav>

  <div class="container border-top">
    <footer class="pt-5">
      <div class="d-flex justify-content-between pt-4 my-2 border-top">
        <p class="text-muted">&copy; 2022-<?= date('Y', time()); ?> <a href="<?= base_url(); ?>" class="text-muted text-decoration-none">Sekolah Anda</a>.</p>
        <a href="https://medigital.dev/webschool/" target="_blank" class="text-muted text-decoration-none">WebSchool v1.1.0</a>
      </div>
    </footer>
  </div>

  <!-- jquery -->
  <script src="<?= base_url('plugins/jquery/jquery.min.js'); ?>"></script>
  <!-- Bootstrap Bundle with Popper -->
  <script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>