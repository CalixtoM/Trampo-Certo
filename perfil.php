<?php
session_start();
	/*<--------------- ANTI-CHEAT --------------->*/
	if (!(isset($_SESSION["usuario"]))) {
		header("location:index.php");
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
	<section class="parallax-perfil">
		<div class="container text-light">
			<div class="row">

<?php
	$sql="SELECT * FROM usuario WHERE ds_email='".$_SESSION['usuario']."'";//ele usa o nome, pq nao ta setado, da erro
	if ($result=$mysqli->query($sql)) {
			while ($obj = $result ->fetch_object()) {
				echo $obj->nm_usuario. "<br>";
				echo $obj->ds_email. "<br>";
				echo $obj->ds_password. "<br>";
				echo $obj->nr_celular. "<br>";
				echo $obj->ds_usendereco. "<br>";
				echo "<img src='".$obj->ds_usfoto."' <br>";
				echo $obj->ds_avaliacao. "<br>";
				echo $_SESSION['usuario']."<br>";
				$_SESSION['cd'] = $obj->cd_usuario;
				echo $_SESSION['cd'];
				echo '<a href="updatesenha.php"><button>Alterar a senha</button></a>';

			}
		}else{
		printf($mysqli->error);
	}
	?>
	    	</div>
	    	<button><a class="nav-link tc-animation-navbar" href="update.php" id="a-navbar">Editar</a></button>
		</div>
	</section>
</div>
<!-- SCRIPTS -->
<?php include('inc/scripts.php');?>

<!-- FOOTER -->
<?php include('inc/footer.php');?>



