<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- fontawesome -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome/all.min.css'); ?>">
  <!-- Custom CSS -->
  <style>
    section {
      padding-top: 3rem;
    }

    .feature_icon {
      width: 150px;
      height: 150px;
    }

    .cor .navbar {
      min-height: 5rem;
    }

    .icon_link {
      text-decoration: none;
    }
  </style>
  <title>#SMP-Demo</title>
</head>

<body>
  <!-- <section id="navbar"> -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
    <div class="container">
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
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
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
    <div class="container col-xxl-8 px-4 py-3">
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
          <h1 class="display-5 fw-bold lh-1 mb-3">Selamat Datang di SMP Demo</h1>
          <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, itaque aspernatur molestiae sapiente esse eos labore. Dignissimos similique numquam aliquid reiciendis, dolorem corporis laudantium ipsum. Laudantium enim architecto recusandae obcaecati?</p>
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

  </section>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>