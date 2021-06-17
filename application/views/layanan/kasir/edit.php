<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <p><strong>Kode Kunjungan</strong></p>
        </div>
        <div class="col-md-2">
            <p><strong>:</strong> <?= $rekam_medis['kd_rekam_medis']; ?></p>
        </div>
        <div class="col-md-2">
        </div>
        <div class="col-md-2">
            <p><strong>Tanggal Periksa</strong></p>
        </div>
        <div class="col-md-2">
            <p><strong>:</strong> <?= $rekam_medis['tgl_periksa']; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <p><strong>Nama Pasien</strong></p>
        </div>
        <div class="col-md-2">
            <p><strong>:</strong> <?= $rekam_medis['nama_pasien']; ?></p>
        </div>
        <div class="col-md-2">
        </div>
        <div class="col-md-2">
            <p><strong>Poli</strong></p>
        </div>
        <div class="col-md-2">
            <p><strong>:</strong> <?= $rekam_medis['nama_poli']; ?></p>
        </div>
    </div>
</div>
<hr>

<form action="<?= base_url('layanan/kasir'); ?>" method="post">
    <input type="hidden" value="<?= $rekam_medis['id_rekam_medis']; ?>" name="id_rekam_medis">
    <div class="container-fluid mt-5">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Obat</th>
                    <th scope="col">Harga Obat</th>
                    <th scope="col">Qty</th>
                    <th scope="col" width="10%">jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pemesanan as $p) :  ?>
                    <tr>
                        <th scope="row">1</th>
                        <td><?= $p['nama_obat']; ?></td>
                        <td><?= number_format($p['harga_obat']); ?></td>
                        <td><?= $p['banyak_obat']; ?></td>
                        <td><?= number_format($p['biaya_obat']); ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4" class="text-right">Total Biaya Obat</td>
                    <td>
                        <input type="text" name="total_biaya_obat" id="" value="<?= number_format($total_biaya_obat); ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="text-right">Biaya Periksa</td>
                    <td>
                        <input type="text" name="biaya_periksa" id="" value="<?= number_format($rekam_medis['biaya']); ?>" readonly>
                    </td>
                </tr>
                <?php if ($rekam_medis['status_lab'] == 3) : ?>
                    <tr>
                        <td colspan="4" class="text-right">Biaya Lab</td>
                        <td>
                            <input type="text" name="biaya_lab" id="" value="<?= number_format($biaya_lab); ?>" readonly>
                        </td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td colspan="4" class="text-right">Total Biaya Keseluruhan</td>
                    <td>
                        <input type="text" name="total_biaya_keseluruhan" id="total_biaya_keseluruhan" value="<?= number_format($total_harga); ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="text-right">Pembayaran</td>
                    <td>
                        <input type="text" name="pembayaran" id="pembayaran" value="<?= set_value('pembayaran'); ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="text-right">Kembalian</td>
                    <td>
                        <input type="text" name="kembalian" id="kembalian" value="<?= set_value('kembalian'); ?>" readonly>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2 text-right">
                <a href="<?= base_url('layanan/kasir'); ?>" type="button" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary mr-3" name="tambah">Next</button>
            </div>
        </div>
    </div>
</form>
<input type="hidden" id="flash_pembayaran" value="<?= $this->session->flashdata('pembayaran'); ?>">
<script>
    $('document').ready(function() {
        /* format uang */
        $(function() {
            $("#pembayaran").keyup(function(e) {
                $(this).val(format($(this).val()));
                let pembayaran = $(this).val();
                pembayaran = pembayaran.replace(/\,/g, '');
                pembayaran = Number(pembayaran);

                let total_biaya_keseluruhan = $('#total_biaya_keseluruhan').val();
                total_biaya_keseluruhan = total_biaya_keseluruhan.replace(/\,/g, '');
                total_biaya_keseluruhan = Number(total_biaya_keseluruhan);

                let kembalian = pembayaran - total_biaya_keseluruhan;
                if (pembayaran == '') {
                    $('#kembalian').val('');
                } else {
                    $('#kembalian').val(format(kembalian));
                }
            });
        });
        var format = function(num) {
            var str = num.toString().replace("", ""),
                parts = false,
                output = [],
                i = 1,
                formatted = null;
            if (str.indexOf(".") > 0) {
                parts = str.split(".");
                str = parts[0];
            }
            str = str.split("").reverse();
            for (var j = 0, len = str.length; j < len; j++) {
                if (str[j] != ",") {
                    output.push(str[j]);
                    if (i % 3 == 0 && j < (len - 1)) {
                        output.push(",");
                    }
                    i++;
                }
            }
            formatted = output.reverse().join("");
            return ("" + formatted + ((parts) ? "," + parts[1].substr(0, 2) : ""));
        };


        /*popup pesan*/
        const flashpembayaran = $('#flash_pembayaran').val();

        if (flashpembayaran) {
            console.log(flashpembayaran);
            Swal.fire({
                // title: switch_alert,
                title: flashpembayaran,
                icon: 'info'
            });
        };
    })
</script>

</div>
<!-- End of Main Content -->