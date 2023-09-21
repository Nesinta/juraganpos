<option value="">-- Pilih Desa / Kelurahan --</option>
<?php
foreach ($subdis as $sds) :
?>
    <option value="<?php echo $sds->des_id; ?>"><?php echo $sds->des_name; ?></option>
<?php endforeach; ?>