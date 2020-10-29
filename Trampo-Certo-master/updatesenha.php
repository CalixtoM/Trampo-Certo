<?php
session_start();
	/*<--------------- ANTI-CHEAT --------------->*/
	if (!(isset($_SESSION["usuario"]))) {
		header("location:index.php");
	}
	/*--------------------------------------------*/
	include ("inc/conectar.php");
	/*<--------------- SISTEMA --------------->*/
if(isset($_POST['senha'])){

	$sql= " SELECT ds_password FROM usuario WHERE'".$_SESSION['usuario']."' = ds_email ";
	if ($result=$mysqli->query($sql)) {

		if($result->num_rows==1){

			while ($obj = $result ->fetch_object()) {

				$senha = $_POST['senha'];
				$hash = $obj->ds_password;

				if (crypt($senha, $hash) == $hash) {

					if ($_POST['senhanova'] == $_POST['senhanovac']) {

					$senhanova = $_POST['senhanova'];
					$custo = '08';
					$salt = 'HjU1di12HbfDub54Sjbda2';
					$hash = crypt($senhanova, '$2a$' . $custo . '$' . $salt . '$');
					$alt= " UPDATE usuario SET ds_password='".$hash."' WHERE '".$_SESSION['usuario']."' = ds_email ";

					if ($result=$mysqli->query($alt)) {
							header("Location:perfil.php");

					}else{
					printf("Error: %s\n",$mysqli->error);
					}
					/* ERRO DE CONFIRMAÇÃO DE SENHA*/
					}else{
					echo '<script>alert("Confirmação de senha incorreta!")</script>';
					}
				/* ERRO DE SENHA ATUAL */
				}else{
				echo '<script>alert("Senha atual incorreta!")</script>';
				}
			}
		}
	}
}
	/*-----------------------------------------*/
?>
<!-- HEAD -->
<?php include('inc/head.php');?>

<!-- TÍTULO DA PÁGINA -->
<title>Trampo Centro - Perfil</title>

<!-- NAVBAR -->
<?php include('inc/navbar.php');?>

<!-- CONTEÚDO DA PÁGINA -->
<div id="tc-index">
	<section class="parallax-updtsenha">
		<div class="container text-light">
			<div class="col-sm-12 text-center">
				<form method="post" >
					<div class="slide-in-left-titulo">
					<h6 class="text-light h6-adjust-registro">Senha Atual</h6>
					<i class="fa fa-lock text-light"></i>
					<input type="password" name="senha" class="input-registro" placeholder="Insira sua senha" required>
					</div>
					<br>
					<div class="slide-in-left-desc">
					<h6 class="text-light h6-adjust-registro">Nova Senha</h6>
					<i class="fa fa-lock text-light"></i>
					<input type="password" name="senhanova" class="input-registro" placeholder="Insira sua nova senha" required>
					</div>
					<br>
					<div class="slide-in-left-dt">
					<h6 class="text-light h6-adjust-registro">Confirmar nova Senha</h6>
					<i class="fa fa-lock text-light"></i>
					<input type="password" name="senhanovac" class="input-registro" placeholder="Confirme sua senha" required>
					<br>
					</div>
					<br>
					<input  style="text-transform: capitalize;" type="submit" name="enviar" class="btn btn-outline-success scale-in-centerupum" value="Alterar Senha">
					<br>
					<button style="text-transform: capitalize;"><a href="perfil.php" class="btn btn-outline-warning scale-in-centerupdois"><i class='fas fa-angle-left'></i> Voltar</a></button>
					
				</form>
			</div>
		</div>
	</section>
</div>
<!-- SCRIPTS -->
<?php include('inc/scripts.php');?>

<!-- FOOTER -->
<?php include('inc/footer.php');?>




<?php  


?>	

