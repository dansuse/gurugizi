<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>GuruGizi</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url().CSS_FOLDER; ?>bootstrap.min.css">
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	h1 {
		color: #444;
		background-color: transparent;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 0 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
		text-align: center;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	.btn{
		margin: 50px;
	}

	</style>
	<script src="<?php echo base_url().JS_FOLDER; ?>jquery-3.1.1.min.js"></script>
	<script>
		$( document ).ready(function() {

		});

	</script>
</head>
<body>

<div id="container">

	<div id="body">
    <h3 style="text-align:center;"><a href="<?php echo site_url(['c_home', 'consulting', 'personalised-nutrition']); ?>">Personalised Nutrition</a></h3>
    <p>&nbsp;</p>
    <h3 style="text-align:center;"><a href="https://gurugizi.com/consulting/weight-management/">Weight Management</a></h3>
    <p>&nbsp;</p>
    <h3 style="text-align:center;"><a href="https://gurugizi.com/consulting/meal-planning/">Meal Planning</a></h3>
    <p>&nbsp;</p>
    <h3 style="text-align:center;"><a href="https://gurugizi.com/consulting/nutripreneurship/">Nutripreneurship</a></h3>
    <p>&nbsp;</p>
    <h3 style="text-align:center;"><a href="https://gurugizi.com/consulting/pre-wedding-nutrition/">Pre-Wedding Nutrition</a></h3>
	</div>

</div>

</body>
</html>
