</div>

</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="<?= base_url('assets') ?>/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url('assets') ?>/js/bootstrap.bundle.min.js"></script>

<!-- Toastify -->
<script src="<?= base_url('assets') ?>/vendors/toastify/toastify.js"></script>
<!-- Fontawesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js" integrity="sha512-UwcC/iaz5ziHX7V6LjSKaXgCuRRqbTp1QHpbOJ4l1nw2/boCfZ2KlFIqBUA/uRVF0onbREnY9do8rM/uT/ilqw==" crossorigin="anonymous"></script>

<!-- Datatable -->
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap.min.js"></script>

<script src="<?= base_url('assets') ?>/js/pages/dashboard.js"></script>

<script src="<?= base_url('assets') ?>/js/main.js"></script>
<script>
    $(document).ready(function() {
        var table = $('.table').DataTable({
            responsive: {
                details: {
                    type: 'column'
                }
            },
            columnDefs: [{
                    className: 'dtr-control',
                    responsivePriority: 1,
                    targets: 0
                },
                {
                    responsivePriority: 2,
                    targets: 1
                }
            ]
        });

        new $.fn.dataTable.FixedHeader(table);
    });
</script>
<?php if ($this->session->flashdata('success')) : ?>
    <script>
        Toastify({
            text: "<?= $this->session->flashdata('success') ?>",
            duration: 3000
        }).showToast();
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('failed')) : ?>
    <script>
        Toastify({
            text: "<?= $this->session->flashdata('failed') ?>",
            duration: 3000
        }).showToast();
    </script>
<?php endif; ?>
</body>

</html>