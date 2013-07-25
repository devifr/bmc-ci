<html>
	<head><title>Halamanan Lihat Data Mahasiswa</title>


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
				</div> <!-- /tgl --></div></br></br>

		<table id="customers" border='1' align="center" >
			<tr align ="center" bgcolor= "#99CCFF">
				<th>No</th>
				<th>Nama</th>
				<th>Kota Asal</th>
				<th>No. Telepon</th>
				<th>Email</th>
				<th colspan = '2'>Action</th>
			</tr>
			<?php if($data_dosen->num_rows()>0) {
					foreach ($data_dosen->result() as $key_bmc => $bmc) {
			?>
			<tr bgcolor="white">
				<td align ="center"><?php echo $key_bmc+1; ?></td>
				<td><?php echo $bmc->nama_dosen; ?></td>
				<td align ="center"><?php echo $bmc->alamat_dosen; ?></td>
				<td align ="center"><?php echo $bmc->telp_dosen; ?></td>
				<td><?php echo $bmc->email_dosen; ?></td>
				<td align ="center"><?php echo anchor('dosen/edit_data/'.$bmc->id_dosen,'edit',''); ?></td>
				<td align ="center"><?php echo anchor('dosen/hapus_data/'.$bmc->id_dosen,'Hapus',''); ?></td>
			</tr>
			<?php
			}
					}else {
						echo "<tr bgcolor='white'><td colspan = '9' align = 'center'>data belum ada</td></tr>";
					
				} 
			?>

		</table>
		<div align="center"><?php echo $this->session->flashdata('msg'); ?></div></br>
		<div align="center"><?php echo anchor('dosen/form_input', 'Data Baru');?></div>
		<div id="footer">
<p>Yogi Nugraha; 
<?php
  $start_year = 2013; //change to the year you launched your website
  echo (date('Y') == $start_year) ? $start_year : $start_year . "-" . date('Y');
?>
&nbsp;All Rights Reserved.</p>

		</div>
	</body>