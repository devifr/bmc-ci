<html>
	<head>
		<title>Halaman Form Edit Mahasiswa</title>
	</head>
	<body>
		<?php echo $this->session->flashdata('msg'); ?>
		<?php 
		if($rows->num_rows()>0){ //pengecekan data ada atau gx
			$row = $rows->row(); //manggil data hanya 1 data saja
		 ?>
		<?php echo form_open('home/update_data/'.$row->id_mahasiswa, 'form edit'); ?>
		<table>
			<tr>
				<td>NIM</td>
				<td>:</td>
				<td><?php echo form_input('nim', $row->nim); ?></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><?php echo form_input('nama', $row->nama); ?></td>
			</tr>
			<tr>
				<td>Semester</td>
				<td>:</td>
				<td><?php echo form_input('semester', $row->semester); ?></td>
			</tr>
			<tr>
				<td>Phone</td>
				<td>:</td>
				<td><?php echo form_input('phone', $row->phone); ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><?php echo form_input('email', $row->email); ?></td>
			</tr>
			<tr>
				<td><?php echo form_submit('simpan', 'Ubah Data'); ?> </td>
			</tr>
		</table>
		<?php
		form_close();
		}else{
			echo "Data Tidak Ada";
		}
		?>
	</body>
</html>