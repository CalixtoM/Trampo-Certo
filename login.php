<!-- CONEXÃO COM BANCO E PARTE PHP DE LOGIN/CRIPTOGRAFIA -->
<?php
session_start();

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

		if (crypt($senha, $hash) == $hash) {
			//aqui armazeno o email do banco ja. nao tem como dar errado.
			$_SESSION['senha']=$hash;
			$_SESSION['usuario']=$obj->ds_email;
			if (isset($_SESSION['usuario'])) { // olha aqui fiz uma verificação pra SO ENTRAR NO PERFIL SE TIVER COM A SESSION PREENCHIDA
				echo "<h1>".$_SESSION['usuario']."</h1>";
				header("location:perfil.php");
				//ENTAO SE PASSAR DAQUI a session funciona!!!!! voltando (ta logando, so q o perfil manda devolta pro index)


			}
			
		} else {
			echo 'Senha incorreta!';
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
<meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
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
					<a href="recuperar.php" class="tc-animation-login" id="a-login">Recuperar senha</a>
				</div>
				<div class="col-sm-6">
					<a href="registro.php" class="tc-animation-login" id="a-login">Não possui conta?</a>
					<br><br>
				</div>
				<div class="col-sm-12 text-center"><center>
					<div id="my-signin2"></div>
				</center></div>
  <script>
    function onSuccess(googleUser) {
      console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
    }
    function onFailure(error) {
      console.log(error);
    }
    function renderButton() {
      gapi.signin2.render('my-signin2', {
        'scope': 'profile email',
        'width': 240,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
    }
  </script>

  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
	    	</div>
		</div>
	</section>
</div>
	
<!-- SCRIPTS -->
<?php include('inc/scripts.php');?>

<!-- FOOTER -->
<?php include('inc/footer.php');?>


