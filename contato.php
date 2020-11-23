<?php 
session_start();
?>
<!-- HEAD -->
<?php include('inc/head.php');?>

<!-- TÍTULO DA PÁGINA -->
<title>Trampo Centro - Sobre Nós</title>

<!-- NAVBAR -->
<?php include('inc/navbar.php');?>

<!-- CONTEÚDO DA PÁGINA -->
<div id="tc-index">
	<section class="parallax-contato">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-ajust-contato text-center tracking-in-expand">
					<h2 class="h2-contato text-center">REDES SOCIAIS</h2>
					<a href="https://www.facebook.com/trampo.certo1" target="_blank">
						<button class="btn btn-outline-info scale-in-center-contato">
							<img src="img/redesocial/facebook-letra.png" width="20"> 
							Facebook
						</button>
					</a>
					<a href="https://www.instagram.com/trampo_certo3min/?hl=pt-br" target="_blank">
						<button class="btn btn-outline-warning scale-in-center-contato">
							<img src="img/redesocial/instagram-letra.png" width="20"> 
							Instagram
						</button>
						<br><br>
					</a>
				</div>
				<div class="col-sm-12">
					<h2 class="h2-contato text-center tracking-in-expand">FORMULÁRIO PARA CONTATO</h2>
					<center>
            			<form method="POST" action="processa.php">
							<label>Nome</label>
							<input type="text" name="nome" placeholder="Nome completo"><br><br>
			
							<label>Email</label>
							<input type="email" name="email" placeholder="Seu melhor e-mail"><br><br>
			
							<label>Mensagem</label>
							<textarea name="mensagem" rows="4" cols="50" placeholder="Escreva sua mensagem"></textarea><br><br>
			
							<input type="submit" value="Enviar"><br><br>
						</form>
            		</center>
				</div>
	    	</div>
		</div>
	</section>
</div>
	
<!-- SCRIPTS -->
<?php include('inc/scripts.php');?>

<!-- FOOTER -->
<?php include('inc/footer.php');?>
