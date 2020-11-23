<?php
session_start();
	/*<--------------- ANTI-CHEAT --------------->*/
	if (!(isset($_SESSION['adm']))) {
		header("location:login.php");
	}
	/*--------------------------------------------*/
	include ("inc/conectar.php");

	$del = "DELETE FROM categoria WHERE cd_categoria = '".$_GET['cat']."'";

	if($result = $mysqli->query($del)){
		header('location: categoria.php');
	}
	else{

	}
?>