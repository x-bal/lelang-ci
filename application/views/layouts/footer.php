</div>

</div>
</div>
<script src="<?= base_url('assets') ?>/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url('assets') ?>/js/bootstrap.bundle.min.js"></script>

<!-- Toastify -->
<script src="<?= base_url('assets') ?>/vendors/toastify/toastify.js"></script>
<!-- Fontawesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js" integrity="sha512-UwcC/iaz5ziHX7V6LjSKaXgCuRRqbTp1QHpbOJ4l1nw2/boCfZ2KlFIqBUA/uRVF0onbREnY9do8rM/uT/ilqw==" crossorigin="anonymous"></script>

<script src="<?= base_url('assets') ?>/js/pages/dashboard.js"></script>

<script src="<?= base_url('assets') ?>/js/main.js"></script>

<?php if($this->session->flashdata('success')) : ?>
    <script>
        Toastify({
        text: "<?= $this->session->flashdata('success') ?>",
        duration: 3000
    }).showToast();
    </script>
<?php endif; ?>

<?php if($this->session->flashdata('failed')) : ?>
    <script>
        Toastify({
        text: "<?= $this->session->flashdata('failed') ?>",
        duration: 3000
    }).showToast();
    </script>
<?php endif; ?>
</body>

</html>