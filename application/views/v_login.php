<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="<?php echo base_url().JS_FOLDER; ?>modernizr.js" type="text/javascript"></script>

    <script src='<?php echo base_url().JS_FOLDER; ?>jquery-3.1.1.min.js'></script>

    <link rel="stylesheet" href="<?php echo base_url().CSS_FOLDER; ?>reset.css">

    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="<?php echo base_url().CSS_FOLDER; ?>login_style.css">





  </head>

  <body>

    <form action="http://localhost/ci/index.php/c_home/fHandleLogin" method="post" class="login">

  <fieldset>

  	<legend class="legend">Login</legend>

    <div class="input">
    	<input name="tbEmail" type="email" placeholder="Email" required />
      <span><i class="fa fa-envelope-o"></i></span>
    </div>

    <div class="input">
    	<input name="tbPassword" type="password" placeholder="Password" required />
      <span><i class="fa fa-lock"></i></span>
    </div>

    <button type="submit" class="submit"><i class="fa fa-long-arrow-right"></i></button>

  </fieldset>

  <div class="feedback">
  	login successful <br />
    redirecting...
  </div>
  <?php
    if(validation_errors() != ""){
/*
      echo "<script src='".base_url().JS_FOLDER."jquery-3.1.1.min.js'></script>";
      echo "<script>";
      echo "alert('tes');";
      echo '$(".failed").show().animate({"opacity":"1", "bottom":"-80px"}, 400)';
      echo "</script>";
      */

      ?>
      <script>
      $( document ).ready(function() {
        $(".failed").show().animate({"opacity":"1", "bottom":"-80px"}, 400);
      });
      </script>
      <?php
    }else{
      ?>
      <script>
        //alert("yee");
      </script>
      <?php
    }
  ?>
  <div class="failed">
  	login failed <br />
    username dan password tidak valid...
  </div>

</form>



    <script src="<?php echo base_url().JS_FOLDER; ?>login_index.js"></script>


  </body>
</html>
