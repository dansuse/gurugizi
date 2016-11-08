<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ubah Profile</title>
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
	<h1>Ubah Profile</h1>
	<?php
		//echo validation_errors();
		echo print_line(2);
		echo form_open('c_home/fHandleUbahProfile');

		?>

		<div class="form-group">
		    <label>Berat Badan</label>
		    <div class="input-group">
		      <input name="tbBeratBadan" type="text" class="form-control" placeholder="Masukkan Berat Badan">
		      <div class="input-group-addon">kg</div>
		    </div>
		  </div>

			<div class="form-group">
			    <label>Tinggi Badan</label>
			    <div class="input-group">
			      <input name="tbTinggiBadan" type="text" class="form-control" placeholder="Masukkan Tinggi Badan">
			      <div class="input-group-addon">cm</div>
			    </div>
			  </div>
				<label>Ceritakan tentang kondisi kesehatan Anda saat ini</label>
				<textarea name="tbKeterangan" class="form-control" rows="3"></textarea>
		<?php

		?>
		<!--div class='input-group date' id='datetimepicker1'>
        <input type='text' class="form-control" name='tbBirthday' />
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div-->

	<?php
		echo print_line(2);
		echo form_submit('btnUbahProfile', 'Ubah Profile', ['class'=>"btn btn-primary btn-block"]);

		echo form_close();
	?>

</div>

</body>
</html>
