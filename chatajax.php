<!DOCTYPE html>
<html>
<head>
	 <!-- HEAD -->
<?php include('inc/head.php');?>

<!-- TÍTULO DA PÁGINA -->
<title>Trampo Centro - Perfil</title>

<!-- NAVBAR -->
<?php include('inc/navbar.php');?>

	<?php
	include('inc/conectar.php');
	session_start();
		$_SESSION['codigoservico'] = $_GET['chat'];
	?>
	<script type="text/javascript">
		function ajax(){
			var req = new XMLHttpRequest();
			req.onreadystatechange = function(){
				if (req.readyState == 4 && req.status == 200) {
					document.getElementById('chat').innerHTML = req.responseText;
				}
			}
			req.open('GET', 'chat.php', true);
			req.send();
		}
		setInterval(function(){ajax();},1000);
	</script>
	<title>Chat</title>
</head>
<body onload="ajax();">
	<div id="chat">
		
	</div>
	<form method="POST">
			<input type="text" name="mensagem"  placeholder="De um 'Oi' pra gatinha, tome coragem!">
			<input type="submit" name="enviar" class="btn btn-success" value="&rang;">
		</form>
		<?php
		if (isset($_POST['mensagem'])) {
			$nome = $_SESSION['namechat'];
			$mensagem = $_SESSION['mensagemchat'];
			$insertchat = "INSERT INTO chat (id_usuariochat, id_servicochat, ds_mensagem, dt_data) VALUES ('".$_SESSION['cd']."','".$_GET['chat']."', '".$_POST['mensagem']."', NOW());";
			$exe = $mysqli->query($insertchat);
			if ($exe) {
				echo "<embed loop='false' src='soundnot.mp3' hidden='true' autoplay='true'>";

			}
		}
		?>
</body>
</html>