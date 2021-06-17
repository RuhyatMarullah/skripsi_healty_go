<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <input type="hidden" id="switch" value="<?= $pesan; ?>">
    <!-- Page Heading -->
    <div class="row">
        <div class="col mt-3">
            <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pasien</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No Antrian</th>
                                    <th>Kode Rekam Medis</th>
                                    <th>Kode Pasien</th>
                                    <th>Nama Pasien</th>
                                    <th>Laboratorium</th>
                                    <th>Poli</th>
                                    <?php if ($this->session->userdata('level') != 1) : ?>
                                        <th>Action</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($rekam_medis as $row) : ?>
                                    <tr>
                                        <th scope="row"><?= $row['antrian']; ?></th>
                                        <td><?= $row['kd_rekam_medis']; ?></td>
                                        <td><?= $row['kd_pasien']; ?></td>
                                        <td><?= $row['nama_pasien']; ?></td>
                                        <td>
                                            <?php if ($row['status_lab'] == 3) : ?>
                                                Succes
                                            <?php elseif ($row['status_lab'] == 2) : ?>
                                                Proses
                                            <?php else : ?>
                                                None
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $row['nama_poli']; ?></td>
                                        <?php if ($this->session->userdata('level') != 1) : ?>
                                            <td>
                                                <a href="<?= base_url(); ?>poli/gigi/step1/<?= $row['id_rekam_medis']; ?>" class="btn-sm btn-success btn-icon-split">
                                                    <span class="icon text-white-200">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                    <span class="text">Edit</span>
                                                </a>
                                            </td>
                                        <?php endif; ?>
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