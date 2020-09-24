<?php
 	session_start();
	include('inc/conectar.php');
	//Delet serviço
	 if (isset($_SESSION['usuario']) && isset($_GET['cod'])) {
	 	$del="DELETE FROM `trampo_certo`.`servico` WHERE `servico`.`cd_servico` = '".$_GET['cod']."';";
	
	 	if ($dele=$mysqli->query($del)) {
			header('location:servicos.php');
		}else{
                      printf("Error: %s\n",$mysqli->error);
                    }
	 }else{
                      printf("Error: %s\n",$mysqli->error);
                    }


    //Delet Orçamento
        if (isset($_SESSION['usuario']) && isset($_GET['serv'])) {
        	$delete="DELETE FROM `trampo_certo`.`orcamento` WHERE `orcamento`.`id_usuariot` = '".$_SESSION['cd']."'";
				if ($excluir=$mysqli->query($delete)){
					header('location:http://localhost:8080/tcc/servicepage.php?serv='.$_GET['serv'].'');		        					
				}
        }

?>