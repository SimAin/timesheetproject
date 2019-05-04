<?php 
	$db_server="localhost"; 
	$db_username="all_web_users";
	$db_password="password123";
	
	$db_database="timesheet"; 
	
	$db_connection_object = new mysqli($db_server, $db_username, $db_password, $db_database); 

	if ($db_connection_object->connect_error) {
		die("MySQL Connection: " . $db_connection_object->connect_error); 
	} 
	$username=$_GET["username"];
	$password=$_GET["password"];
	
	$db_sql = " SELECT `UID` FROM LOGIN_DETAILS WHERE `USERNAME` = '" . $username ."' AND 'PASSWORD' = '" . $password ."'";

	$db_results = $db_connection_object->query($db_sql);
	
	if($db_results->num_rows === 1) { 
		header("location: http://localhost/Lyra/timesheet.php/");
	} else {
		echo "<br>Unfortunately, no records were found";
	}
	
    $db_connection_object->close();
?>