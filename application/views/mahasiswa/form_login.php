<?php echo $this->session->flashdata('msg'); ?>
<?php echo form_open('mahasiswa/login/', 'mahasiswa_login'); ?>
<table>
	<tr>
		<td>Email : </td>
		<td><?php echo 
		form_input('email','','placeholder=youremail@email.com'); ?>
		</td>
	</tr>
	<tr>
		<td>Password :</td>
		<td><?php echo form_password('password'); ?></td>
	</tr>
	<tr>
		<td colspan='2'><?php 
		echo form_submit('submit', 'Login'); ?>
		<?php echo form_reset('reset','Reset'); ?>
	</td>
	</tr>
</table>
<?php
foreach ($variable as $key => $value) {
	# code...
}
 echo form_close(); ?>