<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Ruhyat Ma'rullah <?php echo date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
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
                <a class="btn btn-primary" href="<?= base_url('login/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script> -->

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- data tables -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- datepicker -->


<!-- <script src="<?= base_url('assets/'); ?>js/ruhyat/ruhyat.js"></script> -->

<!-- buat sendiri -->
<script src="<?= base_url('assets/'); ?>js/ruhyat/pendaftaran.js"></script>

<!-- datepicker -->
<script src="<?= base_url('assets/'); ?>js/bootstrap-datepicker.js"></script>

<script>
    $('.custom-file-input').on('change', function() {
        let filename = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(filename);
    })


    let cek = $('#cek').val();
    $('#' + cek).addClass('active');

    /*data table*/
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });

    /*popup pesan*/
    const flashdata = $('.flash-data').data('flashdata');
    const switch_alert = $('#switch').val();

    if (flashdata) {
        Swal.fire({
            title: switch_alert,
            text: flashdata,
            icon: 'success'
        });
    };

    $('.tombol-hapus').on('click', function(e) {

        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: switch_alert + " akan dihapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus Data!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        });
    });

    /*untuk format tanggal*/
    $(document).ready(function() {
        $("#tgl_lahir").datepicker({
            format: "yyyy-mm-dd",
            useCurrent: false
        });
    });
</script>
</body>

</html>