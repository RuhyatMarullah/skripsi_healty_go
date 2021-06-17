<!-- Begin Page Content -->
<div class="container">
	<div class="card  shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Dokter</h6>
			<a href="<?= base_url('master/doctor'); ?>" class="btn btn-success">back</a>
		</div>
		<div class="card-body border-bottom-info">
			<div class="row">
				<div class="col-md-4">
					<img src="<?= base_url('assets/img/profile/') . $doctor['img']; ?>" class="card-img">
				</div>
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-2">
							Nama
						</div>
						<div class="col-md-10">
							: <?= $doctor['nama_dokter']; ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-2">
							No Identitas
						</div>
						<div class="col-md-10">
							: <?= $doctor['no_identitas']; ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-2">
							Nama Poli
						</div>
						<div class="col-md-10">
							: <?= $doctor['nama_poli']; ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-2">
							Tanggal Lahir
						</div>
						<div class="col-md-10">
							: <?= $doctor['tgl_lahir']; ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-2">
							No Telpon
						</div>
						<div class="col-md-10">
							: <?= $doctor['no_telp']; ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-2">
							Jenis Kelamin
						</div>
						<div class="col-md-10">
							: <?= $doctor['jenis_kelamin']; ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-2">
							Alamat
						</div>
						<div class="col-md-3">
							: <?= $doctor['alamat']; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- End of Main Content -->