<?php
session_start();
	/*<--------------- ANTI-CHEAT --------------->*/
	if (!(isset($_SESSION['adm']))) {
		header("location:login.php");
	}
	/*--------------------------------------------*/
	include ("inc/conectar.php");
?>
<!-- HEAD -->
<?php include('inc/head.php');?>

<!-- TÍTULO DA PÁGINA -->
<title>Trampo Centro - Categorias</title>

<!-- NAVBAR -->
<?php include('inc/navbar.php');?>

<!-- INSERT CATEGORIA -->
<?php 
	
	if(isset($_POST['nome'])){
		$cat = "INSERT INTO categoria VALUES(NULL, '".$_POST['nome']."', '".$_POST['desc']."', '". 0 ."')";

		if ($result=$mysqli->query($cat)){
			header('location: categoria.php');
		}
		else{
  			printf($mysqli->error);
		}
	
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="container">
		<div class="row">
				<form method="post">
			<div class="col-md-4">
				<label>Nomeie a Categoria:</label>
				<input type="text" name="nome">
			</div>
			<div class="col-md-4">
				<label>Descreva a Categoria:</label>
				<input type="text" name="desc">
			</div>
			<div class="col-md-4">
				<input type="submit" class="btn btn-success" name="">
			</div>
		</div>
		<div class="row">
			<hr>
		</div>
	</div>

</body>
</html>

<!-- SCRIPTS -->
<?php include('inc/scripts.php');?>
<script src="js/exclu.js"></script>

<!-- FOOTER -->
<?php include('inc/footer.php');?>