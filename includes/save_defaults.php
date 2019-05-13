<?php 

	if(isset($_POST['submit_defaults'])){
		// Requires the connection script.
		require '../dbh.inc.php';

		$monday=$_POST["Monday"];
		$tuesday=$_POST["Tuesday"];
		$wednesday=$_POST["Wednesday"];
		$thursday=$_POST["Thursday"];
		$friday=$_POST["Friday"];
		$saturday=$_POST["Saturday"];
        $sunday=$_POST["Sunday"];

        $mon_pro=$_POST["MonProject"];
		$tues_pro=$_POST["TuesProject"];
		$wed_pro=$_POST["WedProject"];
		$thur_pro=$_POST["ThursProject"];
		$fri_pro=$_POST["FriProject"];
		$sat_pro=$_POST["SatProject"];
        $sun_pro=$_POST["SunProject"];
        
		$id=$_POST['id'];

        $db_sql = sprintf("UPDATE user_defaults SET (Monday = '%s',  Tuesday = '%s', Wednesday= '%s', Thursday= '%s', Friday= '%s', Saturday= '%s', Sunday= '%s', Mon_project = '%s',  Tues_project= '%s', Wed_project= '%s', Thurs_project= '%s', Fri_project= '%s', Sat_project= '%s', Sun_project= '%s', Saved_status= '%s', Submitted= '%s' WHERE UID='.$id.';');", 
                            $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday, 
                            $mon_pro, $tues_pro, $wed_pro, $thur_pro, $fri_pro, $sat_pro, $sun_pro);

        $db_results = $db_connection_object->query($db_sql);

        
        if ( $db_results === TRUE) {
            header("location: ../home/homePage.php");
        } else {
            print_r($db_results);
            die("Error: " . $db_sql . "<br>" . $db_connection_object->error);
        }
    
        $db_connection_object->close();
	}
?>