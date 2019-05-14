<?php 

        $id=$_SESSION['id'];

        if($_POST){
                if(isset($_POST['home'])){
                header("Location: ../home/homePage.php");
                }
        }
        require '../dbh.inc.php';

        $id=$_SESSION['id'];

        //TODO: Need to add project retreval
        $sql = 'SELECT  Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday FROM user_defaults WHERE UID='.$id.';';

        //TODO: add project selection        
        //, Mon_project, Tues_project, Wed_project, Thurs_project, Fri_project, Sat_project, Sun_project

        $db_results = $db_connection_object->query($sql);

        $defaultHours = mysqli_fetch_all($db_results, MYSQLI_ASSOC);

        mysqli_free_result($db_results);

        $db_connection_object->close();
                
?>