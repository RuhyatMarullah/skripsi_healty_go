<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3><strong>Form Tambah Poli</strong></h3>
        </div>
    </div>
</div>
<div class="container-fluid">
    <form method="post" action="">
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama_poli">Nama Poli</label>
                    <input type="text" id="nama_poli" class="form-control <?php if (form_error('nama_poli')) { ?>
                        is-invalid
                    <?php  } ?>" name="nama_poli" value="<?= set_value('nama_poli'); ?>">
                    <?= form_error('nama_poli', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="biaya_poli">Biaya Poli</label>
                    <input type="text" id="biaya_poli" class="form-control <?php if (form_error('biaya_poli')) { ?>
                        is-invalid
                    <?php  } ?>" name="biaya_poli" value="<?= set_value('biaya_poli'); ?>">
                    <?= form_error('biaya_poli', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary" name="tambah">Save</button>
                <a href="<?= base_url('master/poli'); ?>" type="button" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
</div>
</div>