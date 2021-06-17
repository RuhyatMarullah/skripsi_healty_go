<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <input type="hidden" id="switch" value="<?= $pesan; ?>">
    <!-- Page Heading -->
    <div class="row">
        <div class="col mt-3">
            <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Farmasi</h6>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($rekam_medis as $row) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $row['kd_rekam_medis']; ?></td>
                                        <td><?= $row['kd_pasien']; ?></td>
                                        <td><?= $row['nama_pasien']; ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>layanan/farmasi/edit/<?= $row['id_rekam_medis']; ?>" class="btn-sm btn-success btn-icon-split">
                                                <span class="icon text-white-200">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="text">Edit</span>
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
</div>
<!-- End of Main Content -->