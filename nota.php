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


if(isset($_POST['estrela'])){
	$estrela = $_POST['estrela'];
	if (isset($_GET['nota'])) {
	$_SESSION['scd']=$_GET['nota'];
	
			$query_finalizar="SELECT * FROM servico AS s INNER JOIN usuario AS u ON s.id_usuario=u.cd_usuario WHERE st_servico=0 and cd_servico = '".$_GET['nota']."'";
			if ($finalizar=$mysqli->query($query_finalizar)){
			while ($servicof=$finalizar->fetch_object()) {
				$usuarionotado=$servicof->id_orcamento;	
			$result_avaliacos = "INSERT INTO nota SET ds_nota = '".$estrela."', id_usuarion = '".$usuarionotado."' ,id_usuarionotado='".$_SESSION['cd'] ."' ,id_serviconota = '".$_SESSION['scd']."' ";
			if($resultado_avaliacos=$mysqli->query($result_avaliacos)){
				$nota_confer="SELECT id_serviconota FROM nota WHERE id_serviconota = '".$_GET['nota']."' ";
				$num=$mysqli->query($nota_confer);
				if ($num->num_rows <2) {
					header("location:perfil.php");
				}else{
				$query_stts="UPDATE servico SET st_servico = 2 WHERE cd_servico = '".$_GET['nota']."';";
				if ($result=$mysqli->query($query_stts)) {
				header("location:perfil.php");
				}
				}
			}else{
				printf($mysqli->error);
				}
			}
		}
	}elseif (isset($_GET['notado'])) {
		$_SESSION['scd']=$_GET['notado'];	
			$query_finalizar="SELECT * FROM servico AS s INNER JOIN usuario AS u ON s.id_usuario=u.cd_usuario WHERE st_servico=0 and cd_servico = '".$_GET['notado']."'";
			if ($finalizar=$mysqli->query($query_finalizar)){
			while ($servicof=$finalizar->fetch_object()) {
				$usuarionotado=$servicof->id_usuario;	
			$result_avaliacos = "INSERT INTO nota SET ds_nota = '".$estrela."', id_usuarion = '".$usuarionotado."' ,id_usuarionotado='". $_SESSION['cd'] ."' ,id_serviconota = '".$_SESSION['scd']."' ";
			if($resultado_avaliacos=$mysqli->query($result_avaliacos)){
				$nota_confer="SELECT id_serviconota FROM nota WHERE id_serviconota = '".$_GET['notado']."' ";
				$num=$mysqli->query($nota_confer);
				if ($num->num_rows <2) {
					header("location:perfil.php");
				}else{
				$query_stts="UPDATE servico SET st_servico = 2 WHERE cd_servico = '".$_GET['notado']."';";
				if ($result=$mysqli->query($query_stts)) {
				header("location:perfil.php");
				}
				}
			}else{
				printf($mysqli->error);
				}
			}
		}
	}
}
?>
<!-- HEAD -->
<?php include('inc/head.php');?>

<!-- TÍTULO DA PÁGINA -->
<title>Trampo Centro - Nota</title>

<!-- NAVBAR -->
<?php include('inc/navbar.php');?>

<!-- CONTEÚDO DA PÁGINA -->

<div id="tc-index">
	<section class="parallax-notas">
		<div class="container text-light">
			<div class="row">
				<div class="col-sm-12">
					<center>
					<h2 id="h2-notas" class="tracking-in-expand">DE SUA NOTA!</h2>
          			<p>De a nota para o serviço exercido.</p>
          			<form method="POST" enctype="multipart/form-data">
						<div class="estrelas">
							<input type="radio" id="vazio" name="estrela" value="" checked class="zero_n">

							<label for="estrela_um"><i class="fa"></i></label>
							<input type="radio" id="estrela_um" name="estrela" value="1" class="um_n">
				
							<label for="estrela_dois"><i class="fa" ></i></label>
							<input type="radio" id="estrela_dois" name="estrela" value="2" class="dois_n">
				
							<label for="estrela_tres"><i class="fa"></i></label>
							<input type="radio" id="estrela_tres" name="estrela" value="3" class="tres_n">
				
							<label for="estrela_quatro"><i class="fa"></i></label>
							<input type="radio" id="estrela_quatro" name="estrela" value="4" class="quatro_n">
					
							<label for="estrela_cinco"><i class="fa"></i></label>
							<input type="radio" id="estrela_cinco" name="estrela" value="5" class="cinco_n"><br><br>
				
							<input type="submit" class="btn btn-outline-warning scale-in-centerupum" value="Enviar Nota">
						</div>
					</form>
					</center>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- SCRIPTS -->
<?php include('inc/scripts.php');?>
<script src="js/exclu.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- FOOTER -->
<?php include('inc/footer.php');?>