<?php 
	if(isset($_POST['action'])){
		// Requires the connection script.
        require '../dbh.inc.php';
        
        $id=$_POST['id'];
        echo $id;

        if ($_POST['action'] && $_POST['id']) {
            if ($_POST['action'] == 'Submit') {
				$db_sql = "UPDATE timesheets SET Submitted=1 WHERE ID=$id";
            }else if ($_POST['action'] == 'Delete') {
                $db_sql = "DELETE FROM timesheets WHERE ID=$id";
            }
        }

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