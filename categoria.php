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
				</form>
			</div>
		</div>
		<div class="row">
			<hr>
		</div>
		<div class="row">
			<div class="col-md-3">
				
			</div>
			<div class="col-md-6">
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Nome</th>
				      <th scope="col">Descrição</th>
				    </tr>
				  </thead>
				  <tbody>



				<?php
				$ct = "SELECT * FROM categoria";
				
				if($result=$mysqli->query($ct)){
					while($obj = $result->fetch_object()){
						echo '
						<tr>
						      <th scope="row">'.$obj->cd_categoria.'</th>
						      <td>'.$obj->nm_categoria.'</td>
						      <td>'.$obj->ds_categoria.'</td>
						      <td><a type="button" class="btn btn-warning" href="editcat.php?cat='.$obj->cd_categoria.'">Editar</a></td>
						      <td><a class="btn btn-danger" href="deletecat.php?cat='.$obj->cd_categoria.'">Excluir</a></td>
						    </tr>
						  ';
					}
				}
				?>
				  </tbody>
				</table>


			</div>
		</div>
	</div>

</body>
</html>

<!-- Modal Editar -->

	




<!-- SCRIPTS -->
<?php include('inc/scripts.php');?>
<script src="js/exclu.js"></script>

<!-- FOOTER -->
<?php include('inc/footer.php');?>