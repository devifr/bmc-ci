<!doctype html>
<html>
	<head></head>
	<body>
		<h1>Form Input Hitung</h1>
		<?php $parameter_url = $this->uri->segment('3') ?>
		<?php echo form_open('home/save_data_hitung/'.$parameter_url); ?>
		<table border="0">
			<tr>
				<td>Value A</td>
				<td>:</td>
				<td><?php echo form_input('valA'); ?></td>
			</tr>
			<tr>
				<td>Value B</td>
				<td>:</td>
				<td><?php echo form_input('valB'); ?></td>
			</tr>
			<tr>
				<td colspan="3"><?php echo form_submit('simpan', 'Simpan Data'); ?></td>
			</tr>
		</table>
	</body>
</html>