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

    <style>
        @media print {
            .btn-sm {
                display: none;
            }
        }
    </style>

</head>

<body id="page-top">

    <div class="container">
        <a href="<?= base_url('layanan/kasir/selesai'); ?>" class="btn-sm btn-success btn-icon-split mt-2">
            <span class="icon text-white-200">
                <i class="fas fa-backward"></i>
            </span>
            <span class="text">Selesai</span>
        </a>
        <div class="row mb-5">
            <div class="col-md-12">
                <h1 class="text-center">KLINIK MAKMUR JAYA</h1>
            </div>
            <div class="col-md-12">
                <h5 class="text-center">TERIMA KASIH ANDA TELAH BEROBAT DIKLINIK KAMI</h5>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-2">
                <p><strong>Kode Kunjungan</strong></p>
            </div>
            <div class="col-md-2">
                <p><strong>:</strong> <?= $rekam_medis['kd_rekam_medis']; ?></p>
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-2">
                <p><strong>Tanggal Periksa</strong></p>
            </div>
            <div class="col-md-2">
                <p><strong>:</strong> <?= $rekam_medis['tgl_periksa']; ?></p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-2">
                <p><strong>Nama Pasien</strong></p>
            </div>
            <div class="col-md-2">
                <p><strong>:</strong> <?= $rekam_medis['nama_pasien']; ?></p>
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-2">
                <p><strong>Poli</strong></p>
            </div>
            <div class="col-md-2">
                <p><strong>:</strong> <?= $rekam_medis['nama_poli']; ?></p>
            </div>
        </div>
    </div>
    <hr>

    <input type="hidden" value="<?= $rekam_medis['id_rekam_medis']; ?>" name="id_rekam_medis">
    <div class="container mt-5">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Obat</th>
                    <th scope="col">Harga Obat</th>
                    <th scope="col">Qty</th>
                    <th scope="col" width="10%">jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pemesanan as $p) :  ?>
                    <tr>
                        <th scope="row">1</th>
                        <td><?= $p['nama_obat']; ?></td>
                        <td><?= number_format($p['harga_obat']); ?></td>
                        <td><?= $p['banyak_obat']; ?></td>
                        <td><?= number_format($p['biaya_obat']); ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4" class="text-right">Total Biaya Obat</td>
                    <td>
                        <?= number_format($total_biaya_obat); ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="text-right">Biaya Periksa</td>
                    <td>
                        <?= number_format($rekam_medis['biaya']); ?>
                    </td>
                </tr>
                <?php if ($rekam_medis['status_lab'] == 3) : ?>
                    <tr>
                        <td colspan="4" class="text-right">Biaya Lab</td>
                        <td>
                            <?= number_format($biaya_lab); ?>
                        </td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td colspan="4" class="text-right">Total Biaya Keseluruhan</td>
                    <td>
                        <?= number_format($total_harga); ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="text-right">Pembayaran</td>
                    <td>
                        <?= set_value('pembayaran'); ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="text-right">Kembalian</td>
                    <td>
                        <?= set_value('kembalian'); ?>
                    </td>
                </tr>
            </tbody>
        </table>
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

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>