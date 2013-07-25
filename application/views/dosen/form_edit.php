<html>
	<head><title>Halamanan Edit Data Dosen</title>


<script type="text/javascript" src="<?php echo base_url('asset/js/clock.js'); ?>"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/test.css'); ?>">

	</head>
	<body onload="startclock()">
	<div id="wrapper">
		<div id="header">
			<div id="divGambar"><img src="<?php echo base_url('asset/image/DOSEN.png'); ?>"></div>
		<!-- <h1 align ="center">Form Input Mahasiswa</h1></br> -->
		 <div class="tgl">
				<!-- jam -->	
				<p><span id="date"></span>, <span id="clock"></span></p>  			
				</div> <!-- /tgl --></div></br>
<body>
	<?php echo $this->session->flashdata('msg'); ?>
	<?php
	if($rows->num_rows()>0){
		$row = $rows->row();//memanggil data, namun hanya satu data saja
		?>
	<?php echo form_open('home/update_data/'.$row->id_dosen, 'form edit'); ?>
	<div id="tabel" align="center"><table id="test" border="0" >
		
		<tr>
				<th colspan="3">EDIT DATA DOSEN</th>
			</tr>

		<tr>
			<td>NIP</td>
			<td>:</td>
			<td><?php echo form_input('nip',$row->nip);?></td>
		</tr>

		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?php echo form_input('nama',$row->nama);?></td>
		</tr>

		<tr>
			<td>Tanggal Lahir</td>
			<td>:</td>
			<td><?php echo form_input('tanggal_lahir',$row->tanggal_lahir);?></td>
		</tr>

		<tr>
			<td>Kota Asal</td>
			<td>:</td>
			<td><?php echo form_input('alamat',$row->alamat);?></td>
		</tr>

		<tr>
			<td>Nomor Telepon</td>
			<td>:</td>
			<td><?php echo form_input('telepon',$row->telepon);?></td>
		</tr>

		<tr>
			<td>Email</td>
			<td>:</td>
			<td><?php echo form_input('email',$row->email);?></td>
		</tr>
		<tr>
		<td colspan="3" align="right"><?php echo form_submit('simpan', 'Ubah Data'); ?></td>
		</tr>
	</table>
	<?php
	form_close();
}else{
	echo 'data tidak ada';
}
?>
<div id="footer">
<p>Yogi Nugraha; 
<?php
  $start_year = 2013; //change to the year you launched your website
  echo (date('Y') == $start_year) ? $start_year : $start_year . "-" . date('Y');
?>
&nbsp;All Rights Reserved.</p>

		</div>
</body>
</html>