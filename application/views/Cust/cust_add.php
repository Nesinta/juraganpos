<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/app/css/style.css">

<!-- <style>
/* Gaya default */
#responsive-select {
    width: 200px;
    height: 33px;
}

/* Gaya untuk layar lebar */
@media screen and (min-width: 768px) {
    #responsive-select {
        width: 200px;
        height: 33px;
    }
}

/* Gaya untuk layar sangat lebar */
@media screen and (min-width: 1200px) {
    #responsive-select {
        width: 400px;
        height: 33px;
    }
}
</style> -->

<?php if ($this->session->flashdata('message')) { ?>
    <div class="col-lg-12 alerts">
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4> <i class="icon fa fa-ban"></i> Error</h4>
            <p><?php echo $this->session->flashdata('message'); ?></p>
        </div>
    </div>
<?php } else {
} ?>



<section class="content">
    <div class="row">
        <div class='col-xs-12'>
            <div class='box box-primary'>
                <div class='box-header  with-border'>
                    <h3 class='box-title'>Tambah Data Pelanggan</h3>
                </div>
                <div class="box-body">
                    <?php echo form_open_multipart('cust/postcust', array('role' => "form", 'id' => "myForm", 'data-toggle' => "validator")); ?>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="nama_pelanggan" class="control-label">Nama Pelanggan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" data-error="Nama Pelanggan harus diisi" placeholder="Nama Pelanggan" value="" required />
                                    <span class="input-group-addon">
                                        <span class="fa fa-user"></span>
                                    </span>
                                </div>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="hp" class="control-label">No HP</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="hp" id="hp" data-error="No HP harus diisi" placeholder="Ex: 082xxxxxxxxx" value="" required />
                                    <span class="input-group-addon">
                                        <span class="fa fa-key"></span>
                                    </span>
                                </div>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label style="margin-top: 15px;">Provinsi</label> <br>
                                <select class="form-control prov" id="responsive-select" name="prov_id" required>
                                    <option value="">-- Pilih Provinsi--</option>
                                    <?php
                                    foreach ($prov as $prv) :
                                    ?>
                                        <option value="<?php echo $prv->prov_id; ?>"><?php echo $prv->prov_name; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label style="margin-top: 15px;">Kabupaten / Kota</label> <br>
                                <select class="form-control kab" id="responsive-select" name="kab_id" required>
                                    <option value="">-- Pilih Provinsi terlebih dahulu --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label style="margin-top: 15px;">Kecamatan</label> <br>
                                <select class="form-control kec" id="responsive-select" name="kec_id" required>
                                    <option value="">-- Pilih Kabupaten / Kota terlebih dahulu --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label style="margin-top: 15px;">Desa / Kelurahan</label> <br>
                                <select class="form-control des" id="responsive-select" name="des_id" required>
                                    <option value="">-- Pilih Kecamatan terlebih dahulu --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label style="margin-top: 15px;">Kode Pos</label>
                                <input type="number" class="form-control" name="kodepos" placeholder="Ex: 1234" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label style="margin-top: 15px;">Status Alamat</label>
                                <select class="form-control" name="addr_status" required>
                                    <option value="">-- Pilih Status Alamat--</option>
                                    <option value="main">Utama</option>
                                    <option value="optional">Alamat Lain</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 15px; margin-bottom: 15px;">
                        <div class="mb-3">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat" rows="5" placeholder="Ex: Jl. Janti, Gang Puntodewo no 328" required></textarea>
                        </div>
                    </div>
                    <div>
                        <div>
                            <input type="hidden" name="3" id="3" value="3">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary ">Simpan</button>
                        <a href="<?php echo base_url() ?>cust" class="btn btn-default ">Cancel</a>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on('change', '.prov', function() {
        var prov_id = $(this).val();
        $.ajax({
            url: "<?php echo base_url(); ?>cust/regencies/" + prov_id,
            method: "POST",
            data: {
                prov_id: prov_id
            },
            success: function(data) {
                $('.kab').html(data);
            }
        });
    });
    $(document).on('change', '.kab', function() {
        var kab_id = $(this).val();
        $.ajax({
            url: "<?php echo base_url(); ?>cust/districts/" + kab_id,
            method: "POST",
            data: {
                kab_id: kab_id
            },
            success: function(data) {
                $('.kec').html(data);
            }
        });
    });
    $(document).on('change', '.kec', function() {
        var kec_id = $(this).val();
        $.ajax({
            url: "<?php echo base_url(); ?>cust/subdistricts/" + kec_id,
            method: "POST",
            data: {
                kec_id: kec_id
            },
            success: function(data) {
                $('.des').html(data);
            }
        });
    });


    // Membatasi inputan 15 angka
    function validasiInput(inputElem) {
        var value = inputElem.value;

        // Hilangkan semua karakter non-digit
        var cleanValue = value.replace(/\D/g, '');

        // Batasi panjang angka menjadi 15 digit
        if (cleanValue.length > 15) {
            cleanValue = cleanValue.slice(0, 15);
        }

        // Update nilai input dengan angka yang sudah divalidasi
        inputElem.value = cleanValue;
    }
</script>

<!-- <div class="modal fade modal-borderless" id="addCust" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card">
          <div class="card-body">
            <form action="<?php echo base_url('cust/addpro'); ?>" method="POST">
              <div class="row">
                <div class="col-md-12">
                  <div class="mb-3">
                    <label>Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" class="form-control" placeholder="Ex: John Doe" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="mb-3">
                    <label>Nomor HP</label>
                    <input type="number" name="hp" class="form-control" placeholder="Ex: 082xxxxxxxxx" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="mb-3">
                    <label>COD</label>
                    <select class="form-control" id="codd" name="cod" required onchange="munCul()">
                      <option value="">-- Apakah akan COD? --</option>
                      <option value="1">YA</option>
                      <option value="0">TIDAK</option>
                    </select>
                  </div>
                </div>
                <input type="hidden" name="created" id="jam">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="but" class="btn btn-success" disabled>Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
function munCul() {
var aa = document.getElementById("codd").value;
if (aa == "") {
document.getElementById("but").disabled = true;
} else {
document.getElementById("but").disabled = false;
}
}
</script> -->