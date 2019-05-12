<?php 
	// Here we check whether the user got to this page by clicking the proper login button.
	if(isset($_POST['login-submit'])){
		
		// Requires the connection script.
		require 'dbh.inc.php';

		// We grab all the data which we passed from the login form so we can use it later.
		$username=$_POST["username"];
		$password=$_POST["password"];

		// Check for any empty inputs
		if(empty($username) || empty($password)){
			header("Location: ./login.php?error=emptyfields&username=".$username);
    		exit();
		} else {
			// We will connect to the database using prepared statements which work by us sending SQL to the database first, and then later we fill in the placeholders by sending the users data.
			$db_sql = "SELECT * FROM login_details WHERE USERNAME=?;";

			// Here we initialize a new statement using the connection from the dbh.inc.php file.
			$stmt = $db_connection_object->stmt_init();

			// Then we prepare our SQL statement AND check if there are any errors with it.
			if(!$stmt->prepare($db_sql)){
				 // If there is an error we send the user back to the login page.
				header("Location: ./login.php?error=sqlerror");
				exit();
			}else {
				// If there is no error then we continue the script!

				// Next we need to bind the type of parameters we expect to pass into the statement, and bind the data from the user.
				$stmt->bind_param("s", $username);
				 // Then we execute the prepared statement and send it to the database!
				$stmt->execute();
				// And we get the result from the statement.
				$result = $stmt->get_result();

				// Then we store the result into a variable.
				if($row = $result->fetch_array()){
					// We then check to see if the password the user entered matches the one from the database associated with that user.
					if ($password !== $row['PASSWORD']) {
						// If there is an error we send the user back to the login page.
						header("Location: ./login.php?error=wrongpwd");
						exit();
					// Then if they DO match, then we know it is the correct user that is trying to log in!
					}else if ($password === $row['PASSWORD']) {
						// Next we need to create session variables based on the users information from the database. If these session variables exist, then the website will know that the user is logged in.

						// Now that we have the database data, we need to store them in session variables which are a type of variables that we can use on all pages that has a session running in it.
						// This means we NEED to start a session HERE to be able to create the variables!
						session_start();
						// And NOW we create the session variables.
						$_SESSION['id'] = $row['UID'];
						$_SESSION['uid'] = $row['USERNAME'];
						// Now the user is registered as logged in and we can now take them back to the timesheet page!
						header("Location: ./timesheet.php");
						exit();
					}
      			}else {
        			header("Location: ./login.php?login=wronguidpwd");
        			exit();
      			}
    		}

		}
		// Then we close the prepared statement and the database connection!
		$stmt->close();
		$db_connection_object->close();
	}else {
		// If the user tries to access this page an inproper way, we send them back to the login page.
		header("Location: ./login.php");
		exit();
	  }
	
?>