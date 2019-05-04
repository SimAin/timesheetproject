<?php 
	$db_server="localhost"; 
	$db_username="all_web_users";
	$db_password="password123";
	
	$db_database="timesheet"; 
	
	$db_connection_object = new mysqli($db_server, $db_username, $db_password, $db_database); 

	if ($db_connection_object->connect_error) {
		die("MySQL Connection: " . $db_connection_object->connect_error); 
    } 
    
    $monday=$_POST["monday"];
	$tuesday=$_POST["tuesday"];
	$wednesday=$_POST["wednesday"];
	$thursday=$_POST["thursday"];
	$friday=$_POST["friday"];
	$saturday=$_POST["saturday"];
    $sunday=$_POST["sunday"];
    

	$db_sql = " INSERT INTO `TIMESHEETS` (`ID`, `USERID`, `WeekStart`, `MonHours`, `TusHours`, `WedHours`, `ThursHours`, `FriHours`, `SatHours`, `SunHours`) 
    VALUES (NULL, '0', '2019-04-14', '$monday', '" . $tuesday ."', '" . $wednesday ."', '" . $thursday ."', '" . $friday ."', '" . $saturday ."', '" . $sunday ."'); ";

    $db_results = $db_connection_object->query($db_sql);
    
	if ( $db_connection_object->query($db_sql) === TRUE) {
        header("location: http://localhost/Lyra/Random_Conf.php/");
	
	} else {
		die("Modify User Error: " . $db_sql . "<br>" . $db_connection_object->error);
	}
	
    $db_connection_object->close();
?>