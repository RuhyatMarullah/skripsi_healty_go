<!-- Begin Page Content -->
<div class="container">
	<div class="card  shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
			<a href="<?= base_url('master/karyawan'); ?>" class="btn btn-success">back</a>
		</div>
		<div class="card-body border-bottom-info">
			<div class="row">
				<div class="col-md-4">
					<img src="<?= base_url('assets/img/profile/') . $karyawan['img']; ?>" class="card-img">
				</div>
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-2">
							Nama
						</div>
						<div class="col-md-10">
							: <?php echo $karyawan['nama_admin']; ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-2">
							No Identitas
						</div>
						<div class="col-md-10">
							: <?php echo $karyawan['no_identitas']; ?>
						</div>
					</div>
					<!-- <div class="row mt-3">
				<div class="col-md-2">
					Jabatan
				</div>
				<div class="col-md-10">
					: <?php echo $karyawan['nama_jabatan']; ?>
				</div>
			</div> -->
					<div class="row mt-3">
						<div class="col-md-2">
							Tanggal Lahir
						</div>
						<div class="col-md-10">
							: <?php echo $karyawan['tgl_lahir']; ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-2">
							No Telpon
						</div>
						<div class="col-md-10">
							: <?php echo $karyawan['no_telp']; ?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-2">
							Jenis Kelamin
						</div>
						<div class="col-md-10">
							: <?php
								if ($karyawan['jenis_kelamin'] == 'l') {
									echo 'Laki-laki';
								} else {
									echo 'Perempuan';
								}
								?>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-2">
							Alamat
						</div>
						<div class="col-md-10">
							: <?= $karyawan['alamat']; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- End of Main Content -->