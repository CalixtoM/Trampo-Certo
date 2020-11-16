<?php
	session_start();
	/*<--------------- ANTI-CHEAT --------------->*/
	if (!(isset($_SESSION['adm']))) {
		header("location:login.php");
	}
	/*--------------------------------------------*/
	include ("inc/conectar.php");


    date_default_timezone_set('America/Sao_Paulo');

	$dthj = date('Y-m-d');
	$dtf = date('Y-m-d', strtotime($dthj. ' + 15 days'));


	echo $dtf;
	$banido = $_GET['cdban'];

	$sql = "INSERT INTO usuario_suspenso VALUES (NULL, '".$banido."', '".$dthj."', '".$dtf."')";

	if ($rslt = $mysqli->query($sql)){		
		echo "foi";
	}

?>