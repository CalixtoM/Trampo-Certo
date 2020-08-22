<?php
session_start();
include('inc/conectar.php');

include('inc/recaptchalib.php');

if (isset($_POST['nome'])) {
        				$sql = "update usuario
          				set nm_usuario = '" .$_POST['nome']."',ds_email = '" .$_POST['email']."',nr_celular = '" .$_POST['telefone']."',ds_usendereco = '" .$_POST['endereco']."',ds_usfoto = '" .$_POST['foto']."'";
         				 if ($query = $mysqli->query($sql)) {
              				header("location:perfil.php");
            					}
            			else{
             					printf("Error: %s\n",$mysqli->error);
            				}
         				 }


?>

<!-- HEAD -->
<?php include('inc/head.php');?>

<!-- TÍTULO DA PÁGINA -->
<title>Trampo Centro - Sobre Nós</title>

<!-- NAVBAR -->
<?php include('inc/navbar.php');?>

<!-- CONTEÚDO DA PÁGINA -->
<div id="tc-index">
	<section class="parallax-registro">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 text-center flip-in-ver-right">
					<form method="post" enctype="multpart/form-data">
						<h2 class="h2-login">Registro</h2>
						<?php
						$sql="SELECT * FROM usuario WHERE ds_email='".$_SESSION['usuario']."'";//ele usa o nome, pq nao ta setado, da 	erro
						if ($result=$mysqli->query($sql)) {
						while ($obj = $result ->fetch_object()) {
						?>

						<h6 class="text-light h6-adjust-registro">Alterar Nome</h6>
						<i class="fa fa-user-plus text-light"></i>
						<input type="text" name="nome" class="input-registro" placeholder="Insira seu nome" value="<?php echo $obj->nm_usuario; ?>" required><br>
						<small class="text-muted">ex. Elton Soares</small>


						<br>
						<br>

						<h6 class="text-light h6-adjust-registro">Alterar Email</h6>
						<i class="fa fa-envelope text-light"></i>
						<input type="email" name="email" class="input-registro" placeholder="Insira seu Email" value="<?php echo $obj->ds_email; ?>" required><br>
						<small class="text-muted">ex. eltonsoares@email.com</small>

				</div>
				<div class="col-sm-6 text-center flip-in-ver-left">
						<h2 class="h2-login">Informações</h2>

						<h6 class="text-light h6-adjust-registro">Celular</h6>
        				<i class="fa fa-mobile-alt text-light"></i>
						<input type="text" class="input-registro" id="phone-input" name="telefone" value="<?php echo $obj->nr_celular; ?>" placeholder="Insira seu número de celular" required><br>
 						<small class="text-muted">ex. (99) 99999-9999</small>

						<br>
						<br>

						<h6 class="text-light h6-adjust-registro">Endereço</h6>
						<i class="fa fa-map-marked-alt text-light"></i>
						<input type="text" name="endereco" value="<?php echo $obj->ds_usendereco; ?>" class="input-registro" placeholder="Insira sua cidade/rua/número da casa" required><br>
						<small class="text-muted">ex. Eltolandia, Rua Eltano - 212</small>

						<br>
						<br>

						<h6 class="text-light h6-adjust-registro">Foto</h6>
						<i class="fa fa-file-image text-light"></i>
						
						<input type="text" name="foto"  required value="<?php echo $obj->ds_usfoto; ?>"> Altere sua foto
						</span>

						<br>
						<br>
						<?php 
						}
						}
						?>

						</center>
						<input type="submit" name="enviar" class="btn btn-outline-success" value="Editar">
						<br><br>
					</form>				
				</div>
	    	</div>
		</div>
	</section>
</div>
	
<!-- SCRIPTS -->
<?php include('inc/scripts.php');?>

<!-- FOOTER -->
<?php include('inc/footer.php');?>

<script type="text/javascript">
	
$('#phone').mask('(999) 999-9999');

</script>