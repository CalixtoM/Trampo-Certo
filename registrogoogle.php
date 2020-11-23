<?php
session_start();
include('inc/conectar.php');

include('inc/recaptchalib.php');
if ($result = $mysqli->query("SELECT * FROM usuario WHERE ds_email = '".$_SESSION['usuario']."' AND nr_cpf IS NOT NULL")) {
	$row_cnt = $result->num_rows;
	if ($row_cnt == 1) {
		header("location:perfil.php");
	}
}

if (isset($_POST['cpf'])) {
        				$sql = "update usuario
          				set nr_cpf = '" .$_POST['cpf']."',dt_nascimento = '" .$_POST['data']."',nr_celular = '" .$_POST['telefone']."',ds_usendereco = '" .$_POST['endereco']."', st_admin = '". 0 ."', st_ativo = '". 1 ."', ds_avaliacao = '". 0 ."' WHERE ds_email = '".$_SESSION['usuario']."'";
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
				<div class="col-sm-12 text-center">
					<form method="POST" enctype="multpart/form-data">
						<h2 class="h2-login">Informações</h2>

						<h6 class="text-light h6-adjust-registro">CPF</h6>
						<i class="fa fa-address-card text-light"></i>
						<input type="text" class="cpf-mask input-registro" id="example-input-2" placeholder="Insira seu CPF" maxlength="11" minlength="11" autocomplete="off" data-mask="000.000.000-00" name="cpf" required><br>
						<small class="text-muted">ex. 99966633311</small>

						<br>
						<br>

						<h6 class="text-light h6-adjust-registro">Celular</h6>
        				<i class="fa fa-mobile-alt text-light"></i>
						<input type="text" class="input-registro" id="phone-input" name="telefone" placeholder="Insira seu número de celular" required><br>
 						<small class="text-muted">ex. (99) 99999-9999</small>

						<br>
						<br>

						<h6 class="text-light h6-adjust-registro">Endereço</h6>
						<i class="fa fa-map-marked-alt text-light"></i>
						<input type="text" name="endereco" class="input-registro" placeholder="Insira sua cidade/rua/número da casa" required><br>
						<small class="text-muted">ex. Eltolandia, Rua Eltano - 212</small>

						<br>
						<br>
						</span>

						<br>
						<br>

						<h6 class="text-light h6-adjust-registro">Data de Nascimento</h6>
						<i class="fa fa-birthday-cake text-light"></i>
						<input type="date" class="input-registro" placeholder="Ex.: dd/mm/aaaa" data-mask="00/00/0000" maxlength="10" autocomplete="off" name="data" required>
						<br>
						<br>

						<center>
						<div class="g-recaptcha" data-sitekey="6Ld4B9oZAAAAAPc5kVsGLlZEOxsdYbtvzK3eez4W"></div>
						</center>
						<script src="https://www.google.com/recaptcha/api.js?hl=pt-BR"></script>
						<?php 
							$secret = "6Ld4B9oZAAAAAPZIEaSbGvyNUjvIaMT0NZmMSScu";
							$response = null;
							$reCaptcha = new reCaptcha($secret);
							if(isset($_POST['g-recaptcha-response'])){
								$response = $reCaptcha->verifyResponse($_SERVER['REMOTE_ADDR'], $_POST['g-recaptcha-response']);
							}
							if($response != null && $response->success){
								echo "Prosseguir";
							}
						?>
						
						<br>
						<br>
						<input type="radio" name="" required><label class="text-light label-registro">Li e concordo com os</label> <a href="policies.php" class="tc-animation-registro" id="a-registro">Termos de Uso</a>
						<br>
						<br>
						<input type="submit" name="enviar" class="btn btn-outline-success" value="Adicionar Informações">
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