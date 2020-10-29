<?php 
	include('inc/conectar.php');
	session_start();
	/*<--------------- ANTI-CHEAT --------------->*/
	if (!(isset($_SESSION["usuario"]))) {
		header("location:login.php");
	}

 ?>

<br><br><br><br>
<?php 
	$consulta = "SELECT * FROM chat WHERE id_servicochat = '".$_SESSION['codigoservico']."' ORDER BY cd_chat ASC; ";
	$query = $mysqli->query($consulta);
		while($chatquery = $query->fetch_array()){
			$user = "SELECT nm_usuario FROM usuario WHERE cd_usuario = '".$chatquery['id_usuariochat']."';";
			$userquery = $mysqli->query($user);
			while($userq = $userquery->fetch_object()){
				$cdchat=$chatquery['id_usuariochat'];
	?>
	<div id="dados-chat">
		<span>
			<?php $_SESSION['namechat'] = $userq->nm_usuario; ?>
			<?php echo '<a href="perfil.php?cdus='.$cdchat.'">'. $userq->nm_usuario. '</a> '; ?>
		</span>
		<span>
			<?php $_SESSION['mensagemchat'] = $chatquery['ds_mensagem']; ?>
			<?php echo $chatquery['ds_mensagem']; ?>
		</span>
		<span>
			<?php $_SESSION['datamensagem'] = $chatquery['dt_data']; ?>
			<?php echo $chatquery['dt_data']; ?>
		</span>
	</div><br>
	<?php  
			}
		}
	?>

