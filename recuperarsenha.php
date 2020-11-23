<?php
session_start();
	/*<--------------- ANTI-CHEAT --------------->*/
	include('inc/conectar.php');
?>

<!-- HEAD -->
<?php include('inc/head.php');?>

<!-- TÍTULO DA PÁGINA -->
<title>Trampo Centro - Recuperar senha</title>

<!-- NAVBAR -->
<?php include('inc/navbar.php');?>
<!-- CONTEÚDO DA PÁGINA -->
<div id="tc-index">
	<section class="parallax-recuperar_senha">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
				<?php
				$errodecpf = "";
					if (isset($_POST['botao'])) {
							$email_sql="SELECT * FROM usuario WHERE ds_email = '".$_POST['email']."' AND  nr_cpf ='".$_POST['cpf']	."'; ";
							$email=$mysqli->escape_string($_POST['email']);
							$num_sql=$mysqli->query($email_sql) or die($mysqli->error);

						if ($num_sql->num_rows > 0) {
							$senha=substr(md5(time()), 0,6);
							$custo = '08';
							$salt = 'HjU1di12HbfDub54Sjbda2';
							$hash = crypt($senha, '$2a$' . $custo . '$' . $salt . '$');

							if (mail($email, "Sua solicitação de nova senha para o Trampo Certo", "Sua nova senha é: ".$senha)) {
								$update_senha="UPDATE usuario SET ds_password = '".$hash."' WHERE ds_email = '".$email."';";
								$sql_senha=$mysqli->query($update_senha) or die($mysqli->error);

								if ($sql_senha) {
									$_SESSION['novasenha'] = 'true';
									header('location:login.php');
								}
							}
						}else{
							$errodecpf = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
					  					<strong>E-mail ou CPF</strong> inválidos.
					  						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					    				<span aria-hidden='true'>&times;</span>
					  						</button>
										</div>";
						}
					}
				?>
				<form method="POST">
					<h2 class="text-light">Enviaremos uma senha para seu email.</h2>
					<?php

					echo $errodecpf;

					?>
					<?php 
						if (isset($_POST['email'])) {
							echo '<input type="email" name="email" class="input-login" placeholder="Insira seu email" value=" '.$_POST['email'].' "><br><br>';
						}else{
							echo '<input type="email" name="email" class="input-login" placeholder="Seu email"><br><br>';
						}
						if (isset($_POST['cpf'])) {
							echo '<input type="text" id="example-input-2" class="input-login" value="'.$_POST['cpf'].'" placeholder="Insira seu CPF" maxlength="11" autocomplete="off" data-mask="000.000.000-00" minlength="11" name="cpf" required><br>';
						}else{
							echo '<input type="text" id="example-input-2" class="input-login" placeholder="Insira seu CPF" maxlength="11"  minlength="11" autocomplete="off" data-mask="000.000.000-00" name="cpf" required><br>';
						}
					?>
					<br>
					<input type="submit" class="btn btn-outline-success" name="botao" value="Enviar senha">
				</form>
			</div>
	    	</div>
		</div>
	</section>
</div>
<!-- SCRIPTS -->
<?php include('inc/scripts.php');?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- FOOTER -->
<?php include('inc/footer.php');?>