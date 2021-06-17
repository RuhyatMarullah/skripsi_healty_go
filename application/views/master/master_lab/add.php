<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3><strong>Form Tambah Lab</strong></h3>
        </div>
    </div>
</div>
<div class="container-fluid">
    <form method="post" action="">
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="pemeriksaan">Pemeriksaan</label>
                    <input type="text" id="pemeriksaan" class="form-control <?php if (form_error('pemeriksaan')) { ?>
                        is-invalid
                    <?php  } ?>" name="pemeriksaan" value="<?= set_value('pemeriksaan'); ?>">
                    <?= form_error('pemeriksaan', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="satuan">Satuan</label>
                    <input type="text" id="satuan" class="form-control <?php if (form_error('satuan')) { ?>
                        is-invalid
                    <?php  } ?>" name="satuan" value="<?= set_value('satuan'); ?>">
                    <?= form_error('satuan', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nilai_rujukan_pria">Nilai Rujukan Pria</label>
                    <input type="text" id="nilai_rujukan_pria" class="form-control <?php if (form_error('nilai_rujukan_pria')) { ?>
                        is-invalid
                    <?php  } ?>" name="nilai_rujukan_pria" value="<?= set_value('nilai_rujukan_pria'); ?>">
                    <?= form_error('nilai_rujukan_pria', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nilai_rujukan_wanita">Nilai Rujukan Wanita</label>
                    <input type="text" id="nilai_rujukan_wanita" class="form-control <?php if (form_error('nilai_rujukan_wanita')) { ?>
                        is-invalid
                    <?php  } ?>" name="nilai_rujukan_wanita" value="<?= set_value('nilai_rujukan_wanita'); ?>">
                    <?= form_error('nilai_rujukan_wanita', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary" name="tambah">Save</button>
                <a href="<?= base_url('master/masterlab'); ?>" type="button" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
</div>
</div>