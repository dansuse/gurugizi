<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().CSS_FOLDER; ?>bootstrap.min.css">
	<script src="<?php echo base_url().JS_FOLDER; ?>moment.js"></script>
	<script src="<?php echo base_url().JS_FOLDER; ?>jquery-3.1.1.min.js"></script>
	<script src="<?php echo base_url().JS_FOLDER; ?>bootstrap.min.js"></script>
	<script src="<?php echo base_url().JS_FOLDER; ?>bootstrap-datetimepicker.js"></script>
	<script src="<?php echo base_url().JS_FOLDER; ?>pwstrength-bootstrap.min.js"></script>

	<script>
		$(function () {
				$('#datetimepicker1').datetimepicker({
					format: 'L'
				});
				$(':password').pwstrength();
		});
	</script>
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }
	
	input[type=number]::-webkit-inner-spin-button, 
	input[type=number]::-webkit-outer-spin-button { 
	  -webkit-appearance: none; 
	  margin: 0; 
	}

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}


	#body {
		margin: 0 15px 0 15px;
	}

	#container {
		margin: 10px;
		padding: 20px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}

	</style>
</head>
<body>

<div id="container">
	<h1>Registration Form Dokter</h1>
	<?php
		//echo validation_errors();	

		if(!isset($nama)){$nama = '';}
		if(!isset($tempatLahir)){$tempatLahir = '';}
		if(!isset($tanggalLahir)){$tanggalLahir = '';}
		if(!isset($email)){$email = '';}
		if(!isset($hp)){$hp = '';}
		if(!isset($alamat)){$alamat = '';}
		
		echo print_line(2);
		echo form_open_multipart('c_dokter/fHandleSignup');
		echo form_label('Name', 'tbName');
		echo print_line(1);
		echo form_input('tbName', $nama, array('placeholder'=>'Masukkan Nama Lengkap disertakan Jabatan', 'class'=>'form-control', 'required'=>''));
		echo form_error('tbName');
		echo print_line(2);
		
		echo form_label('Email Address', 'tbEmail');
		echo print_line(1);
		echo form_input('tbEmail', $email, array('placeholder'=>'Masukkan Email', 'class'=>'form-control', 'required'=>''));
		echo form_error('tbEmail');
		echo print_line(2);

		echo form_label('Password', 'tbPassword');
		echo print_line(1);
		echo form_password('tbPassword', '', array('placeholder'=>'Masukkan Password', 'class'=>'form-control', 'required'=>''));
		echo form_error('tbPassword');
		echo print_line(2);

		echo form_label('Konfirmasi Password', 'tbPasswordConf');
		echo print_line(1);
		echo form_password('tbPasswordConf', '', array('placeholder'=>'Konfirmasi Password', 'class'=>'form-control', 'required'=>''));
		echo form_error('tbPasswordConf');
		echo print_line(2);

		echo form_label('Tempat Tanggal Lahir', 'dtpTTL');
		echo print_line(1);
		?>
		<!--div class='input-group date' id='datetimepicker1'>
        <input type='text' class="form-control" name='tbBirthday' />
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div-->
	<div class="row">
        <div class='col-sm-12'>
		<?php
			echo form_input('tbLocation', $tempatLahir, array('placeholder'=>'Masukkan Kota Tempat Lahir', 'class'=>'form-control', 'required'=>''));
			echo form_error('tbLocation');
		?>
			<input name='tbBirthday' value = '<?php echo $tanggalLahir ?>' type='text' class="form-control" id='datetimepicker1' placeholder="MM/DD/YYYY" required />
        </div>
    </div>
	
	<?php
		echo form_error('tbBirthday');
		echo print_line(2);
		
		echo form_label('No. Telp', 'tbTelp');
		echo print_line(1);
		echo form_input('tbTelp', $hp, array('placeholder'=>'Masukkan Alamat', 'class'=>'form-control', 'required'=>''));
		echo form_error('tbTelp');
		echo print_line(2);
		
		echo form_label('Alamat', 'tbAlamat');
		echo print_line(1);
		echo form_input('tbAlamat', $alamat, array('placeholder'=>'Masukkan Alamat', 'class'=>'form-control', 'required'=>''));
		echo form_error('tbAlamat');
		echo print_line(2);
		
		echo form_submit('btnRegister', 'Register', ['class'=>"btn btn-primary btn-block"]);
		echo form_close();
	?>
</div>

</body>
</html>
