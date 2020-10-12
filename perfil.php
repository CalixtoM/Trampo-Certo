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

<!-- SELECT SERVIÇOS -->
<?php 
	
	$serv = "SELECT * FROM servico WHERE cd_servico = '".$_SESSION['cd']."'";

?>

<!-- CONTEÚDO DA PÁGINA -->
<div id="tc-index">
	<section class="parallax-perfil">
		<div class="container text-light">
			<div class="row">
						<?php

						if(!isset($_GET['cdus'])){

							$sql="SELECT * FROM usuario WHERE ds_email='".$_SESSION['usuario']."'";//ele usa o nome, pq nao ta setado, da erro

							if ($result=$mysqli->query($sql)) {
								while ($obj = $result ->fetch_object()) {
									$_SESSION['nm'] = $obj->nm_usuario;
									echo "<div class='col-sm-3 text-center'>";
										echo "<div class='foto-perfil scale-in-center' title='Sua fotinha xD'></center";
											echo "<img src='".$obj->ds_usfoto."'><br>";
										echo "</center></div><br><br>";
										echo "<h6 class='slide-in-left' title='".$obj->nm_usuario." - Usuário nota: ".$obj->ds_avaliacao."'>";
										echo $obj->nm_usuario;
										echo "<br>";
										include('inc/avaliacao.php');
										echo "</h6>";
										echo "<b class='slide-in-left'>E-mail:</b> ";
										echo $obj->ds_email. "<br>";
										echo "<b class='slide-in-left-um'>Celular:</b> ";
										echo $obj->nr_celular. "<br>";
										echo "<b class='slide-in-left-dois'>Endereço: </b> ";
										echo $obj->ds_usendereco. "<br><br>";
										echo "<a class='perfil-editar animation-perfil slide-in-left-tres' href='update.php' title='Editar Perfil'><b>EDITAR <i class='fas fa-pencil-alt' style='font-size:15px'></i></b></a><br>";
										echo "<a data-confirm='Tem certeza que deseja excluir sua conta?'class='perfil-editar animation-perfil slide-in-left-tres' href='delet.php?ex=$obj->cd_usuario' title='Excluir Perfil'><b>EXCLUIR <i class='fas fa-skull-crossbones' style='font-size:15px'></i></b></a><br>";
										$_SESSION['cd'] = $obj->cd_usuario;
										echo "<br>";
										echo "<a class='perfil-editar animation-perfil slide-in-left-tres' href='updatesenha.php' id='' title='Alterar senha'><b>ALTERAR SENHA <i class='fas fa-wrench' style='font-size:15px'></i></b></a>";
									echo "</div>";

								
									echo "<div class='col-sm-9 text-center'><hr class='hr-perfil'><h3 class='tracking-in-expand'>Opções</h3><hr class='hr-perfil'>";


									
									if ($obj->st_admin == 1) {
										$_SESSION['adm'] = $obj->cd_usuario;
										echo" <button><a class='btn-perfil tracking-in-expand-um' href='visualizaradm.php' id=''>Visualizar usuários</a></button><br>";
									}	
									if ($obj->st_admin == 1) {
										$_SESSION['adm'] = $obj->cd_usuario;
										echo" <button> <a class='btn-perfil tracking-in-expand-dois' href='' id=''>Categorias</a></button><br>";
									}
									if ($obj->st_admin == 1) {
										$_SESSION['adm'] = $obj->cd_usuario;
										echo" <button><a class='btn-perfil tracking-in-expand-tres' href='' id=''>Denúncias</a></button>";
									}

										echo "</div>";

							}
							}else{
							printf($mysqli->error);
							}

							echo "<div class='container'>";
								echo "<br><br><h3>Serviços Postados Por ".$_SESSION['nm']."</h3>";				
										include('perfilservico.php');
							echo "</div>";	
						}
						if(isset($_GET['cdus'])){

							$sql="SELECT * FROM usuario WHERE cd_usuario='".$_GET['cdus']."'";
							//Diferencia tela de perfil de usuario diferente do logado
							if ($result=$mysqli->query($sql)) {
								while ($obj = $result ->fetch_object()) {
									$_SESSION['visitado'] = $_GET['cdus'];
									echo "<div class='col-sm-3 text-center'>";
										echo "<div class='foto-perfil scale-in-center' title='Sua fotinha xD'></center";
											echo "<img src='".$obj->ds_usfoto."'><br>";
										echo "</center></div><br><br>";
										echo "<h6 class='slide-in-left' title='".$obj->nm_usuario." - Usuário nota: ".$obj->ds_avaliacao."'>";
										echo $obj->nm_usuario;
										echo "<br>";
										include('inc/avaliacao.php');
										echo "</h6>";
										echo "<b class='slide-in-left'>E-mail:</b> ";
										echo $obj->ds_email. "<br>";
										echo "<b class='slide-in-left-um'>Celular:</b> ";
										echo $obj->nr_celular. "<br>";
										echo "<b class='slide-in-left-dois'>Endereço: </b> ";
										echo $obj->ds_usendereco. "<br><br>";
										echo "<a class='perfil-editar animation-perfil slide-in-left-tres' href='reportp.php' title='Reportar Perfil'><b>REPORTAR PERFIL <i class='fas fa-pencil-alt' style='font-size:15px'></i></b></a><br>";
									echo "</div>";
									
								if ($_GET['cdus']==$_SESSION['usuario']) {
									# code...
									echo "<div class='col-sm-9 text-center'><hr class='hr-perfil'><h3 class='tracking-in-expand'>Opções</h3><hr class='hr-perfil'>";
									
									if ($obj->st_admin == 1) {
										$_SESSION['adm'] = $obj->cd_usuario;
										echo" <button><a class='btn-perfil tracking-in-expand-um' href='visualizaradm.php' id=''>Visualizar usuários</a></button><br>";
									}	
									if ($obj->st_admin == 1) {
										$_SESSION['adm'] = $obj->cd_usuario;
										echo" <button> <a class='btn-perfil tracking-in-expand-dois' href='' id=''>Categorias</a></button><br>";
									}
									if ($obj->st_admin == 1) {
										$_SESSION['adm'] = $obj->cd_usuario;
										echo" <button><a class='btn-perfil tracking-in-expand-tres' href='' id=''>Denúncias</a></button>";
									}
									echo "</div>";	
									}else{
									echo "<div class='col-sm-9 text-center'><hr class='hr-perfil'><h3 class='tracking-in-expand'>Galeria</h3><hr class='hr-perfil'>";

								}	
								}
							}else{
							printf($mysqli->error);
							}
						}

						?>
	    	</div>
	    </div>
		</div>
	</section>
</div>
<!-- SCRIPTS -->
<?php include('inc/scripts.php');?>
<script src="js/exclu.js"></script>

<!-- FOOTER -->
<?php include('inc/footer.php');?>



