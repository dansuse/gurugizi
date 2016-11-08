<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<title>Live Chat</title>


	<script src="<?php echo base_url().JS_FOLDER; ?>smooch.min.js"></script>

	<script>
		
	</script>

	<!-- Page styles -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="<?php echo base_url().CSS_FOLDER; ?>material.min.css">
	<link rel="stylesheet" href="<?php echo base_url().CSS_FOLDER; ?>home_style.css">
	<style>
	#view-source {
		position: fixed;
		display: block;
		right: 0;
		bottom: 0;
		margin-right: 40px;
		margin-bottom: 40px;
		z-index: 900;
	}
	</style>
</head>
<body>
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

		<div class="android-header mdl-layout__header mdl-layout__header--waterfall">
			<div class="mdl-layout__header-row">
				<span class="android-title mdl-layout-title">
					<img class="android-logo-image" src="<?php echo base_url().IMAGES_FOLDER; ?>gurugizi-logo.png">
				</span>
				<!-- Add spacer, to align navigation to the right in desktop -->
				<div class="android-header-spacer mdl-layout-spacer"></div>
				<!--div class="android-search-box mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right mdl-textfield--full-width">
					<label class="mdl-button mdl-js-button mdl-button--icon" for="search-field">
						<i class="material-icons">search</i>
					</label>
					<div class="mdl-textfield__expandable-holder">
						<input class="mdl-textfield__input" type="text" id="search-field">
					</div>
				</div-->
				<!-- Navigation -->
				<div class="android-navigation-container">
					<nav class="android-navigation mdl-navigation">
						<a class="mdl-navigation__link mdl-typography--text-uppercase" href="<?php echo site_url(['c_home', 'index']); ?>">Home</a>
						<a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Research</a>
						<a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Recipe</a>
						<?php
							if($this->session->userdata(SESSION_LOGIN_NOW) != false){
								?>
									<a class="mdl-navigation__link mdl-typography--text-uppercase" href="<?php echo site_url(['c_home', 'profile']); ?>">Profile</a>
									<a class="mdl-navigation__link mdl-typography--text-uppercase" href="<?php echo site_url(['c_home', 'livechat']); ?>">Live Chat</a>
									<a class="mdl-navigation__link mdl-typography--text-uppercase" href="<?php echo site_url(['c_home', 'logout']); ?>">Log Out</a>
								<?php
							}else{
								?>
									<a class="mdl-navigation__link mdl-typography--text-uppercase" href="<?php echo site_url(['c_home', 'login']); ?>">Sign In</a>
								<?php
							}
						?>

					</nav>
				</div>
				<span class="android-mobile-title mdl-layout-title">
					<img class="android-logo-image" src="<?php echo base_url().IMAGES_FOLDER; ?>gurugizi-logo.png">
				</span>
			</div>
		</div>



		<div class="android-content mdl-layout__content">
			<a name="top"></a>

			<div class="android-customized-section">
          <div class="android-customized-section-text">
            <div class="mdl-typography--font-light mdl-typography--display-1-color-contrast">Customised by you, for you</div>
            <p class="mdl-typography--font-light">
              Disini kami menghadirkan sebuah layanan dimana Anda dapat langsung berbicara dengan Nutritionist kami. Tekan widget CHAT di pojok kanan bawah untuk memulai.
              <br>
              <!--a href="" class="android-link mdl-typography--font-light">Try your free live chat consultation</a-->
							<p class="android-link mdl-typography--font-light">Try your free live chat consultation</p>
            </p>
          </div>
          <div class="android-customized-section-image"></div>
        </div>

			<footer class="android-footer mdl-mega-footer">
				<div class="mdl-mega-footer--top-section">
					<!--div class="mdl-mega-footer--left-section">
						<button class="mdl-mega-footer--social-btn"></button>
						&nbsp;
						<button class="mdl-mega-footer--social-btn"></button>
						&nbsp;
						<button class="mdl-mega-footer--social-btn"></button>
					</div-->
					<div class="mdl-mega-footer--right-section">
						<a class="mdl-typography--font-light" href="#top">
							Back to Top
							<i class="material-icons">expand_less</i>
						</a>
					</div>
				</div>

				<div class="mdl-mega-footer--middle-section">
					<p class="mdl-typography--font-light">GuruGizi: © 2016 Surabaya, Indonesia</p>
					<!--p class="mdl-typography--font-light">Some features and devices may not be available in all areas</p-->
				</div>



			</footer>
		</div>
	</div>
	<?php
		if($this->session->userdata(SESSION_LOGIN_NOW) == false){
			?>
				<a href="<?php echo site_url(['c_home', 'signup']); ?>"  id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">Register Now</a>
			<?php
		}
	?>

	<script src="<?php echo base_url().JS_FOLDER; ?>material.min.js"></script>
</body>
</html>
