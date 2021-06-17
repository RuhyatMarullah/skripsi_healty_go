/*data table*/
$(document).ready(function () {
	$('#dataTable').DataTable();
});

/*popup pesan*/
const flashdata = $('.flash-data').data('flashdata');
const switch_alert = $('#switch').val();

if (flashdata) {
	Swal.fire({
		title: switch_alert,
		text: flashdata,
		icon: 'success'
	});
};

$('.tombol-hapus').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin?',
		text: switch_alert + " akan dihapus",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});

/*untuk format tanggal*/
$(document).ready(function () {
	$("#tgl_lahir").datepicker({
		format: "yyyy-mm-dd",
		useCurrent: false
	});
});
