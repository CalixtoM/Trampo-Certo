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
				 <h3 class="text-light">Usuários</h3><br>
				<table class="table table-tc">
              <tr class="primeira-tr">
                <th scope="col" class="text-center">Nome do usuário</th>
                <th scope="col" class="text-center">E-mail</th>
                <th scope="col" class="text-center">Número do celular</th>
                <th scope="col" class="text-center">Endereço</th>
                <th scope="col" class="text-center">Foto</th>
                <th scope="col" class="text-center">Avaliação</th>
                <th scope="col" class="text-center">Excluir</th>
              </tr>

<?php
	$sql="SELECT * FROM usuario";//ele usa o nome, pq nao ta setado, da erro
	if ($result=$mysqli->query($sql)) {
			while ($obj = $result ->fetch_object()) {
				echo "
				<tr class='tr'>
				<td>". $obj->nm_usuario ."</td>
				<td>". $obj->ds_email."</td>
				<td>". $obj->nr_celular."</td>
				<td>". $obj->ds_usendereco."</td>
				<td><img style='width: 50px;height: 50px;border-radius:100%;' class='edit-foto' src='".$obj->st_foto."'<td>
				<td>". $obj->ds_avaliacao."</td>
				<td><a href='excluiradm.php?c=".$obj->cd_usuario."' class=' btn btn-outline-danger text-center'>Excluir</a></td>";

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



