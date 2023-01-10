<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">
    <title>WebSchool - Administrator</title>
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- ICON -->
    <link rel="shortcut icon" href="<?= base_url('dist/images/medigitaldev-green.png'); ?>" type="image/x-icon">
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="<?= base_url('plugins/sweetalert2/sweetalert2.min.css'); ?>">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 320px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body class="text-center">
    <div id="flash-message" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <form class="form-signin" action="" method="post">
        <img src="<?= base_url('dist/images/medigitaldev-green.png'); ?>" alt="Logo" width="75" height="75" class="mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Administrator</h1>
        <div class="form-group mb-3">
            <label for="username" class="sr-only">Username</label>
            <input type="text" id="username" name="username" class="form-control <?= form_error('username') ? 'is-invalid' : ''; ?>" placeholder="Username" autofocus value="<?= set_value('username'); ?>">
            <?= form_error('username', '<small class="text-danger p-3">', '</small>'); ?>
        </div>
        <div class="form-group mb-3">
            <label for="password" class="sr-only">Password</label>
            <input type="password" id="password" name="password" class="form-control <?= form_error('password') ? 'is-invalid' : ''; ?>" placeholder="Password">
            <?= form_error('password', '<small class="text-danger p-3">', '</small>'); ?>
        </div>
        <?= $this->session->flashdata('auth'); ?>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
        <p class="mt-3 mb-3 text-muted">&copy; 2022-<?= date('Y', time()); ?> | <a href="https://medigital.dev/webschool/" target="_blank" class="text-muted text-decoration-none">WebSchool</a></p>
    </form>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('plugins/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- Sweetalert2 -->
    <script src="<?= base_url('plugins/sweetalert2/sweetalert2.min.js'); ?>"></script>
    <script src="<?= base_url('dist/js/my-sweetalert.js'); ?>"></script>
    <!-- script functions -->
    <script src="<?= base_url('dist/js/functions.js'); ?>"></script>

    <script>
        const message = $('#flash-message').data('flashdata');
        if (message) {
            var fireMessage = message.split('|');
            fireNotif(fireMessage[0], fireMessage[1]);
        }
    </script>
</body>

</html>