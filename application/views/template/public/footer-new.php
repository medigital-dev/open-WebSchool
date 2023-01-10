<div class="container border-top">
    <footer class="pt-5">
        <div class="d-flex justify-content-between pt-4 my-2 border-top">
            <p class="text-muted">&copy; 2022-<?= date('Y', time()); ?> <a href="<?= base_url(); ?>" class="text-muted text-decoration-none"><?= ($identitas) ? $identitas[0]['nama'] : 'WebSchool'; ?></a></p>
            <a href="https://medigital.dev/webschool/" target="_blank" class="text-muted text-decoration-none">WebSchool v1.1.0</a>
        </div>
    </footer>
</div>

<!-- jquery -->
<script src="<?= base_url('plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap Bundle with Popper -->
<script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- Functions -->
<script src="<?= base_url('dist/js/functions.js'); ?>"></script>

<script>
    runDateNow();
    $('#formCari').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            const keyword = $('#keyword');
            if (keyword.val() == '') {
                keyword.addClass('is-invalid');
                return;
            } else {
                keyword.removeClass('is-invalid');
                $(this).submit();
            }
            return false;
        }
    });
</script>

</body>

</html>