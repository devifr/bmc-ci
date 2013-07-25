<html>
	<head>
		<title>Halaman View All MAhasiswa</title>
	</head>
	<body>
		<?php 
		if($this->session->userdata('email')!=''){
			echo "Selamat Datang,".$this->session->userdata('email')."|"
			.anchor('mahasiswa/logout/', 'logout');
		} ?>
		<br/>
		<?php echo $this->session->flashdata('msg'); ?>
		<?php echo anchor('home/form_input', 'Data Baru');
		//<a href=>Data Baru</a>
		 ?>
		<table border='1' align="center">
			<tr>
				<td>No</td>
				<td>NIM</td>
				<td>Nama</td>
				<td>Semester</td>
				<td>Nama DPA</td>
				<td>Action</td>
			</tr>
			<?php if($data_mahasiswa->num_rows()>0){
					foreach ($data_mahasiswa->result() as $key => $mahasiswa) {
			?>	
			<tr>
				<td><?php echo $key+1; ?></td>
				<td><?php echo $mahasiswa->nim; ?></td>
				<td><?php echo $mahasiswa->nama; ?></td>
				<td><?php echo $mahasiswa->semester; ?></td>
				<td><?php echo $mahasiswa->nama_dosen; ?></td>
				<td>
					<?php echo anchor('home/edit_data/'.$mahasiswa->id_mahasiswa, 'Edit', ''); ?>
					<?php echo anchor('home/hapus_data/'.$mahasiswa->id_mahasiswa, 'Hapus', ''); ?>
				</td>
			</tr>
			<?php
					}
				}else{
					echo "<tr><td colspan='5' align='center'>Data Tidak Ada</td></tr>";
				}
			?>
		</table>
		<?php echo $pagination; ?>
	</body>
</html>