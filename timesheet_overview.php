<?php 
        require 'dbh.inc.php';

        $sql = 'SELECT ID, Saved_status, Submitted, USERID, WeekStart, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday FROM timesheets;';
        
        $db_results = $db_connection_object->query($sql);

        $overview = mysqli_fetch_all($db_results, MYSQLI_ASSOC);

        mysqli_free_result($db_results);

        $db_connection_object->close();
?>