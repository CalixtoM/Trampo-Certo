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
<?php include('inc/navbar.php');
	  include('inc/galeria.php');
?>
<!-- SELECT SERVIÇOS -->


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
									echo "<div class='foto-perfil scale-in-center'></center>";
									echo '<div data-toggle="tooltip" title="Editar Foto" data-placement="right">';
									echo "<img src='".$obj->st_foto."' class='foto-perfil' data-toggle='modal' data-target='#editfoto'><br></div>";
									$_SESSION['cd'] = $obj->cd_usuario;
										if (isset($_FILES['arquivo'])) {
											$extensao= explode('.', $_FILES['arquivo']['name']);
											$extensao=end($extensao);
											$arquivospermitidos = ['jpg','jpeg','png','gif'];
											if(in_array($extensao, $arquivospermitidos)){	
											$novo_nome=md5(time()).$_FILES['arquivo']['name'];
											$diretorio="upload/";
											$foto_completa = $diretorio.$novo_nome;
											move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);
											$foto_sql="UPDATE usuario SET st_foto = '$foto_completa' WHERE cd_usuario = '".$_SESSION['cd']."'";
											if ($mysqli->query($foto_sql)) {
												header('location:perfil.php');
												
											}
											}	
										}
										if (isset($_FILES['fotos'])) {
											$array = $_FILES['fotos'];
											for ($i=0; $i < count($array['name']); $i++) { 
											$extensao= explode('.', $array['name'][$i]);
											$extensao=end($extensao);
											$arquivospermitidos = ['jpg','jpeg','png','gif'];
											if(in_array($extensao, $arquivospermitidos)){									
											$novo_nome=md5(time()).$_FILES['fotos']['name'][$i];
											$diretorio="upload/";
											$foto_completa = $diretorio.$novo_nome;

											move_uploaded_file($_FILES['fotos']['tmp_name'][$i], $diretorio.$novo_nome);
											$foto_sql="INSERT INTO arquivo (cd_arquivo, id_usuariof, ds_arquivo, dt_data, st_arquivo) VALUES (NULL,'".$_SESSION['cd']."','".$foto_completa."', NOW(), '". 1 ."')";
											if ($mysqli->query($foto_sql)) {
												header('location:perfil.php');
												
													}
												}
											}
										}
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
										if ($obj->st_admin == 0) {
										echo "<a data-confirm='Tem certeza que deseja excluir sua conta?'class='perfil-editar animation-perfil-danger slide-in-left-tres' href='delet.php?ex=$obj->cd_usuario' title='Excluir Perfil'><b>EXCLUIR <i class='fas fa-skull-crossbones' style='font-size:15px'></i></b></a><br>";
									}
										


										
										echo "<br>";
										if (!isset($_SESSION['google'])) {
										echo "<a class='perfil-editar animation-perfil slide-in-left-tres' href='updatesenha.php' id='' title='Alterar senha'><b>ALTERAR SENHA <i class='fas fa-wrench' style='font-size:15px'></i></b></a>";
									}
									echo "</div>";


									echo "<div class='col-sm-9 text-center'><hr class='hr-perfil'><h3 class='tracking-in-expand'>Opções</h3><hr class='hr-perfil'>";

									$query_finalizar="SELECT * FROM servico AS s INNER JOIN usuario AS u ON s.id_usuario=u.cd_usuario WHERE st_servico=0 and id_usuario = '".$_SESSION['cd']."' OR id_orcamento = '".$_SESSION['cd']."' and st_servico=0 ";
								if ($finalizar=$mysqli->query($query_finalizar)) {
									while ($servicof=$finalizar->fetch_object()) {
										$nota_confer="SELECT id_serviconota FROM nota WHERE id_serviconota = '".$servicof->cd_servico."' and id_usuarion != '".$_SESSION['cd']."' ";
										$num=$mysqli->query($nota_confer);
										if ($num->num_rows ==0){
										echo	'
										<a class="card-servicos" id="a-servicos">
										<div class="card" style="width: 18rem;">
  											<div class="card-body">
   												<h5 class="card-title">Serviço: '.$servicof->nm_servico.'</h5>';
   													if ($servicof->id_usuario == $_SESSION['cd']) {		
   													echo	'<p class="card-text">Agora que decidido, avalie o serviço a seguir quando o trabalhador realizar.<br><br></p>';	   
   	    											echo '<a href="nota.php?nota='.$servicof->cd_servico.'"><button class="btn btn-primary">Avalie</button></a> ';
   	    											echo ' <a href="chatajax.php?chat='.$servicof->cd_servico.'"><button class="btn btn-success">Chat</button></a>';

   													}else{
   														echo '<p class="card-text">Parabéns, escolheram seu orçamento. Quando realizar o serviço avalie o usuario contratante.</p>';
   														echo '<a href="nota.php?notado='.$servicof->cd_servico.'"><button class="btn btn-primary">Avalie</button></a> ';
   														echo ' <a href="chatajax.php?chat='.$servicof->cd_servico.'"><button class="btn btn-success">Chat</button></a>';
   													}
    											echo '</div>
										</div>
										</a>';	
		}	
	}
}else{
	printf($mysqli->error);
}
									
									if ($obj->st_admin == 1) {
										$_SESSION['adm'] = $obj->cd_usuario;
										echo" <button><a class='btn-perfil tracking-in-expand-um' href='visualizaradm.php' id=''>Visualizar usuários</a></button><br>";
									}	
									if ($obj->st_admin == 1) {
										$_SESSION['adm'] = $obj->cd_usuario;
										echo" <button> <a class='btn-perfil tracking-in-expand-dois' href='categoria.php' id=''>Categorias</a></button><br>";
									}
									if ($obj->st_admin == 1) {
										$_SESSION['adm'] = $obj->cd_usuario;
										echo" <button><a class='btn-perfil tracking-in-expand-tres' href='visualizarreport.php' id=''>Denúncias</a></button><br>";
									}
									if ($obj->st_admin == 1) {
										$_SESSION['adm'] = $obj->cd_usuario;
										echo" <button><a class='btn-perfil tracking-in-expand-quatro' href='visualizarservico.php' id=''>Visualizar Serviços</a></button><br>";
									}	

									if ($obj->st_admin == 0) {
										echo "<div class='col-sm-12 text-center'><hr class='hr-perfil'><h3 class='tracking-in-expand'>Galeria</h3><hr class='hr-perfil'>";
										echo "<button class='btn btn-success' data-toggle='modal' data-target='#galeriaModal'>Adicione Fotos</button></div>";
									$galeria_sql="SELECT * FROM arquivo WHERE id_usuariof = '".$_SESSION['cd']."' ";
									$galeria = $mysqli->query($galeria_sql);
									while ($galeria_obj = $galeria->fetch_object()) {
							
     												echo '<a data-fancybox="gallery" href="'.$galeria_obj->ds_arquivo.'">
          												<img src="'.$galeria_obj->ds_arquivo.'" class="img-fluid" style="width:250px; heigth:250px;">
        												</a>';

									}
								}
								
							

										echo "</div>";

						


							}
							}else{
							printf($mysqli->error);
							}


							if($_SESSION['usuario']){
							echo "<div class='container'>";
								echo "<br><br><h3>Serviços Postados Por ".$_SESSION['nm']."</h3>";				
										include('perfilservico.php');
							echo "</div>";	
						}
						}
						if(isset($_GET['cdus'])){

							$sql="SELECT * FROM usuario WHERE cd_usuario='".$_GET['cdus']."'";
							//Diferencia tela de perfil de usuario diferente do logado
							if ($result=$mysqli->query($sql)) {
								while ($obj = $result ->fetch_object()) {
									$_SESSION['visitado'] = $_GET['cdus'];
									echo "<div class='col-sm-3 text-center'>";
										echo "<div class='foto-perfil scale-in-center' title='Bela pessoa'></center>";
											echo "<img src='".$obj->st_foto."' class='foto-perfil'><br>";
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
										echo "<a class='perfil-editar animation-perfil-danger slide-in-left-tres' href='reportp.php' title='Reportar Perfil'><b>REPORTAR PERFIL <i class='fas fa-pencil-alt' style='font-size:15px'></i></b></a><br>";
									echo "</div>";

								if ($_GET['cdus']==$_SESSION['usuario']) {
									
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
									$galeria_sql="SELECT * FROM arquivo WHERE id_usuariof = '".$_GET['cdus']."' ";
									$galeria = $mysqli->query($galeria_sql);
									while ($galeria_obj = $galeria->fetch_object()) {
							
     												echo '<a href="'.$galeria_obj->ds_arquivo.'" data-size="1600x1067">
          												<img alt="picture" src="'.$galeria_obj->ds_arquivo.'" class="img-fluid" style="width:300px; heigth:300px;">
        												</a>';

									}
									echo "</div>";

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

<!-- MODAL DO EDITAR FOTO -->
<div class="modal fade" id="editfoto">
    <div class="modal-dialog">
      <div class="modal-content bg-custom">
        <div class="modal-header">
          <h4 class="modal-title text-center text-light">Editar Foto</h4>
        </div>
        <div class="modal-body">
        	<center>
        		<form method="POST" enctype="multipart/form-data">
        		<label class="label_edit_foto">Selecionar Arquivo <i class='fas fa-copy' style='font-size:15px'></i>
				<input type="file" name="arquivo" required class="btn btn-outline-danger editfoto" id="upload"></label>
				<img id="img_edit" style="width: 300px;" class="edit_foto">
				<br><br>
				<input type="submit" name="Salvar" class="btn btn-success" value="Atualizar">
				</form>
			</center>
        </div>
        <div class="modal-footer">
          <button style="text-transform: capitalize;" type="button" class="btn btn-warning" data-dismiss="modal">Voltar</button>
        </div>
      </div>
    </div>
</div>
<!-- MODAL DO EDITAR FOTO -->
<div class="modal fade" id="galeriaModal">
    <div class="modal-dialog">
      <div class="modal-content bg-custom">
        <div class="modal-header">
          <h4 class="modal-title text-center text-light">Adicionar Foto a Galeria</h4>
        </div>
        <div class="modal-body">
        	<center>
        		<form method="POST" enctype="multipart/form-data">
        		<label class="label_edit_foto">Selecionar Arquivos <i class='fas fa-copy' style='font-size:15px'></i>
				<input type="file" name="fotos[]" required class="btn btn-outline-danger editfoto" id="galeria" multiple="multiple"></label>
			
				<br><br>
				<input type="submit" name="Salvar" class="btn btn-success" value="Adicionar">
				</form>
			</center>
        </div>
        <div class="modal-footer">
        <i class='fas fa-angle-left'></i>
          <button style="text-transform: capitalize;" type="button" class="btn btn-warning" data-dismiss="modal">Voltar</button>
        </div>
      </div>
    </div>
</div>


<!-- SCRIPT PARA ABRIR O PREVIEW DA FOTO NO MODAL -->
<script>
	$(function(){
		$('#upload').change(function(){
			const file = $(this)[0].files[0]
			const fileReader = new FileReader()
			fileReader.onloadend = function(){
			$('#img_edit').attr('src', fileReader.result)
			}
			fileReader.readAsDataURL(file)
		})
	})
	$(document).ready(function(){
 	 $('[data-toggle="tooltip"]').tooltip();   
	});
	
</script>








