<?php

include('inc/conectar.php');

$query = "DELETE FROM usuario WHERE cd_usuario = '".$_GET['c']."' ";

if ($result = $mysqli->query($query)) {
	header("location:visualizaradm.php");
}else{
 	printf($mysqli->error);
}



  ?>