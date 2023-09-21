<style type="text/css">
    table,
    th,
    tr,
    td {
        text-align: center;
    }
</style>

<section class="content">
    <div class="row">
        <div class='col-xs-12'>
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"> Edit Data Kategori</h3>
                </div>
                <div class="box-body">
                    <?php
                    echo form_open('kategori/edit', array('role' => "form", 'id' => "myForm", 'data-toggle' => "validator"));
                    ?>
                    <div class="form-group">

                        <input type="hidden" name="id" value="<?php echo $record['id_kategori'] ?>">
                        <label for="kategori" class="control-label">Nama Kategori</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" data-error="Nama Kategori harus diisi" placeholder="Nama Kategori" value="<?php echo $record['nama_kategori']; ?>" required />
                            <span class="input-group-addon">
                                <span class="fa fa-cube"></span>
                            </span>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <button type="submit" class="btn btn-info" name="submit"> simpan </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>