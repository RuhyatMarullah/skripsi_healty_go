<div class="container-fluid">
    <div class="flash" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="pesan" data-pesan="<?= $this->session->flashdata('pesan'); ?>"></div>
    <div class="row">
        <div class="col-md-2">
            <p><strong>Kode Kunjungan</strong></p>
        </div>
        <div class="col-md-2">
            <p><strong>:</strong> <?= $rekam_medis['kd_rekam_medis']; ?></p>
        </div>
        <div class="col-md-2">
            <p><strong>Nama Pasien</strong></p>
        </div>
        <div class="col-md-2">
            <p><strong>:</strong> <?= $rekam_medis['nama_pasien']; ?></p>
        </div>
        <div class="col-md-2">
            <p><strong>No Identitas</strong></p>
        </div>
        <div class="col-md-2">
            <p><strong>:</strong> <?= $rekam_medis['no_identitas']; ?></p>
        </div>
        <div class="col-md-2">
            <p><strong>No Telpon</strong></p>
        </div>
        <div class="col-md-2">
            <p><strong>:</strong> <?= $rekam_medis['no_telp']; ?></p>
        </div>
        <div class="col-md-2">
            <p><strong>Jenis Kelamin</strong></p>
        </div>
        <div class="col-md-2">
            <p><strong>:</strong> <?= $rekam_medis['jenis_kelamin']; ?></p>
        </div>
        <div class="col-md-2">
            <p><strong>Alamat</strong></p>
        </div>
        <div class="col-md-2">
            <p><strong>:</strong> <?= $rekam_medis['alamat']; ?></p>
        </div>
        <div class="col-md-2">
            <p><strong>Document Rekam Medis</strong></p>
        </div>
        <div class="col-md-2">
            : <button type="button" class="btn-sm btn-success btn-icon-split" data-toggle="modal" data-target="#exampleModalCenter">
                <span class="icon text-white-200">
                    <i class="fas fa-book"></i>
                </span>
            </button>
        </div>
        <div class="col-md-2">
            <p><strong>Laboratorium</strong></p>
        </div>
        <div class="col-md-2">
            <p><strong>:</strong>
                <?php if ($rekam_medis['status_lab'] == 1) : ?>
                    None
                <?php elseif ($rekam_medis['status_lab'] == 2) : ?>
                    Proses
                <?php elseif ($rekam_medis['status_lab'] == 3) : ?>
                    <a href="#" class="btn-sm btn-info btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-info-circle"></i>
                        </span>
                        <span class="text">View</span>
                    </a>
                <?php endif; ?>
            </p>
        </div>
    </div>
</div>
<hr>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <p><strong>Keluhan</strong></p>

        </div>
        <div class="col-md-4">
            <p><strong>:</strong> <?= $rekam_medis['keluhan']; ?></p>
        </div>
        <div class="col-md-2">
            <p><strong>Diagnosa</strong></p>
        </div>
        <div class="col-md-4">
            <p><strong>:</strong> <?= $rekam_medis['diagnosa']; ?></p>
        </div>
    </div>
</div>
<!-- pemesanan obat -->
<form action="<?= base_url('pemesanan_obat/tambahUmum'); ?>" method="POST">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 mt-3">
                <div class="form-group">
                    <label for="kd_obat">Nama Obat</label>
                    <input type="hidden" name="id_rekam_medis" value="<?= $rekam_medis['id_rekam_medis']; ?>">
                    <input type="hidden" name="kd_rekam_medis" value="<?= $rekam_medis['kd_rekam_medis']; ?>">
                    <select class="form-control <?php if (form_error('kd_obat')) { ?>
                                is-invalid
                            <?php  } ?>" id="kd_obat" name="kd_obat" required>
                        <option value="">--- Nama Obat ---</option>
                        <?php foreach ($obat as $p) : ?>
                            <?php if ($p['kd_obat'] == set_value('kd_obat')) : ?>
                                <option value="<?= $p['kd_obat']; ?>" selected><?= $p['nama_obat']; ?></option>
                            <?php else : ?>
                                <option value="<?= $p['kd_obat']; ?>"><?= $p['nama_obat']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-2 mt-3">
                <div class="form-group">
                    <label for="banyak_obat">Banyak Obat</label>
                    <input type="text" id="banyak_obat" class="form-control <?php if (form_error('banyak_obat')) { ?>
                        is-invalid
                    <?php  } ?>" name="banyak_obat" value="<?= set_value('banyak_obat'); ?>" required>
                    <?= form_error('banyak_obat', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-2 mt-3">
                <div class="form-group">
                    <label for="penggunaan">Penggunaan /hari</label>
                    <input type="text" id="penggunaan" class="form-control <?php if (form_error('penggunaan')) { ?>
                        is-invalid
                    <?php  } ?>" name="penggunaan" value="<?= set_value('penggunaan'); ?>" required>
                    <?= form_error('penggunaan', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-2 mt-3">
                <div class="form-group">
                    <label for="formControlRange">Di Minum</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status1" value="Sesudah Makan" required>
                        <label class="form-check-label" for="status1">
                            Sesudah Makan
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status2" value="Sebelum Makan" required>
                        <label class="form-check-label" for="status2">
                            Sebelum Makan
                        </label>
                    </div>
                    <?= form_error('status', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md- mt-4">
                <div class="form-group">
                    <label for="alamat"></label>
                    <button type="submit" class="btn btn-primary form-control" name="tambah">&#10010</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col mt-3">
            <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pemesanan Obat</h6>
                    <form action="<?= base_url('poli/umum'); ?>" method="post">
                        <input type="hidden" name="lab" value="<?= $rekam_medis['status_lab']; ?>">
                        <input type="hidden" name="id_rekam_medis" value="<?= $rekam_medis['id_rekam_medis']; ?>">
                        <input type="hidden" name="kd_rekam_medis" value="<?= $rekam_medis['kd_rekam_medis']; ?>">
                        <button type="submit" class="btn-sm btn-success btn-icon-split mt-2">
                            <span class="icon text-white-200">
                                <i class="fas fa-save"></i>
                            </span>
                            <span class="text">Save</span>
                        </button>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Obat</th>
                                    <th>Nama Obat</th>
                                    <th>Banyak Obat</th>
                                    <th>Cara Pemakaian</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($pemesanan as $row) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $row['kd_obat']; ?></td>
                                        <td><?= $row['nama_obat']; ?></td>
                                        <td><?= $row['banyak_obat']; ?></td>
                                        <td><?= $row['cara_pemakaian']; ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>pemesanan_obat/hapusUmum/<?= $row['id_resep']; ?>/<?= $rekam_medis['id_rekam_medis']; ?>" class="btn-sm btn-danger btn-icon-split">
                                                <span class="icon text-white-200">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Delete</span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-xl" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Data Rekam Medis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered" width="100%" cellspacing="0" id="tb_rekam_medis">
                    <thead>
                        <tr>
                            <th>Kode Rekam Medis</th>
                            <th>Kode Pasien</th>
                            <th>Nama Pasien</th>
                            <th>Poli</th>
                            <th>Tanggal Periksa</th>
                            <th>Laboratorium</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#tb_rekam_medis').dataTable({
            "serverside": true,
            "processing": true,
            "ajax": {
                "type": "GET",
                "url": "<?= base_url('master/pasien/getRekamMedis'); ?>",
                "data": {
                    "kd_pasien": "<?= $rekam_medis['kd_pasien']; ?>",
                    "kd_poli": "<?= $rekam_medis['kd_poli']; ?>"
                }
            },

            "order": [
                [4, "desc"]
            ]
        });
    });

    let flash = $('.flash').data('flashdata');
    console.log(flash);
    let pesan = $('.pesan').data('pesan');
    if (flash == 'gagal') {
        Swal.fire({
            title: 'Obat Gagal Ditambahkan',
            text: pesan,
            icon: 'error'
        });
    } else if (flash == 'berhasil') {
        Swal.fire({
            title: 'Obat Berhasil Ditambahkan',
            icon: 'success',
            showConfirmButton: false,
            timer: 1000
        });
    } else if (flash == 'hapus') {
        Swal.fire({
            title: 'Pemesanan Obat Berhasil Dihapus',
            icon: 'success',
            showConfirmButton: false,
            timer: 1000
        });
    } else if (flash == 'step2_gagal') {
        Swal.fire({
            title: 'Anda Belum Menulis Resep Obat',
            icon: 'info',
        });
    }

    $('#kd_obat').select2({
        theme: 'bootstrap4',
    });
</script>


</div>
<!-- End of Main Content -->