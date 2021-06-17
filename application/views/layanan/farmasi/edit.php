<div class="container-fluid">
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

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col mt-3">
            <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pemesanan Obat</h6>
                    <form action="<?= base_url('layanan/farmasi'); ?>" method="post">
                        <input type="hidden" name="lab" value="<?= $rekam_medis['status_lab']; ?>">
                        <input type="hidden" name="id_rekam_medis" value="<?= $rekam_medis['id_rekam_medis']; ?>">
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
                                    <th>Kode rekam_medis</th>
                                    <th>Kode Obat</th>
                                    <th>Nama Obat</th>
                                    <th>Banyak Obat</th>
                                    <th>Cara Pemakaian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($pemesanan as $row) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $row['kd_rekam_medis']; ?></td>
                                        <td><?= $row['kd_obat']; ?></td>
                                        <td><?= $row['nama_obat']; ?></td>
                                        <td><?= $row['banyak_obat']; ?></td>
                                        <td><?= $row['cara_pemakaian']; ?></td>
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
</div>
<!-- End of Main Content -->