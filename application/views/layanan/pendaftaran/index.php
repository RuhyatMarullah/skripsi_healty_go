<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <a href="<?= base_url(); ?>master/pasien/add/" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-200">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Pasien</span>
            </a>
        </div>
    </div>
</div>

<!-- pendaftaran pasien -->
<form action="" method="POST">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 mt-3">
                <div class="form-group">
                    <label for="kd_pasien">Kode Pasien</label>
                    <select class="form-control <?php if (form_error('kd_pasien')) { ?>
                                is-invalid
                            <?php  } ?>" id="kode_pasien" name="kd_pasien">
                        <option value="">--- kode pasien ---</option>
                        <?php foreach ($pasien as $p) : ?>
                            <?php if ($p['kd_pasien'] == set_value('kd_pasien')) : ?>
                                <option value="<?= $p['kd_pasien']; ?>" selected><?= $p['kd_pasien']; ?></option>
                            <?php else : ?>
                                <option value="<?= $p['kd_pasien']; ?>"><?= $p['kd_pasien']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('kd_pasien', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-3 mt-3">
                <div class="form-group">
                    <label for="nama_pasien">Nama Pasien</label>
                    <input type="text" id="nama_pasien" class="form-control <?php if (form_error('nama_pasien')) { ?>
                        is-invalid
                    <?php  } ?>" name="nama_pasien" value="<?= set_value('nama_pasien'); ?>" readonly>
                    <?= form_error('nama_pasien', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-3 mt-3">
                <div class="form-group">
                    <label for="poli">Poli</label>
                    <select class="form-control poli <?php if (form_error('poli')) { ?>
                                is-invalid
                            <?php  } ?>" id="poli" name="poli">
                        <option value="">--- poli ---</option>
                        <?php foreach ($poli as $pol) : ?>
                            <?php if ($pol['kd_poli'] == set_value('poli')) : ?>
                                <option value="<?= $pol['kd_poli']; ?>" selected><?= $pol['nama_poli']; ?></option>
                            <?php else : ?>
                                <option value="<?= $pol['kd_poli']; ?>"><?= $pol['nama_poli']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('poli', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-1 mt-4">
                <div class="form-group">
                    <label for="alamat"></label>
                    <button type="submit" class="btn btn-primary form-control" name="tambah">Daftar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="container-fluid">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <input type="hidden" id="switch" value="<?= $pesan; ?>">
    <!-- Page Heading -->
    <div class="row">
        <div class="col mt-3">
            <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pendaftaran</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Kunjungan</th>
                                    <th>Kode Pasien</th>
                                    <th>Nama Pasien</th>
                                    <th>Poli</th>
                                    <th>Antrian</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($kunjungan as $row) : ?>
                                    <?php if ($row['status'] == 1) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $row['kd_rekam_medis']; ?></td>
                                            <td><?= $row['kd_pasien']; ?></td>
                                            <td><?= $row['nama_pasien']; ?></td>
                                            <td><?= $row['nama_poli']; ?></td>
                                            <td class="text-center"><?= $row['antrian']; ?></td>
                                            <td>
                                                <a href="<?= base_url(); ?>layanan/pendaftaran/hapus/<?= $row['id_rekam_medis']; ?>" class="btn-sm btn-danger btn-icon-split tombol-hapus">
                                                    <span class="icon text-white-200">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    <span class="text">Delete</span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
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
</div>
<!-- End of Main Content -->