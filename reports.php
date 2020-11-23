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

	$_SESSION['servicorep'] = $_GET['cod'];

	$show="SELECT * FROM servico WHERE cd_servico = '".$_SESSION['servicorep']."'";

	if ($resulte=$mysqli->query($show)) {
		while ($obj = $resulte ->fetch_object()) {
            $_SESSION['reportado'] = $obj->id_usuario;
        }
    }

	date_default_timezone_set('America/Sao_Paulo');
	$data = date("Y/m/d");

	if(isset($_POST['desc'])){
		$sql = "INSERT INTO report_servico VALUES(NULL, '".$_POST['desc']."', '" .$data."', '".$_SESSION['servicorep']."','".$_SESSION['cd']."','".$_SESSION['reportado']."', 1)";

		if($result=$mysqli->query($sql)){
			header('location:servicos.php');
		}

	}

?>
<div id="tc-index">
	<section class="parallax-report">
		<div class="container text-light">
			<form method="post">
				<div class="row">
					<div class="col-2">	
					</div>
					<div class="col-8 text-center text-danger">
						<h2>INFORME O MOTIVO DE SUA DENÚNCIA</h2>
					</div>
				</div>
				<div class="row">
						<div class="col-3">	
						</div>
					<div class="col-6">
						<textarea class="form-control" placeholder="Explique aqui o que aconteceu" name="desc"></textarea>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-4">
					</div>
					<div class="col-4 text-center">
					<input type="submit" name="" class="btn btn-outline-danger">
				</div>
				</div>
			</form>	
		</div>
	</section>
</div>


<!-- SCRIPTS -->
<?php include('inc/scripts.php');?>

<!-- FOOTER -->
<?php include('inc/footer.php');?>