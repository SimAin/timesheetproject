<?php
 session_start();
require "defaults.inc.php";

?>

<!DOCTYPE html>
<html lang="en">

<!-- <head>
    <!-- Required meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="fontawesome-free/css/all.min.css">
<!-- <link rel="stylesheet" href="css/.css"> -->
<link href="jquery-ui-1.12.1.custom/jquery-ui.css" rel="stylesheet">




<title>Hello, world!</title>

</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><i class="fab fa-angrycreative fa-3x" style="color: #32e0e0"></i></a>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-cog fa-2x"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-calendar fa-2x"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container">
    <form class="form-signin" action="save_timesheet.php" method="POST">
        <div class="row">
            <div class="col">
                <div class="input-group mb-3">
                    <input type="text" class="form-control dateselect" placeholder="Date" aria-label="Date"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2"><i class="far fa-calendar fa-1x"></i></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-1 border-bottom">
            <div class="col-4 col-sm-6 col-lg-6">
                <h3>Day</h3>
            </div>
            <div class="col-8 col-sm-6 col-lg-6">
                <div class="row">
                    <div class="col-6 col-sm-6 col-lg-6">
                        <h3></h3>
                    </div>
                    <div class="col-6 col-sm-6 col-lg-6">
                        <h3>Hours</h3>
                    </div>
                </div>
            </div>
        </div>

        <?php
        
            foreach($defaultHours as $hours) { 
                foreach($hours as $key => $value){ ?>

                    <div class="row wkDay">
                        <div class="col-4 col-sm-6 col-lg-6">
                            <h4><?=$key;?></h4>
                        </div>
                        <div class="col-8 col-sm-6 col-lg-6 ">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-lg-6">
                                    <!-- <select class="custom-select d-block w-100" id="project" required="">
                                        <option value="">project</option>
                                        <option>project 1</option>
                                        <option>project 2</option>
                                    </select> -->
                                </div>
                                <div class="col-6 col-sm-6 col-lg-6">
                                    <input type="number" class="form-control hours" value="<?=$value;?>" id="<?=$key;?>" name="<?=$key;?>"  aria-label="...">
                                </div>
                            </div>
                        </div>
                    </div>
               <?php }
                
         }
        ?>
       
        <div class="row wkDay">
            <div class="col-4 col-sm-6 col-lg-6">
                <h4>Total</h4>
            </div>
            <div class="col-8 col-sm-6 col-lg-6 ">
                <div class="row d-flex justify-content-end">
                    <div class="col-6 col-sm-6 col-lg-6 ">
                        <input id="totalHours" type="text" class="form-control" placeholder="0" name="totalHours" aria-label="...">
                    </div>
                </div>
            </div>
        </div> 

        <div class="row">
            <div class="mx-auto">
                <button class="btn btn-primary btn-lg" type="submit" id="save-sheet" name="save-sheet" style="width: 300px; margin-top: 20px;">Save</button>
                </form>   
            </div>
        </div>
    </div>



    <!-- Bootstrap JS -->
    <script src="jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
    <script src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/timesheet.js"></script>
    <script>
        $('.dateselect').datepicker({
            dateFormat: "yyyy-mm-dd",
            // startDate: '-3d'
        });
    </script>

</body>

</html>