<style type="text/css">
    table,
    th,
    tr,
    td {
        text-align: center;
    }

    .swal2-popup {
        font-family: inherit;
        font-size: 1.2rem;
    }
</style>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Juragan</h3>
                    <div class="pull-right">
                        <?php
                        echo anchor('juragan/post', 'Tambah Data', array('class' => 'btn btn-success'));
                        ?>
                    </div>
                </div>
                <div class="box-body">
                    <table id="myTable" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama juragan</th>
                                <th>Operasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($cust as $juragan) : ?>
                                <tr>
                                    <td><?php echo ++$no; ?></td>
                                    <td><?php echo $juragan->nama_juragan ?></td>

                                    <td>
                                        <?php
                                        echo anchor(site_url('juragan/edit/' . $juragan->id_juragan), '<i class="fa fa-pencil-square-o fa-lg"></i>&nbsp;&nbsp;Edit', array('title' => 'edit', 'class' => 'btn btn-sm btn-warning'));
                                        echo '&nbsp';
                                        echo anchor(site_url('juragan/hapus/' . $juragan->id_juragan), '<i class="fa fa-trash fa-lg"></i>&nbsp;&nbsp;Hapus', 'title="delete" class="btn btn-sm btn-danger "');
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {

        var table = $('#myTable').dataTable({
            "fnDrawCallback": function() {
                $('.image-link').magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    closeBtnInside: false,
                    fixedContentPos: true,

                    image: {
                        verticalFit: true
                    },
                    zoom: {
                        enabled: true,
                        duration: 300 // don't foget to change the duration also in CSS
                    },

                });
            }
        });
    });
</script>