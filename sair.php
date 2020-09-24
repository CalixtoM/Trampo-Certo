<?php 
	include ('inc/conectar.php');
	session_start();	
	session_destroy();
	$mysqli->close();
	header("location:index.php");
/*if (isset($_SESSION['nome'])) {

}*/

?>