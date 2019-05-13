<?php 
        require '../dbh.inc.php';

        $id=$_SESSION['id'];
        
        $sql = 'SELECT Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday FROM user_defaults WHERE UID='.$id.';';
        
        $db_results = $db_connection_object->query($sql);

        $defaultHours = mysqli_fetch_all($db_results, MYSQLI_ASSOC);

        mysqli_free_result($db_results);

        $db_connection_object->close();
?>