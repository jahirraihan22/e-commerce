<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>
    
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Bitter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Anton|Kulim+Park|Montserrat|Muli|Raleway|Solway|Varela+Round&display=swap" rel="stylesheet">

  </head>
  <body>
    <div class="container-fluid bg-login-form">
        <div class="login-form">
           <h3>Login now</h3>
            <form action="../functions/logic.php" method="post" onsubmit="return loginValidation()">
              <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" name="email" id="login-email">
              </div>
              <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" name="pass" class="form-control" id="login-pwd">
              </div>
              <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
              </div>
              <button type="submit" name="login" class="btn btn-default" id="login-btn">Login</button><br>
                <span>Didn't Register Yet? <a href="#">Register now.</a></span>
            </form>
        </div>
    </div>
<?php include('footer.php'); ?>