<!doctype html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/bootstrap.css'); ?>">
		<script type="text/javascript" src="<?php echo base_url('asset/css/bootstrap.css'); ?>"></script>
	</head>
	<body>
		<h1>Form Input Mahasiswa</h1>
		<?php echo form_open('home/save_data'); ?>
		<table border="0">
			<tr>
				<div class="NamaID"></div>
				<div ="NamaID"></div>
				<td>NIM</td>
				<td>:</td>
				<td><?php echo form_input('nim', '', "placeholder=NIM"); ?></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><?php echo form_input('nama', set_value('nama'), ""); ?></td>
			</tr>
			<tr>
				<td>Semester</td>
				<td>:</td>
				<td><?php echo form_input('semester', '', ""); ?></td>
			</tr>
			<tr>
				<td>Phone</td>
				<td>:</td>
				<td><?php echo form_input('phone', '', ""); ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><?php echo form_input('email', '', ""); ?></td>
			</tr>
			<tr>
				<td>DPA</td>
				<td>:</td>
				<td><select name='dpa'>
					<?php
					if($data_dosen->num_rows()>0){
						foreach ($data_dosen->result() as $key_dosen => $dosen) {
							echo "<option value='".$dosen->id_dosen."'>".$dosen->nama_dosen."</option>";
						}
					}
					 ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><?php echo form_password('password'); ?></td>
			</tr>
			<tr>
				<td colspan="3"><?php echo form_submit('simpan', 'Simpan Data'); ?></td>
			</tr>
		</table>
	</body>
</html>