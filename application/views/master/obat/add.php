<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3><strong>Form Tambah Obat</strong></h3>
        </div>
    </div>
</div>
<div class="container-fluid">
    <form method="post" action="">
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama_obat">Nama Obat</label>
                    <input type="text" id="nama_obat" class="form-control <?php if (form_error('nama_obat')) { ?>
                        is-invalid
                    <?php  } ?>" name="nama_obat" value="<?= set_value('nama_obat'); ?>">
                    <?= form_error('nama_obat', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="harga_obat">Harga Obat</label>
                    <input type="text" id="harga_obat" class="form-control <?php if (form_error('harga_obat')) { ?>
                        is-invalid
                    <?php  } ?>" name="harga_obat" value="<?= set_value('harga_obat'); ?>">
                    <?= form_error('harga_obat', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="keterangan_obat">Keterangan</label>
                    <input type="text" id="keterangan_obat" class="form-control <?php if (form_error('keterangan_obat')) { ?>
                        is-invalid
                    <?php  } ?>" name="keterangan_obat" value="<?= set_value('keterangan_obat'); ?>">
                    <?= form_error('keterangan_obat', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="jml_obat">Jumlah Obat</label>
                    <input type="text" id="jml_obat" class="form-control <?php if (form_error('jml_obat')) { ?>
                        is-invalid
                    <?php  } ?>" name="jml_obat" value="<?= set_value('jml_obat'); ?>">
                    <?= form_error('jml_obat', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary" name="tambah">Save</button>
                <a href="<?= base_url('master/obat'); ?>" type="button" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
</div>
</div>