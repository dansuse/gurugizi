<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!--title></title-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().CSS_FOLDER; ?>header.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().CSS_FOLDER; ?>breadcrumb.css">
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
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#header {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
		text-align: center;
	}

	</style>
</head>
<body>

<div id="header">

	<div class="wrap">
	<span class="decor"></span>
	<nav>
	  <ul class="primary">
	    <li>
	      <a href='<?php echo site_url(["c_home", "about"]); ?>'>About Us</a>
	    </li>
	    <li>
	      <a href='<?php echo site_url(["c_home", "consulting"]); ?>'>Consulting</a>
	      <ul class="sub">
	        <li><a href="<?php  ?>">Personalised Nutrition</a></li>
	        <li><a href="">Weight Management</a></li>
	        <li><a href="">Meal Planning</a></li>
					<li><a href="">Nutripreneurship</a></li>
					<li><a href="">Pre-Wedding Nutrition</a></li>
	      </ul>
	    </li>
	    <li>
	      <a href='<?php echo site_url(["c_home", "research"]); ?>'>Research</a>

	    </li>
	    <li>
	      <a href="">Recipe</a>
	    </li>
	    <li>
	      <a href='<?php echo site_url(["c_home", "livechat"]); ?>'>Contact</a>
	    </li>
	  </ul>
	</nav>
	</div>
	<h1>GURUGIZI</h1>
	<h1>NUTRITION COURSE AND CONSULTING</h1>
	<hr>
	<img src="<?php echo base_url().IMAGES_FOLDER; ?>img_buah.png">
	<hr>
	

</div>

</body>
</html>
