<?php
session_start();
	/*Anticheat*/
	if (!(isset($_SESSION["adm"]))) {
		header("location:perfil.php");
	}
	/*--------------------------------------------*/
	include ("inc/conectar.php");
?>
<!-- HEAD -->
<?php include('inc/head.php');?>

<!-- TÍTULO DA PÁGINA -->
<title>Trampo Centro - Perfil</title>

<!-- NAVBAR -->
<?php include('inc/navbar.php');?>

<!-- CONTEÚDO DA PÁGINA -->
<div id="tc-index">
	<section class="parallax-vis_usuarios ">
		<div class="container text-center">
			<div class="row">
			<div class="col-sm-12 text-center">
				 <h3 class="text-light">Lista de Denúncias de Usuários</h3><br>
				<table class="table table-tc">
              <tr class="primeira-tr">
              	<th scope="col" class="text-center">Usuário que foi denunciado</th>
              	<th scope="col" class="text-center">Usuário que realizou a denúncia</th>
                <th scope="col" class="text-center">Descrição</th>
                <th scope="col" class="text-center">Data da Denúncia</th>
                <th scope="col" class="text-center">Opções</th>
              </tr>

<?php
	$sql="SELECT * FROM report_perfil AS rp 
	INNER JOIN usuario AS us ON us.cd_usuario = rp.id_reportado 
	INNER JOIN usuario AS ud ON ud.cd_usuario = rp.id_reporter
	ORDER BY dt_report DESC";//ele usa o nome, pq nao ta setado, da erro
	if ($result=$mysqli->query($sql)) {
			while ($obj = $result ->fetch_object()) {
				echo "
				<tr class='tr'>
				<td>".$obj->nm_usuario."</td>
				<td>$obj->nm_usuario</td>
				<td>".$obj->ds_report."</td>
				<td>".$obj->dt_report."</td>
				<td><a href='suspender.php?cdban=$obj->id_reportado' class='btn btn-danger'>Banir por 15 dias</a></td>";

			}
		}else{
		printf($mysqli->error);
	}
	?>
	    	</table>
        </div> 
	    	
		</div>
	</section>
</div>

<?php
	/*Anticheat*/
	if (!(isset($_SESSION["adm"]))) {
		header("location:perfil.php");
	}
	/*--------------------------------------------*/
	include ("inc/conectar.php");
?>
<!-- HEAD -->
<?php include('inc/head.php');?>

<!-- TÍTULO DA PÁGINA -->
<title>Trampo Centro - Perfil</title>

<!-- NAVBAR -->
<?php include('inc/navbar.php');?>

<!-- CONTEÚDO DA PÁGINA -->
<div id="tc-index">
	<section class="parallax-vis_usuarios ">
		<div class="container text-center">
			<div class="row">
			<div class="col-sm-12 text-center">
				 <h3 class="text-light">Lista de Denúncias de Serviços</h3><br>
				<table class="table table-tc">
              <tr class="primeira-tr">
              	 <th scope="col" class="text-center">Serviço denunciado</th>
              	  <th scope="col" class="text-center">Usuário que denunciou</th>
                <th scope="col" class="text-center">Descrição</th>
                <th scope="col" class="text-center">Data da Denúncia</th>
                <th scope="col" class="text-center">Opções</th>
              </tr>


<?php
	$sql="SELECT * FROM report_servico AS rs 
	INNER JOIN servico AS se ON se.cd_servico = rs.id_servicorep 
	INNER JOIN usuario AS us ON us.cd_usuario = rs.id_reporters 
	WHERE '".$_SESSION['cd']. "' ORDER BY dt_reports DESC";//ele usa o nome, pq nao ta setado, da erro
	if ($result=$mysqli->query($sql)) {
			while ($obj = $result ->fetch_object()) {
				echo "
				<tr class='tr'>
				<td>".$obj->nm_servico."</td>
				<td>".$obj->nm_usuario."</td>
				<td>".$obj->ds_reports."</td>
				<td>".$obj->dt_reports."</td>
				<td><a href='suspender.php?cdban=$obj->id_reportados' class='btn btn-danger'>Banir por 15 dias</a></td>";

			}
		}else{
		printf($mysqli->error);
	}
	?>	
	    	</table>
        </div> 
	    	
		</div>
	</section>
</div>
<!-- SCRIPTS -->
<?php include('inc/scripts.php');?>

<!-- FOOTER -->
<?php include('inc/footer.php');?>
