<?php
session_start();
	/*<--------------- ANTI-CHEAT --------------->*/
	if (!(isset($_SESSION["usuario"]))) {
		header("location:login.php");
	}
	/*--------------------------------------------*/
	include ("inc/conectar.php");
?>
<!-- HEAD -->
<?php include('inc/head.php');?>

<!-- TÍTULO DA PÁGINA -->
<title>Trampo Centro - Perfil</title>

<!-- NAVBAR -->
<?php include('inc/navbar.php');?>

<?php 

	date_default_timezone_set('America/Sao_Paulo');
	$data = date("Y/m/d");

	if(isset($_POST['desc'])){
		$sql = "INSERT INTO report_perfil VALUES(NULL, '".$_POST['desc']."', '" .$data."', '".$_SESSION['cd']."', '".$_SESSION['visitado']."', 1)";

		if($result=$mysqli->query($sql)){
			header('location:perfil.php');
		}
	}

?>
<br><br><br><br>
	<div class="container">
		<form method="post">
			<div class="row">
				<div class="col-3">
					
				</div>
				<div class="col-6">
					<h2>Informe o motivo de sua Denuncia</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-3">
					
				</div>
				<div class="col-6">
					<textarea class="form-control" placeholder="Explique aqui o que aconteceu" name="desc"></textarea>
				</div>
			</div><br>
			<div class="row">
				<div class="col-5">
					
				</div>
				<div class="col-7">
					<input type="submit" name="" class="btn btn-success">
				</div>
			</div>
		</form>	
	</div>



<!-- SCRIPTS -->
<?php include('inc/scripts.php');?>

<!-- FOOTER -->
<?php include('inc/footer.php');?>
