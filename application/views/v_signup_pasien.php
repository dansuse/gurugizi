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
	<h1>Registration Form Pasien</h1>
	
	<?php
		if(isset($error))
		{
			echo $error;
		}
		
		if(!isset($nama)){$nama = '';}
		if(!isset($email)){$email = '';}
		if(!isset($jenis_kelamin)){$jenis_kelamin = '';}
		if(!isset($tanggal_lahir)){$tanggal_lahir = '';}
		if(!isset($domisili)){$domisili= '';}
	?>
	
	<?php
		//echo validation_errors();
		echo print_line(2);
		echo form_open('c_signup/fHandlePasien');
		
		echo form_label('Name', 'tbName');
		echo print_line(1);
		echo form_input('tbName', $nama, array('placeholder'=>'Masukkan Nama', 'class'=>'form-control', 'required'=>''));
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

		$laki = false;
		$perempuan = false;
		if($jenis_kelamin == 'L'){$laki = true;}
		if($jenis_kelamin == 'P'){$perempuan = true;}
		
		echo form_label('Jenis Kelamin', 'rbGender');
		echo print_line(1);
		echo "<div class = 'radio'>";
		echo "<label>";
		echo form_radio('rbGender', 'L', $laki, ['required'=>'']);
		echo "Laki-Laki";
		echo "</label>";
		echo "</div>";

		echo "<div class = 'radio'>";
		echo "<label>";
		echo form_radio('rbGender', 'P', $perempuan, ['required'=>'']);
		echo "Perempuan";
		echo "</label>";
		echo "</div>";
		echo form_error('rbGenderf');
		echo print_line(2);

		echo form_label('Tanggal Lahir', 'dtpBirthday');
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
				<input name='tbBirthday' value = "<?php echo $tanggal_lahir; ?>" type='text' class="form-control" id='datetimepicker1' placeholder="DD/MM/YYYY" required />
        </div>

    </div>
	<?php
		echo form_error('tbBirthday');
		echo print_line(2);

		echo form_label('Location', 'tbLocation');
		echo print_line(1);
		echo form_input('tbLocation', $domisili, array('placeholder'=>'Masukkan Kota Tempat Tinggal Sekarang', 'class'=>'form-control', 'required'=>''));
		echo form_error('tbLocation');
		echo print_line(2);

		echo form_submit('btnRegister', 'Register', ['class'=>"btn btn-primary btn-block"]);
		echo form_close();
	?>

</div>

</body>
</html>
