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

  <!-- date picker -->
  <link href="<?= base_url('assets/'); ?>js/bootstrap-datepicker.css" rel="stylesheet">

  <link href="<?= base_url('assets/'); ?>js/sweetalert2.css" rel="stylesheet">
  <script src="<?= base_url('assets/'); ?>js/sweetalert2.all.min.js"></script>

  <!-- datepicker -->
  <link href="<?= base_url('assets/'); ?>css/jquery-ui.css" rel="stylesheet" type="text/css" />
  <script src="<?= base_url('assets/'); ?>js/jquery-1.12.1.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/jquery-ui.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/jquery.maskedinput.min.js"></script>
  <link href="<?= base_url('assets/'); ?>css/MonthPicker.min.css" rel="stylesheet">
  <script src="<?= base_url('assets/'); ?>js/MonthPicker.min.js"></script>

  <!-- year picker -->
  <link href="<?= base_url('assets/'); ?>css/yearpicker.css" rel="stylesheet">
  <script src="<?= base_url('assets/'); ?>js/yearpicker.js"></script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <i class="fas fa-clinic-medical"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Makmur Jaya</div>
        <input type="hidden" name="cek" id="cek" value="<?= $cek; ?>">
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('status') == 'pasien') : ?>

        <?php if ($this->session->userdata('level') == 1) : ?>
          <!-- Nav Item - Dashboard -->
          <li class="nav-item" id="dashboard">
            <a class="nav-link pb-0" href="<?= base_url('dashboard'); ?>">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span></a>
          </li>
        <?php endif; ?>


        <li class="nav-item">
          <a class="nav-link pb-0" href="<?= base_url('rekammedis'); ?>">
            <i class="fas fa-fw fa-book"></i>
            <span>Rekam Medis</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
      <?php endif; ?>

      <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) : ?>
        <!-- Heading -->
        <div class="sidebar-heading">
          Admin
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item" id="data_master">
          <a class="nav-link collapsed pb-0" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Master</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="<?= base_url('master/pasien'); ?>">Data Pasien</a>
              <?php if ($this->session->userdata('level') == 1) : ?>
                <a class="collapse-item" href="<?= base_url('master/doctor'); ?>">Data Dokter</a>
                <a class="collapse-item" href="<?= base_url('master/poli'); ?>">Data Poli</a>
                <a class="collapse-item" href="<?= base_url('master/obat'); ?>">Data Obat</a>
                <a class="collapse-item" href="<?= base_url('master/karyawan'); ?>">Data Karyawan</a>
                <a class="collapse-item" href="<?= base_url('master/masterlab'); ?>">Data Master Lab</a>
              <?php endif; ?>
            </div>
          </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
      <?php endif; ?>

      <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('status') == 'dokter') : ?>
        <!-- Heading -->
        <div class="sidebar-heading">
          Poli
        </div>

        <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 5) : ?>
          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item" id="poli_umum">
            <a class="nav-link pb-0" href="<?= base_url('poli/umum'); ?>">
              <i class="fas fa-fw fa-user-nurse"></i>
              <span>Poli Umum</span>
            </a>
          </li>
        <?php endif; ?>

        <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('leve') == 6) : ?>
          <li class="nav-item" id="poli_anak">
            <a class="nav-link pb-0" href="<?= base_url('poli/anak'); ?>">
              <i class="fas fa-fw fa-baby"></i>
              <span>Poli Anak</span></a>
          </li>
        <?php endif; ?>

        <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 7) : ?>
          <li class="nav-item" id="poli_gigi">
            <a class="nav-link pb-0" href="<?= base_url('poli/gigi'); ?>">
              <i class="fas fa-fw fa-tooth"></i>
              <span>Poli Gigi</span></a>
          </li>
        <?php endif; ?>

        <!-- Divider -->
        <hr class="sidebar-divider">
      <?php endif; ?>

      <?php if ($this->session->userdata('status') == 'admin') : ?>
        <!-- Heading -->
        <div class="sidebar-heading">
          Layanan
        </div>

        <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 4) : ?>
          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item" id="lab">
            <a class="nav-link pb-0" href="<?= base_url('layanan/laboratorium'); ?>">
              <i class="fas fa-fw fa-flask"></i>
              <span>Laboratorium</span></a>
          </li>
        <?php endif; ?>

        <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 3) : ?>
          <li class="nav-item" id="farmasi">
            <a class="nav-link pb-0" href="<?= base_url('layanan/farmasi'); ?>">
              <i class="fas fa-fw fa-capsules"></i>
              <span>Farmasi</span></a>
          </li>
        <?php endif; ?>

        <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) : ?>
          <li class="nav-item" id="pendaftaran">
            <a class="nav-link pb-0" href="<?= base_url('layanan/pendaftaran'); ?>">
              <i class="fas fa-fw fa-edit"></i>
              <span>Pendaftaran</span></a>
          </li>
        <?php endif; ?>
        <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 5) : ?>
          <li class="nav-item" id="kasir">
            <a class="nav-link pb-0" href="<?= base_url('layanan/kasir'); ?>">
              <i class="fas fa-fw fa-cash-register"></i>
              <span>Kasir</span></a>
          </li>
        <?php endif; ?>


        <hr class="sidebar-divider">
      <?php endif; ?>

      <div class="sidebar-heading">
        user
      </div>

      <!-- Nav Item - Charts -->
      <li class="nav-item" id="profile">
        <a class="nav-link pb-0" href="<?= base_url('user'); ?>">
          <i class="fas fa-fw fa-user"></i>
          <span>Profile</span>
        </a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item" id="edit_profile">
        <a class="nav-link pb-0" href="<?= base_url('user/edit'); ?>">
          <i class="fas fa-fw fa-user-edit"></i>
          <span>Edit Profile</span>
        </a>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('login/logout'); ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span>
        </a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('nama_user'); ?></span>
                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/'); ?><?= $this->session->userdata('img'); ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url('user'); ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="<?= base_url('user/edit'); ?>">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Edit Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <button type="button" class="btn-sm btn-success btn-icon-split mt-2" data-url="<?= base_url('dashboard/backupdata'); ?>" id="backup">
              <span class="icon text-white-200">
                <i class="fas fa-save"></i>
              </span>
              <span class="text">Backup Data</span>
            </button>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Poli Umum</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="poli-umum"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-nurse fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Poli Gigi</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="poli-gigi"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-tooth fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Poli Anak</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="poli-anak"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-baby fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Lab</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="labor"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-flask fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4" style="height: 460px;">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <div class="row">
                    <div class="col-md-12">
                      <h6 class="m-0 font-weight-bold text-primary mb-2">Data Pasien / Tahun</h6>
                    </div>
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-xl-9">
                          <input type="text" name="" id="input_tahun" class="form-control" value="<?php echo date('Y') ?>">
                        </div>
                        <div class="col-xl-3">
                          <button class="btn btn-outline-success" id="button_tahun">Cari</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4 " style="height: 460px;">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <div class="row">
                    <div class="col-md-12">
                      <h6 class="m-0 font-weight-bold text-primary mb-2">Data Pasien / Bulan</h6>
                    </div>
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-xl-9">
                          <input type="text" name="" id="input_bulanan" class="form-control" value="<?php echo date('Y-m'); ?>">
                        </div>
                        <div class="col-xl-3">
                          <button class="btn btn-outline-success" id="button_bulanan">Cari</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="bulanan"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Umum = <span id="bulanan_umum"></span>
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Gigi = <span id="bulanan_gigi"></span>
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Anak = <span id="bulanan_anak"></span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Ruhyat Ma'rullah <?= date('Y') ?></span>
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

  <input type="hidden" value="<?= base_url(); ?>" id="url">
  <!-- Bootstrap core JavaScript-->
  <!-- <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script> -->
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

  <!-- date picker -->
  <script src="<?= base_url('assets/'); ?>js/bootstrap-datepicker.js"></script>
  <script>
    let cek = $('#cek').val();
    $('#' + cek).addClass('active');
  </script>
  <script>
    $('document').ready(function() {

      // $('#input_bulanan').datepicker({
      //   format: "yyyy-mm",
      //   autoclose: true,
      //   todayHighlight: true,
      // });

      $('#input_bulanan').MonthPicker({
        Button: false,
        MonthFormat: 'yy-mm',
      });

      function bulanan(tanggal) {
        let url = $('#url').val();
        $.ajax({
          url: url + 'dashboard/bulanan/',
          data: {
            tanggal: tanggal
          },
          dataType: 'json',
          success: function(data) {
            $('#bulanan_umum').html(data[0]);
            $('#bulanan_gigi').html(data[1]);
            $('#bulanan_anak').html(data[2]);

            let cek = data[0] + data[1] + data[2];

            // Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#858796';

            // Pie Chart Example
            var ctx = document.getElementById("bulanan");

            if (cek != 0) {
              var bulanan = new Chart(ctx, {
                type: 'doughnut',
                data: {
                  labels: ["Umum", "Gigi", "Anak"],
                  datasets: [{
                    data: [data[0], data[1], data[2]],
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                  }],
                },
                options: {
                  maintainAspectRatio: false,
                  tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                  },
                  legend: {
                    display: false
                  },
                  cutoutPercentage: 60,
                },
              });
            } else {
              var bulanan = new Chart(ctx, {
                type: 'doughnut',
                data: {
                  labels: ["Tidak ada"],
                  datasets: [{
                    data: [true],
                    backgroundColor: ['#2c9fbj'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                  }],
                },
                options: {
                  maintainAspectRatio: false,
                  tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                  },
                  legend: {
                    display: false
                  },
                  cutoutPercentage: 60,
                },
              });
            }

          }
        });
      };

      let tanggal = $('#input_bulanan').val();
      bulanan(tanggal);

      $('#button_bulanan').on('click', function() {
        tanggal = $('#input_bulanan').val();
        if (tanggal != '') {
          console.log('ok');
          bulanan(tanggal);
        } else {
          Swal.fire({
            title: 'Anda Belum Menginput Tanggal',
            icon: 'info',
          });
        }
      })

    });
  </script>
  <script>
    $('document').ready(function() {
      $('#input_tahun').yearpicker();

      function tahunan(tanggal) {
        let url = $('#url').val();
        $.ajax({
          url: url + 'dashboard/tahunan/',
          data: {
            tanggal: tanggal
          },
          dataType: 'json',
          success: function(data) {

            // Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#858796';

            function number_format(number, decimals, dec_point, thousands_sep) {
              // *     example: number_format(1234.56, 2, ',', ' ');
              // *     return: '1 234,56'
              number = (number + '').replace(',', '').replace(' ', '');
              var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                  var k = Math.pow(10, prec);
                  return '' + Math.round(n * k) / k;
                };
              // Fix for IE parseFloat(0.55).toFixed(0) = 0;
              s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
              if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
              }
              if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
              }
              return s.join(dec);
            }

            // Area Chart Example
            var ctx = document.getElementById("myAreaChart");
            var myLineChart = new Chart(ctx, {
              type: 'line',
              data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                  label: "Pasien",
                  lineTension: 0.3,
                  backgroundColor: "rgba(78, 115, 223, 0.05)",
                  borderColor: "rgba(78, 115, 223, 1)",
                  pointRadius: 3,
                  pointBackgroundColor: "rgba(78, 115, 223, 1)",
                  pointBorderColor: "rgba(78, 115, 223, 1)",
                  pointHoverRadius: 3,
                  pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                  pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                  pointHitRadius: 10,
                  pointBorderWidth: 2,
                  data: [
                    data.januari,
                    data.februari,
                    data.maret,
                    data.april,
                    data.mei,
                    data.juni,
                    data.juli,
                    data.agustus,
                    data.september,
                    data.oktober,
                    data.november,
                    data.desember
                  ],
                }],
              },
              options: {
                maintainAspectRatio: false,
                layout: {
                  padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                  }
                },
                scales: {
                  xAxes: [{
                    time: {
                      unit: 'date'
                    },
                    gridLines: {
                      display: false,
                      drawBorder: false
                    },
                    ticks: {
                      maxTicksLimit: 7
                    }
                  }],
                  yAxes: [{
                    ticks: {
                      maxTicksLimit: 5,
                      padding: 10,
                      // Include a dollar sign in the ticks
                      callback: function(value, index, values) {
                        return number_format(value);
                      }
                    },
                    gridLines: {
                      color: "rgb(234, 236, 244)",
                      zeroLineColor: "rgb(234, 236, 244)",
                      drawBorder: false,
                      borderDash: [2],
                      zeroLineBorderDash: [2]
                    }
                  }],
                },
                legend: {
                  display: false
                },
                tooltips: {
                  backgroundColor: "rgb(255,255,255)",
                  bodyFontColor: "#858796",
                  titleMarginBottom: 10,
                  titleFontColor: '#6e707e',
                  titleFontSize: 14,
                  borderColor: '#dddfeb',
                  borderWidth: 1,
                  xPadding: 15,
                  yPadding: 15,
                  displayColors: false,
                  intersect: false,
                  mode: 'index',
                  caretPadding: 10,
                  callbacks: {
                    label: function(tooltipItem, chart) {
                      var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                      return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                    }
                  }
                }
              }
            });
          }
        });
      }

      let tanggal = $('#input_tahun').val();
      tahunan(tanggal);

      $('#button_tahun').on('click', function() {
        tanggal = $('#input_tahun').val();
        if (tanggal != '') {
          console.log('ok');
          tahunan(tanggal);
        } else {
          Swal.fire({
            title: 'Anda Belum Menginput Tanggal',
            icon: 'info',
          });
        }

      })

    });
  </script>
  <script>
    $('document').ready(function() {
      let url = $('#url').val();

      function poliUmum() {
        $.ajax({
          url: url + 'dashboard/harian/',
          data: {
            cek: 'poli-umum'
          },
          dataType: 'json',
          success: function(data) {
            $('#poli-umum').html(data);
          }
        });
      }

      function poliGigi() {
        $.ajax({
          url: url + 'dashboard/harian/',
          data: {
            cek: 'poli-gigi'
          },
          dataType: 'json',
          success: function(data) {
            $('#poli-gigi').html(data);
          }
        });
      }

      function poliAnak() {
        $.ajax({
          url: url + 'dashboard/harian/',
          data: {
            cek: 'poli-anak'
          },
          dataType: 'json',
          success: function(data) {
            $('#poli-anak').html(data);
          }
        });
      }

      function lab() {
        $.ajax({
          url: url + 'dashboard/harian/',
          data: {
            cek: 'lab'
          },
          dataType: 'json',
          success: function(data) {
            $('#labor').html(data);
          }
        });
      }

      function ambilData() {
        poliUmum();
        poliGigi();
        poliAnak();
        lab();

        setTimeout(() => {
          ambilData();
        }, 20000);
      }

      ambilData();

      $('#backup').on('click', function(e) {

        const href = $(this).data("url");

        Swal.fire({
          title: 'Apakah anda ingin membackup data?',
          icon: 'info',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Backup!'
        }).then((result) => {
          if (result.value) {
            document.location.href = href;
          }
        });
      });

    });
  </script>



  <!-- Page level custom scripts -->
  <!-- <script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script> -->
  <!-- <script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script> -->

</body>

</html>