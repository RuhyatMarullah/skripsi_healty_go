<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3><strong>Form Rekam Medis</strong></h3>
        </div>
    </div>
</div>
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-2">
            <p><strong>Nama Pasien</strong></p>
        </div>
        <div class="col-md-2">
            :<?= $rekam_medis['nama_pasien']; ?>
        </div>
        <div class="col-md-2">
            <p><strong>No Identitas</strong></p>
        </div>
        <div class="col-md-2">
            :<?= $rekam_medis['no_identitas']; ?>
        </div>
        <div class="col-md-2">
            <p><strong>Jenis Kelamin</strong></p>
        </div>
        <div class="col-md-2">
            :<?= $rekam_medis['jenis_kelamin']; ?>
        </div>
        <div class="col-md-2">
            <p><strong>No Telpon</strong></p>
        </div>
        <div class="col-md-2">
            :<?= $rekam_medis['no_telp']; ?>
        </div>
        <div class="col-md-2">
            <p><strong>Kode rekam_medis</strong></p>
        </div>
        <div class="col-md-2">
            :<?= $rekam_medis['kd_rekam_medis']; ?>
        </div>
        <div class="col-md-2">
            <p><strong>Alamat</strong></p>
        </div>
        <div class="col-md-2">
            :<?= $rekam_medis['alamat']; ?>
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
                    <button class="bg"></button> None
                <?php elseif ($rekam_medis['status_lab'] == 2) : ?>
                    Proses
                <?php elseif ($rekam_medis['status_lab'] == 3) : ?>
                    <a href="<?= base_url('layanan/laboratorium/detailLab/' . $rekam_medis['id_rekam_medis']); ?>" class="btn-sm btn-info btn-icon-split" target="_blank">
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
<div class="container-fluid">
    <form method="post" action="">
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="hidden" class="form-control" id="antrian" name="antrian" value="<?= $rekam_medis['antrian']; ?>">
                    <input type="hidden" class="form-control" id="id_rekam_medis" name="id_rekam_medis" value="<?= $rekam_medis['id_rekam_medis']; ?>">
                    <input type="hidden" class="form-control" id="kd_transaksi" name="kd_transaksi" value="<?= $rekam_medis['kd_transaksi']; ?>">
                    <input type="hidden" class="form-control" id="kd_pasien" name="kd_pasien" value="<?= $rekam_medis['kd_pasien']; ?>">
                    <input type="hidden" class="form-control" id="kd_poli" name="kd_poli" value="<?= $rekam_medis['kd_poli']; ?>">
                    <input type="hidden" class="form-control" id="tgl_periksa" name="tgl_periksa" value="<?= $rekam_medis['tgl_periksa']; ?>">
                    <input type="hidden" class="form-control" id="kd_rekam_medis" name="kd_rekam_medis" value="<?= $rekam_medis['kd_rekam_medis']; ?>">
                    <input type="hidden" class="form-control" id="kd_admin" name="kd_admin" value="<?= $rekam_medis['kd_admin']; ?>">
                    <input type="hidden" class="form-control" id="lab" name="lab" value="<?= $rekam_medis['status_lab']; ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="hidden" id="nama" class="form-control <?php if (form_error('nama')) { ?>
                        is-invalid
                    <?php  } ?>" name="nama" value="<?= $rekam_medis['nama_pasien']; ?>" readonly>
                    <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="keluhan">Keluhan</label>
                    <textarea class="form-control <?php if (form_error('keluhan')) { ?>
                        is-invalid
                        <?php  } ?>" id="keluhan" rows="3" name="keluhan"><?= set_value('keluhan'); ?><?= $rekam_medis['diagnosa']; ?></textarea>
                    <?= form_error('keluhan', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="diagnosa">Diagnosa</label>
                    <textarea class="form-control <?php if (form_error('diagnosa')) { ?>
                        is-invalid
                        <?php  } ?>" id="diagnosa" rows="3" name="diagnosa"><?= set_value('diagnosa'); ?><?= $rekam_medis['diagnosa']; ?></textarea>
                    <?= form_error('diagnosa', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary" name="tambah">Next</button>
                <a href="<?= base_url('poli/umum'); ?>" type="button" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
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
</script>
</div>