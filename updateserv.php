<?php
	session_start();
	include('inc/conectar.php');

	?>
	<?php
	if (isset($_SESSION['usuario'])) {
		
	$ser="SELECT * FROM servico INNER JOIN usuario ON id_usuario = cd_usuario WHERE '".$_GET['cod']."' = cd_servico ;";
	
	if ($query=$mysqli->query($ser)) {
		 while ($obj=$query->fetch_object()) {

 			 echo '<form method="post">';
       		   echo  '<input type="text" name="nomeup" value="'.$obj->nm_servico.'" required><br>';
       		   echo  '<input type="text" name="descricaoup" value="'.$obj->ds_servico.'" required><br>';
       		   echo  '<input type="date" name="dataup" value="'.$obj->dt_prazo.'" required><br>';
       		   echo  '<input type="text" name="enderecoup" value="'.$obj->ds_usendereco.'" required><br>';
        //echo  '<input type="text" name="endereco" value="'.$obj->ds_servend.'" required><br>';
     		   echo  '<input type="submit" name="button" value="Editar">'; 
          echo "</form>";
		
	if (isset($_POST['nomeup'])) {
		$sql='UPDATE servico SET nm_servico = "'.$_POST['nomeup'].'", ds_servico = "'.$_POST['descricaoup'].'", dt_prazo = "'.$_POST['dataup'].'" WHERE cd_servico = "'.$_GET['cod'].'" ';
		if ($exe=$mysqli->query($sql)) {
			header('location:servicos.php');
		}else{
                      printf("Error: %s\n",$mysqli->error);
                    }
	}else{
                      printf("Error: %s\n",$mysqli->error);
                    }
	
  		 
		}
	}else{
                      printf("Error: %s\n",$mysqli->error);
                    }
}
?>