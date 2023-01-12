</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container-fluid my-auto">
        <div class="copyright text-center my-auto">
            <span><a href="https://medigital.dev"><img src="<?= base_url('dist/images/medigitaldev-green.png'); ?>" alt="Logo medigital.dev" class="img-thumbnail align-middle" style="height: 30px;"></a> | webSchool</span>
        </div>
    </div>
</footer>
</div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url(); ?>logout">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<!-- select2 -->
<script src="<?= base_url('plugins/select2/js/select2.min.js'); ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('plugins/jquery-easing/jquery.easing.min.js'); ?>"></script>

<!-- Page level plugins -->
<script src="<?= base_url('plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('plugins/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('plugins/sbadmin/js/sb-admin-2.min.js'); ?>"></script>

<!-- Summernote scripts -->
<script src="<?= base_url('plugins/summernote/'); ?>summernote-bs4.js"></script>
<script src="<?= base_url('plugins/summernote/plugin/'); ?>summernote-files.js"></script>
<script src="<?= base_url('plugins/summernote/'); ?>lang/summernote-id-ID.js"></script>

<!-- bs-custom-file-input -->
<script src="<?= base_url('plugins/bs-custom-file-input/'); ?>bs-custom-file-input.min.js"></script>

<!-- Sweetalert2 -->
<script src="<?= base_url('plugins/sweetalert2/'); ?>sweetalert2.min.js"></script>
<script src="<?= base_url('dist/js/my-sweetalert.js'); ?>"></script>

<!-- lightbox -->
<!-- <script src="<?= base_url('plugins/ekko-lightbox/'); ?>ekko-lightbox.min.js"></script> -->

<!-- functions -->
<script src="<?= base_url('dist/js/functions.js'); ?>"></script>

<script>
    $(document).ready(function() {
        $('.defaultSelect2').select2({
            theme: 'bootstrap4',
        });
        $('.singleTagsSelect2').select2({
            theme: 'bootstrap4',
            tags: true
        });
        $('.multiTagsSelect2').select2({
            tags: true,
            tokenSeparators: [' ']
        });

        const page = $('#flash-data').data('flashdata');
        const message = $('#flash-message').data('flashdata');

        if (message) {
            var fireMessage = message.split('|');
            fireNotif(fireMessage[0], fireMessage[1]);
        }

        if (page == 'addPost') {
            post();
        } else if (page == 'kategori') {
            kategori();
        } else if (page == 'tag') {
            tag();
        } else if (page == 'page') {
            halaman();
        } else if (page == 'identitas') {
            identitas();
        } else if (page == 'user') {
            user();
        } else if (page == 'media') {
            media();
        } else if (page == 'editPost') {
            editPost();
        } else if (page == 'dashboard') {
            dashboard();
        } else if (page == 'komentar') {
            komentar();
        } else if (page == 'pesan') {
            pesan();
        } else if (page == 'daftarpost') {
            daftarpost();
        } else if (page == 'system') {
            system();
        }
    })
</script>

<!-- function -->
<script>
    function progressHandlingFunction(e) {
        if (e.lengthComputable) {
            let ukuran = e.total / 1024;
            let upload = e.loaded / 1024;
            let progres = e.loaded / e.total * 100;
            // $('.progress-bar').addClass('width', progres.toFixed() + '%');
            $('.progress-bar').css('width', progres.toFixed() + '%').text(progres.toFixed() + '%');
            $('.proses').text(upload.toFixed() + ' Kb / ' + ukuran.toFixed() + ' Kb');

            //Reset progress on complete
            if (e.loaded === e.total) {
                fireNotif('success', 'Upload selesai');
            }
        }
    }

    function uploadFile(file) {
        let data = new FormData();
        data.append("file", file);
        $.ajax({
            data: data,
            type: "POST",
            url: "<?= base_url('admin/setPostFile'); ?>", //Your own back-end uploader
            cache: false,
            contentType: false,
            processData: false,
            xhr: function() { //Handle progress upload
                let myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) myXhr.upload.addEventListener('progress', progressHandlingFunction, false);
                Swal.fire({
                    width: '25rem',
                    title: 'Mengunggah file',
                    icon: 'info',
                    html: '<div class="progress mb-3"><div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div></div><div class="text-center small proses"></div>',
                    showConfirmButton: false,
                    showCancelButton: true,
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.cancel) {
                        fireNotif('error', 'Upload canceled!');
                        myXhr.abort();
                    }
                });
                return myXhr;
            },
            success: function(reponse) {
                if (reponse == 'error') {
                    fireNotif('error', 'Berkas terlalu besar!');
                } else {
                    fireNotif('success', 'Upload berhasil!');
                    let listMimeImg = ['image/png', 'image/jpeg', 'image/jpg', 'image/webp', 'image/gif', 'image/svg'];
                    let listMimeAudio = ['audio/mpeg', 'audio/ogg'];
                    let listMimeVideo = ['video/mpeg', 'video/mp4', 'video/webm'];
                    let elem;

                    if (listMimeImg.indexOf(file.type) > -1) {
                        //Picture
                        $('#summernote').summernote('insertImage', reponse);
                    } else if (listMimeAudio.indexOf(file.type) > -1) {
                        //Audio
                        elem = document.createElement("audio");
                        elem.setAttribute("src", reponse);
                        elem.setAttribute("controls", "controls");
                        elem.setAttribute("preload", "metadata");
                        $('#summernote').summernote('insertNode', elem);
                    } else if (listMimeVideo.indexOf(file.type) > -1) {
                        //Video
                        elem = document.createElement("video");
                        elem.setAttribute("src", reponse);
                        elem.setAttribute("controls", "controls");
                        elem.setAttribute("preload", "metadata");
                        $('#summernote').summernote('insertNode', elem);
                    } else {
                        //Other file type
                        elem = document.createElement("a");
                        let linkText = document.createTextNode(file.name);
                        elem.appendChild(linkText);
                        elem.title = file.name;
                        elem.href = reponse;
                        elem.target = '_blank';
                        elem.className = 'text-decoration-none';
                        $('#summernote').summernote('insertNode', elem);
                    }
                }
            },
            fail: function(error) {
                console.log(error);
            }
        });
    }
</script>

</body>

</html>