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
	<h1>Registration Form</h1>
	<?php
		//echo validation_errors();
		echo print_line(2);
		echo form_open('c_home/fHandleSignup');
		echo form_label('Nickname', 'tbNickName');
		echo print_line(1);
		echo form_input('tbNickName', '', array('placeholder'=>'Masukkan Nama Panggilan', 'class'=>'form-control', 'required'=>''));
		echo print_line(2);

		echo form_label('Fullname', 'tbFullname');
		echo print_line(1);
		echo form_input('tbFullname', '', array('placeholder'=>'Masukkan Nama Lengkap', 'class'=>'form-control', 'required'=>''));
		echo print_line(2);

		echo form_label('Email Address', 'tbEmail');
		echo print_line(1);
		echo form_input('tbEmail', '', array('placeholder'=>'Masukkan Email', 'class'=>'form-control', 'required'=>''));
		echo print_line(2);

		echo form_label('Password', 'tbPassword');
		echo print_line(1);
		echo form_password('tbPassword', '', array('placeholder'=>'Masukkan Password', 'class'=>'form-control', 'required'=>''));
		echo print_line(2);

		echo form_label('Konfirmasi Password', 'tbPasswordConf');
		echo print_line(1);
		echo form_password('tbPasswordConf', '', array('placeholder'=>'Konfirmasi Password', 'class'=>'form-control', 'required'=>''));
		echo print_line(2);

		echo form_label('Jenis Kelamin', 'rbGender');
		echo print_line(1);
		echo "<div class = 'radio'>";
		echo "<label>";
		echo form_radio('rbGender', 'L', false, ['required'=>'']);
		echo "Laki-Laki";
		echo "</label>";
		echo "</div>";

		echo "<div class = 'radio'>";
		echo "<label>";
		echo form_radio('rbGender', 'P', false, ['required'=>'']);
		echo "Perempuan";
		echo "</label>";
		echo "</div>";
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
					<input name='tbBirthday' type='text' class="form-control" id='datetimepicker1' placeholder="MM/DD/YYYY" required />
        </div>

    </div>
	<?php
		echo print_line(2);

		echo form_label('Location', 'tbLocation');
		echo print_line(1);
		echo form_input('tbLocation', '', array('placeholder'=>'Masukkan Kota Tempat Tinggal Sekarang', 'class'=>'form-control', 'required'=>''));
		echo print_line(2);

		echo form_submit('btnRegister', 'Register', ['class'=>"btn btn-primary btn-block"]);

		echo form_close();
	?>

</div>

</body>
</html>
