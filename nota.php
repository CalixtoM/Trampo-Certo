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
<title>Trampo Centro - Nota</title>

<!-- NAVBAR -->
<?php include('inc/navbar.php');?>
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
<br><br><br><br>
<h1>De sua nota</h1>
          <p>De a nota para o trabalho exercido.</p>
          		<form method="POST" enctype="multipart/form-data">
				<div class="estrelas">
				<input type="radio" id="vazio" name="estrela" value="" checked>
				
				<label for="estrela_um"><i class="fa"></i></label>
				<input type="radio" id="estrela_um" name="estrela" value="1">
				
				<label for="estrela_dois"><i class="fa"></i></label>
				<input type="radio" id="estrela_dois" name="estrela" value="2">
				
				<label for="estrela_tres"><i class="fa"></i></label>
				<input type="radio" id="estrela_tres" name="estrela" value="3">
				
				<label for="estrela_quatro"><i class="fa"></i></label>
				<input type="radio" id="estrela_quatro" name="estrela" value="4">
				
				<label for="estrela_cinco"><i class="fa"></i></label>
				<input type="radio" id="estrela_cinco" name="estrela" value="5"><br><br>
				
				<input type="submit" class="btn btn-success text-light" value="Cadastrar">
				
			
		</form>
       
          <button type="button" class="btn btn-default text-light" data-dismiss="modal">Close</button>
        