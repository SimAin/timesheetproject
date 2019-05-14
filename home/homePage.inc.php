<?php 

$id=$_SESSION['id'];

if($_POST){
    if(isset($_POST['timesheet'])){
      header("Location: ../timesheet/index.php");
    }elseif(isset($_POST['defaults'])){
      header("location: http://localhost/Lyra/defaults/timesheetDefaults.php");
    }elseif(isset($_POST['pending'])){
      header("location: http://localhost/Lyra/overview/index.php");
    }
}
?>