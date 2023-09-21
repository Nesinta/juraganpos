<style type="text/css" media="all">
body {
    color: #000;
}

#wrapper {
    max-width: 650px;
    margin: 0 auto;
    padding-top: 20px;
}

.btn {
    margin-bottom: 5px;
}

.table {
    border-radius: 3px;
}

.table th {
    background: #f5f5f5;
}

.table th,
.table td {
    vertical-align: middle !important;
}

h3 {
    margin: 5px 0;
}

@media print {
    .no-print {
        display: none;
    }

    #wrapper {
        max-width: 480px;
        width: 100%;
        min-width: 250px;
        margin: 0 auto;
    }
}
</style>
<?php if ($this->session->flashdata('message')) { ?>
<div class="col-lg-12 alerts">
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4> <i class="icon fa fa-check"></i> Sukses</h4>
        <p><?php echo $this->session->flashdata('message'); ?></p>
    </div>
</div>
<?php } else {
} ?>
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-primary'>
                <div class='box-header  with-border'>
                    <h3 class='box-title'>BUKTI PEMBAYARAN</h3>
                </div>
                <div id="print-area">
                    <div class="box-body">
                        <div id="wrapper">
                            <div id="receiptData"
                                style="width: auto; max-width: 580px; min-width: 250px; margin: 0 auto; background-color: #f5f5f5;">
                                <div id="receipt-data">
                                    <div class="container"
                                        style="width: auto; max-width: 580px; min-width: 250px; margin: 0 auto; background-image: url('uploads/seveninc.png'); background-repeat: no-repeat; background-size: cover; padding: 10px; box-sizing: border-box;">
                                        <div class="row" style="display: flex; flex-wrap: wrap;">
                                            <div class="col-md-4 mb-3"
                                                style="flex-basis: 33.33%; padding: 10px; box-sizing: border-box;">
                                                <img src="<?php echo base_url('uploads/seveninc.png') ?>" alt="gambar"
                                                    style="width: 90px;">
                                            </div>
                                            <div class="col-md-4 text-center"
                                                style="flex-basis: 33.33%; padding: 10px; box-sizing: border-box; text-align: center;">
                                            </div>
                                            <div class="col-md-4 text-right mb-3"
                                                style="flex-basis: 33.33%; padding: 10px; box-sizing: border-box; text-align: right;">
                                                <h4><?php echo $nota; ?></h4>
                                                <p id="date"><?php echo $tanggal . ' ' . $jam; ?></p>
                                            </div>
                                            <div class="col-md-4"
                                                style="flex-basis: 33.33%; padding: 10px; box-sizing: border-box;">
                                                <h4>Seven Inc.</h4>
                                                <p>Alamat: Jl. Contoh No. 123</p>
                                                <p>Kota: Yogyakarta</p>
                                                <br>
                                                <p>Operator : <?php echo $operator; ?></p>
                                            </div>
                                            <div class="col-md-4 text-center"
                                                style="flex-basis: 33.33%; padding: 10px; box-sizing: border-box; text-align: center; margin-top: 10px;">
                                                <i class="fa fa-long-arrow-right"></i>
                                            </div>
                                            <div class="col-md-4 text-right"
                                                style="flex-basis: 33.33%; padding: 10px; box-sizing: border-box; text-align: right;">
                                                <h4><?php echo $pelanggan ?></h4>
                                                <p>Alamat: Jl. Contoh No. 123</p>
                                                <p>Kota: Yogyakarta</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div style="clear:both; margin-top: 5px;"></div>
                                        <table class="table table-striped table-condensed">
                                            <thead>
                                                <tr>
                                                    <th style="width: 35%; border-bottom: 2px solid #ddd;">Nama Barang
                                                    </th>
                                                    <th style="width: 17%; border-bottom: 2px solid #ddd;">QTY
                                                    </th>
                                                    <th style="width: 29%; border-bottom: 2px solid #ddd;">Harga</th>
                                                    <th class="text-right"
                                                        style="width: 31%; border-bottom: 2px solid #ddd;">Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($result as $row) { ?>
                                                <tr>
                                                    <td><?php echo $row->nama_barang; ?></td>
                                                    <td>&ensp; <?php echo $row->jumlah_stok; ?></td>
                                                    <td>Rp.<?php echo $row->harga_barang; ?></td>
                                                    <td class="text-right">Rp.<?php echo $row->sub_total; ?></td>
                                                </tr>
                                                <?php } ?>
                                                <tr>
                                                    <td colspan="4">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                                        <div class="row" style="display: flex; flex-wrap: wrap; margin-top: 26px;">
                                            <div class="col-md-4 mb-3"
                                                style="flex-basis: 23%; padding: 10px; box-sizing: border-box;">
                                                <p>Transaksi &emsp; &emsp; &ensp; &nbsp; :</p>
                                                <p>No Rekening&emsp; &emsp; :</p>
                                                <p>Via &emsp; &emsp; &emsp; &emsp; &emsp; &nbsp;:</p>
                                                <p>Atas Nama(A/N)&emsp;:</p>
                                            </div>
                                            <div class="col-md-4 mb-3"
                                                style="flex-basis: 27%; padding: 10px; box-sizing: border-box;">
                                                <p><?php echo $metode; ?></p>
                                                <?php if ($metode == 'Transfer') : ?>
                                                <p><?php $norek = substr($rekening, 4);
                                                        $nrk = 'xxxx' . $norek;
                                                        echo $nrk; ?></p>
                                                <p><?php echo $bank; ?></p>
                                                <p><?php echo strtoupper($atasnama); ?></p>
                                                <?php else : ?>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-md-4"
                                                style="flex-basis: 10%; padding: 10px; box-sizing: border-box;"></div>
                                            <div class="col-md-4 mb-3"
                                                style="flex-basis: 18%; padding: 10px; box-sizing: border-box;">
                                                <p>Total&emsp;&emsp;&emsp;&ensp; :</p>
                                                <p>Diskon &emsp;&emsp;&ensp; :</p>
                                                <p>Grand Total&nbsp;&ensp; :</p>
                                                <p>Uang Bayar&nbsp;&ensp; :</p>
                                                <p>Kembalian&emsp;&nbsp;:</p>
                                            </div>
                                            <div class="col-md-4 text-right mb-3"
                                                style="flex-basis: 22%; padding: 10px; box-sizing: border-box; text-align: right;">
                                                <p>Rp.<?php echo number_format($total); ?></p>
                                                <p>Rp.<?php echo number_format($diskon); ?></p>
                                                <p>Rp.<?php echo number_format($grand_total); ?></p>
                                                <p>Rp.<?php echo number_format($bayar); ?></p>
                                                <p>Rp.<?php echo number_format($kembalian); ?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div style="margin-top:10px;">
                                            <div style="text-align: center;">Terimakasih Sudah Belanja :)</div>
                                        </div>
                                    </div>
                                    <div style="clear:both;"></div>
                                </div>
                            </div>
                            <div id="buttons" style="padding-top:10px; text-transform:uppercase;" class="no-print">
                                <span class="pull-right col-xs-12">
                                    <button onclick="printDiv('print-area')"
                                        class="btn btn-block btn-primary">Print</button> </span>
                                <span class="col-xs-12">
                                    <a class="btn btn-block btn-warning"
                                        href="<?php echo base_url() ?>index.php/laporan">Kembali ke Laporan
                                        Pembayaran</a>
                                </span>
                                <div style="clear:both;"></div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.modal -->
            </div><!-- /.modal -->
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.content -->


<script type="text/javascript">
function printDiv(divName) {
    let printContents = document.getElementById(divName).innerHTML;
    let originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    location.reload(true);
    setTimeout(function() {}, 1000);
}

$(function() {
    $('#transfer').hide();
    $('#trf').change(function() {
        if ($('#trf').val() == 'Transfer') {
            $('#transfer').show();
            createByJson();
        } else {
            $('#transfer').hide();
        }
    });
});
</script>