<footer class="py-3 bg-dark text-light">
    <div class="container px-4 text-center">
        <p class="m-0 text-white fs-6 fw-light">&copy; <?= date('Y', time()); ?> | Created and Developed by <a href="https://me-digital.net" target="_blank" class="text-decoration-none"><img src="<?= base_url('assets/global/images/me-digital.png'); ?>" alt="Logo me-Digital.net" title="me-Digital.net" height="30"></a></p>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- Core theme JS-->
<script src="<?= base_url(); ?>assets/sbpages/js/scripts.js"></script>
<!-- lightbox -->
<script src="<?= base_url('assets/lightbox/'); ?>index.bundle.min.js"></script>
<!-- myJS -->
<script>
    $(document).ready(function() {
        document.querySelectorAll('.my-lightbox-toggle').forEach((el) => el.addEventListener('click', (e) => {
            e.preventDefault();
            const lightbox = new Lightbox(el);
            lightbox.show();
        }));

        const keyword = $('#data-keyword').data('flashdata');
        if (keyword) {
            $('#keyword').val(keyword);
        }

        $('#kirim').click(function(e) {
            const comment = $('#komentar');
            e.preventDefault();
            if (comment.val() == '') {
                comment.addClass('is-invalid');
                return;
            }

            if (confirm('Apakah ada yakin mengirim komentar anda? Jika sudah terkirim maka tidak akan bisa diedit maupun di hapus.')) {
                $('#form').submit();
            } else {
                return;
            }
        })
    });

    function showMenu(data) {
        $(data).dropdown('toggle');
    }

    function balasKomentar(id) {
        $('#divInputName').addClass('col-sm-4').removeClass('col-sm-5');
        $('#idKomentar').addClass('col-sm-1').html('<div class="form-floating mb-2"><input type="text" class="form-control" id="idKomentar" name="idKomentar" value="' + id + '" placeholder="Nama anda"><label for="idKomentar">ID</label></div>');
        window.location.href = '#form';
    }
</script>
</body>

</html>