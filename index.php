<?php 
	//this section will be used to hold php instructions
	$currentTime = date("d M - H:i", time() );
	
	
	//it is suggested that you use the existing php database modules (already available if you have installed a MAMP (or similar) development 
	//environment. although there are several possible options for using the MYSQLi (MySQL Improved) extension we will focus on the ‘object orientated’ 
	//approach (by using this common industry standard approach you will be able to quickly access and utilise a collection of prebuilt functions 
	//that will simplify the development of your system and allow it to be integrated more easily with other possible frameworks in the future).
	//
	//for more information on the mysqli (extension), its use and functions etc - please see: https://www.php.net/manual/en/book.mysqli.php

	
	//create some database connection variables - this makes it easier to read the code there are 3 basic details needed:
	//1. the address of the server - as our database server is on the same machine as our web server we can use 'localhost'.
	//2. the name of the user that EVERYONE who accesses this page will use to authentic a request to connect and execute database instructions.	
	//3. the password used for the "EVERYONE" user name.
	
	//because PHP variables don’t specify type (e.g. INT, etc) they're declared using "$"
	//for readability and to more easily associate them with specific parts of the software we have prefixed the letters "db_" but that is not essential
	$db_server="localhost"; 
	$db_username="all_web_users";
	$db_password="password123";
	
	$db_database="timesheet"; //in addition to details on the server, user and password - we also need to specify the database to use
	
	
	//use php's mysqli extension to authentic and establish a connection to the database server holding the information 
	//create a variable to "hold" the database connection and execute/use and following or helpful MySQL functions (another name for a function is “method”)
	$db_connection_object = new mysqli($db_server, $db_username, $db_password, $db_database); 

	//check to see if any errors were generated after executing the previous instruction
	if ($db_connection_object->connect_error) {
		
		//die is a php function that displays a message and causes the program to terminate immediately
		//this is helpful remember, if we can’t connect we won’t be able to do much
		die("MySQL Connection: " . $db_connection_object->connect_error); 
	} 
	
	//echo is a php instruction that "prints" a string; this does not immediately mean it will show on screen remember that it will "print" 
	//to the web page; consider the earlier example that added time to the page's title tab – where you “print” information can be used to do 
	//all sorts of interesting things that you’ll explore later
//	echo "MySQL Connection: Okay"; 


	//prepare a valid sql instruction
	$db_sql = " SELECT UID, Forename, Surname, Email FROM USERS";

	//use the query function (method) to execute the sql instruction and store the results in the db_results variable
	$db_results = $db_connection_object->query($db_sql);

	//we can check the number of records that were SELECTED in the previous instruction via the results "num_rows" property 
//	if($db_results->num_rows > 0) { 
//		//the results include at least 1 record
//		echo "<br>Found, " . $db_results->num_rows . " records";
//	} else {
//		//unfortunately, the sql instruction did not match any data - this may be that there is no data (or the query was not correct)
//		echo "<br>unfortunately, no records were found";
//	}
	
	
	//once we have completed all our current sql instructions we should close the connection (this helps the server manage its resources)
	$db_connection_object->close();


?>
<!doctype html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Time Card <?php echo $currentTime; ?></title>
		
		<style>
			#userlist {
				width: 100%;
				background-color: LightGray;
				
			}
			#userlist td {
				border-bottom: 1px solid DarkGrey;
			}
			
		</style>
		
		<script>
			//this section will be used to hold javascript instructions
		</script>	
	</head>
		
	<body>
		<div>
			Welcome to the Time Card App
			
			<table id="userlist" >
				<tr style="font-weight: bold;">
					<td style="width: 100px;">Id</td>
					<td style="width: 300px;">Name</td>
					<td>Email Address</td>
				</tr>
				<?php
					if($db_results->num_rows > 0) { 
						while($row = $db_results->fetch_assoc()) {
				?>
							<tr>
								<td><?php echo $row["UID"]; ?></td>
								<td><?php echo $row["Forename"] . " " . $row["Surname"]; ?></td>
								<td><?php echo $row["Email"]; ?></td>
							</tr>
				<?php 
						}
					} else {
				?>
							<tr colspan=3>
								<td>No Records Found.</td>
							</tr>
				<?php 
					}
				?>
			</table>
			
		</div>
	</body>

</html>