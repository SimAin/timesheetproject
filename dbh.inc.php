<?php 
    $db_server="localhost"; 
	$db_username="all_web_users";
	$db_password="password123";
	
	$db_database="timesheet"; 

	$db_connection_object = new mysqli($db_server, $db_username, $db_password, $db_database); 
	
	if ($db_connection_object->connect_error) {
		die("MySQL Connection: " . $db_connection_object->connect_error); 
	} 
?>