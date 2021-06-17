<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-700"><?= $judul; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <form action="<?= base_url('user/postEdit'); ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-2">
                        Picture
                    </div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/img/profile/' . $user['img']); ?>" alt="" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img" name="img">
                                    <label class="custom-file-label" for="img">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->