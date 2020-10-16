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
<title>Adicionar Serviços - Trampo Centro</title>

<!-- NAVBAR -->
<?php include('inc/navbar.php');?>

<!-- CONTEÚDO DA PÁGINA -->

<?php
		date_default_timezone_set('America/Sao_Paulo');
		$data = date("Y/m/d");
		$num = 1;

		if(isset($_POST['nome'])){
			$ins = "INSERT INTO servico VALUES (NULL, '".$_POST['nome']."', '".$_POST['desc']."', '". $data ."', '".$_POST['prazo']."', '".$_SESSION['cd']."', '". 1 ."', '". 1 ."','". 0 ."' )";

			if ($result=$mysqli->query($ins)) {
          		header('location: servicos.php');
      }
      else{
  			printf($mysqli->error);
		}
	}

	?>

<div id="tc-index">
	<section class="parallax-addservicos">
		<div class="container text-center">
			<h2 id="h2-addservicos" class="tracking-in-expand">Adicionar Serviço</h2>
			<br>
			<form method="post">
				<div class="row">
					<div class="col-sm-3">
					</div>
					<div class="col-sm-3 coluna-addservicos slide-in-left-titulo">
						<h4 class="h4-addservicos text-left">Nome do Serviço</h4>
						<input type="text" name="nome" class="input-addservicos" required placeholder="Insira o título que irá aparecer no seu serviço.">
					</div>

				</div>

				<br>

				<div class="row">
					<div class="col-sm-3">
					</div>
					<div class="col-sm-3 coluna-addservicos slide-in-left-desc">
						<h4 class="h4-addservicos text-left">Descrição do Serviço</h4>
						<input type="text" name="desc" class="input-addservicos" required placeholder="Insira a descrição do seu serviço.">
					</div>
				</div>

				<br>

				<div class="row">
					<div class="col-sm-3">
					</div>
					<div class="col-sm-3 coluna-addservicos slide-in-left-dt">
						<h4 class="h4-addservicos text-left">Prazo do Serviço</h4>
						<input type='date' name='prazo' class="input-addservicosdt"  required>
					</div>
				</div>
				<br>
					<input type="submit" name="enviar" class="btn btn-outline-success slide-in-fwd-center" value="Concluir">
			</form>
		</div>
	</section>
</div>
	

	

<!-- SCRIPTS -->
<?php include('inc/scripts.php');?>

<!-- FOOTER -->
<?php include('inc/footer.php');?>
