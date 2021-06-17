<!-- Begin Page Content -->
<div class="container">
	<div class="card  shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Pasien</h6>
			<a href="<?= base_url('master/pasien'); ?>" class="btn btn-success">back</a>
		</div>
		<div class="card-body border-bottom-info">
			<div class="row">
				<div class="col-md-4">
					<img src="<?= base_url('assets/img/profile/') . $pasien['img']; ?>" class="card-img">
				</div>
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-2">
							Nama
						</div>
						<div class="col-md-10">
							: <?php echo $pasien['nama_pasien']; ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-2">
							No Identitas
						</div>
						<div class="col-md-10">
							: <?php echo $pasien['no_identitas']; ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-2">
							Tanggal Lahir
						</div>
						<div class="col-md-10">
							: <?php echo $pasien['tgl_lahir']; ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-2">
							No Telpon
						</div>
						<div class="col-md-10">
							: <?php echo $pasien['no_telp']; ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-2">
							Jenis Kelamin
						</div>
						<div class="col-md-10">
							: <?php echo $pasien['jenis_kelamin']; ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-2">
							Alamat
						</div>
						<div class="col-md-10">
							: <?= $pasien['alamat']; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- End of Main Content -->