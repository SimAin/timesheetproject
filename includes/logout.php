<?
	session_start();
	unset($_SESSION['id']);
	unset($_SESSION['uid']);
	
    echo "DONE";
    header("Location: ../login/login.php");
    exit;

?>
