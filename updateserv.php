<?php
	session_start();
	include('inc/conectar.php');

?>

<!-- HEAD -->
<?php include('inc/head.php');?>

<!-- TÍTULO DA PÁGINA -->
<title>Adicionar Serviços - Trampo Centro</title>

<!-- NAVBAR -->
<?php include('inc/navbar.php');?>

<!-- CONTEÚDO DA PÁGINA -->
<div id="tc-index">
	<section class="parallax-addservicos">
		<div class="container text-center">
			<h2 id="h2-addservicos" class="tracking-in-expand">EDITAR SERVIÇO</h2>
				

	<?php
	if (isset($_SESSION['usuario'])) {
		
	$ser="SELECT * FROM servico INNER JOIN usuario ON id_usuario = cd_usuario WHERE '".$_GET['cod']."' = cd_servico ;";
	
	if ($query=$mysqli->query($ser)) {
		 while ($obj=$query->fetch_object()) {

 			echo "
 			<form method='post'>
 				<div class='row'>
				<div class='col-sm-3'></div>
				<div class='col-sm-3 coluna-addservicos slide-in-left-titulo'>
				<h4 class='h4-addservicos text-left'>Nome do Serviço</h4>";
       		   echo  '<input type="text" class="input-addservicos" name="nomeup" value="'.$obj->nm_servico.'" required placeholder="'.$obj->nm_servico.' (Nome Antigo)">';
       		echo "
       			</div>
       			</div>
       			<br>
       			<div class='row'>
				<div class='col-sm-3'></div>
				<div class='col-sm-3 coluna-addservicos slide-in-left-desc'>
				<h4 class='h4-addservicos text-left'>Descrição</h4>";


       		   echo  '<input type="text" name="descricaoup" class="input-addservicos" value="'.$obj->ds_servico.'" required placeholder="'.$obj->ds_servico.' (Descrição Antigo)"><br>';

       		echo "
       			</div>
       			</div>
       			<br>
       			<div class='row'>
				<div class='col-sm-3'></div>
				<div class='col-sm-3 coluna-addservicos slide-in-left-dt'>
				<h4 class='h4-addservicos text-left'>Data de Prazo</h4>";
       		   echo  '<input type="date" name="dataup" class="input-addservicosdt" value="'.$obj->dt_prazo.'" required placeholder="'.$obj->dt_prazo.' (Data Antiga)"><br>';

       		   echo "
       			</div>
       			</div>
       			<br>
       			<div class='row'>
				<div class='col-sm-3'></div>
				<div class='col-sm-3 coluna-addservicos slide-in-left-lc'>
				<h4 class='h4-addservicos text-left'>Localização</h4>";
       		   echo  '<input type="text" name="enderecoup" class="input-addservicosdt" value="'.$obj->ds_usendereco.'" required placeholder="'.$obj->ds_usendereco.' (Localização Antiga)"><br></div></div><br>';


        //echo  '<input type="text" name="endereco" value="'.$obj->ds_servend.'" required><br>';
     		   echo  '<a href="servicos.php"<button class="btn btn-outline-warning slide-in-fwd-center"><i class="fas fa-angle-left"></i> Voltar</button></a> <input type="submit" name="button" class="btn btn-outline-success slide-in-fwd-center" value="Editar"><br><br>'; 
          echo "</form>";
		
	if (isset($_POST['nomeup'])) {
		$sql='UPDATE servico SET nm_servico = "'.$_POST['nomeup'].'", ds_servico = "'.$_POST['descricaoup'].'", dt_prazo = "'.$_POST['dataup'].'" WHERE cd_servico = "'.$_GET['cod'].'" ';
		if ($exe=$mysqli->query($sql)) {
			header('location:servicos.php');
		}else{
                      printf("Error: %s\n",$mysqli->error);
                    }
	}else{
                      /*printf("Error: %s\n",$mysqli->error);*/
                    }
	
  		 
		}
	}else{
                      printf("Error: %s\n",$mysqli->error);
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

<!-- FOOTER -->
<?php include('inc/footer.php');?>