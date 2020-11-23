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

<div id="tc-index">
 	<section class="parallax-servicopage">
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
	<div class="container">
		<form method="post">
			<h2 id="h2-addservicos" class="tracking-in-expand text-center">CATEGORIAS</h2><br>
			<div class="row">
			<div class='col-sm-3'></div>

			<div class='col-sm-3 coluna-addservicos slide-in-left-titulo'>
			<h4 class='h4-addservicos text-left'>Nome da Categoria</h4>
			<input type="text" name="nome" class="input-addservicos" placeholder="Insira a Categoria do Serviço">

			</div>
			</div>
			<br>
			<div class="row">
			<div class='col-sm-3'></div>

			<div class='col-sm-3 coluna-addservicos slide-in-left-desc'>
			<h4 class='h4-addservicos text-left'>Descreva a Categoria</h4>
			<input type="text" name="desc" class="input-addservicos" placeholder="Insira a Descrição do Serviço">

			</center>
			</div>

			<div class="col-md-12">

			<center>
				<br>
				<input type="submit" class="btn btn-outline-success slide-in-fwd-center" name="">
				</form>
			</center>
			

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
				    <tr class="text-light">
				      <th scope="col"><b>#</th>
				      <th scope="col">Nome</th>
				      <th scope="col">Descrição</th>
				      <th scope="col">Opções</b></th>
				      <th scope="col"></th>
				    </tr>
				  </thead>
				  <tbody>
				<?php
				$ct = "SELECT * FROM categoria";
				
				if($result=$mysqli->query($ct)){
					while($obj = $result->fetch_object()){
						echo '
						<tr class="text-light">
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



<!-- SCRIPTS -->
<?php include('inc/scripts.php');?>
<script src="js/exclu.js"></script>

<!-- FOOTER -->
<?php include('inc/footer.php');?>