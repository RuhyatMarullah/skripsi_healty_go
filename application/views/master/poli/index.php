<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <a href="<?= base_url(); ?>master/poli/add/" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-200">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Poli</span>
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
                    <h6 class="m-0 font-weight-bold text-primary">Data Poli</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Poli</th>
                                    <th>Nama Poli</th>
                                    <th>Biaya</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($poli as $row) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $row['kd_poli']; ?></td>
                                        <td><?= $row['nama_poli']; ?></td>
                                        <td><?= $row['biaya']; ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>master/poli/edit/<?= $row['id_poli']; ?>" class="btn-sm btn-success btn-icon-split">
                                                <span class="icon text-white-200">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                            <a href="<?= base_url(); ?>master/poli/hapus/<?= $row['id_poli']; ?>" class="btn-sm btn-danger btn-icon-split tombol-hapus">
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
</div>
<!-- End of Main Content -->