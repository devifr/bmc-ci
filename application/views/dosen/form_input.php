<!doctype html>
<html>
	<head>


		
		<script type="text/javascript" src="<?php echo base_url('asset/js/jquery-1.5.1.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('asset/js/jquery-ui-1.8.11.custom.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('asset/js/jquery.ui.datepicker-id.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('asset/js/clock.js'); ?>"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/test.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/jquery-ui-1.8.11.custom.css'); ?>">
		<script type="text/javascript">
		 $(document).ready(function() {
      $("#tanggal").datepicker({ 
         dateFormat: "dd-mm-yy",
         changeMonth: true,
         changeYear: true ,
         yearRange: "-100:+0",
        
      });
   });

		</script>
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
		<?php echo form_open('dosen/save_data'); ?>

		<div id="tabel" align="center"><table id="test" border="0" >
			
			<tr>
				<th colspan="3">FORM DATA DOSEN</th>
			</tr>

			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><?php echo form_input('nama', '', ""); ?></td>
			</tr>
			<tr>
				<td>alamat</td>
				<td>:</td>
				<td><?php echo form_input('alamat', '', ""); ?></td>
			</tr>
			<tr>
				<td>Phone</td>
				<td>:</td>
				<td><?php echo form_input('telepon', '', ""); ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><?php echo form_input('email', '', ""); ?></td>
			</tr>
			<tr>
				<td colspan="3" align="right"><?php echo form_submit('simpan', 'Simpan Data'); ?></td>
			</tr>
		</table></div>
		<div id="footer">
<p>Yogi Nugraha; 
<?php
  $start_year = 2013; //change to the year you launched your website
  echo (date('Y') == $start_year) ? $start_year : $start_year . "-" . date('Y');
?>
&nbsp;All Rights Reserved.</p>

		</div>
	</div>
</div>

	</body>
</html>