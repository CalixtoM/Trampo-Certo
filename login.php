<!-- CONEXÃO COM BANCO E PARTE PHP DE LOGIN/CRIPTOGRAFIA -->
<?php
session_start();
$errodesenha = "";
include ("inc/conectar.php");

if (isset($_SESSION['usuario'])) {
header("location:perfil.php");
}
if(isset($_POST['email']) and isset($_POST['senha'])){

$sql="SELECT * FROM usuario WHERE ds_email='".$_POST['email']."'";

	if ($result=$mysqli->query($sql)) {

		if($result->num_rows==1){
			while ($obj = $result ->fetch_object()) {
		$senha = $_POST['senha'];
		$hash = $obj->ds_password;
		$_SESSION['cd'] = $obj->cd_usuario;
		if (crypt($senha, $hash) == $hash) {
			//aqui armazeno o email do banco ja. nao tem como dar errado.
			$_SESSION['senha']=$hash;
			$_SESSION['usuario']=$obj->ds_email;
			if (isset($_SESSION['usuario'])) { // olha aqui fiz uma verificação pra SO ENTRAR NO PERFIL SE TIVER COM A SESSION PREENCHIDA
				if (isset($_SESSION['novasenha'])) {
					header("location:updatesenha.php");
				}else{
				header("location:perfil.php");//ENTAO SE PASSAR DAQUI a session funciona!!!!! voltando (ta logando, so q o perfil manda devolta pro index)
				}

			}
			
		} else {
			$errodesenha = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  					<strong>Senha ou E-mail</strong> incorretos.
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  						</button>
					</div>';
		}
		}
	}
	}else{
		printf($mysqli->error);
	}
}
?>	

<!-- HEAD -->
<?php include('inc/head.php');?>
<meta name="google-signin-client_id" content="750567248578-ippef6rb8o0vipsi3fjun8uh29aaeuvi.apps.googleusercontent.com">
<!-- TÍTULO DA PÁGINA -->
<title>Trampo Centro - Sobre Nós</title>


<!-- NAVBAR -->
<?php include('inc/navbar.php');?>

<!-- CONTEÚDO DA PÁGINA -->
<div id="tc-index">
	<section class="parallax-login">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<form method="post">
						<?php
							echo $errodesenha;
						?>
							<h2 class="h2-login">Login</h2>

						<input type="email" id="email" name="email" placeholder="Insira seu email" class="input-login">
						<br>
						<br>
						<input type="password" id="senha" name="senha" placeholder="Insira sua senha" class="input-login"><br><br>
						<small class="text-muted text-justify"><input type="checkbox" class="form-check-input" id="exampleCheck1">Continuar logado</small>
						<br>
						<br>
						<input type="submit" name="" class="btn btn-outline-success" value="Entrar"><br>
					</form>
					<br>
				</div>
				<div class="col-sm-6 text-right">
					<a href="recuperarsenha.php" class="tc-animation-login" id="a-login">Recuperar senha</a>
				</div>
				<div class="col-sm-6">
					<a href="registro.php" class="tc-animation-login" id="a-login">Não possui conta?</a>
					<br><br>
				</div>
				<div class="col-sm-12 text-center"><center>
					<div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
				</center></div>
				<p id='msg'></p>
  <script>
		function onSignIn(googleUser) { //obtém as informações do usuário que fez login usando o Google
	var profile = googleUser.getBasicProfile();
	console.log('ID: ' + profile.getId());
	console.log('Name: ' + profile.getName());
	console.log('Email: ' + profile.getEmail());
   	var personName = profile.getName();
   	var personEmail = profile.getEmail();
   	var personId = profile.getId();
   	var userPicture = profile.getImageUrl(); 
   	googleUser.disconnect();
   	window.location.href = "valida.php?name=" + personName + "&email=" + personEmail + "&id=" + personId + "&picture=" + userPicture;	//redireciona o usuário junto com suas informações em variáveis
}	
  </script>

 
	    	</div>
		</div>
	</section>
</div>
	
<!-- SCRIPTS -->
<?php include('inc/scripts.php');?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- FOOTER -->
<?php include('inc/footer.php');?>