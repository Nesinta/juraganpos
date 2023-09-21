<option value="">-- Pilih Kabupaten / Kota --</option>
<?php
foreach ($regenc as $reg) :
?>
    <option value="<?php echo $reg->kab_id; ?>"><?php echo $reg->kab_name; ?></option>
<?php endforeach; ?>