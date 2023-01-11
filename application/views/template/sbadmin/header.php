<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>
    <link rel="shortcut icon" href="<?= $_SESSION['sekolah']['logo']; ?>" type="image/x-icon">
    <!-- Custom fonts for this template-->
    <link href="<?= base_url('plugins/fontawesome/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- select2 -->
    <link href="<?= base_url('plugins/select2/css/select2.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('plugins/select2/css/select2-bootstrap4.min.css'); ?>" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('plugins/sbadmin/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url('plugins/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">

    <!-- Summernote -->
    <link href="<?= base_url('plugins/summernote/summernote-bs4.css'); ?>" rel="stylesheet">

    <!-- my-style -->
    <link href="<?= base_url('dist/css/style.css'); ?>" rel="stylesheet">

    <!-- sweetalert2 -->
    <link rel="stylesheet" href="<?= base_url('plugins/sweetalert2/sweetalert2.min.css'); ?>">

    <!-- ekko-lightbox -->
    <!-- <link rel="stylesheet" href="<?= base_url('plugins/ekko-lightbox/ekko-lightbox.css'); ?>"> -->

</head>

<body id="page-top">
    <div id="flash-data" data-flashdata="<?= $sidebar; ?>"></div>
    <div id="data-level" data-flashdata="<?= $_SESSION['user']['level']; ?>"></div>
    <div id="flash-message" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <!-- Page Wrapper -->
    <div id="wrapper">