<?php
  // First we start a session which allow for us to store information as SESSION variables.
  session_start();
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../css/login.css"> 
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="container">
        <?php
        if (!isset($_SESSION['id'])) {

          echo '<form class="form-signin" action= "login.inc.php" method="POST">
          <div class="text-center mb-4">
              <!-- <img class="mb-4" src="" alt="" width="72" height="72"> -->
              <img src="../LYRA_Logo.jpg" alt="logo" style="width:180px;height:63px;">
              <h1 class="h3 mb-3 font-weight-normal">FDM Time Sheet</h1>
          </div>

          <div class="form-label-group">
              <input id="username" name ="username" class="form-control" placeholder="Email address" required=""
                  autofocus="">
              <label for="username">Email address</label>
          </div>

          <div class="form-label-group">
              <input type="password"id="password" name="password" class="form-control" placeholder="Password" required="">
              <label for="password">Password</label>
          </div>

          <div class="checkbox mb-3">
              <label>
                  <input type="checkbox" value="remember-me"> Remember me
              </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="login-submit">Sign in</button>
          <p class="mt-5 mb-3 text-muted text-center">© 2019</p>
      </form>';
        }
        else if (isset($_SESSION['id'])) {
            echo($_SESSION['id']);
          echo '<form action="includes/logout.inc.php" method="post">
            <button type="submit" name="login-submit">Logout</button>
          </form>';
        }
        ?>
    </div>
    <!-- Bootstrap JS -->
    <script src="../jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
    <script src="../jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>