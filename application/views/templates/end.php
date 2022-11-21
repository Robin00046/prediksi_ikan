<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
<!-- Template Main JS File -->
<!-- Vendor JS Files -->
<script src="<?= base_url('assets/vendor/apexcharts/apexcharts.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/chart.js/chart.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/echarts/echarts.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/quill/quill.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/tinymce/tinymce.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/php-email-form/validate.js') ?>"></script>
<script src="<?= base_url('assets/js/main.js') ?>"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>
<script>
    function nilai_rata_rata() {
        var rata_rata = 0;
        $(".hitung").each(function() {
            var get_textbox_value = $(this).val();

            if ($.isNumeric(get_textbox_value)) {
                rata_rata += parseFloat(get_textbox_value);
            }
        });
        var n = rata_rata / $(".hitung").length;
        var pembulatan_nilai_rata_rata = n.toFixed(0);
        $("#n_rata_rata").val(pembulatan_nilai_rata_rata)
    }

    $(document).ready(function() {
        $(".hitung").keyup(function() {
            nilai_rata_rata();
        });
    });
    nilai_rata_rata();
</script>
</body>

</html>