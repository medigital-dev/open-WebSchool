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
        function identitas() {
            bsCustomFileInput.init();
            $('#file').change(function() {
                const file = document.querySelector('#file');
                const imgPreview = document.querySelector('.img-preview');
                const fileFoto = new FileReader();

                fileFoto.readAsDataURL(file.files[0]);
                fileFoto.onload = function(e) {
                    imgPreview.src = e.target.result;
                }
            });
            $('.deleteMedsos').click(function(e) {
                e.preventDefault();
                const url = $(this).attr('href');

                Swal.fire({
                    title: 'Hapus data media sosial ini?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Hapus',
                    denyButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location.href = url;
                    }
                })
            });
        }

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

</script>

</body>

</html>