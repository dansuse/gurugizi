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


				$('#regPass').pwstrength({
		        ui: { showVerdictsInsideProgressBar: true }
		    });
				
				/*
				$('#regCPass').pwstrength({
		        ui: { showVerdictsInsideProgressBar: true }
		    });
				*/
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
	#_login_list{
		list-style-type: none;
	}
	</style>
</head>
<body>

<div id="container">

	<ul id="_login_list">
	<li>
	<div id="_signup" style="display:block;">
	<h1>Register</h1>
	<?php
		//echo validation_errors();
		echo print_line(2);
		echo form_open('c_home/fHandleSignup');
		echo form_label('Username', 'tbUsername');
		echo print_line(1);
		echo form_input('tbUsername', '', array('placeholder'=>'Masukkan Username', 'class'=>'form-control', 'required'=>'', 'onchange'=>'cekIfAvailable(event)', 'onkeypress'=>'this.onchange(event)', 'onpaste'=>'this.onchange(event)', 'oninput'=>'this.onchange(event)', 'autocomplete'=>'off'));
	?>
		<div id="cekUsername" style="height:20px;"></div>
	<?php
		echo print_line(2);

		echo form_label('Nama Lengkap', 'tbFullname');
		echo print_line(1);
		echo form_input('tbFullname', '', array('placeholder'=>'Masukkan Nama Lengkap', 'class'=>'form-control', 'required'=>''));
		echo print_line(2);

		echo form_label('Alamat Email', 'tbEmail');
		echo print_line(1);
		echo form_input('tbEmail', '', array('placeholder'=>'Masukkan Email', 'class'=>'form-control', 'required'=>'', 'autocomplete'=>'off', 'onchange'=>'cekIfUsedAlready(event)', 'onkeypress'=>'this.onchange(event)', 'onpaste'=>'this.onchange(event)', 'oninput'=>'this.onchange(event)'));
	?>
		<div id="cekEmail" style="height:20px;"></div>
	<?php
		echo print_line(2);

		echo form_label('Password', 'tbPassword');
		echo print_line(1);
		echo form_password('tbPassword', '', array('id'=>'regPass', 'placeholder'=>'Masukkan Password', 'class'=>'form-control', 'required'=>''));
		echo print_line(2);

		echo form_label('Konfirmasi Password', 'tbPasswordConf');
		echo print_line(1);
		echo form_password('tbPasswordConf', '', array('id'=>'regCPass', 'placeholder'=>'Konfirmasi Password', 'class'=>'form-control', 'required'=>''));
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

		echo form_label('Kota Domisili Saat Ini', 'tbLocation');
		echo print_line(1);
		echo form_input('tbLocation', '', array('placeholder'=>'Masukkan Kota Tempat Tinggal Sekarang', 'class'=>'form-control', 'required'=>''));
		echo print_line(2);

		echo form_submit('btnRegister', 'Register', ['class'=>"btn btn-primary btn-block"]);

		echo form_close();

	?>
		<a href='#' onclick='klikLink(event)'>Lupa Password?</a>
		<a href='#' onclick='klikLink(event)'>Sign In</a>
	</div>
	</li>
	<li>
		<div id="_signin" style="display:none;">
			<h1>Sign In</h1>
			<?php
				echo print_line(2);
				echo form_open('c_home/fHandleLogin');

				echo form_label('Username', 'tbUsername');
				echo print_line(1);
				echo form_input('tbUsername', '', array('placeholder'=>'Masukkan Username', 'class'=>'form-control', 'required'=>''));
				echo print_line(2);

				echo form_label('Password', 'tbPassword');
				echo print_line(1);
				echo form_password('tbPassword', '', array('placeholder'=>'Masukkan Password', 'class'=>'form-control', 'required'=>''));
				echo print_line(2);

				echo form_submit('btnLogin', 'Login', ['class'=>"btn btn-primary btn-block"]);

				echo form_close();
			?>
			<a href='#' onclick='klikLink(event)'>Buat Akun</a>
			<a href='#' onclick='klikLink(event)'>Lupa Password?</a>
		</div>
	</li>
	<li>
		<div id="_forgot" style="display:none;">
			<h1>Forgot Password</h1>
			<?php
				echo print_line(2);
				echo form_open('c_home/fHandleForgot');

				echo form_label('Masukkan Email', 'tbEmail');
				echo print_line(1);
				echo form_input('tbEmail', '', array('placeholder'=>'Masukkan Email pada saat register', 'class'=>'form-control', 'required'=>''));
				echo print_line(2);

				echo form_submit('btnForgot', 'Request For Password', ['class'=>"btn btn-primary btn-block"]);

				echo form_close();
			?>
			<a href='#' onclick='klikLink(event)'>Buat Akun</a>
			<a href='#' onclick='klikLink(event)'>Sign In</a>
		</div>
	</li>

	</ul>
</div>
	<script>
		var lastUsername = "";
		var lastEmail = "";
		function klikLink(e){
			var temp = e.target.innerHTML
			$('#_signup').css('display', 'none');
			$('#_signin').css('display', 'none');
			$('#_forgot').css('display', 'none');
			if(temp == "Buat Akun"){
				$('#_signup').css('display', 'block');
			}else if(temp == "Sign In"){
				$('#_signin').css('display', 'block');
			}else{
				$('#_forgot').css('display', 'block');
			}
		}
		function cekIfAvailable(e){
			if(lastUsername != e.target.value && e.target.value != ""){
				lastUsername = e.target.value;
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						$('#cekUsername').html(this.responseText);
					}
				};
				xhttp.open("GET", "<?php echo site_url('c_home/cekUsernameTersedia/'); ?>" + lastUsername, true);
				xhttp.send();
			}

			else if(e.target.value == ""){
				$('#cekUsername').html('');
			}
		}
		function cekIfUsedAlready(e){
			if(lastEmail != e.target.value && e.target.value != ""){
				lastEmail = e.target.value;
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						$('#cekEmail').html(this.responseText);
					}
				};
				xhttp.open("GET", "<?php echo site_url('c_home/cekEmailBelumPunyaAkun/'); ?>" + encodeURIComponent(lastEmail), true);
				xhttp.send();
			}
			else if(e.target.value == ""){
				$('#cekEmail').html('');
			}
		}
	</script>
</body>
</html>
