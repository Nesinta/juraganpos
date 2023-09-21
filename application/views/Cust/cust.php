<style type="text/css">
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
                    <h3 class="box-title"> Pelanggan</h3>
                    <div class="pull-right">
                        <?php
                        echo anchor('cust/postcust', 'Tambah Pelanggan', array('class' => 'btn btn-success'));
                        ?>
                    </div>
                </div>
                <div class="box-body">
                    <table id="myTable" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th style="text-align: center">&emsp; Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($cust as $cst) :
                                $cid = $cst->id_pelanggan;
                                $addra = $this->db->query("SELECT * FROM address
                                JOIN provinces ON provinces.prov_id=address.prov_id
                                JOIN regencies ON regencies.kab_id=address.kab_id
                                JOIN districts ON districts.kec_id=address.kec_id
                                JOIN subdistricts ON subdistricts.des_id=address.des_id
                                WHERE id_pelanggan='$cid'")->num_rows();
                                $addraa = $this->db->query("SELECT * FROM address
                                WHERE id_pelanggan='$cid'")->num_rows();
                                $addr = $this->db->query("SELECT * FROM address
                                JOIN provinces ON provinces.prov_id=address.prov_id
                                JOIN regencies ON regencies.kab_id=address.kab_id
                                JOIN districts ON districts.kec_id=address.kec_id
                                JOIN subdistricts ON subdistricts.des_id=address.des_id
                                WHERE id_pelanggan='$cid'")->row_array();
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $cst->nama_pelanggan; ?></td>
                                <td><?php
                                        if ($addraa == 1) {
                                        ?>
                                    <?php
                                            if ($addra > 0) {
                                                echo $addr['alamat'] . ", Ds. " . $addr['des_name'] . ", Kec. " . $addr['kec_name'] . ", " . $addr['kab_name'] . ", " . $addr['prov_name'] . ", " . $addr['kodepos'];
                                            } else {
                                                echo "<i>Belum ada alamat</i>";
                                            }
                                            ?>
                                    <?php } else if ($addraa > 1) {
                                            for ($b = 1; $b <= $addra; $b++) {
                                            ?>
                                    <?php } ?>
                                    <?php
                                            if ($addra > 0) {
                                                echo $addr['alamat'] . ", Ds. " . $addr['des_name'] . ", Kec. " . $addr['kec_name'] . ", " . $addr['kab_name'] . ", " . $addr['prov_name'] . ", " . $kodepos;
                                            } else {
                                                echo "<i>Belum ada alamat</i>";
                                            }
                                            ?>
                                    <?php } else { ?>
                                    <?php
                                            if ($addra > 0) {
                                                echo $addr['alamat'] . ", Ds. " . $addr['des_name'] . ", Kec. " . $addr['kec_name'] . ", " . $addr['kab_name'] . ", " . $addr['prov_name'] . ", " . $kodepos;
                                            } else {
                                                echo "<i>Belum ada alamat</i>";
                                            }
                                            ?>
                                    <?php } ?>
                                    <p style="font-weight: bold;"><?php echo $cst->addr_status; ?></p>
                                </td>
                                <td>+62<?php echo substr($cst->hp, 1, 14); ?></td>
                                <td style="text-align: center">
                                    <?php
                                        echo anchor(site_url('cust/edit/' . $cid), '<i class="fa fa-pencil-square-o fa-lg"></i>&nbsp;&nbsp;Edit', array('title' => 'edit', 'class' => 'btn btn-sm btn-warning'));
                                        echo '&nbsp';
                                        echo anchor(site_url('cust/hapus/' . $cid), '<i class="fa fa-trash fa-lg"></i>&nbsp;&nbsp;Hapus', 'title="delete" class="btn btn-sm btn-danger "');
                                        ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo base_url() ?>assets/app/js/alert.js"></script>
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