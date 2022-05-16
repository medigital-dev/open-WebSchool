<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Page_model');
        $this->load->model('Post_model');
        $this->load->model('Pesan_model');
        $this->load->model('User_model');
        $this->load->model('Comment_model');
        $this->load->model('Kategori_model');
        $this->load->model('Tag_model');
        $this->load->model('Menu_model');
        $this->load->model('Identitas_model');
    }

    public function index()
    {
        $data = [
            'title' => 'SMP Negeri 2 Wonosari - #EsperoJaya',
        ];

        $this->load->view('public/index', $data);
    }

    public function sendMessage()
    {
        $nomorWa = htmlspecialchars($this->input->post('nomorWA'));
        $nama = htmlspecialchars($this->input->post('nama'));
        $emailAddress = htmlspecialchars($this->input->post('emailAddress'));
        $message = htmlspecialchars($this->input->post('message'));

        $data = [
            'id_pesan' => null,
            'nama_pengirim' => $nama,
            'wa_pesan' => $nomorWa,
            'email_pesan' => $emailAddress,
            'pesan' => $message
        ];

        if ($this->Pesan_model->setMessage($data)) {
            $this->session->set_flashdata(
                'message',
                '<div class="d-block" id="submitSuccessMessage">
                <div class="text-center text-success mb-3">
                <div class="fw-bolder">
                Sukses! Pesan anda terkirim
                </div>
                </div>
                </div>'
            );
            redirect(base_url() . '#contact');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="d-block" id="submitErrorMessage">
                <div class="text-center text-danger mb-3">Error sending message!</div>
                </div>'
            );
            redirect(base_url() . '#contact');
        }
    }

    public function page($url)
    {
        $dataPage = $this->Page_model->getByUrl($url);
        $unreadKomentar = $this->Comment_model->getUnread();
        $unreadMessage = $this->Pesan_model->getUnread();
        $allMenu = $this->Menu_model->getAll();
        $mainMenu = $this->Menu_model->getMainMenu();

        $data = [
            'title' => $dataPage['title'] . ' - #EsperoJaya',
            'header' => $dataPage['title'],
            'deskripsi' => $dataPage['deskripsi'],
            'dataPage' => $dataPage,
            'menuUtama' => $mainMenu,
            'allMenu' => $allMenu,
            'page' => 'halaman',
            'komentarBaru' => $unreadKomentar,
            'pesanBaru' => $unreadMessage
        ];

        $this->load->view('template/public/header', $data);
        $this->load->view('public/page');
        $this->load->view('template/public/widget', $this->widget());
        $this->load->view('template/public/footer', $this->footer());
    }

    // public function blog()
    // {
    //     $posts = $this->Post_model->getAllPost();
    //     $pinnedPost = $this->Post_model->getPinned();
    //     $allMenu = $this->Menu_model->getAll();
    //     $mainMenu = $this->Menu_model->getMainMenu();

    //     if ($pinnedPost) {
    //         $dataTanggal = date_create_from_format('Y-m-d H:i:s', $pinnedPost['date']);
    //         $author = $this->User_model->getUserById($pinnedPost['id_user']);
    //         $komentar = $this->Comment_model->getCommentByIdPost($pinnedPost['id_blog']);
    //         $sampul = base_url() . 'assets/upload/images/sampul/' . $pinnedPost['foto_sampul'];

    //         $pinnedPost = [
    //             'sampulAddress' => $sampul,
    //             'hariTanggal' => $this->toInaDate($dataTanggal),
    //             'author' => $author['nama'],
    //             'komentar' => count($komentar),
    //             'viewer' => $pinnedPost['viewer'],
    //             'judul' => $pinnedPost['judul'],
    //             'link' => base_url() .  $pinnedPost['link']
    //         ];
    //     }

    //     $config['base_url'] = base_url() . 'blogs';
    //     $config['total_rows'] = count($posts);
    //     $config['per_page'] = 6;

    //     $config['full_tag_open'] = '<nav aria-label="Pagination"><hr class="my-0" /><ul class="pagination justify-content-center my-4">';
    //     $config['full_tag_close'] = '</ul></nav>';

    //     $config['first_link'] = 'Newer';
    //     $config['first_tag_open'] = '<li class="page-item">';
    //     $config['first_tag_close'] = '</li>';

    //     $config['last_link'] = 'Older';
    //     $config['last_tag_open'] = '<li class="page-item">';
    //     $config['last_tag_close'] = '</li>';

    //     $config['next_link'] = '&raquo';
    //     $config['next_tag_open'] = '<li class="page-item">';
    //     $config['next_tag_close'] = '</li>';

    //     $config['prev_link'] = '&laquo';
    //     $config['prev_tag_open'] = '<li class="page-item">';
    //     $config['prev_tag_close'] = '</li>';

    //     $config['cur_tag_open'] = '<li class="page-item active" aria-current="page"><a class="page-link" href="#!">';
    //     $config['cur_tag_close'] = '</a></li>';

    //     $config['num_tag_open'] = '<li class="page-item">';
    //     $config['num_tag_close'] = '</li>';

    //     $config['attributes'] = array('class' => 'page-link');

    //     $this->pagination->initialize($config);

    //     $postLimit = $this->Post_model->getPostWithLimit($config['per_page'], $this->uri->segment(3));

    //     $posts = [];

    //     for ($i = 0; $i <pre count($postLimit); $i++) {
    //         $date = date_create_from_format('Y-n-d H:i:s', $postLimit[$i]['date']);
    //         $date = $this->toInaDate($date);

    //         $data = [
    //             'sampul' => base_url() . 'assets/upload/images/sampul/' . $postLimit[$i]['foto_sampul'],
    //             'tanggal' => $date,
    //             'judul' => $postLimit[$i]['judul'],
    //             'link' => base_url() .  $postLimit[$i]['link']
    //         ];
    //         array_push($posts, $data);
    //     }

    //     $data = [
    //         'title' => 'Informasi - #EsperoJaya',
    //         'header' => 'Informasi Sekolah',
    //         'deskripsi' => 'Pusat Data Informasi dan Dokumentasi SMP Negeri 2 Wonosari',
    //         'pinnedPost' => $pinnedPost,
    //         'posts' => $posts,
    //         'menuUtama' => $mainMenu,
    //         'allMenu' => $allMenu,
    //         'page' => 'info'
    //     ];

    //     $this->load->view('template/public/header', $data);
    //     $this->load->view('public/informasi');
    //     $this->load->view('template/public/widget', $this->widget());
    //     $this->load->view('template/public/footer', $this->footer());
    //     $this->session->unset_userdata('message');
    // }

    public function public($url)
    {
        if ($this->Page_model->getByUrl($url)) {
            $this->page($url);
        } else if ($this->Post_model->getPostByLink($url)) {
            $this->post($url);
        } else if ($this->Kategori_model->getKategoriBySlug($url)) {
            $this->kategori($url);
        } else if ($this->Tag_model->getBySlug($url)) {
            $this->tag($url);
        } else if ($this->Post_model->getPostById($url)) {
            $result = $this->Post_model->getPostById($url);
            redirect(base_url($result['link']));
        } else {
            $this->error404();
        }
    }

    public function info($url)
    {
        redirect(base_url() . $url);
    }

    public function post($link)
    {
        $post = $this->Post_model->getPostByLink($link);
        $viewer = $post['viewer'];
        $author = $this->User_model->getById($post['id_user']);
        $dataKategori = $this->Kategori_model->getKategoriByName($post['kategori']);
        $tags = $this->Tag_model->getTagBlogByIdBlog($post['id_blog']);
        $allMenu = $this->Menu_model->getAll();
        $mainMenu = $this->Menu_model->getMainMenu();
        $dataTag = [];
        $unreadKomentar = $this->Comment_model->getUnread();
        $unreadMessage = $this->Pesan_model->getUnread();

        foreach ($tags as $row) {
            $tag = $this->Tag_model->getTagById($row['id_tag']);
            $data = [
                'link' => base_url($tag['slug_tag']),
                'nama_tag' => $tag['nama_tag']
            ];
            array_push($dataTag, $data);
        }

        $fileSampul = $post['foto_sampul'];
        $fileSampulLoc = str_replace(base_url(), './', $fileSampul);

        if (file_exists($fileSampulLoc)) {
            $sampul = $fileSampul;
        } else {
            $sampul = base_url('assets/global/images/post.jpg');
        }

        $komentar = $this->Comment_model->getByIdPostNIsParent($post['id_blog']);
        $komentarChild = $this->Comment_model->getByIdPostNIsChild($post['id_blog']);

        $dataPostingan = [
            'id' => $post['id_blog'],
            'url' => $post['link'],
            'judul' => $post['judul'],
            'tanggal' => $this->toInaDate(date_create($post['date'])),
            'author' => $author['username'],
            'kategori' => $post['kategori'],
            'linkKategori' => base_url() . 'info/kategori/' . $dataKategori['slug_kategori'],
            'tags' => $dataTag,
            'sampul' => $sampul,
            'isi' => $post['isi'],
            'dibaca' => $post['viewer']
        ];

        $data = [
            'title' => $post['kategori'] . ' - #EsperoJaya',
            'header' => 'Informasi Sekolah',
            'deskripsi' => 'Pusat Data Informasi dan Dokumentasi SMP Negeri 2 Wonosari',
            'post' => $dataPostingan,
            'komentar' => $komentar,
            'komenBalasan' => $komentarChild,
            'menuUtama' => $mainMenu,
            'allMenu' => $allMenu,
            'page' => 'detail',
            'komentarBaru' => $unreadKomentar,
            'pesanBaru' => $unreadMessage
        ];

        $this->form_validation->set_rules('komentar', 'required');
        $dataViewer = [
            'viewer' => $viewer + 1
        ];
        $this->Post_model->updatePost($post['id_blog'], $dataViewer);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/public/header', $data);
            $this->load->view('public/info/detail');
            $this->load->view('template/public/widget', $this->widget());
            $this->load->view('template/public/footer', $this->footer());
            $this->session->unset_userdata('message');
        }
    }

    public function kategori($data)
    {
        $allMenu = $this->Menu_model->getAll();
        $mainMenu = $this->Menu_model->getMainMenu();
        $dataPost = $this->Post_model->getPostByKategori($data);
        $unreadKomentar = $this->Comment_model->getUnread();
        $unreadMessage = $this->Pesan_model->getUnread();

        $posts = [];
        foreach ($dataPost as $row) {
            $tanggal = date_create_from_format('Y-m-d H:i:s', $row['date']);

            $fileSampul = $row['foto_sampul'];
            $fileSampulLoc = str_replace(base_url(), './', $fileSampul);
            if (file_exists($fileSampulLoc)) {
                $sampul = $fileSampul;
            } else {
                $sampul = base_url('assets/global/images/post.jpg');
            }

            $author = $this->User_model->getById($row['id_user']);
            $komentar = $this->Comment_model->getCommentByIdPost($row['id_blog']);

            $data = [
                'link' => base_url() .  $row['link'],
                'sampul' => $sampul,
                'author' => $author['username'],
                'komentar' => count($komentar),
                'dibaca' => $row['viewer'],
                'tanggal' => $this->toInaDate($tanggal),
                'judul' => $row['judul']
            ];
            array_push($posts, $data);
        }

        $data = [
            'title' => 'Informasi by Kategori - #EsperoJaya',
            'header' => 'Informasi Sekolah',
            'deskripsi' => 'Pusat Data Informasi dan Dokumentasi SMP Negeri 2 Wonosari',
            'posts' => $posts,
            'menuUtama' => $mainMenu,
            'allMenu' => $allMenu,
            'page' => 'kategori',
            'komentarBaru' => $unreadKomentar,
            'pesanBaru' => $unreadMessage
        ];

        $this->load->view('template/public/header', $data);
        $this->load->view('public/info/index');
        $this->load->view('template/public/widget', $this->widget());
        $this->load->view('template/public/footer', $this->footer());
        $this->session->unset_userdata('message');
    }

    public function tag($data)
    {
        $allMenu = $this->Menu_model->getAll();
        $mainMenu = $this->Menu_model->getMainMenu();
        $unreadKomentar = $this->Comment_model->getUnread();
        $unreadMessage = $this->Pesan_model->getUnread();
        $dataTag = $this->Tag_model->getBySlug($data);
        $posts = [];
        $dataPostingan = $this->Tag_model->getPostByIdTag($dataTag['id_tag']);

        if ($dataPostingan) {
            foreach ($dataPostingan as $row) {
                $postingan = $this->Post_model->getPostById($row['id_blog']);
                $tanggal = date_create_from_format('Y-m-d H:i:s', $postingan['date']);

                $fileSampul = $postingan['foto_sampul'];
                $fileSampulLoc = str_replace(base_url(), './', $fileSampul);
                if (file_exists($fileSampulLoc)) {
                    $sampul = $fileSampul;
                } else {
                    $sampul = base_url('assets/global/images/post.jpg');
                }

                $author = $this->User_model->getById($postingan['id_user']);
                $komentar = $this->Comment_model->getCommentByIdPost($postingan['id_blog']);

                $data = [
                    'link' => base_url() .  $postingan['link'],
                    'sampul' => $sampul,
                    'author' => $author['username'],
                    'komentar' => count($komentar),
                    'dibaca' => $postingan['viewer'],
                    'tanggal' => $this->toInaDate($tanggal),
                    'judul' => $postingan['judul']
                ];
                array_push($posts, $data);
            }
        }

        $data = [
            'title' => 'Informasi by Tag - #EsperoJaya',
            'header' => 'Informasi Sekolah',
            'deskripsi' => 'Pusat Data Informasi dan Dokumentasi SMP Negeri 2 Wonosari',
            'posts' => $posts,
            'menuUtama' => $mainMenu,
            'allMenu' => $allMenu,
            'page' => 'tag',
            'komentarBaru' => $unreadKomentar,
            'pesanBaru' => $unreadMessage
        ];

        $this->load->view('template/public/header', $data);
        $this->load->view('public/info/index');
        $this->load->view('template/public/widget', $this->widget());
        $this->load->view('template/public/footer', $this->footer());
        $this->session->unset_userdata('message');
    }

    public function error404()
    {
        $this->load->view('public/error');
    }

    public function footer()
    {
        $identitas = $this->Identitas_model->get();
        return $identitas;
    }

    public function widget()
    {
        $allPost = $this->Post_model->getAllPost();
        $recentPost = $this->Post_model->getLatestPost(5);
        $kategori = $this->Kategori_model->getAllKategori();
        $tags = $this->Tag_model->getAllTag();

        $dataBulanTahunPostingan = [];
        $bulanTahun = [];

        foreach ($allPost as $row) {
            $a = $this->namaBulan($row['bulan']) . ' ' . $row['tahun'];
            if (!in_array($a, $bulanTahun)) {
                array_push($bulanTahun, $a);
                $data = [
                    'link' => base_url() . $row['tahun'] . '/' . $row['bulan'],
                    'tahunBulan' => $a,
                    'jumlah' => count($this->Post_model->getByYearMonth($row['tahun'], $row['bulan']))
                ];
                array_push($dataBulanTahunPostingan, $data);
            }
        }

        $tagsWidget = [];
        foreach ($tags as $row) {
            $data = [
                'link' => base_url() . $row['slug_tag'],
                'judul' => $row['nama_tag']
            ];
            array_push($tagsWidget, $data);
        }

        $kategoriWidget = [];
        for ($i = 0; $i < count($kategori); $i++) {
            $data = [
                'link' => base_url() . $kategori[$i]['slug_kategori'],
                'judul' => $kategori[$i]['nama_kategori'],
                'jumlah' => count($this->Post_model->getPostByKategori($kategori[$i]['nama_kategori']))
            ];

            array_push($kategoriWidget, $data);
        }

        $postinganTerakhir = [];

        for ($i = 0; $i < count($recentPost); $i++) {
            $cDatePost = date_create_from_format('Y-n-d H:i:s', $recentPost[$i]['date']);
            $cDateNow = date_create();
            $tanggalSelisih = date_diff($cDateNow, $cDatePost);
            if ($tanggalSelisih->days <= 2) {
                $status = '<span class="badge bg-danger">New</span>';
            } else {
                $status = '';
            }
            $data = [
                'judul' => $recentPost[$i]['judul'],
                'link' => base_url() .  $recentPost[$i]['link'],
                'status' => $status,
                'terbit' => $cDatePost->format('j/n')
            ];

            array_push($postinganTerakhir, $data);
        }

        $dataWidget = [
            'widgetPostinganTerakhir' => $postinganTerakhir,
            'widgetKategori' => $kategoriWidget,
            'widgetTag' => $tagsWidget,
            'widgetArchive' => $dataBulanTahunPostingan,
        ];

        return $dataWidget;
    }

    public function toInaDate($date)
    {
        if ($date) {
            $tanggal = $date->format('j') . ' ' . $this->namaBulan($date->format('n')) . ' ' . $date->format('Y');
            $hari = $this->namaHari($date->format('N'));

            return $hari . ', ' . $tanggal;
        } else {
            return '';
        }
    }

    public function namaBulan($id)
    {
        switch ($id) {
            case 1:
                return 'Januari';
                break;

            case 2:
                return 'Februari';

            case 3:
                return 'Maret';

            case 4:
                return 'April';

            case 5:
                return 'Mei';

            case 6:
                return 'Juni';

            case 7:
                return 'Juli';

            case 8:
                return 'Agustus';

            case 9:
                return 'September';

            case 10:
                return 'Oktober';

            case 11:
                return 'November';

            case 12:
                return 'Desember';

            default:
                break;
        }
    }

    public function namaHari($id)
    {
        switch ($id) {
            case 7:
                return 'Minggu';
                break;

            case 1:
                return 'Senin';

            case 2:
                return 'Selasa';

            case 3:
                return 'Rabu';

            case 4:
                return 'Kamis';

            case 5:
                return 'Jumat';

            case 6:
                return 'Sabtu';

            default:
                break;
        }
    }

    public function addKomentarPublik()
    {
        $parent = htmlspecialchars($this->input->post('idKomentar'));
        $url = htmlspecialchars($this->input->post('link'));
        $idBlog = htmlspecialchars($this->input->post('idBlog'));
        $nama = htmlspecialchars($this->input->post('nama'));
        $email = htmlspecialchars($this->input->post('email'));
        $wa = htmlspecialchars($this->input->post('wa'));
        $isi = htmlspecialchars($this->input->post('komentar'));

        if ($parent) {
            $resultParent = $parent;
        } else {
            $resultParent = null;
        }

        if ($nama) {
            $nama = $nama;
        } else {
            $nama = 'Anonymous';
        }

        $data = [
            'id_komentar' => null,
            'parent_comment' => $resultParent,
            'id_blog' => $idBlog,
            'nama' => $nama,
            'email' => $email,
            'nomor_wa' => $wa,
            'pesan' => $isi,
            'date_comment' => date('Y-m-d H:i:s', time()),
            'icon' => '<i class="fas fa-smile fa-3x fa-fw"></i>',
            'is_read' => 0
        ];

        if ($this->Comment_model->setPublikKomentar($data)) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Komentar berhasil ditambahkan.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
            redirect($url . '#pesan');
        };
    }

    public function date($tahun, $bulan)
    {
        $allMenu = $this->Menu_model->getAll();
        $mainMenu = $this->Menu_model->getMainMenu();
        $dataPost = $this->Post_model->getByYearMonth($tahun, $bulan);
        $unreadKomentar = $this->Comment_model->getUnread();
        $unreadMessage = $this->Pesan_model->getUnread();
        $posts = [];
        foreach ($dataPost as $row) {
            $fileSampul = $row['foto_sampul'];
            $fileSampulLoc = str_replace(base_url(), './', $fileSampul);

            if (file_exists($fileSampulLoc)) {
                $sampul = $fileSampul;
            } else {
                $sampul = base_url('assets/global/images/post.jpg');
            }

            $komentar = $this->Comment_model->getCommentByIdPost($row['id_blog']);
            $author = $this->User_model->getById($row['id_user']);

            $tanggal = date_create_from_format('Y-m-d H:i:s', $row['date']);
            $data = [
                'link' => base_url() .  $row['link'],
                'komentar' => count($komentar),
                'dibaca' => $row['viewer'],
                'author' => $author['username'],
                'sampul' => $sampul,
                'tanggal' => $this->toInaDate($tanggal),
                'judul' => $row['judul']
            ];
            array_push($posts, $data);
        }

        $data = [
            'title' => 'Informasi - #EsperoJaya',
            'header' => 'Informasi Sekolah',
            'deskripsi' => 'Informasi berdasarkan tahun dan bulan',
            'posts' => $posts,
            'menuUtama' => $mainMenu,
            'allMenu' => $allMenu,
            'page' => 'tanggal',
            'komentarBaru' => $unreadKomentar,
            'pesanBaru' => $unreadMessage
        ];

        $this->load->view('template/public/header', $data);
        $this->load->view('public/info/index');
        $this->load->view('template/public/widget', $this->widget());
        $this->load->view('template/public/footer', $this->footer());
        $this->session->unset_userdata('message');
    }

    // public function cari()
    // {
    //     $allMenu = $this->Menu_model->getAll();
    //     $mainMenu = $this->Menu_model->getMainMenu();
    //     $unreadKomentar = $this->Comment_model->getUnread();
    //     $unreadMessage = $this->Pesan_model->getUnread();
    //     $keyword = $this->input->post('keyword');
    //     $this->session->set_flashdata('keyword', $keyword);
    //     $result = $this->Post_model->getBySearch($keyword);
    //     $posts = [];

    //     for ($i = 0; $i < count($result); $i++) {
    //         $date = date_create_from_format('Y-n-d H:i:s', $result[$i]['date']);
    //         $date = $this->toInaDate($date);

    //         $fileSampul = $result[$i]['foto_sampul'];
    //         $fileSampulLoc = str_replace(base_url(), './', $fileSampul);

    //         if (file_exists($fileSampulLoc)) {
    //             $sampul = $fileSampul;
    //         } else {
    //             $sampul = base_url('assets/global/images/post.jpg');
    //         }

    //         $data = [
    //             'sampul' => $sampul,
    //             'tanggal' => $date,
    //             'judul' => $result[$i]['judul'],
    //             'link' => base_url() .  $result[$i]['link']
    //         ];

    //         array_push($posts, $data);
    //     }

    //     $data = [
    //         'title' => 'Pencarian - #EsperoJaya',
    //         'header' => 'Informasi Sekolah',
    //         'deskripsi' => 'Hasil pencarian dengan kata kunci: ' . $keyword,
    //         'post' => $posts,
    //         'menuUtama' => $mainMenu,
    //         'allMenu' => $allMenu,
    //         'page' => 'pencarian',
    //         'komentarBaru' => $unreadKomentar,
    //         'pesanBaru' => $unreadMessage,
    //         'keyword' => $keyword
    //     ];

    //     $this->load->view('template/public/header', $data);
    //     $this->load->view('public/info/index');
    //     $this->load->view('template/public/widget', $this->widget());
    //     $this->load->view('template/public/footer', $this->footer());
    //     $this->session->unset_userdata('message');
    // }

    public function blogs()
    {
        $pinnedPost = $this->Post_model->getPinned();
        $allMenu = $this->Menu_model->getAll();
        $mainMenu = $this->Menu_model->getMainMenu();
        $unreadKomentar = $this->Comment_model->getUnread();
        $unreadMessage = $this->Pesan_model->getUnread();

        $keyword = $this->input->post('keyword');
        if ($keyword) {
            $this->session->set_flashdata('keyword', $keyword);
            $this->db->like('judul', $keyword);
        } else {
            if ($pinnedPost) {
                $dataTanggal = date_create_from_format('Y-m-d H:i:s', $pinnedPost['date']);
                $author = $this->User_model->getById($pinnedPost['id_user']);
                $komentar = $this->Comment_model->getCommentByIdPost($pinnedPost['id_blog']);

                $fileSampul = $pinnedPost['foto_sampul'];
                $fileSampulLoc = str_replace(base_url(), './', $fileSampul);

                if (file_exists($fileSampulLoc)) {
                    $sampul = $fileSampul;
                } else {
                    $sampul = base_url('assets/global/images/post.jpg');
                }

                $pinnedPost = [
                    'sampulAddress' => $sampul,
                    'hariTanggal' => $this->toInaDate($dataTanggal),
                    'author' => $author['nama'],
                    'komentar' => count($komentar),
                    'viewer' => $pinnedPost['viewer'],
                    'judul' => $pinnedPost['judul'],
                    'link' => base_url() .  $pinnedPost['link']
                ];
            }
        }

        $posts = $this->Post_model->getAllPost();

        $config['base_url'] = base_url() . 'blogs/';
        $config['total_rows'] = count($posts);
        $config['per_page'] = 12;

        $config['full_tag_open'] = '<nav aria-label="Pagination"><hr class="my-0" /><ul class="pagination justify-content-center my-4">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'Newer';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Older';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active" aria-current="page"><a class="page-link" href="#!">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        if ($keyword) {
            $this->db->like('judul', $keyword);
        }

        $postLimit = $this->Post_model->getPostWithLimit($config['per_page'], $this->uri->segment(2));
        $dataPostingan = [];

        for ($i = 0; $i < count($postLimit); $i++) {
            $user = $this->User_model->getById($postLimit[$i]['id_user']);
            $date = date_create_from_format('Y-n-d H:i:s', $postLimit[$i]['date']);
            $date = $this->toInaDate($date);
            $komentarIni = $this->Comment_model->getCommentByIdPost($postLimit[$i]['id_blog']);
            $fileSampul = $postLimit[$i]['foto_sampul'];
            $target = str_replace(base_url(), './', $fileSampul);
            if (file_exists($target)) {
                $sampul = $fileSampul;
            } else {
                $sampul = base_url('assets/global/images/post.jpg');
            }

            $data = [
                'sampul' => $sampul,
                'tanggal' => $date,
                'judul' => $postLimit[$i]['judul'],
                'link' => base_url() .  $postLimit[$i]['link'],
                'dibaca' => $postLimit[$i]['viewer'],
                'komentar' => count($komentarIni),
                'isi' => $postLimit[$i]['isi'],
                'author' => $user['username'],
            ];
            array_push($dataPostingan, $data);
        }

        $data = [
            'title' => 'Informasi - #EsperoJaya',
            'header' => 'Informasi Sekolah',
            'deskripsi' => 'Pusat Data Informasi dan Dokumentasi SMP Negeri 2 Wonosari',
            'pinnedPost' => $pinnedPost,
            'posts' => $dataPostingan,
            'menuUtama' => $mainMenu,
            'allMenu' => $allMenu,
            'page' => 'berita',
            'komentarBaru' => $unreadKomentar,
            'pesanBaru' => $unreadMessage
        ];

        $this->load->view('template/public/header', $data);
        $this->load->view('public/informasi');
        $this->load->view('template/public/widget', $this->widget());
        $this->load->view('template/public/footer', $this->footer());
        $this->session->unset_userdata('message');
        $this->session->unset_userdata('keyword');
    }
}
