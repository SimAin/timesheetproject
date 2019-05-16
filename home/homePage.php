<?php
 session_start();
    require "homePage.inc.php";
?>

<!DOCTYPE html>
<html class="no-js">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../fontawesome-free/css/all.min.css">
<!-- <link rel="stylesheet" href="css/.css"> -->
<link href="../jquery-ui-1.12.1.custom/jquery-ui.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <img src="../LYRA_Logo.jpg" alt="logo" style="width:180px;height:63px;">
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-cog fa-2x"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="far fa-calendar fa-2x"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../includes/logout.php">Logout</a>
            </li>
        </ul>
    </div>
  </nav>
  <br/>
  <div class="container">
       <form action="homePage.inc.php" method="post">
        <button class="btn btn-lg btn-primary btn-block" id="timesheet" name="timesheet" type="submit">Submit Timesheet</button>
        <button class="btn btn-lg btn-primary btn-block" id="pending" name="pending" type="submit">Manage Saved Timesheets</button>
        <button class="btn btn-lg btn-primary btn-block" id="defaults" name="defaults" type="submit">Set Defaults</button>
        <button class="btn btn-lg btn-primary btn-block" id="history" type="submit">View History</button>
        <button class="btn btn-lg btn-primary btn-block" id="settings" type="submit">Manage Settings</button>
        <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>"/>
      </form> 
    </div>
    <!-- Bootstrap JS -->
    <script src="jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
    <script src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>