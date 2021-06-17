<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3><strong>Form Ubah Dokter</strong></h3>
        </div>
    </div>
</div>
<div class="container-fluid">
    <form method="post" action="">
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="hidden" class="form-control" id="id_dokter" name="id_dokter" value="<?= $dokter['id_dokter']; ?>">
                    <input type="hidden" class="form-control" id="kd_dokter" name="kd_dokter" value="<?= $dokter['kd_dokter']; ?>">
                    <input type="text" id="nama" class="form-control <?php if (form_error('nama')) { ?>
                        is-invalid
                    <?php  } ?>" name="nama" value="<?= $dokter['nama_dokter']; ?>">
                    <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="no_identitas">No Identitas</label>
                    <input type="text" id="no_identitas" class="form-control <?php if (form_error('no_identitas')) { ?>
                                                            is-invalid
                                                        <?php  } ?>" name="no_identitas" value="<?= $dokter['no_identitas']; ?>">
                    <?= form_error('no_identitas', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="no_telp">No Telp</label>
                    <input type="text" id="no_telp" class="form-control <?php if (form_error('no_telp')) { ?>
                                                            is-invalid
                                                        <?php  } ?>" name="no_telp" value="<?= $dokter['no_telp']; ?>">
                    <?= form_error('no_telp', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="formControlRange">Jenis Kelamin</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="Laki-laki" <?php if ($dokter['jenis_kelamin'] == 'Laki-laki') { ?> checked <?php } ?>>
                        <label class="form-check-label" for="jenis_kelamin1">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="Perempuan" <?php if ($dokter['jenis_kelamin'] == 'Perempuan') { ?> checked <?php } ?>>
                        <label class="form-check-label" for="jenis_kelamin2">
                            Perempuan
                        </label>
                    </div>
                    <?= form_error('jenis_kelamin', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="text" id="tgl_lahir" class="form-control <?php if (form_error('tgl_lahir')) { ?>
                                                            is-invalid
                                                        <?php  } ?>" name="tgl_lahir" value="<?= $dokter['tgl_lahir']; ?>">
                    <?= form_error('tgl_lahir', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="poli">Poli</label>
                    <select class="form-control poli <?php if (form_error('poli')) { ?>
                                is-invalid
                            <?php  } ?>" id="poli" name="poli">
                        <option value="">---pilih poli---</option>
                        <?php foreach ($poli as $p) : ?>
                            <?php if ($p['kd_poli'] ==  $dokter['kd_poli']) : ?>
                                <option value="<?= $p['kd_poli']; ?>" selected><?= $p['nama_poli']; ?></option>
                            <?php else : ?>
                                <option value="<?= $p['kd_poli']; ?>"><?= $p['nama_poli']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('poli', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control <?php if (form_error('alamat')) { ?>
                        is-invalid
                        <?php  } ?>" id="alamat" rows="3" name="alamat"><?= $dokter['alamat']; ?></textarea>
                    <?= form_error('alamat', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary" name="tambah">Save</button>
                <a href="<?= base_url('master/doctor'); ?>" type="button" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
</div>
</div>