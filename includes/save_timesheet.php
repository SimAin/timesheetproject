<?php 
	if(isset($_POST['save-sheet'])){
		// Requires the connection script.
		require '../dbh.inc.php';

		$week=$_POST["dateselect"];
		//$project=$_POST["project"];
		$monday=$_POST["Monday"];
		$monProj=$_POST["Monday_project"];
		$tuesday=$_POST["Tuesday"];
		$tuesProj=$_POST["Tuesday_project"];
		$wednesday=$_POST["Wednesday"];
		$wedProj=$_POST["Wednesday_project"];
		$thursday=$_POST["Thursday"];
		$thurProj=$_POST["Thursday_project"];
		$friday=$_POST["Friday"];
		$friProj=$_POST["Friday_project"];
		$saturday=$_POST["Saturday"];
		$satProj=$_POST["Saturday_project"];
		$sunday=$_POST["Sunday"];
		$sunProj=$_POST["Sunday_project"];
		$id=$_POST['id'];
		$saved=1;
		$submitted=0;
		

			$db_sql = sprintf("INSERT INTO timesheets (USERID, WeekStart, Monday,  Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday, Saved_status, Submitted, Mon_project, Tues_project, Wed_project, Thurs_project, Fri_project, Sat_project, Sun_project) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s');", $id, $week, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday, $saved, $submitted, $monProj, $tuesProj, $wedProj, $thurProj, $friProj, $satProj, $sunProj);

			$db_results = $db_connection_object->query($db_sql);

			
			if ( $db_results === TRUE) {
				header("location: ../overview/index.php");
			} else {
				print_r($db_results);
				die("Modify User Error: " . $db_sql . "<br>" . $db_connection_object->error);
			}
		
			
			$db_connection_object->close();
	}
?>