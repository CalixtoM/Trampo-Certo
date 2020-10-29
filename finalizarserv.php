<?php
session_start();
	/*<--------------- ANTI-CHEAT --------------->*/
	if (!(isset($_SESSION["usuario"]))) {
		header("location:login.php");
	}
	/*--------------------------------------------*/
	include ("inc/conectar.php");
?>
<?php
if (isset($_GET['finalizar'])) {
	$query_finalizar="UPDATE servico SET st_servico = 0, id_orcamento = '".$_SESSION['orcamento_cd_usuario']."' WHERE cd_servico = '".$_GET['finalizar']."';";
	if ($result=$mysqli->query($query_finalizar)) {
		header("location:perfil.php");
	}
}


?>