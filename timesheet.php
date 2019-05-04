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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="css/timesheet.css"> 
</head>

<body>

  <div class="container">
       <form action = "../submit_timesheet.php" method="post">
       
          <div class="text-center mb-4">
              <i class="fab fa-angrycreative fa-7x" style="color: #32e0e0"></i>
              <h1 class="h3 mb-3 font-weight-normal">Timesheet</h1>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="hours">Monday</label>
            <div class="col-sm-10">
              <input class="form-control" id="monday" name="monday" placeholder="Prepopulated Data here">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="hours">Tuesday</label>
            <div class="col-sm-10">
              <input class="form-control" id="tuesday" name="tuesday" placeholder="Prepopulated Data here">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="hours">Wednesday</label>
            <div class="col-sm-10">
              <input class="form-control" id="wednesday" name="wednesday" placeholder="Prepopulated Data here">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="hours">Thursday</label>
            <div class="col-sm-10">
              <input class="form-control" id="thursday" name="thursday" placeholder="Prepopulated Data here">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="hours">Friday</label>
            <div class="col-sm-10">
              <input class="form-control" id="friday" name="friday" placeholder="Prepopulated Data here">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="hours">Saturday</label>
            <div class="col-sm-10">
              <input class="form-control" id="saturday" name="saturday" placeholder="Prepopulated Data here">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="hours">Sunday</label>
            <div class="col-sm-10">
              <input class="form-control" id="sunday" name="sunday" placeholder="Prepopulated Data here">
            </div>
          </div>

          <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
                    <p class="mt-5 mb-3 text-muted text-center">© 2019</p>
      </form> 
    </div>
    <!-- Bootstrap JS -->
    <script src="jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
    <script src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>