<?php
 session_start();
require "index.inc.php";

?>

<!DOCTYPE html>
<html lang="en">

<!-- <head>
    <!-- Required meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../fontawesome-free/css/all.min.css">
<!-- <link rel="stylesheet" href="css/.css"> -->
<link href="../jquery-ui-1.12.1.custom/jquery-ui.css" rel="stylesheet">




<title>Hello, world!</title>

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


    <div class="container">
		
		<?php
		foreach($overview as $sheet) {?>
			<p>
				Timesheet - <?=$sheet['ID']?>
				<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample<?=$sheet['ID']?>" aria-expanded="false" aria-controls="collapseExample">
					Show
				</button>
			</p>
			<div class="row collapse" id="collapseExample<?=$sheet['ID']?>" style="border: 1px solid black; margin: 10px 0;">
			
				<?php 
				foreach($sheet as $key => $value){ 
					if($key == "Saved_status" || $key == "Submitted"){
						continue;
					}
				?>
					
				<div class="col-4 col-sm-6 col-lg-6" style="border-bottom: 1px solid #c8c8c8;">
					<p><b><?=$key;?></b></p>
				</div>
				<div class="col-8 col-sm-6 col-lg-6 "  style="border-bottom: 1px solid #c8c8c8;">
					<div class="row">
						<div class="col-6 col-sm-6 col-lg-6">
							<p><?=$value;?></p>
						</div>
					</div>
				</div>
						
				<?php 
				} 
					if($sheet['Submitted'] == 0){?>
						<form method="POST" action="../includes/submit_timesheet.php" style="margin-top: 20px;">
							<input class="btn btn-success" type="submit" name="action" value="Submit"/>
							<input class="btn btn-danger" type="submit" name="action" value="Delete"/>
							<input type="hidden" name="id" value="<?php echo $sheet['ID']; ?>"/>
						</form>
						<!-- <button class="btn btn-primary btn-lg" type="submit" id="submit-sheet" name="submit-sheet" style="width: 300px; margin-top: 20px;">Submit</button>
						<button class="btn btn-primary btn-lg" type="submit" id="del-sheet" name="del-sheet" style="width: 300px; margin-top: 20px;">Deleted</button> -->
				<?php
				}?>
			
			</div>
		<?php 
		}?>

		<br/>
		<form method="POST" action="index.inc.php" style="margin-top: 20px;">
			<button class="btn btn-lg btn-secondary" id="home" name="home" type="submit">Home</button>
			<input type="hidden" name="id" value="<?php echo $sheet['ID']; ?>"/>
		</form>

    </div>



    <!-- Bootstrap JS -->
    <script src="../jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
    <script src="../jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>