<?php include 'phpSource/userSession.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="icon" href="images/logo.ico" type="image/ico" sizes="16x16">
  <title>TILAPIA | Culture </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Stlying-->
  <link rel="stylesheet" href="includes/styling.css">
  <link href="includes/sweetalert.css" rel="stylesheet" type="text/css"/>
  <script src="includes/sweetalert.min.js" type="text/javascript"></script>
</head>

<!-- Log in body-->
<body style="background-image:url('dist/img/d.jpg');opacity:0.8">
  <div id="card">
    <div id="card-content">
      <div id="card-title">
        <h2 style="color:blue;font-family:raleway">TILAPIA FARM <br> <small style="color:green">Production & Harvest System</small></h2>
        <div class="underline-title"></div>
      </div>
      <form method="post" action="" class="form">
        <label for="user-email" style="padding-top:13px">
            &nbsp;Email
          </label>
        <input id="user-email" class="form-content" type="email" name="email" autocomplete="on" required />
        <div class="form-border"></div>
        <label for="user-password" style="padding-top:22px">&nbsp;Password
          </label>
        <input id="user-password" class="form-content" type="password" name="pass" autocomplete="off"  required />
        <div class="form-border"></div>
        <a href="#">
          <legend id="forgot-pass" onclick="passForget()">Forgot password?</legend>
        </a>
        <input id="submit-btn"  style="margin-top:5%" type="submit" name="login" value="LOGIN" />
        <a href="#" id="signup">Don't have account yet?</a>
      </form>
    </div>
  </div>
</body>
</html>

<?php include 'phpSource/logIn.php'; ?>
<script>
  function passForget(){
      var a =  prompt('Enter your old password');
      return a;
  }
</script>