<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $judul; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <!-- datatables -->
    <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- popup pesan -->
    <link href="<?= base_url('assets/'); ?>js/sweetalert2.css" rel="stylesheet">
    <!-- select2 -->
    <link href="<?= base_url('assets/'); ?>css/select2.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>css/select2-bootstrap4.css" rel="stylesheet">
    <!-- datepicker -->
    <link href="<?= base_url('assets/'); ?>js/bootstrap-datepicker.css" rel="stylesheet">
    <script src="<?= base_url('assets/'); ?>js/jquery-3.4.1.min.js"></script>

</head>

<body id="page-top">
    <h2 class="text-center mb-5">Rekam Medis</h2>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 mt-3">
                Nama Pasien
            </div>
            <div class="col-md-2 mt-3">
                :<?= $rekam_medis['nama_pasien']; ?>
            </div>
            <div class="col-md-2 mt-3">
                No identitas
            </div>
            <div class="col-md-2 mt-3">
                :<?= $rekam_medis['no_identitas']; ?>
            </div>
            <div class="col-md-2 mt-3">
                No Telphon
            </div>
            <div class="col-md-2 mt-3">
                :<?= $rekam_medis['no_telp']; ?>
            </div>
            <div class="col-md-2 mt-3">
                Tanggal Lahir
            </div>
            <div class="col-md-2 mt-3">
                :<?= $rekam_medis['tgl_lahir']; ?>
            </div>
            <div class="col-md-2 mt-3">
                Jenis Kelamin
            </div>
            <div class="col-md-2 mt-3">
                :<?= $rekam_medis['jenis_kelamin']; ?>
            </div>
            <div class="col-md-2 mt-3">
                Alamat
            </div>
            <div class="col-md-2 mt-3">
                :<?= $rekam_medis['alamat']; ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-2 mt-3">
                Kode Rekam Medis
            </div>
            <div class="col-md-2 mt-3">
                :<?= $rekam_medis['kd_rekam_medis']; ?>
            </div>
            <div class="col-md-2 mt-3">
                Nama Dokter
            </div>
            <div class="col-md-2 mt-3">
                :<?= $rekam_medis['nama_dokter']; ?>
            </div>
            <div class="col-md-2 mt-3">
                Nama Poli
            </div>
            <div class="col-md-2 mt-3">
                :<?= $rekam_medis['nama_poli']; ?>
            </div>
            <div class="col-md-2 mt-3">
                Keluhan
            </div>
            <div class="col-md-4 mt-3">
                :<?= $rekam_medis['keluhan']; ?>
            </div>
            <div class="col-md-2 mt-3">
                Diagnosa
            </div>
            <div class="col-md-4 mt-3">
                :<?= $rekam_medis['diagnosa']; ?>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Obat</th>
                    <th scope="col">Banyak Obat</th>
                    <th scope="col">Pemakaian</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pemesanan_obat as $po) : ?>
                    <tr>
                        <th scope="row">1</th>
                        <td><?= $po['nama_obat']; ?></td>
                        <td><?= $po['banyak_obat']; ?></td>
                        <td><?= $po['cara_pemakaian']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Footer -->

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

    <!-- tambahan -->
    <script src="<?= base_url('assets/'); ?>js/select2.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/ruhyat/ruhyat.js"></script>

    <!-- buat sendiri -->
    <script src="<?= base_url('assets/'); ?>js/ruhyat/pendaftaran.js"></script>

    <!-- datepicker -->
    <script src="<?= base_url('assets/'); ?>js/bootstrap-datepicker.js"></script>

    <script>
        let cek = $('#cek').val();
        $('#' + cek).addClass('active');
    </script>
</body>

</html>