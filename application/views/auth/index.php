<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/sbadmin/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/sbadmin/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <!-- ICON -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/global/images/logo_bg.png" type="image/x-icon">
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="<?= base_url('assets/sweetalert2/'); ?>sweetalert2.min.css">

</head>

<body class="bg-gradient-warning">
    <div id="flash-message" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="<?= base_url(); ?>assets/global/images/logo_bg.png" alt="Logo" width="60%">
                                        <h1 class="h4 text-gray-900 mb-4">Admin Login</h1>
                                    </div>
                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="usernameHelp" placeholder="Username" value="<?= set_value('username'); ?>" autofocus>
                                            <?= form_error('username', '<small class="text-danger p-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password">
                                            <?= form_error('password', '<small class="text-danger p-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <?= $this->session->flashdata('auth'); ?>
                                        <button type="submit" name="CLogin" href="index.html" class="btn btn-warning btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small text-decoration-none" href="<?= base_url(); ?>">Back to Website</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/sbadmin/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/sbadmin/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/sbadmin/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/sbadmin/'); ?>js/sb-admin-2.min.js"></script>

    <!-- Sweetalert2 -->
    <script src="<?= base_url('assets/sweetalert2/'); ?>sweetalert2.min.js"></script>
    <script src="<?= base_url('assets/global/js/my-sweetalert.js'); ?>"></script>
    <script>
        const message = $('#flash-message').data('flashdata');
        if (message) {
            var fireMessage = message.split('|');
            fireNotif(fireMessage[0], fireMessage[1]);
        }
    </script>

</body>

</html>