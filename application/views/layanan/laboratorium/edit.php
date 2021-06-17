<div class="container-fluid">
    <input type="hidden" id="jenis_kelamin" value="<?= $rekam_medis['jenis_kelamin']; ?>">
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
    </div>
</div>
<hr>
<!-- pemesanan obat -->
<form action="<?= base_url('layanan/Laboratorium/tambahLab'); ?>" method="POST">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 mt-3">
                <div class="form-group">
                    <label for="kd_master_lab">Pemeriksaan</label>
                    <input type="hidden" name="id_rekam_medis" value="<?= $rekam_medis['id_rekam_medis']; ?>">
                    <input type="hidden" name="kd_rekam_medis" value="<?= $rekam_medis['kd_rekam_medis']; ?>">
                    <select class="form-control <?php if (form_error('kd_master_lab')) { ?>
                                is-invalid
                            <?php  } ?>" id="kd_master_lab" name="kd_master_lab" required>
                        <option value="">--- Pemeriksaan ---</option>
                        <?php foreach ($master_lab as $ml) : ?>
                            <?php if ($ml['kd_master_lab'] == set_value('kd_master_lab')) : ?>
                                <option value="<?= $ml['kd_master_lab']; ?>" selected><?= $ml['pemeriksaan']; ?></option>
                            <?php else : ?>
                                <option value="<?= $ml['kd_master_lab']; ?>"><?= $ml['pemeriksaan']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-2 mt-3">
                <div class="form-group">
                    <label for="satuan">Satuan</label>
                    <input type="hidden" name="pemeriksaan" id="pemeriksaan">
                    <input type="text" id="satuan" class="form-control <?php if (form_error('satuan')) { ?>
                        is-invalid
                    <?php  } ?>" name="satuan" value="<?= set_value('satuan'); ?>" required readonly>
                    <?= form_error('satuan', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-2 mt-3">
                <div class="form-group">
                    <label for="nilai_rujukan">Nilai Rujukan</label>
                    <input type="text" id="nilai_rujukan" class="form-control <?php if (form_error('nilai_rujukan')) { ?>
                        is-invalid
                    <?php  } ?>" name="nilai_rujukan" value="<?= set_value('nilai_rujukan'); ?>" required readonly>
                    <?= form_error('nilai_rujukan', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-2 mt-3">
                <div class="form-group">
                    <label for="hasil">Hasil</label>
                    <input type="text" id="hasil" class="form-control <?php if (form_error('hasil')) { ?>
                        is-invalid
                    <?php  } ?>" name="hasil" value="<?= set_value('hasil'); ?>" required>
                    <?= form_error('hasil', '<small class="text-danger pl-1">', '</small>'); ?>
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
                    <h6 class="m-0 font-weight-bold text-primary">Data Laboratorium</h6>
                    <form action="<?= base_url('layanan/laboratorium/simpanLab'); ?>" method="post">
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
                                    <th>Pemeriksaan</th>
                                    <th>Satuan</th>
                                    <th>Nilai Rujukan</th>
                                    <th>Hasil</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($hasil_lab as $hl) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $hl['pemeriksaan']; ?></td>
                                        <td><?= $hl['satuan']; ?></td>
                                        <td><?= $hl['nilai_rujukan']; ?></td>
                                        <td><?= $hl['hasil']; ?></td>
                                        <td>
                                            <p <?php if ($hl['keterangan'] != 'Normal') : ?> style="color: red;" <?php endif; ?>><?= $hl['keterangan']; ?></p>
                                        </td>
                                        <td>
                                            <a href="<?= base_url(); ?>layanan/laboratorium/hapusLab/<?= $hl['id_laboratorium']; ?>/<?= $rekam_medis['id_rekam_medis']; ?>" class="btn-sm btn-danger btn-icon-split">
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

<input type="hidden" id="url_lab" value="<?= base_url('layanan/laboratorium/getLab'); ?>">
<script>
    $('document').ready(function() {
        $('#kd_master_lab').on('change', function() {
            let kd_master_lab = $('#kd_master_lab').val();
            let url_lab = $('#url_lab').val();
            let jenis_kelamin = $('#jenis_kelamin').val()

            $.ajax({
                url: url_lab,
                data: {
                    kd_master_lab: kd_master_lab
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    $('#pemeriksaan').val(data.pemeriksaan);
                    $('#satuan').val(data.satuan);
                    if (jenis_kelamin == "Perempuan") {
                        $('#nilai_rujukan').val(data.nilai_rujukan_wanita);
                    } else if (jenis_kelamin == "Laki-laki") {
                        $('#nilai_rujukan').val(data.nilai_rujukan_pria);
                    }
                }
            });
        })
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
            title: 'pemeriksaan berhasil',
            icon: 'success',
            showConfirmButton: false,
            timer: 1000
        });
    } else if (flash == 'hapus') {
        Swal.fire({
            title: 'Hasil Lab Berhasil Dihapus',
            icon: 'success',
            showConfirmButton: false,
            timer: 1000
        });
    } else if (flash == 'step2_gagal') {
        Swal.fire({
            title: 'Anda Belum Menulis Hasil Lab',
            icon: 'info',
        });
    }

    $('#kd_master_lab').select2({
        theme: 'bootstrap4',
    });
</script>


</div>
<!-- End of Main Content -->