<?php
session_start();
	/*<--------------- ANTI-CHEAT --------------->*/
	if (!(isset($_SESSION['adm']))) {
		header("location:login.php");
	}
	/*--------------------------------------------*/
	include ("inc/conectar.php");

    date_default_timezone_set('America/Sao_Paulo');

	$data = date('Y-m-d');


		$slc = "SELECT * FROM usuario_suspenso WHERE dt_fim = '".$data."'";

			if ($result=$mysqli->query($slc)) {
				while ($obje = $result->fetch_object()) {
					$lib = $obje->id_usuariosuspenso;
					$desb = "UPDATE usuario SET st_ativo = 1 WHERE cd_usuario = '".$lib."'";

					if ($rslt = $mysqli->query($desb)){		
						echo "foi";
					}
		    	}
			}		    

?>