<?php 
session_start();
?>
<!-- HEAD -->
<?php include('inc/head.php');?>

<!-- TÍTULO DA PÁGINA -->
<title>Trampo Centro</title>

<!-- NAVBAR -->
<?php include('inc/navbar.php');?>

<!-- CONTEÚDO DA PÁGINA -->
<div id="tc-index">
	<section class="parallax-index">
		<div class="container">
			<div class="row">

				<div class="col-sm-7 text-center" >
					<img src="img/logo.png" style="margin-top: -50px;" width="250" class="scale-in-center">
				</div>

				<div class="col-sm-5 text-center">
					<h2 class="text-light tracking-in-expand">Ainda não possui conta?</h2><br>
					<a href="registro.php"><button class="btn btn-outline-success scale-in-ver-center">Registre-se!</button></a><br>
				</div>
				<br>
				<div class="col-sm-12"><br></div>
	    		<div class="col-sm-6" id="a-tc-index">
		    		<h2 id="h2-index" class="tracking-in-expand">EAI CAMARADA!</h2>
		    		<h6>Nós somos a equipe do Trampo Certo<br>Para saber mais sobre o site, clique neste botão</h6>
		    		<div class="container" style="padding: 12px;">
		    			<a href="sobre.php"><button class="btn btn-outline-success scale-in-ver-center">Sobre nós</button></a>
	    			</div>
	    		</div>

	    		<div class="col-sm-6" id="b-tc-index"></div>

	    		<div class="col-sm-6" id="c-tc-index"></div>

	    		<div class="col-sm-6" id="d-tc-index">
		    		<h2 id="h2-index" class="tracking-in-expand">NÃO SABE COMO FUNCIONA?</h2>
		    		<h6>Saiba tudo sobre o site, como solicitar um serviço, pegar o serviço e navegar pelo sistema!</h6>
		    		<div class="container" style="padding: 12px;">
		    			<a href="tutorial.php"><button class="btn btn-outline-success scale-in-ver-center">Como funciona?</button></a>
	    			</div>
	    		</div>

	    		<div class="col-sm-6" id="e-tc-index">
		    		<h2 id="h2-index" class="tracking-in-expand">DÚVIDAS?</h2>
		    		<h6>Tire dúvidas mandando e-mail ou entrando em contato com nós pelas redes sociais. Para mais inforamções, acesse a página pressionando o botão pressionando este botão</h6>
		    		<div class="container" style="padding: 12px;">
		    			<a href="contato.php"><button class="btn btn-outline-success scale-in-ver-center">Contato</button></a>
	    			</div>	    			
	    		</div>

	    		<div class="col-sm-6" id="f-tc-index"></div>
	    	</div>
		</div>
	</section>
</div>

	
<!-- SCRIPTS -->
<?php include('inc/scripts.php');?>

<!-- FOOTER -->
<?php include('inc/footer.php');?>
