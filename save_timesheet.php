<?php 
	if(isset($_POST['save-sheet'])){
		// Requires the connection script.
		require 'dbh.inc.php';

		$week=$_POST["dateselect"];
		//$project=$_POST["project"];
		$monday=$_POST["Monday"];
		$tuesday=$_POST["Tuesday"];
		$wednesday=$_POST["Wednesday"];
		$thursday=$_POST["Thursday"];
		$friday=$_POST["Friday"];
		$saturday=$_POST["Saturday"];
		$sunday=$_POST["Sunday"];
		$id=$_SESSION['id'];
		$saved=1;
		$submitted=0;
		
			$db_sql = "INSERT INTO timesheets (USERID, WeekStart, Monday,  Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday, Saved_status, Submitted) VALUES ('$id', '$week', '$monday', '$tuesday', '$wednesday', '$thursday', '$friday', '$saturday', '$sunday', '$saved', '$submitted');";

			$db_results = $db_connection_object->query($db_sql);

			
			if ( $db_results === TRUE) {
				header("location: ./Random_Conf.php");
			} else {
				print_r($db_results);
				die("Modify User Error: " . $db_sql . "<br>" . $db_connection_object->error);
			}
		
			
			$db_connection_object->close();
	}
?>