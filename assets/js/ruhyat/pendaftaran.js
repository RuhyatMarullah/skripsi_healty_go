$('#kode_pasien').change(function () {
	const kode_pasien = $('#kode_pasien').val();
	console.log('ok');

	$.ajax({
		url: 'http://localhost/ruhyat/skripsi/layanan/pendaftaran/getPasien',
		data: {
			kode_pasien: kode_pasien
		},
		method: 'post',
		dataType: 'json',
		success: function (data) {
			$('#nama_pasien').val(data.nama_pasien);
		}
	});
});
$('#kode_pasien').select2({
	theme: 'bootstrap4',
});
$('#poli').select2({
	theme: 'bootstrap4',
});
$('#jabatan').select2({
	theme: 'bootstrap4',
});
