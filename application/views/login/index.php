<!DOCTYPE html>
<html>

<head>
	<title>Makmur Jaya</title>
	<link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/'); ?>login/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<img class="wave" src="<?= base_url('assets/'); ?>login/img/wave.png">
	<div class="container">
		<div class="img">
			<img src="<?= base_url('assets/'); ?>login/img/logo_biru.svg">
		</div>
		<div class="login-content">
			<form action="" method="post">
				<img src="<?= base_url('assets/'); ?>login/img/avatar_biru.svg">
				<?= $this->session->flashdata('message'); ?>
				<h3 class="title"><span>Klinik</span><span style="color:#3963E2;"> Makmur Jaya</span></h3>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<h5>Kode User</h5>
						<input type="text" class="input" value="<?= set_value('username'); ?>" name="username" autocomplete="off" required>
					</div>
				</div>
				<?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5>Password</h5>
						<input type="password" class="input" name="password" required>
					</div>
				</div>
				<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
				<input type="submit" class="btn" value="Login">
			</form>
		</div>
	</div>
	<script type="text/javascript" src="<?= base_url('assets/'); ?>login/js/main.js"></script>
</body>

</html>