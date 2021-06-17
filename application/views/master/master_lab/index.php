<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <a href="<?= base_url(); ?>master/masterlab/add/" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-200">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Data Lab</span>
            </a>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <input type="hidden" id="switch" value="<?= $judul; ?>">
    <!-- Page Heading -->

    <div class="row">
        <div class="col mt-3">
            <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Master Lab</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Master Lab</th>
                                    <th>Pemeriksaan</th>
                                    <th>Satuan</th>
                                    <th>Nilai Rujukan Pria</th>
                                    <th>Nilai Rujukan Wanita</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($master_lab as $row) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $row['kd_master_lab']; ?></td>
                                        <td><?= $row['pemeriksaan']; ?></td>
                                        <td><?= $row['satuan']; ?></td>
                                        <td><?= $row['nilai_rujukan_pria']; ?></td>
                                        <td><?= $row['nilai_rujukan_wanita']; ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>master/masterlab/edit/<?= $row['id']; ?>" class="btn-sm btn-success btn-icon-split">
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