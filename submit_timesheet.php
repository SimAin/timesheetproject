<?php 
	if(isset($_POST['action'])){
		// Requires the connection script.
        require 'dbh.inc.php';
        
        $id=$_POST['id'];
        echo $id;

        if ($_POST['action'] && $_POST['id']) {
            if ($_POST['action'] == 'Submit') {
              echo "submit";
            }else if ($_POST['action'] == 'Delete') {
                echo "delete";
            }
        }
        
			// $db_sql = "UPDATE timesheets SET Submitted=1 WHERE ID=$id";

			// $db_results = $db_connection_object->query($db_sql);

			
			// if ( $db_results === TRUE) {
			// 	header("location: ./Random_Conf.php");
			// } else {
			// 	print_r($db_results);
			// 	die("Modify User Error: " . $db_sql . "<br>" . $db_connection_object->error);
			// }
		
			
			$db_connection_object->close();
	}
?>