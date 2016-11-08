<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>GuruGizi</title>

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



	#body {
		margin: 0 15px 0 15px;
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
	ul li{
		display: block;
	}

	</style>
</head>
<body>

<div id="container">
	<h1>Personalised Nutrition</h1>
	<div id="body">
		<p style="text-align:center;"><span style="color:#008000;">&#8220;Nutrition is vital for the health of every individual. It is also important to consider health maintenance as a potential action for reducing the likelihood and occurrence of disease. The nutritional needs of a person are influenced by the lifestyle and genetics.&#8221;</span></p>
		<h4><span style="color:#cf0000;">The topics of personalised nutrition service cover:</span></h4>
		<ul>
		<li>Lifestyle and Nutrition</li>
		<li>Food Allergy and Intolerance</li>
		<li>Irritable Bowel Syndrome</li>
		<li>Diet and disease including hypertension, diabetes, cancer and cardiovascular disease</li>
		</ul>
		<p style="text-align:right;"><em>*The main principal of our service is a nutritional approach. Contact us to consult your personal nutrition problem</em></p>

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>
