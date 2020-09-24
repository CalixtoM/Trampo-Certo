<?php  

session_start();

include('inc/conectar.php');

include('inc/recaptchalib.php');


if(isset($_POST['senha'])){




	$sql="SELECT ds_password FROM usuario WHERE '".$_SESSION['usuario']."' = ds_email";

	if ($result=$mysqli->query($sql)) {
		if($result->num_rows==1){
			while ($obj = $result->fetch_object()) {

	

		$senha = $_POST['senha'];
		$hash = $obj->ds_password;
		

		if (crypt($senha, $hash) == $hash) {
			
				if ($_POST['senhanova'] = $_POST['senhanova2']) {
				
				

		$senhanova =  $_POST['senhanova'];
		$custo = '08';
		$salt = 'HjU1di12HbfDub54Sjbda2';
		$hash = crypt($senhanova, '$2a$' . $custo . '$' . $salt . '$');


		$up= " UPDATE usuario SET ds_password= '". $hash ."' WHERE '".$_SESSION['usuario']."' = ds_email";
			if ($result=$mysqli->query($up)) {
				header("location:perfil.php");
			}else{
                      printf("Error: %s\n",$mysqli->error);
                    }
						}else {
							echo 'Senha incorreta!';
								}
		}else {
			echo 'Senha incorreta!';
		}
			

			
		}

		
		}
	

	}else{
                      printf("Error: %s\n",$mysqli->error);
                    }


	
}

?>	

					<form method="post" >
						<h6 class="text-light h6-adjust-registro">Senha</h6>
						<i class="fa fa-lock text-light"></i>
						<input type="password" name="senha" class="input-registro" placeholder="Insira sua senha" required>

						<br>
						<br>

						<h6 class="text-light h6-adjust-registro">Nova Senha</h6>

						<i class="fa fa-lock text-light"></i>
						<input type="password" name="senhanova" class="input-registro" placeholder="Insira sua nova senha" required>

						<h6 class="text-light h6-adjust-registro">Confirmar nova Senha</h6>
						<i class="fa fa-lock text-light"></i>
						<input type="password" name="senhanova2" class="input-registro" placeholder="Confirme sua senha" required>
						<br><br>

						<input type="submit" name="enviar" class="btn btn-outline-success" value="Alterar Senha">

						<button><a href="perfil.php">Voltar</a></button>
					</form>

