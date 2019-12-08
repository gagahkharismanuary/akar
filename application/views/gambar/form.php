<h1>Tambah Gambar</h1><hr>

<!-- Menampilkan Error jika validasi tidak valid -->
<div style="color: red;"><?php echo (isset($message))? $message : ""; ?></div>

<?php echo form_open("gambar/tambah", array('enctype'=>'multipart/form-data')); ?>
	<table cellpadding="8">
		<tr>
			<td>Deskripsi</td>
			<td><input type="text" name="title" value="<?php echo set_value('title'); ?>"></td>
		</tr>
		<tr>
			<td>Gambar</td>
			<td><input type="file" name="image_upload"></td>
		</tr>
	</table>
		
	<hr>
	<input type="submit" name="submit" value="Simpan">
	<a href="<?php echo base_url(); ?>"><input type="button" value="Batal"></a>
<?php echo form_close(); ?>
