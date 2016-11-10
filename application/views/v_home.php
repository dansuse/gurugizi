<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>GuruGizi | Konsultasi Gizi Online</title>

    <style>
	@font-face{	font-family:myfont;
			src: url("../Roboto.ttf")}
			
	@font-face{	font-family:myyfont;
			src: url("../Light.ttf")}
			
	@font-face{	font-family:myyyfont;
			src: url("../Lighti.ttf")}		
			
	*{
		margin: 0;
		padding: 0;
	}
	body{
		
		width: 100%;
		height: 100%;
	}
	#container{
		background: url('../assets/images/bghome.jpg');
		background-position: center;
		background-repeat: no-repeat;
		background-size: 100%;
		width: 100%;
		height: 100%;
		position: fixed;
		opacity: 0.2;
	}
	#menubar{
		background-color: white;
		opacity: 0.4;
		width: 100%;
		height: 12%;
		position: absolute;
	}
	#logo{
		background: url('../assets/images/logon.png');
		background-position: center;
		background-repeat: no-repeat;
		background-size: 100%;
		position: absolute;
		width: 17%;
		height: 12%;
		margin-left: 6%;
	}
	#menu{
		background-color: transparent;
		position: absolute;
		margin-left: 45%;
		margin-top: 2%;
		width: 50%;
		text-align: right;
	}
	.mbup{
		font-family: myfont;
		font-size: 120%;
		color: white;
		padding: 2%;
		text-decoration: none;
	}
	.mbup:hover{
		border-bottom: 4px solid orange;
	}
	#backslogan{
		background: url('../assets/images/logonews.jpg');
		background-position: center;
		background-repeat: no-repeat;
		background-size: 100%;
		width:100%;
		height: 100%;
		position: absolute;
	}
	#slogan{
		color: white;
		position: absolute;
		font-family: myfont;
		font-weight: bold;
		font-size: 250%;
		margin-top: 15%;
		margin-left: 25%;
	}
	#sub-slogan{
		color: white;
		position: absolute;
		font-family: myyyfont;
		font-weight: bold;
		font-size: 90%;
		margin-top: 20%;
		margin-left: 32%;
	}
	#content{
		background: url('../assets/images/content.jpg');
		background-position: center;
		background-repeat: no-repeat;
		background-size: 100%;
		position: absolute;
		width: 35%;
		height: 45%;
		margin-left: 32%;
		margin-top: 29%;
		border-radius: 1000px;
	}
	#shadow-content{
		background: url('../assets/images/shadowcontent.jpg');
		background-position: center;
		background-repeat: no-repeat;
		background-size: 100%;
		position: absolute;
		width: 35%;
		height: 45%;
		margin-left: 32%;
		margin-top: 29%;
		border-radius: 1000px;
		opacity: 1;
		transition: 1s;
	}
	#shadow-content:hover{
		opacity: 0;
		transition: 1s;
	}
	#contents{	
		position: absolute;
		width: 50%;
		height: 30%;
		margin-left: 25%;
		margin-top: 55%;
		font-size: 120%; 
		font-family: myyfont;
		text-align: center;
		color: grey;
	}
	#contents b{
		font-size: 150%;
	}
	#imgcont{
		background: url('../assets/images/health.jpg');
		background-position: center;
		background-repeat: no-repeat;
		background-size: 100%;
		position: absolute;
		width: 50%;
		height: 50%;
		margin-top: 70%;
		margin-left: 25%;
		border-radius: 500px;
	}
	.pendaftaran{
		background-color: darkred;
		text-decoration: none;
		position: fixed;
		font-family: myfont;
		font-size: 100%;
		font-weight: bold;
		width: 10%;
		color: white;
		height: 3%;	
		padding: 1%;
		text-align: center;
		border-radius: 1000px;
		margin-top: 45%;
	}
	#btnregister{
		margin-left: 73%;
	}
	#btnjoin{
		margin-left: 86%;
	}
	#footer{
		background-color: black;
		position: absolute;
		width: 98%;
		padding: 1%;
		margin-top: 100%;
		color: white;
		opacity: 0.8;
		font-family: myyyfont;
		font-size: 80%;
	}
    </style>
  </head>
  <body>
  <div id = "container"></div>
  <div id = "backslogan"></div>
  <div id = "menubar"></div>
  <div id = "logo"></div>
  <div id = "menu">
	<a class="mbup" href="<?php echo site_url(['c_home', 'index']); ?>">Home</a>
	  <a class="mbup" href="">Research</a>
	  <a class="mbup" href="">Recipe</a>
	  <?php
		if($this->session->userdata(SESSION_LOGIN_NOW) != false){
		  ?>
			<a class="mbup" href="<?php echo site_url(['c_home', 'profile']); ?>">Profile</a>
			<a class="mbup" href="<?php echo site_url(['c_home', 'livechat']); ?>">Live Chat</a>
			<a class="mbup" href="<?php echo site_url(['c_home', 'logout']); ?>">Log Out</a>
		  <?php
		}else{
		  ?>
			<a class="mbup" href="<?php echo site_url(['c_home', 'login']); ?>">Sign In</a>
		  <?php
		}
	  ?>
  </div>
	<div id = "slogan">NUTRITION COURSE & CONSULTING</div>
  <div id = "sub-slogan">Selamat Datang di GuruGizi. Konsultasi Gizi Online Pertama di Indonesia</div>
	<div id = "content">
	</div>
	<div id = "shadow-content">
	</div>
	<div id = "contents">
		<b>Hidup Sehat</b><br><br>
		Cari diri Anda yang terbaik di sini. <br>
		Temukan cara baru untuk menjalani <br>
		kehidupan yang inspiratif melalui<br>
		Keindahan Alam, Gizi dan Diet, Gaya Hidup Aktif & Hubungan yang Lebih Baik.
	</div>
	<div id = "imgcont"></div>
	<div id = "footer">
		<p>GuruGizi: &copy; 2016 Surabaya, Indonesia</p>
	</div>
	<?php
      if($this->session->userdata(SESSION_LOGIN_NOW) == false){
        ?>
          <a href="<?php echo site_url(['c_home', 'signup']); ?>"  id="btnregister" class = "pendaftaran">Register Now</a>
		  <a href="<?php echo site_url(['c_signup', 'nutritionist']); ?>"  id="btnjoin" class = "pendaftaran">Join Us</a>
        <?php
      }
    ?>
  </body>
</html>