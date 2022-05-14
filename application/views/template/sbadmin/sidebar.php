<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>admin">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user-cog fa-fw"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Page</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item <?php if ($sidebar == 'dashboard') {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="<?= base_url(); ?>admin">
            <i class="fas fa-fw fa-tachometer-alt fa-fw"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>" target="_blank">
            <i class="fas fa-external-link-alt fa-fw"></i>
            <span>Preview</span></a>
    </li>

    <hr class="sidebar-divider my-0">

    <li class="nav-item <?php if ($sidebar == 'post') {
                            echo 'active';
                        } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePost" aria-expanded="true" aria-controls="collapsePost">
            <i class="fas fa-vote-yea fa-fw"></i>
            <span>Postingan</span>
        </a>
        <div id="collapsePost" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url(); ?>admin/post">Daftar</a>
                <a class="collapse-item" href="<?= base_url(); ?>admin/post/pin">Pin</a>
                <a class="collapse-item" href="<?= base_url(); ?>admin/post/add">Tambah</a>
                <a class="collapse-item" href="<?= base_url(); ?>admin/post/kategori">Kategori</a>
                <a class="collapse-item" href="<?= base_url(); ?>admin/post/tag">Tag</a>
            </div>
        </div>
    </li>

    <li class="nav-item <?php if ($sidebar == 'page') {
                            echo 'active';
                        } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true" aria-controls="collapsePage">
            <i class="fas fa-file-alt fa-fw"></i>
            <span>Halaman</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url(); ?>admin/page">Daftar</a>
                <a class="collapse-item" href="<?= base_url(); ?>admin/page/add">Tambah</a>
            </div>
        </div>
    </li>

    <li class="nav-item <?php if ($sidebar == 'komentar') {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="<?= base_url(); ?>admin/komentar">
            <i class="fas fa-comment fa-fw"></i>
            <span>Komentar</span>
        </a>
    </li>

    <li class="nav-item <?php if ($sidebar == 'media') {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="<?= base_url('admin/media'); ?>">
            <i class="fas fa-photo-video fa-fw"></i>
            <span>Media</span>
        </a>
    </li>

    <li class="nav-item <?php if ($sidebar == 'pesan') {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="<?= base_url(); ?>admin/pesan">
            <i class="fas fa-inbox fa-fw"></i>
            <span>Pesan</span>
        </a>
    </li>

    <hr class="sidebar-divider my-0">

    <li class="nav-item <?php if ($sidebar == 'user') {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="<?= base_url('admin/user'); ?>">
            <i class="fas fa-user fa-fw"></i>
            <span>Pengguna</span>
        </a>
    </li>
    <li class="nav-item <?php if ($sidebar == 'menu' || $sidebar == 'identitas' || $sidebar == 'system') {
                            echo 'active';
                        } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContent" aria-expanded="true" aria-controls="collapseContent">
            <i class="fas fa-cogs fa-fw"></i>
            <span>Pengaturan</span>
        </a>
        <div id="collapseContent" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <a class="collapse-item" href="<?= base_url(); ?>admin/webContent">Web Content</a> -->
                <a class="collapse-item" href="<?= base_url(); ?>admin/identitas">Identitas</a>
                <a class="collapse-item" href="<?= base_url(); ?>admin/homepage">Homepage</a>
                <a class="collapse-item" href="<?= base_url(); ?>admin/menu">Menu</a>
                <a class="collapse-item" href="<?= base_url(); ?>admin/system">Sistem</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>logout">
            <i class="fas fa-sign-out-alt fa-fw"></i>
            <span>Logout</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->