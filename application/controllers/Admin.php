<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('Post_model');
        $this->load->model('User_model');
        $this->load->model('Upload_model');
        $this->load->model('Comment_model');
        $this->load->model('Tag_model');
        $this->load->model('Kategori_model');
        $this->load->model('Tag_model');
        $this->load->model('Blog_tag_model');
        $this->load->model('Page_model');
        $this->load->model('Menu_model');
        $this->load->model('Pesan_model');
        $this->load->model('Identitas_model');
        $this->load->model('Medsos_model');
        $this->load->model('CLogin_model');
        $this->load->model('Config_model');

        if (!isset($_SESSION['user'])) {
            redirect('auth');
        }
    }

    public function index()
    {
        $dataPostingan = $this->Post_model->getAllPost();
        $dataHalaman = $this->Page_model->getAll();
        $dataKomentar = $this->Comment_model->getAllComment();
        $dataPengguna = $this->User_model->getAll();
        $dataPesan = $this->Pesan_model->getAll();
        $dataIdentitas = $this->Identitas_model->get();
        $dataMedsos = $this->Medsos_model->getAll();

        $daftarPostingan = [];
        foreach ($dataPostingan as $row) {
            $date = date_create_from_format('Y-m-d H:i:s', $row['date']);
            $komentar = $this->Comment_model->getCommentByIdPost($row['id_blog']);
            $data = [
                'tanggal' => $date->format('d-m-Y'),
                'judul' => $row['judul'],
                'jumlahKomentar' => count($komentar),
                'dilihat' => $row['viewer']
            ];
            array_push($daftarPostingan, $data);
        }

        $daftarHalaman = [];
        foreach ($dataHalaman as $row) {
            $date = date_create_from_format('Y-m-d H:i:s', $row['date']);
            $data = [
                'tanggal' => $date->format('d-m-Y'),
                'judul' => $row['title']
            ];
            array_push($daftarHalaman, $data);
        }

        $dataDashboard = [
            'jumlahPostingan' => count($dataPostingan),
            'jumlahHalaman' => count($dataHalaman),
            'jumlahKomentar' => count($dataKomentar),
            'jumlahPengguna' => count($dataPengguna),
            'daftarHalaman' => $daftarHalaman,
            'daftarPostingan' => $daftarPostingan,
            'daftarIdentitas' => $dataIdentitas,
            'daftarMedsos' => $dataMedsos
        ];

        $data = [
            'title' => 'Halaman Admin',
            'sidebar' => 'dashboard',
            'user' => $_SESSION['user'],
            'dataDashboard' => $dataDashboard
        ];

        $this->load->view('template/sbadmin/header', $data);
        $this->load->view('template/sbadmin/sidebar');
        $this->load->view('template/sbadmin/navbar', $this->navbarStatus());
        $this->load->view('admin/index');
        $this->load->view('template/sbadmin/footer');
        $this->session->unset_userdata('message');
    }

    public function post($data)
    {
        if ($data == 'list') {
            $this->_listPost();
        } else if ($data == 'add') {
            $this->_addPost();
        } else if ($data == 'kategori') {
            $this->_kategoriPost();
        } else if ($data == 'tag') {
            $this->_tagPost();
        } else if ($data == 'pin') {
            $this->_pinPost();
        } else {
            $this->na();
        }
    }

    private function _pinPost()
    {
        $allPost = $this->Post_model->getAllPost();
        $pinPost = $this->Post_model->getPinned();
        if ($pinPost) {
            $idPinPost = $pinPost['id_blog'];
            $link = base_url() . $pinPost['link'];
        } else {
            $idPinPost = false;
            $link = '#!';
        }

        $posts = [];
        foreach ($allPost as $row) {
            $data = [
                'id' => $row['id_blog'],
                'judul' => $row['judul']
            ];
            array_push($posts, $data);
        }
        $data = [
            'title' => 'Pin Postingan',
            'user' => $_SESSION['user'],
            'sidebar' => 'post',
            'posts' => $posts,
            'idPinPost' => $idPinPost,
            'linkPinnedPost' => $link
        ];

        $this->load->view('template/sbadmin/header', $data);
        $this->load->view('template/sbadmin/sidebar');
        $this->load->view('template/sbadmin/navbar', $this->navbarStatus());
        $this->load->view('admin/post/pin');
        $this->load->view('template/sbadmin/footer');
        $this->session->unset_userdata('message');
    }

    public function updatePinPost()
    {
        $oldId = $this->input->post('oldId');
        $newId = $this->input->post('newID');

        if (isset($_POST['simpan'])) {
            $data = [
                'pin' => 0
            ];
            $this->Post_model->updatePost($oldId, $data);

            $data = ['pin' => 1];
            $this->Post_model->updatePost($newId, $data);

            $this->session->set_flashdata('message', 'success|Postingan yang di pin sukses diganti');
            redirect('admin/post/pin');
        }

        if (isset($_POST['reset'])) {
            $data = [
                'pin' => 0
            ];
            $this->Post_model->updatePost($oldId, $data);

            $this->session->set_flashdata('message', 'success|Postingan yang di pin sukses diatur ulang.');
            redirect('admin/post/pin');
        }
    }

    private function _listPost()
    {
        $dataAllPost = $this->Post_model->getAllPost();

        $allPost = [];
        for ($i = 0; $i < count($dataAllPost); $i++) {
            if ($dataAllPost[$i]['status'] == 1) {
                $status = 'Terbit';
                $iconStatus = 'text-success';
            } else {
                $status = 'Draf';
                $iconStatus = 'text-warning';
            }
            $date = date_create_from_format('Y-n-d H:i:s', $dataAllPost[$i]['date']);
            $tanggal = $date->format('d/n/Y');
            $waktu = $date->format('H:i');
            $judul = $dataAllPost[$i]['judul'];
            $id = $dataAllPost[$i]['id_blog'];
            $link = $dataAllPost[$i]['link'];
            $kategori = $dataAllPost[$i]['kategori'];

            $penulis = $this->User_model->getById($dataAllPost[$i]['id_user']);
            $namaPenulis = $penulis['username'];
            $komentar = $this->Comment_model->getCommentByIdPost($id);
            $data = [
                'status' => $status,
                'iconStatus' => $iconStatus,
                'tanggal' => $tanggal,
                'waktu' => $waktu,
                'judul' => $judul,
                'kategori' => $kategori,
                'penulis' => $namaPenulis,
                'jumlahKomentar' => count($komentar),
                'link' => $link,
                'id' => $id,
                'dilihat' => $dataAllPost[$i]['viewer']
            ];

            array_push($allPost, $data);
        }

        $data = [
            'title' => 'Postingan',
            'user' => $_SESSION['user'],
            'sidebar' => 'daftarpost',
            'allPost' => $allPost
        ];

        $this->load->view('template/sbadmin/header', $data);
        $this->load->view('template/sbadmin/sidebar');
        $this->load->view('template/sbadmin/navbar', $this->navbarStatus());
        $this->load->view('admin/post/daftar');
        $this->load->view('template/sbadmin/footer');
        $this->session->unset_userdata('message');
    }

    private function _addPost()
    {
        $kategori = $this->Kategori_model->getAllKategori();
        $tag = $this->Tag_model->getAllTag();
        $data = [
            'title' => 'Tambah postingan',
            'sidebar' => 'addPost',
            'user' => $_SESSION['user'],
            'kategori' => $kategori,
            'tag' => $tag
        ];

        $this->form_validation->set_rules('judul', 'Judul', 'required|is_unique[blog.judul]');
        $this->form_validation->set_rules('link', 'Link', 'is_unique[blog.link]');
        $this->form_validation->set_message('is_unique', 'Duplikat value!!!. %s yang anda input sudah ada dalam database!');
        $this->form_validation->set_message('required', '%s harus diisi!');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/sbadmin/header', $data);
            $this->load->view('template/sbadmin/sidebar');
            $this->load->view('template/sbadmin/navbar', $this->navbarStatus());
            $this->load->view('admin/post/add');
            $this->load->view('template/sbadmin/footer');
        } else {
            $author = htmlspecialchars($this->input->post('author'));
            $judul = htmlspecialchars($this->input->post('judul'));
            $link = htmlspecialchars($this->input->post('link'));
            $isi = $this->input->post('isi');
            $kategori = htmlspecialchars($this->input->post('kategori'));
            $tag = $this->input->post('tag');
            $status = htmlspecialchars($this->input->post('status'));

            if ($this->input->post('customDate')) {
                $datetime = htmlspecialchars($this->input->post('customDate'));
            } else {
                $datetime = date('c', time());
            }

            $postDateTime = date_create($datetime);

            do {
                $id_post = 'B' . $postDateTime->format('ymd') . random_string('alnum', 4);
            } while ($this->Post_model->getPostById($id_post));

            $id = 0;
            do {
                $id++;
            } while ($this->Post_model->getById($id));

            if (!$kategori) {
                $kategori = 'Uncategorized';
            }

            $this->tambahKategori($kategori);

            if ($tag) {
                for ($i = 0; $i < count($tag); $i++) {
                    $dataTag = $this->Tag_model->getTag($tag[$i]);
                    if (!$dataTag) {
                        $idTag = 0;
                        do {
                            $idTag++;
                        } while ($this->Tag_model->getTagById($idTag));
                        $data = [
                            'id_tag' => $idTag,
                            'nama_tag' => $tag[$i],
                            'slug_tag' => strtolower(str_replace(' ', '-', $tag[$i]))
                        ];
                        $this->Tag_model->setTag($data);
                    } else {
                        $idTag = $dataTag['id_tag'];
                    }
                    $data = [
                        'id_tag_blog' => null,
                        'id_tag' => $idTag,
                        'id_blog' => $id_post
                    ];
                    $this->Tag_model->setTagAndBlog($data);
                }
            }

            if ($_FILES['file']['error'] == 4) {
                $sampul = base_url('assets/global/images/image-sample-post.png');
            } else {
                $upload = $this->uploadFile();
                $sampul = $upload['href'];
            }

            $data = [
                'id' => $id,
                'id_blog' => $id_post,
                'link' => $link,
                'id_user' => $author,
                'date' => $postDateTime->format('Y-n-d H:i:s'),
                'tahun' => $postDateTime->format('Y'),
                'bulan' => $postDateTime->format('n'),
                'tanggal' => $postDateTime->format('j'),
                'waktu' => $postDateTime->format('H:i:s'),
                'foto_sampul' => $sampul,
                'judul' => $judul,
                'isi' => $isi,
                'kategori' => $kategori,
                'status' => $status,
                'viewer' => 0,
                'pin' => 0
            ];

            if ($this->Post_model->setPost($data)) {
                $this->session->set_flashdata('message', 'success|Postingan berhasil disimpan.');
                redirect('admin/post/list');
            }
        }
    }

    private function _kategoriPost()
    {
        $daftarKategori = $this->Kategori_model->getAllKategori();
        $dataKategori = [];

        for ($i = 0; $i < count($daftarKategori); $i++) {
            $jumlahDipakai = count($this->Post_model->getPostByKategori($daftarKategori[$i]['nama_kategori']));
            $data = [
                'id_kategori' => $daftarKategori[$i]['id_kategori'],
                'nama_kategori' => $daftarKategori[$i]['nama_kategori'],
                'slug_kategori' => $daftarKategori[$i]['slug_kategori'],
                'jumlah_dipakai' => $jumlahDipakai
            ];

            array_push($dataKategori, $data);
        }

        $data = [
            'title' => 'Postingan',
            'user' => $_SESSION['user'],
            'sidebar' => 'kategori',
            'kategori' => $dataKategori
        ];

        $this->form_validation->set_rules('namaKategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('slug', 'URL Slug', 'required');
        $this->form_validation->set_message('required', '%s harus diisi!');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/sbadmin/header', $data);
            $this->load->view('template/sbadmin/sidebar');
            $this->load->view('template/sbadmin/navbar', $this->navbarStatus());
            $this->load->view('admin/post/kategori');
            $this->load->view('template/sbadmin/footer');
            $this->session->unset_userdata('message');
        } else {
            $id = $this->input->post('id');
            $nama = $this->input->post('namaKategori');
            $slug = $this->input->post('slug');

            if (!$id) {
                if ($this->Kategori_model->getKategoriBySlug($slug) || $this->Kategori_model->getKategori($nama)) {
                    $this->session->set_flashdata('message', 'error|Nama Kategori: ' . $nama . ' atau slug: ' . $nama . ' sudah ada dalam database!');
                    redirect('admin/post/kategori');
                } else {
                    $id = 0;
                    do {
                        $id++;
                    } while ($this->Kategori_model->getKategoriById($id));

                    $data = [
                        'id_kategori' => $id,
                        'nama_kategori' => $nama,
                        'slug_kategori' => $slug
                    ];

                    if ($this->Kategori_model->setKategori($data)) {
                        $this->session->set_flashdata('message', 'success|Kategori berhasil disimpan.');
                        redirect('admin/post/kategori');
                    }
                }
            } else {
                $data = [
                    'nama_kategori' => $nama,
                    'slug_kategori' => $slug
                ];

                if ($this->Kategori_model->updateKategori($id, $data)) {
                    $this->session->set_flashdata('message', 'success|Kategori berhasil diedit.');
                    redirect('admin/post/kategori');
                }
            }
        }
    }

    private function _tagPost()
    {
        $daftarTag = $this->Tag_model->getAllTag();

        $dataTag = [];

        foreach ($daftarTag as $row) {
            $jumlahDipakai = count($this->Blog_tag_model->getByIdTag($row['id_tag']));
            $data = [
                'id' => $row['id_tag'],
                'nama' => $row['nama_tag'],
                'slug' => $row['slug_tag'],
                'jumlah' => $jumlahDipakai,
                'link' => base_url() . $row['slug_tag']
            ];
            array_push($dataTag, $data);
        }

        $data = [
            'title' => 'Tag',
            'user' => $_SESSION['user'],
            'sidebar' => 'tag',
            'tags' => $dataTag
        ];

        $this->form_validation->set_rules('namaTag', 'Nama Tag', 'required');
        $this->form_validation->set_rules('slug', 'URL Slug', 'required');
        $this->form_validation->set_message('required', '%s harus diisi!');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/sbadmin/header', $data);
            $this->load->view('template/sbadmin/sidebar');
            $this->load->view('template/sbadmin/navbar', $this->navbarStatus());
            $this->load->view('admin/post/tag');
            $this->load->view('template/sbadmin/footer');
            $this->session->unset_userdata('message');
        } else {
            $id = $this->input->post('id');
            $nama = $this->input->post('namaTag');
            $slug = $this->input->post('slug');

            if (!$id) {
                if ($this->Tag_model->getByName($nama) || $this->Tag_model->getBySlug($slug)) {
                    $this->session->set_flashdata('message', 'error|Nama Tag: ' . $nama . ' atau slug: ' . $nama . ' sudah ada dalam database!');
                    redirect('admin/post/tag');
                } else {
                    $id = 0;
                    do {
                        $id++;
                    } while ($this->Tag_model->getTagById($id));

                    $data = [
                        'id_tag' => $id,
                        'nama_tag' => $nama,
                        'slug_tag' => $slug
                    ];

                    if ($this->Tag_model->setTag($data)) {
                        $this->session->set_flashdata('message', 'success|Tag berhasil disimpan.');
                        redirect('admin/post/tag');
                    }
                }
            } else {
                $data = [
                    'nama_tag' => $nama,
                    'slug_tag' => $slug
                ];

                if ($this->Tag_model->updateTag($id, $data)) {
                    $this->session->set_flashdata('message', 'success|Tag berhasil diedit.');
                    redirect('admin/post/tag');
                }
            }
        }
    }

    public function na()
    {
        $data = [
            'title' => '404 Not Found',
            'user' => $_SESSION['user'],
            'sidebar' => '404'
        ];

        $this->load->view('template/sbadmin/header', $data);
        $this->load->view('template/sbadmin/sidebar');
        $this->load->view('template/sbadmin/navbar', $this->navbarStatus());
        $this->load->view('404/index');
        $this->load->view('template/sbadmin/footer');
        $this->session->unset_userdata('message');
    }

    public function tambahKategori($data)
    {
        if (!$this->Kategori_model->getKategori($data)) {
            $data = [
                'id_kategori' => null,
                'nama_kategori' => $data,
                'slug_kategori' => strtolower(str_replace(' ', '-', $data))
            ];
            $this->Kategori_model->setKategori($data);
        }
    }

    public function uploadGambar($tipe)
    {
        if (isset($_FILES['file']['name'])) {
            if ($_FILES['file']['error'] == 4) {
                return null;
            } else {
                $config['upload_path'] = './assets/upload/images/' . $tipe . '/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['overwrite'] = false;
                $config['file_name'] = random_string('alnum', 8);

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('file')) {
                    $this->upload->display_errors();
                    return FALSE;
                } else {
                    $fileName = $this->upload->data('file_name');
                    if ($tipe == 'post') {
                        $this->Upload_model->setUpload($tipe, null, $fileName);
                        echo base_url('') . 'assets/upload/images/' . $tipe . '/' . $fileName;
                    } else {
                        return $fileName;
                    }
                }
            }
        }
    }

    public function hapusGambar()
    {
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        $nama_file = explode('/', $file_name);
        $nama_file = $nama_file[count($nama_file) - 1];
        if (unlink($file_name)) {
            $this->Upload_model->deleteByName($nama_file);
        }
    }

    public function deleteKategori($id)
    {
        if ($this->Kategori_model->deleteKategori($id)) {
            $this->session->set_flashdata('message', 'success|Kategori berhasil dihapus.');
            redirect('admin/post/kategori');
        }
    }

    public function deleteTag($id)
    {
        if ($this->Tag_model->deleteTag($id)) {
            $this->session->set_flashdata('message', 'success|Tag berhasil dihapus.');
            redirect('admin/post/tag');
        }
    }

    public function editPost($id)
    {
        $dataPost = $this->Post_model->getPostById($id);

        if ($dataPost['status'] == 1) {
            $status = 'Aktif';
        } else {
            $status = 'Draft';
        }

        $cDate = date_create_from_format('Y-n-d H:i:s', $dataPost['date']);
        $tanggal = $cDate->format('Y-m-d\TH:i');
        $blogTags = $this->Tag_model->getTagBlogByIdBlog($dataPost['id_blog']);

        $post = [
            'id_blog' => $dataPost['id_blog'],
            'judul' => $dataPost['judul'],
            'link' => $dataPost['link'],
            'isi' => $dataPost['isi'],
            'status' => $status,
            'tanggal' => $tanggal,
            'sampul' => $dataPost['foto_sampul'],
            'kategori' => $dataPost['kategori'],
            'tags' => $blogTags
        ];

        $kategori = $this->Kategori_model->getAllKategori();
        $tag = $this->Tag_model->getAllTag();

        $data = [
            'title' => 'Tambah postingan',
            'sidebar' => 'editPost',
            'user' => $_SESSION['user'],
            'post' => $post,
            'kategori' => $kategori,
            'tag' => $tag
        ];

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_message('required', '%s harus diisi!');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/sbadmin/header', $data);
            $this->load->view('template/sbadmin/sidebar');
            $this->load->view('template/sbadmin/navbar', $this->navbarStatus());
            $this->load->view('admin/post/edit');
            $this->load->view('template/sbadmin/footer');
        } else {
            $this->_editPost();
        }
    }

    private function _editPost()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $author = htmlspecialchars($this->input->post('author'));
        $judul = htmlspecialchars($this->input->post('judul'));
        $link = htmlspecialchars($this->input->post('link'));
        $isi = $this->input->post('isi');
        $kategori = htmlspecialchars($this->input->post('kategori'));
        $tag = $this->input->post('tag');
        $status = htmlspecialchars($this->input->post('status'));
        $jam = htmlspecialchars($this->input->post('jamC'));
        $namaSampulLama = htmlspecialchars($this->input->post('nama_file'));

        if ($this->input->post('customDate')) {
            $datetime = htmlspecialchars($this->input->post('customDate'));
        } else {
            $datetime = $jam;
        }

        $postDateTime = date_create($datetime);

        if (!$kategori) {
            $kategori = 'Uncategorized';
        } else {
            $this->tambahKategori($kategori);
        }

        $this->Tag_model->deleteBlogTagByIdBlog($id);
        if ($tag) {
            for ($i = 0; $i < count($tag); $i++) {
                $dataTag = $this->Tag_model->getTag($tag[$i]);

                if (!$dataTag) {
                    $idTag = 0;
                    do {
                        $idTag++;
                    } while ($this->Tag_model->getTagById($idTag));

                    $data = [
                        'id_tag' => $idTag,
                        'nama_tag' => $tag[$i],
                        'slug_tag' => $tag[$i]
                    ];
                    $this->Tag_model->setTag($data);
                } else {
                    $idTag = $dataTag['id_tag'];
                }

                $data = [
                    'id_tag_blog' => null,
                    'id_tag' => $idTag,
                    'id_blog' => $id
                ];
                $this->Tag_model->setTagAndBlog($data);
            }
        }

        $data = [
            'link' => $link,
            'id_user' => $author,
            'date' => $postDateTime->format('Y-n-d H:i:s'),
            'judul' => $judul,
            'isi' => $isi,
            'kategori' => $kategori,
            'status' => $status
        ];

        if ($_FILES['file']['error'] !== 4) {
            $upload = $this->uploadFile();
            $data['foto_sampul'] = $upload['href'];
        }

        if ($this->Post_model->updatePost($id, $data)) {
            $this->session->set_flashdata('message', 'success|Postingan berhasil diedit.');
            redirect('admin/post/list');
        }
    }

    public function deletePost($id)
    {
        if ($this->Post_model->deletePost($id)) {
            $this->session->set_flashdata('message', 'success|Postingan berhasil dihapus.');
            redirect('admin/post/list');
        }
    }

    public function page($data)
    {
        if ($data == 'list') {
            $this->_listPage();
        } else if ($data == 'add') {
            $this->_addPage();
        } else {
            $this->na();
        }
    }

    private function _listPage()
    {
        $allPages = $this->Page_model->getAll();
        $i = 1;
        $pages = [];
        foreach ($allPages as $row) {
            $author = $this->User_model->getById($row['id_user']);
            if ($row['status'] == 1) {
                $status = 'Aktif';
            } else {
                $status = 'Draft';
            }
            $dateCreated = date_create_from_format('Y-m-d H:i:s', $row['date']);
            $data = [
                'nomor' => $i,
                'editLink' => base_url() . 'admin/editPage/' . $row['id_page'],
                'deleteLink' => base_url() . 'admin/deletePage/' . $row['id_page'],
                'link' => base_url($row['url']),
                'judul' => $row['title'],
                'author' => $author['username'],
                'status' => $status,
                'date' => $dateCreated->format('d-m-y \| H:i:s'),
                'id' => $row['id_page']
            ];
            array_push($pages, $data);
            $i++;
        }

        $data = [
            'title' => 'Halaman - #EsperoJaya',
            'sidebar' => 'page',
            'pages' => $pages
        ];

        $this->load->view('template/sbadmin/header', $data);
        $this->load->view('template/sbadmin/sidebar');
        $this->load->view('template/sbadmin/navbar', $this->navbarStatus());
        $this->load->view('admin/page/index');
        $this->load->view('template/sbadmin/footer');
        $this->session->unset_userdata('message');
    }

    private function _addPage()
    {
        $data = [
            'title' => 'Halaman - #EsperoJaya',
            'sidebar' => 'page',
            'author' => $_SESSION['user']
        ];

        $this->form_validation->set_rules('judul', 'Judul', 'required|is_unique[pages.title]');
        $this->form_validation->set_rules('link', 'Link', 'required|is_unique[pages.url]');
        $this->form_validation->set_message('required', '%s wajib diisi!');
        $this->form_validation->set_message('is_unique', '%s sudah ada dalam database!');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/sbadmin/header', $data);
            $this->load->view('template/sbadmin/sidebar');
            $this->load->view('template/sbadmin/navbar', $this->navbarStatus());
            $this->load->view('admin/page/add');
            $this->load->view('template/sbadmin/footer');
            $this->session->unset_userdata('message');
        } else {
            $judul = htmlspecialchars($this->input->post('judul'));
            $link = htmlspecialchars($this->input->post('link'));
            $deskripsi = htmlspecialchars($this->input->post('deskripsi'));
            $konten = $this->input->post('summernote');
            $date = date('Y-m-d H:i:s', time());
            $dateCreated = date_create_from_format('Y-m-d H:i:s', $date);
            $idAuthor = $this->input->post('idAuthor');

            do {
                $idPage = 'P' . $dateCreated->format('ymd') . random_string('alnum', 4);
            } while ($this->Page_model->getByIdPage($idPage));

            $data = [
                'id' => null,
                'id_page' => $idPage,
                'id_user' => $idAuthor,
                'url' => $link,
                'deskripsi' => $deskripsi,
                'title' => $judul,
                'content' => $konten,
                'date' => $date,
                'status' => 1
            ];

            if ($this->Page_model->setData($data)) {
                $this->session->set_flashdata('message', 'success|Halaman berhasil dibuat.');
                redirect('admin/page');
            }
        }
    }

    public function deletePage($id)
    {
        if ($this->Page_model->delete($id)) {
            $this->session->set_flashdata('message', 'success|Halaman berhasil dihapus.');
            redirect('admin/page');
        }
    }

    public function editPage($id)
    {
        $dataPage = $this->Page_model->getByIdPage($id);

        $data = [
            'title' => 'Halaman - #EsperoJaya',
            'sidebar' => 'page',
            'dataPage' => $dataPage
        ];

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('link', 'Link', 'required');
        $this->form_validation->set_message('required', '%s wajib diisi!');
        $this->form_validation->set_message('is_unique', '%s sudah ada dalam database!');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/sbadmin/header', $data);
            $this->load->view('template/sbadmin/sidebar');
            $this->load->view('template/sbadmin/navbar', $this->navbarStatus());
            $this->load->view('admin/page/edit');
            $this->load->view('template/sbadmin/footer');
            $this->session->unset_userdata('message');
        } else {
            $judul = htmlspecialchars($this->input->post('judul'));
            $link = htmlspecialchars($this->input->post('link'));
            $deskripsi = htmlspecialchars($this->input->post('deskripsi'));
            $konten = $this->input->post('summernote');

            $data = [
                'url' => $link,
                'title' => $judul,
                'content' => $konten,
                'deskripsi' => $deskripsi
            ];

            if ($this->Page_model->update($id, $data)) {
                $this->session->set_flashdata('message', 'success|Halaman berhasil diubah.');
                redirect('admin/page');
            }
        }
    }

    public function komentar()
    {
        $this->db->order_by('date_comment', 'DESC');
        $dataAllComment = $this->Comment_model->getAllComment();

        $dataKomentar = [];
        $i = 1;
        foreach ($dataAllComment as $row) {
            if ($row['parent_comment'] != null) {
                $dataParent = $this->Comment_model->getByIdKomentar($row['parent_comment']);
                $komentar = '<span class="font-weight-bold font-italic">reply ' . $dataParent['nama'] . ': </span><br>' . $row['pesan'];
            } else {
                $komentar = $row['pesan'];
            }
            if ($row['is_read'] == 1) {
                $iconTitle = 'Telah dibaca';
                $icon = '<i class="fas fa-eye-slash fa-fw"></i>';
            } else {
                $icon = '<i class="fas fa-eye fa-fw"></i>';
                $iconTitle = 'Baca';
            }
            $dataPostingan = $this->Post_model->getPostById($row['id_blog']);
            $url = $dataPostingan['link'];
            $date = date_create_from_format('Y-m-d H:i:s', $row['date_comment']);

            $data = [
                'nomor' => $i,
                'idKomentar' => $row['id_komentar'],
                'idPost' => $row['id_blog'],
                'judul' => $dataPostingan['judul'],
                'nama' => $row['nama'],
                'email' => $row['email'],
                'nomor_wa' => $row['nomor_wa'],
                'komentar' => $komentar,
                'date' => $this->toInaDate($date) . ' Jam: ' . $date->format('H:i:s'),
                'hrefDelete' => base_url() . 'admin/deleteKomentar/' . $row['id_komentar'],
                'hrefPreview' => base_url('') . $url,
                'linkWA' => 'https://wa.me/+62' . $row['nomor_wa'],
                'linkEmail' => 'mailto:' . $row['email'],
                'is_read' => $row['is_read'],
                'icon' => $icon,
                'iconTitle' => $iconTitle
            ];
            array_push($dataKomentar, $data);
            $i++;
        }

        $data = [
            'title' => 'Halaman - #EsperoJaya',
            'sidebar' => 'komentar',
            'dataKomentar' => $dataKomentar
        ];

        $this->load->view('template/sbadmin/header', $data);
        $this->load->view('template/sbadmin/sidebar');
        $this->load->view('template/sbadmin/navbar', $this->navbarStatus());
        $this->load->view('admin/komentar');
        $this->load->view('template/sbadmin/footer');
        $this->session->unset_userdata('message');
    }

    public function readComment($id)
    {
        $data = [
            'is_read' => 1
        ];
        if ($this->Comment_model->update($id, $data)) {
            $this->session->set_flashdata('message', 'success|Komentar berhasil ditandai terbaca.');
            redirect('admin/komentar');
        }
    }

    public function balasKomentar()
    {
        $admin = $_SESSION['user'];
        $idPost = htmlspecialchars($this->input->post('idPost'));
        $parentID = htmlspecialchars($this->input->post('parentID'));
        $komentar = htmlspecialchars($this->input->post('reply'));

        $data = [
            'id_komentar' => null,
            'parent_comment' => $parentID,
            'id_blog' => $idPost,
            'nama' => $admin['username'],
            'email' => null,
            'nomor_wa' => null,
            'pesan' => $komentar,
            'date_comment' => date('Y-m-d H:i:s', time()),
            'icon' => '<i class="fas fa-user-shield fa-3x fa-fw"></i>',
            'is_read' => 1
        ];

        if ($this->Comment_model->setPublikKomentar($data)) {
            $this->session->set_flashdata('message', 'success|Komentar berhasil dibalas.');
            redirect('admin/komentar');
        }
    }

    public function deleteKomentar($id)
    {
        if ($this->Comment_model->delete($id)) {
            $this->session->set_flashdata('message', 'success|Komentar berhasil dihapus.');
            redirect('admin/komentar');
        }
    }

    public function menu()
    {
        $this->db->order_by('title', 'ASC');
        $allMenu = $this->Menu_model->getAll();
        $mainMenu = $this->Menu_model->getMainMenu();
        $dataPage = $this->Page_model->getAll();
        $allKategori = $this->Kategori_model->getAllKategori();
        $allPost = $this->Post_model->getAllPost();
        $posts = [];
        $kategori = [];
        $pages = [];
        foreach ($dataPage as $row) {
            $data = [
                'id' => $row['id_page'],
                'link' => $row['url'],
                'judul' => $row['title']
            ];
            array_push($pages, $data);
        }
        $i = 1;
        foreach ($mainMenu as $row) {
            $data = [
                'nomor' => $i,
                'title' => $row['title'],
                'parent' => $row['parent_id'],
            ];
            $i++;
        }
        foreach ($allKategori as $row) {
            $data = [
                'link' => base_url() . $row['slug_kategori'],
                'judul' => $row['nama_kategori']
            ];
            array_push($kategori, $data);
        }
        foreach ($allPost as $row) {
            $data = [
                'link' => base_url() . $row['link'],
                'judul' => $row['judul']
            ];
            array_push($posts, $data);
        }

        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_message('required', '%s wajib diisi!');

        $data = [
            'title' => 'Menu',
            'sidebar' => 'menu',
            'pages' => $pages,
            'allMenu' => $allMenu,
            'mainMenu' => $mainMenu,
            'kategori' => $kategori,
            'posts' => $posts
        ];
        if ($this->form_validation->run() == false) {
            $this->load->view('template/sbadmin/header', $data);
            $this->load->view('template/sbadmin/sidebar');
            $this->load->view('template/sbadmin/navbar', $this->navbarStatus());
            $this->load->view('admin/menu');
            $this->load->view('template/sbadmin/footer');
            $this->session->unset_userdata('message');
        } else {
            $this->addMenu();
        }
    }

    public function addMenu()
    {
        $idMenu = htmlspecialchars($this->input->post('idMenu'));
        $parent = htmlspecialchars($this->input->post('parent'));
        $urutan = htmlspecialchars($this->input->post('urutan'));
        $link = htmlspecialchars($this->input->post('link'));
        $judul = htmlspecialchars($this->input->post('judul'));
        $tipe = htmlspecialchars($this->input->post('tipe'));
        $newtab = htmlspecialchars($this->input->post('new_tab'));

        if ($newtab == 'on') {
            $is_new_tab = 1;
        } else {
            $is_new_tab = 0;
        }

        if ($parent != 0) {
            $data = [
                'tipe' => 'Dropdown',
                'new_tab' => 0
            ];
            $this->Menu_model->update($parent, $data);
        }
        $id_menu = 0;
        do {
            $id_menu++;
        } while ($this->Menu_model->getById($id_menu));

        if ($idMenu == '') {
            $data = [
                'id_menu' => $id_menu,
                'urutan' => $urutan,
                'parent_id' => $parent,
                'href' => $link,
                'title' => $judul,
                'tipe' => $tipe,
                'new_tab' => $is_new_tab
            ];

            if ($this->Menu_model->set($data)) {
                $this->session->set_flashdata('message', 'success|Menu berhasil ditambahkan.');
                redirect('admin/menu');
            }
        } else {
            $data = [
                'urutan' => $urutan,
                'parent_id' => $parent,
                'href' => $link,
                'title' => $judul,
                'tipe' => $tipe,
                'new_tab' => $is_new_tab
            ];
            if ($this->Menu_model->update($idMenu, $data)) {
                $this->session->set_flashdata('message', 'success|Menu berhasil diedit.');
                redirect('admin/menu');
            }
        }
    }

    public function getMenuById()
    {
        $data = $this->Menu_model->getById($this->input->post('id'));

        $result = '';
        foreach ($data as $row) {
            $result .= $row . '|';
        }
        echo $result;
    }

    public function getUserById()
    {
        $data = $this->User_model->getById($this->input->post('id'));

        $result = '';
        foreach ($data as $row) {
            $result .= $row . '|';
        }
        echo $result;
    }

    public function deleteMenu($id)
    {
        $dataMenu = $this->Menu_model->getById($id);
        $dataParentMenu = $this->Menu_model->getByParentId($id);
        if ($dataParentMenu) {
            $data = [
                'parent_id' => $dataMenu['parent_id']
            ];
            foreach ($dataParentMenu as $row) {
                $this->Menu_model->update($row['id_menu'], $data);
            }
        }

        if ($this->Menu_model->delete($id)) {
            $this->session->set_flashdata('message', 'success|Menu berhasil dihapus.');
            redirect('admin/menu');
        }
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
                break;

            case 2:
                return 'Selasa';
                break;

            case 3:
                return 'Rabu';
                break;

            case 4:
                return 'Kamis';
                break;

            case 5:
                return 'Jumat';
                break;

            case 6:
                return 'Sabtu';
                break;

            default:
                break;
        }
    }

    public function navbarStatus()
    {
        $unreadComment = $this->Comment_model->getUnread();
        $unreadMessage = $this->Pesan_model->getUnread();
        $dataUnreadComment = [];
        $dataUnreadPesan = [];
        foreach ($unreadComment as $row) {
            $data = [
                'id' => $row['id_komentar'],
                'icon' => $row['icon'],
                'nama' => $row['nama'],
                'date' => date_create_from_format('Y-m-d H:i:s', $row['date_comment'])->format('d/m/Y H:i'),
                'komentar' => $row['pesan']
            ];
            array_push($dataUnreadComment, $data);
        }
        foreach ($unreadMessage as $row) {
            $selisih = date_diff(date_create_from_format('Y-m-d H:i:s', $row['message_date']), date_create_from_format('Y-m-d H:i:s', date('Y-m-d H:i:s', time())));

            $data = [
                'id' => $row['id_pesan'],
                'link' => base_url() . 'admin/pesan/',
                'pesan' => $row['pesan'],
                'nama' => $row['nama_pengirim'],
                'waktu' => $selisih->i . 'm'
            ];
            array_push($dataUnreadPesan, $data);
        }

        $dataDiKirim = [
            'unreadComment' => $dataUnreadComment,
            'unreadMessage' => $dataUnreadPesan
        ];

        return $dataDiKirim;
    }

    public function pesan()
    {
        $pesanAll = $this->Pesan_model->getAll();
        $dataPesan = [];
        $nomor = 1;
        foreach ($pesanAll as $row) {
            $date = date_create_from_format('Y-m-d H:i:s', $row['message_date']);
            if ($row['is_read'] == 1) {
                $iconTitle = 'Telah dibaca';
                $icon = '<i class="fas fa-eye-slash fa-fw"></i>';
                $status = 'disabled';
            } else {
                $icon = '<i class="fas fa-eye fa-fw"></i>';
                $iconTitle = 'Baca';
                $status = '';
            }
            $data = [
                'id' => $row['id_pesan'],
                'nomor' => $nomor,
                'nama' => $row['nama_pengirim'],
                'tanggalWaktu' => $date->format('d-m-Y H:i:s'),
                'nomorWA' => $row['wa_pesan'],
                'hrefWA' => 'https://wa.me/62' . $row['wa_pesan'],
                'email' => $row['email_pesan'],
                'hrefEmail' => 'mailto:' . $row['email_pesan'],
                'pesan' => $row['pesan'],
                'hrefRead' => base_url() . 'admin/readPesan/' . $row['id_pesan'],
                'iconBaca' => $icon,
                'iconTitle' => $iconTitle,
                'hrefDelete' => base_url() . 'admin/deletePesan/' . $row['id_pesan'],
                'status' => $status
            ];
            array_push($dataPesan, $data);
            $nomor++;
        }

        $data = [
            'title' => 'Menu',
            'sidebar' => 'pesan',
            'dataPesan' => $dataPesan
        ];

        $this->load->view('template/sbadmin/header', $data);
        $this->load->view('template/sbadmin/sidebar');
        $this->load->view('template/sbadmin/navbar', $this->navbarStatus());
        $this->load->view('admin/pesan');
        $this->load->view('template/sbadmin/footer');
        $this->session->unset_userdata('message');
    }

    public function readPesan($id)
    {
        $data = [
            'is_read' => 1
        ];

        if ($this->Pesan_model->update($id, $data)) {
            $this->session->set_flashdata('message', 'success|Pesan berhasil ditandai dibaca.');
            redirect('admin/pesan');
        }
    }

    public function deletePesan($id)
    {
        if ($this->Pesan_model->delete($id)) {
            $this->session->set_flashdata('message', 'success|Pesan berhasil dihapus.');
            redirect('admin/pesan');
        }
    }

    public function identitas()
    {
        $dataIdentitas = $this->Identitas_model->get();
        $dataMedsos = $this->Medsos_model->getAll();

        if ($dataIdentitas) {
            if ($dataIdentitas['logo'] == '') {
                $logo = base_url('assets/global/images/default_logo.png');
            } else {
                $logo = $dataIdentitas['logo'];
            }
            $identitas = [
                'id' => $dataIdentitas['id_sekolah'],
                'nama' => $dataIdentitas['nama'],
                'alamat' => $dataIdentitas['alamat'],
                'latitude' => $dataIdentitas['latitude'],
                'longitude' => $dataIdentitas['longitude'],
                'telepon' => $dataIdentitas['telepon'],
                'email' => $dataIdentitas['email'],
                'website' => $dataIdentitas['website'],
                'tagline' => $dataIdentitas['tagline'],
                'logo' => $logo
            ];
        } else {
            $identitas = [
                'id' => '', 'nama' => '', 'alamat' => '', 'latitude' => '', 'longitude' => '', 'telepon' => '', 'email' => '', 'website' => '', 'tagline' => '', 'logo' => base_url('assets/global/images/default_logo.png')
            ];
        }

        if ($dataMedsos) {
            $medsos = [
                'id' => $dataMedsos['id_medsos'],
                'facebook' => $dataMedsos['facebook'],
                'twitter' => $dataMedsos['twitter'],
                'instagram' => $dataMedsos['instagram'],
                'whatsapp' => $dataMedsos['whatsapp'],
                'youtube' => $dataMedsos['youtube'],
                'telegram' => $dataMedsos['telegram'],
                'maps' => $dataMedsos['maps'],
            ];
        } else {
            $medsos = [
                'id' => '',
                'facebook' => '',
                'twitter' => '',
                'instagram' => '',
                'whatsapp' => '',
                'youtube' => '',
                'telegram' => '',
                'maps' => ''
            ];
        }

        $data = [
            'title' => 'Menu',
            'sidebar' => 'identitas',
            'data' => $identitas,
            'medsos' => $medsos
        ];

        $this->load->view('template/sbadmin/header', $data);
        $this->load->view('template/sbadmin/sidebar');
        $this->load->view('template/sbadmin/navbar', $this->navbarStatus());
        $this->load->view('admin/identitas');
        $this->load->view('template/sbadmin/footer');
        $this->session->unset_userdata('message');
    }

    public function setIdentitas()
    {
        $id = $this->input->post('id');
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama')),
            'tagline' => htmlspecialchars($this->input->post('tagline')),
            'alamat' => htmlspecialchars($this->input->post('alamat')),
            'latitude' => htmlspecialchars($this->input->post('latitude')),
            'longitude' => htmlspecialchars($this->input->post('longitude')),
            'telepon' => htmlspecialchars($this->input->post('telepon')),
            'email' => htmlspecialchars($this->input->post('email')),
            'website' => htmlspecialchars($this->input->post('website')),
        ];

        if ($id != '') {
            if ($this->Identitas_model->update($id, $data)) {
                $this->session->set_flashdata('message', 'success|Identitas berhasil disimpan.');
                redirect('admin/identitas');
            }
        } else {
            if ($this->Identitas_model->set($data)) {
                $this->session->set_flashdata('message', 'success|Identitas berhasil disimpan.');
                redirect('admin/identitas');
            }
        }
    }

    public function setLogo()
    {
        if ($_FILES['file']['error'] == 4) {
            $this->session->set_flashdata('message', 'error|Tidak ada file yang diupload!');
            redirect('admin/identitas');
        } else {
            $result = $this->uploadFile();
            if ($result) {
                $result['alt'] = 'Logo';
                $this->Upload_model->set($result);

                $id = $this->input->post('id');

                $data = [
                    'logo' => $result['href']
                ];

                if ($id != '') {
                    if ($this->Identitas_model->update($id, $data)) {
                        $this->session->set_flashdata('message', 'success|Identitas berhasil disimpan.');
                        redirect('admin/identitas');
                    } else {
                        if ($this->Identitas_model->set($data)) {
                            $this->session->set_flashdata('message', 'success|Identitas berhasil disimpan.');
                            redirect('admin/identitas');
                        }
                    }
                }
            }
        }
    }

    public function setMedsos()
    {
        $id = $this->input->post('id');
        $data = [
            'facebook' => htmlspecialchars($this->input->post('facebook')),
            'twitter' => htmlspecialchars($this->input->post('twitter')),
            'instagram' => htmlspecialchars($this->input->post('instagram')),
            'youtube' => htmlspecialchars($this->input->post('youtube')),
            'whatsapp' => htmlspecialchars($this->input->post('whatsapp')),
            'telegram' => htmlspecialchars($this->input->post('telegram')),
            'maps' => htmlspecialchars($this->input->post('maps')),
        ];

        if ($id == '') {
            if ($this->Medsos_model->set($data)) {
                $this->session->set_flashdata('message', 'success|Data media sosial berhasil disimpan.');
                redirect('admin/identitas');
            }
        } else {
            if ($this->Medsos_model->update($id, $data)) {
                $this->session->set_flashdata('message', 'success|Media Sosial berhasil disimpan.');
                redirect('admin/identitas');
            }
        }
    }

    public function user()
    {
        $sessionUserLevel = $_SESSION['user']['level'];
        $dataLevelUser = $this->CLogin_model->getAllLevel();

        if ($sessionUserLevel == 'root') {
            $users = $this->User_model->getAll();
        } else {
            $users = $this->User_model->getByUsername($_SESSION['user']['username']);
        }

        $dataUser = [];
        foreach ($users as $row) {
            $levelUser = $this->CLogin_model->getLevel($row['level']);
            if ($row['is_active'] > 0) {
                $iconStatus = '<i class="fas fa-user-slash fa-fw"></i>';
                $colorIconStatus = 'danger';
                $iconTitle = 'Nonaktifkan';
            } else {
                $iconStatus = '<i class="fas fa-user-check fa-fw"></i>';
                $colorIconStatus = 'success';
                $iconTitle = 'Aktifkan';
            }
            $data = [
                'id' => $row['id_user'],
                'nama' => $row['nama'],
                'email' => $row['email'],
                'telepon' => $row['telepon'],
                'username' => $row['username'],
                'level' => $levelUser['nama_level'],
                'active' => $row['is_active'],
                'iconStatus' => $iconStatus,
                'colorIconStatus' => $colorIconStatus,
                'iconTitle' => $iconTitle
            ];
            array_push($dataUser, $data);
        }

        $data = [
            'title' => 'Pengguna',
            'sidebar' => 'user',
            'user' => $dataUser,
            'userLevel' => $dataLevelUser,
        ];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_uniq ue[user.username]|min_length[4]');
        $this->form_validation->set_rules('telepon', 'Nomor Telepon', 'required|trim|numeric|min_length[11]');
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('level', 'Level User', 'required');
        $this->form_validation->set_rules('password', 'Password Pertama', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('password2', 'Password ke Dua', 'required|trim|matches[password]');

        $this->form_validation->set_message('required', '{field} wajib diisi!');
        $this->form_validation->set_message('is_unique', '{field} sudah ada dalam database!');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter!');
        $this->form_validation->set_message('numeric', '{field} hanya karakter angka!');
        $this->form_validation->set_message('valid_email', '{field} bukan format email!');
        $this->form_validation->set_message('matches', '{field} value tidak sama dengan password pertama!');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/sbadmin/header', $data);
            $this->load->view('template/sbadmin/sidebar');
            $this->load->view('template/sbadmin/navbar', $this->navbarStatus());
            $this->load->view('admin/user');
            $this->load->view('template/sbadmin/footer');
            $this->session->unset_userdata('message');
        } else {
            $this->setUser();
        }
    }

    public function setUser()
    {
        $id = $this->input->post('idUser');
        $passwordHash = password_hash(htmlspecialchars($this->input->post('password')), PASSWORD_DEFAULT);
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama')),
            'email' => htmlspecialchars($this->input->post('email')),
            'telepon' => htmlspecialchars($this->input->post('telepon')),
            'username' => htmlspecialchars($this->input->post('username')),
            'password' => $passwordHash,
            'level' => htmlspecialchars($this->input->post('level')),
        ];

        if ($id == '') {
            $data['is_active'] = 1;
            if ($this->User_model->insert($data)) {
                $this->session->set_flashdata('message', 'success|Pengguna berhasil disimpan.');
                redirect('admin/user');
            };
        } else {
            if ($this->User_model->update($id, $data)) {
                $this->session->set_flashdata('message', 'success|Pengguna berhasil diedit.');
                redirect('admin/user');
            }
        }
    }

    // public function updateUser()
    // {
    //     $id = $this->input->post('idUser');
    //     $password = htmlspecialchars($this->input->post('password'));
    //     $password2 = htmlspecialchars($this->input->post('password2'));
    //     $username = htmlspecialchars($this->input->post('username'));
    //     $levelUser = htmlspecialchars($this->input->post('level'));

    //     if ($password !== $password2) {
    //         $this->session->set_flashdata('message', '
    //             error|Password tidak sama!');
    //         redirect('admin/user');
    //     } else {
    //         if ($username == '' || $levelUser == '') {
    //             $this->session->set_flashdata('message', '
    //             error|Username harus diisi!');
    //             redirect('admin/user');
    //         } else {
    //             $data = [
    //                 'nama' => htmlspecialchars($this->input->post('nama')),
    //                 'email' => htmlspecialchars($this->input->post('email')),
    //                 'telepon' => htmlspecialchars($this->input->post('telepon')),
    //                 'username' => $username,
    //                 'level' => htmlspecialchars($this->input->post('level')),
    //             ];

    //             if ($password != '') {
    //                 $data['password'] = password_hash($password, PASSWORD_DEFAULT);
    //             }

    //             if ($this->User_model->update($id, $data)) {
    //                 $this->session->set_flashdata('message', 'success|Pengguna "' . $this->input->post('nama') . '" berhasil diedit.');
    //                 redirect('admin/user');
    //             }
    //         }
    //     }
    // }

    public function changeUserActive($id)
    {
        $user = $this->User_model->getById($id);
        if ($user['is_active'] > 0) {
            $active = 0;
            $status = 'nonaktifkan';
        } else {
            $status = 'aktifkan';
            $active = 1;
        }

        $data = [
            'is_active' => $active
        ];

        if ($this->User_model->update($id, $data)) {
            $this->session->set_flashdata('message', 'success|Pengguna ' . $user['nama'] . ' berhasil di' . $status);
            redirect('admin/user');
        }
    }

    public function media()
    {
        $allMedia = $this->Upload_model->getAll();
        $outMedia = [];
        $i = 1;
        foreach ($allMedia as $row) {
            $type = explode('/', $row['type']);
            if ($type[0] == 'audio') {
                $thumbnail = '<audio controls class="w-100">
                        <source src="' . $row['href'] . '" type="' . $row['type'] . '">
                        Your browser does not support the audio element.
                    </audio>';
            } else if ($type[0] == 'video') {
                $thumbnail = '<a href="' . $row['href'] . '" data-toggle="lightbox"><i class="fas fa-video fa-2x fa-fw"></i></a>';
            } else if ($type[0] == 'image') {
                $thumbnail = '
                        <a href="' . $row['href'] . '" data-toggle="lightbox" data-gallery="gallery" data-title="' . $row['title'] . '" data-footer="' . $row['alt'] . '">
                            <img src="' . $row['href'] . '" class="img-fluid w-100 img-thumbnail mb-2" style="height: 120px; object-fit: cover; object-position: center center;">
                        </a>';
            } else {
                $thumbnail = '
                <a href="' . $row['href'] . '" target="_blank" class="text-decoration-none">
                <i class="fas fa-file fa-2x fa-fw"></i>
                </a>';
            }

            $data = [
                'dataFile' => $row['id_upload'] . '|' . $row['title'] . '|' . $row['href'] . '|' . $row['type'] . '|' . $row['nama_file'] . '|' . $row['alt'],
                'nomor' => $i,
                'id' => $row['id_upload'],
                'title' => $row['title'],
                'url' => $row['href'],
                'type' => $row['type'],
                'filename' => $row['nama_file'],
                'alt' => $row['alt'],
                'date' => date_create_from_format('Y-m-d H:i:s', $row['date_upload'])->format('d-m-Y'),
                'thumbnail' => $thumbnail
            ];
            array_push($outMedia, $data);
            $i++;
        }

        $data = [
            'title' => 'Media',
            'sidebar' => 'media',
            'daftarMedia' => $outMedia
        ];

        $this->load->view('template/sbadmin/header', $data);
        $this->load->view('template/sbadmin/sidebar');
        $this->load->view('template/sbadmin/navbar', $this->navbarStatus());
        $this->load->view('admin/media');
        $this->load->view('template/sbadmin/footer');
        $this->session->unset_userdata('message');
    }

    public function setMedia()
    {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $alt = $this->input->post('alt');
        $filename = $this->input->post('filename');
        $ext = $this->input->post('ext');
        $fullFilename = $filename . $ext;
        $tipe = $this->input->post('type');
        $url = base_url('assets/upload/') . $tipe . '/';
        $hrefOld = $this->input->post('hrefOld');
        $hrefNew = $url . $fullFilename;

        if ($_FILES['file']['error'] == 4) {
            if ($id != '') {
                $data = [
                    'title' => $title,
                    'alt' => $alt,
                    'nama_file' => $fullFilename,
                    'href' => $hrefNew
                ];
                if ($this->Upload_model->update($id, $data)) {
                    $newHrefOld = str_replace(base_url(), './', $hrefOld);
                    $newHrefNew = str_replace(base_url(), './', $hrefNew);
                    rename($newHrefOld, $newHrefNew);
                    $this->session->set_flashdata('message', 'success|Data file berhasil diubah!');
                    redirect('admin/media');
                } else {
                    $this->session->set_flashdata('message', 'error|Data file gagal diupdate!');
                    redirect('admin/media');
                }
            } else {
                $this->session->set_flashdata('message', 'error|Pilih file terlebih dahulu!');
                redirect('admin/media');
            }
        } else {
            $result = $this->uploadFile();
            if ($result) {
                if ($title == '') {
                    $judul = $result['title'];
                } else {
                    $judul = $title;
                }
                $data = [
                    'title' => $judul,
                    'href' => $result['href'],
                    'type' => $result['type'],
                    'nama_file' => $result['nama_file'],
                    'alt' => $alt,
                    'date_upload' => $result['date_upload'],
                ];

                $this->Upload_model->set($data);
                $this->session->set_flashdata('message', 'success|File berhasil di upload!');
                redirect('admin/media');
            } else {
                $this->session->set_flashdata('message', 'error|' . $this->upload->display_errors());
                redirect('admin/media');
            }
        }
    }

    public function uploadFile()
    {
        $uploadConfig = $this->Config_model->getUploadActive();

        if ($uploadConfig['over_write'] == 0) {
            $overwrite = false;
        } else {
            $overwrite = true;
        }
        if ($uploadConfig['file_ext_tolower'] == 0) {
            $toLower = false;
        } else {
            $toLower = true;
        }
        if ($uploadConfig['remove_spaces'] == 0) {
            $removeSpaces = false;
        } else {
            $removeSpaces = true;
        }

        $filename = $this->input->post('filename');
        $ext = $this->input->post('ext');
        $fullFilename = $filename . $ext;

        $fileType = explode('/', $_FILES['file']['type']);
        if ($fileType[0] == 'application') {
            $tipe = 'document';
        } else {
            $tipe = $fileType[0];
        }

        $direktori = './' . $uploadConfig['upload_path'] . '/' . $tipe;
        if (!file_exists($direktori)) {
            mkdir($direktori, 0777);
        }

        $config['upload_path'] = $direktori;
        $config['overwrite'] = $overwrite;
        $config['file_ext_tolower'] = $toLower;
        $config['max_size'] = $uploadConfig['max_size'];
        $config['remove_spaces'] = $removeSpaces;
        $config['allowed_types'] = $uploadConfig['allowed_types'];
        if ($filename != '') {
            $config['file_name'] = $fullFilename;
        } else if ($uploadConfig['file_name'] !== '') {
            $config['file_name'] = $uploadConfig['file_name'];
        }

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            return false;
        } else {
            $fileName = $this->upload->data('file_name');
            $location = base_url('assets/upload/') . $tipe . '/' . $fileName;
            $title = $_FILES['file']['name'];

            $data = [
                'title' => $title,
                'href' => $location,
                'type' => $this->upload->data('file_type'),
                'nama_file' => $fileName,
                'date_upload' => date('Y:m:d H:i:s', time())
            ];
            return $data;
        }
    }

    public function setPostFile()
    {
        $result = $this->uploadFile();
        if ($result) {
            $this->Upload_model->set($result);
            echo $result['href'];
        } else {
            echo 'error';
        }
    }

    public function deleteFile($id)
    {
        $data = $this->Upload_model->getById($id);
        $loc = $data['href'];
        $target = str_replace(base_url(), './', $loc);

        if (file_exists($target) == 1) {
            unlink($target);
        }

        if ($this->Upload_model->deleteById($id)) {
            $this->session->set_flashdata('message', 'success|File berhasil di hapus!');
            redirect('admin/media');
        }
    }

    public function system()
    {
        $activeConfig = $this->Config_model->getUploadActive();

        $data = [
            'title' => 'System',
            'sidebar' => 'system',
            'config' => $activeConfig
        ];

        $this->load->view('template/sbadmin/header', $data);
        $this->load->view('template/sbadmin/sidebar');
        $this->load->view('template/sbadmin/navbar', $this->navbarStatus());
        $this->load->view('admin/system');
        $this->load->view('template/sbadmin/footer');
        $this->session->unset_userdata('message');
    }

    public function setUploadConfig()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $direktori = htmlspecialchars($this->input->post('direktori'));
        $extension = htmlspecialchars($this->input->post('extension'));
        $ukuran = htmlspecialchars($this->input->post('ukuran'));
        $customFileName = htmlspecialchars($this->input->post('customFileName'));
        $fileName = htmlspecialchars($this->input->post('filename'));
        $toLower = htmlspecialchars($this->input->post('toLower'));
        $overwrite = htmlspecialchars($this->input->post('overwrite'));
        $encryptFile = htmlspecialchars($this->input->post('encryptFile'));
        $removeSpace = htmlspecialchars($this->input->post('removeSpace'));

        $data = [
            'upload_path' => $direktori,
            'allowed_types' => $extension,
            'file_name' => $fileName,
            'file_ext_tolower' => $toLower,
            'over_write' => $overwrite,
            'max_size' => $ukuran,
            'encrypt_name' => $encryptFile,
            'remove_spaces' => $removeSpace
        ];

        if ($this->Config_model->updateUploadConfig($data)) {
            $this->session->set_flashdata('message', 'success|Konfigurasi Upload File berhasil disimpan!');
            redirect('admin/system');
        }
    }

    public function homepage()
    {
        $data = [
            'title' => 'System',
            'sidebar' => 'system',
        ];

        $this->load->view('template/sbadmin/header', $data);
        $this->load->view('template/sbadmin/sidebar');
        $this->load->view('template/sbadmin/navbar', $this->navbarStatus());
        $this->load->view('admin/homepage');
        $this->load->view('template/sbadmin/footer');
        $this->session->unset_userdata('message');
    }
}
