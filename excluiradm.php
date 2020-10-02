<?php

include('inc/conectar.php');

$query = "DELETE from usuario where cd_usuario = '".$_GET['c']."' ";

if ($result = $mysqli->query($query)) {
header("location:visualizaradm.php");
}



  ?>