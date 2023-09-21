<style type="text/css">
    .swal2-popup {
        font-family: inherit;
        font-size: 1.2rem;
    }

    .progress-bar-stok {
        position: relative;
        width: 150px;
        height: 20px;
        border-radius: 50px;
    }

    .progress-bar-fill-stok {
        border-top-left-radius: 50px;
        /* Sudut sebelah kiri atas dibulatkan */
        border-top-right-radius: 50px;
        /* Sudut sebelah kanan atas tidak dibulatkan */
        border-bottom-left-radius: 50px;
        /* Sudut sebelah kiri bawah tidak dibulatkan */
        border-bottom-right-radius: 50px;
        transition: border-radius 0.5s;
        height: 100%;
        transition: width 0.5s;
        background: #fff;
        max-width: 100%;
    }

    .progress-bar-value-stok {
        position: absolute;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }

    .btn-group,
    .btn-group-vertical {
        position: relative;
        display: initial;
        vertical-align: middle;
    }
</style>
<?php if ($this->session->flashdata('message')) { ?>
    <div class="col-lg-12 alerts">
        <div class="alert alert-dismissible alert-warning">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4> <i class="icon fa fa-ban"></i>Warning</h4>
            <p><?php echo $this->session->flashdata('message'); ?></p>
        </div>
    </div>
<?php } else {
} ?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class='box-header  with-border'>
                    <h3 class='box-title'>Stok Barang</h3>
                    <div class="pull-right">
                        <?php
                        echo anchor('stok/post', 'Tambah Data', array('class' => 'btn btn-success'));
                        ?>
                    </div>
                </div>
                <div class="box-body">
                    <table id="myTable" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama barang</th>
                                <th>Kategori barang</th>
                                <th>Harga Barang</th>
                                <th>Stok Barang</th>
                                <th>Kapasitas</th>
                                <th>Tanggal</th>
                                <th style="text-align: center">&emsp; Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($stok as $s) {

                                // Gantilah nilai maksimum sesuai dengan item ini (misalnya, $s->stok_maksimum)
                                // $maksimum_stok_barang = $s->stok_barang;
                                // Menghitung persentase berdasarkan jumlah stok_barang
                                $persentase = $s->stok_barang; // Gantilah $maksimum_stok_barang dengan nilai maksimal yang sesuai

                                // Mengatur kelas CSS berdasarkan persentase
                                $kelas_css = '';

                                if ($persentase < 10) {
                                    $kelas_css = 'bg-red';
                                } elseif ($persentase < 40) {
                                    $kelas_css = 'bg-orange';
                                } elseif ($persentase < 80) {
                                    $kelas_css = 'bg-yellow';
                                } else {
                                    $kelas_css = 'bg-green';
                                }
                            ?>
                                <tr>
                                    <td><?php echo ++$no ?></td>
                                    <td><?php echo $s->nama_barang; ?></td>
                                    <td><?php echo $s->nama_kategori; ?></td>
                                    <td>Rp.<?php echo number_format($s->harga); ?></td>
                                    <td><?php echo $s->stok_barang; ?></td>
                                    <td>
                                        <div class="progress-bar-stok" style="border: 1px solid #000;">
                                            <div class="progress-bar-value-stok"><?php echo $s->stok_barang ?>%</div>
                                            <div id="progress-bar-fill-stok" class="progress-bar-fill-stok <?php echo $kelas_css; ?>" style="width: <?php echo $persentase; ?>%;">
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php echo $s->tanggal_stok; ?></td>
                                    <td style="text-align: center">
                                        <?php
                                        echo anchor(site_url('stok/edit/' . $s->id_stok), '<i class="fa fa-pencil-square-o fa-lg"></i>&nbsp;&nbsp;Edit', array('title' => 'edit', 'class' => 'btn btn-sm btn-warning'));
                                        echo '&nbsp';
                                        echo anchor(site_url('stok/hapus/' . $s->id_stok), '<i class="fa fa-trash fa-lg"></i>&nbsp;&nbsp;Hapus', 'title="delete" class="btn btn-sm btn-danger "');
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo base_url() ?>assets/app/js/alert.js"></script>
<script>
    const element = document.getElementById("progress-bar-fill-stok");

    // Simulasikan persentase 100%
    element.style.borderTopRightRadius = "50px"; // Ubah ke 50px atau sesuai yang Anda inginkan
    element.style.borderBottomRightRadius = "50px"; // Ubah ke 50px atau sesuai yang Anda inginkan

    // class ProgressBar {
    //     constructor(element, initialValue = 0) {
    //         this.valueElem = element.querySelector('.progress-bar-value');
    //         this.fillElem = element.querySelector('.progress-bar-fill');

    //         this.setValue(initialValue);
    //     }

    //     setValue(newValue) {
    //         newValue = Math.max(0, Math.min(100, newValue)); // Batasi nilai antara 0 hingga 100
    //         this.value = newValue;
    //         this.update();
    //     }

    //     update() {
    //         const percentage = this.value + '%';

    //         this.fillElem.style.width = percentage;
    //         this.valueElem.textContent = percentage;
    //     }
    // }

    // <?php foreach ($stok as $s) : ?>
    // new ProgressBar(document.querySelector('.progress-bar'), <?php echo $s->stok_barang; ?>);
    // <?php endforeach; ?>

    $(document).ready(function() {
        $('#myTable').DataTable({
            dom: 'Blfrtip',
            // "columnDefs": [{
            //     targets: 5,
            //     render: $.fn.dataTable.render.percentBar('round', '#fff', '#FF9CAB', '#FF0033',
            //         '#FF9CAB', 0, 'solid')
            // }],
            // "columnDefs": [{
            //     targets: 5,
            //     render: function(data, type, row) {
            //         var stok_barang = parseFloat(
            //             data); // Mengambil nilai stok_barang dari data kolom

            //         // Menentukan warna berdasarkan persentase stok_barang
            //         var fillColor;
            //         if (stok_barang <= 10) {
            //             fillColor = '#FF0033'; // Merah jika stok <= 10%
            //         } else if (stok_barang <= 20) {
            //             fillColor = '#FF9CAB'; // Merah muda jika stok <= 20%
            //         } else if (stok_barang <= 30) {
            //             fillColor = '#FFD700'; // Kuning jika stok <= 30%
            //         } else {
            //             fillColor = '#00FF00'; // Hijau jika stok > 30%
            //         }

            //         // Menghitung sisa stok_barang
            //         var sisaStok = 100 - stok_barang;

            //         // Membuat HTML untuk grafik batang dengan warna yang sesuai
            //         var percentBarHtml = '<div style="background-color: ' + fillColor +
            //             '; width: ' + stok_barang +
            //             '%; border-radius: 50px; margin: 50px; background-color: #00FF00;">';

            //         // Mengisi sisa stok_barang dengan warna yang sama
            //         percentBarHtml += '<div style="background-color: FFD700;' +
            //             '; width: ' + sisaStok + '%;">';

            //         percentBarHtml += '</div>' + data + '</div>';
            //         return percentBarHtml;
            //     }
            // }],
            buttons: [{
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 6],
                    },
                },
                {
                    extend: 'excelHtml5',
                    title: 'Data Stok Barang',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 6],
                    },
                },
                {
                    extend: 'copyHtml5',
                    title: 'Data Stok Barang',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 6],
                    },
                },
                {
                    extend: 'pdfHtml5',
                    oriented: 'portrait',
                    pageSize: 'legal',
                    title: 'Data Stok Barang',
                    download: 'open',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 6],
                    },
                    customize: function(doc) {
                        doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1)
                            .join('*').split('');
                        doc.styles.tableBodyEven.alignment = 'center';
                        doc.styles.tableBodyOdd.alignment = 'center';
                    },
                },
                {
                    extend: 'print',
                    oriented: 'portrait',
                    pageSize: 'A4',
                    title: 'Data Stok Barang',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 6],
                    },
                },
            ],
        });
    });
</script>