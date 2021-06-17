<!-- Begin Page Content -->

<div class="container-fluid">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <input type="hidden" id="switch" value="<?= $judul; ?>">
    <!-- Page Heading -->
    <div class="row">
        <div class="col mt-3">
            <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Rekam Medis</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tb_rekam_medis" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kode Rekam Medis</th>
                                    <th>Nama Pasien</th>
                                    <th>Nama Dokter</th>
                                    <th>Nama Poli</th>
                                    <th>Taggal Periksa</th>
                                    <th>Laboratorium</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</div>
<script>
    $(document).ready(function() {
        $('#tb_rekam_medis').dataTable({
            "serverside": true,
            "processing": true,
            "ajax": {
                "type": "GET",
                "url": "<?= base_url('rekammedis/getRekamMedis'); ?>",
            },
            "order": [
                [4, "desc"]
            ]
        });
    });
</script>
</div>
<!-- End of Main Content -->