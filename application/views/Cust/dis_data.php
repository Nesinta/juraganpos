<option value="">-- Pilih Kecamatan --</option>
<?php
foreach ($dis as $ds) :
?>
<option value="<?php echo $ds->kec_id; ?>"><?php echo $ds->kec_name; ?></option>
<?php endforeach; ?>