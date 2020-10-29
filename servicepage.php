<?php session_start();
  include('inc/conectar.php');
  include('inc/recaptchalib.php');

 ?>
 <!-- HEAD -->
<?php include('inc/head.php');?>
<meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
<!-- TÍTULO DA PÁGINA -->
<title>Trampo Centro - Sobre Nós</title>
<meta charset="utf-8">
<link rel="stylesheet" href="./css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
<!-- NAVBAR -->
<?php include('inc/navbar.php');?>
<div id="tc-index">
  <section class="parallax-servicopage">
    <div class="container">
      <div class="col-sm-4">
      </div>
    </div class="col-sm-4">
    <center>
      


 <?php
  $_SESSION['usuario'];
  $show="SELECT * FROM servico AS s INNER JOIN usuario AS u ON s.id_usuario = u.cd_usuario WHERE '".$_GET['serv']."' = s.cd_servico";
  $orca="SELECT * FROM orcamento AS o INNER JOIN usuario AS ui ON o.id_usuariot = ui.cd_usuario WHERE '".$_GET['serv']."' = id_servico ORDER BY '".$_SESSION['cd']."'";
  $orcam="SELECT * FROM orcamento AS o INNER JOIN usuario AS ui ON o.id_usuariot = ui.cd_usuario WHERE '".$_GET['serv']."' = id_servico AND '".$_SESSION['cd']."' = o.id_usuariot;";
              $_SESSION['serv']=$_GET['serv'];
                if ($resulte=$mysqli->query($show)) {
                    while ($obj = $resulte ->fetch_object()) {
                    	$ser=$obj->id_usuario;
                    	echo  "<img src='".$obj->st_foto."' class='foto-perfil'>";
                    	echo "<div class='text-light'>".$obj->nm_usuario."</div>";
                      echo "<div class='text-light'>".$obj->nm_servico."</div>";

                    	 if ($result=$mysqli->query($orca)) {
                    	 	while ($obje = $result ->fetch_object()) {                      		              	 	
                    	 		echo "<div class='text-light'>Orçamentos: <br></div>";	
                 		   				if ($result->num_rows>=1) {	
                 		   			echo "<div class='text-light'>Usuarios: ".$obje->nm_usuario."<br></div>";
                 		   				echo "<div class='text-light'>Valor cobrado: ".$obje->vl_orcamento."<br><br></div>";
                 		   					if ($_SESSION['cd'] == $obj->id_usuario) {
                 								echo "<div class='text-light'>Descrição: ".$obje->ds_orcamento."<br><br></div>";
                                $valor = $obje->vl_orcamento;
                                $nome = $obje->nm_usuario;
                                echo "<a class='btn btn-info btn-lg' href='orcamento.php?orc=".$obje->cd_orcamento."'>Escolher Orçamento</a> <br>      ";
                 							}
                 		   					if ($_SESSION['cd'] == $obje->id_usuariot) {
                 		   						echo "<button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#editModal'>Editar Orçamento</button>     ";
   												echo "<button type='button' class='btn btn-danger btn-lg' data-toggle='modal' data-target='#excluModal'>Excluir Orçamento</button><br><br>";
                 							}
                 							
						                }
						   			}
						   		}
							}
						}
						if ($resulti=$mysqli->query($orcam)) {
                if ($resulti->num_rows == 0 && $_SESSION['cd'] != $ser) {
                	echo '<br><button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Adicionar Orçamento</button>';
                }
															
						}
   ?>
   <br>

   <!-- Modal de adicionar -->
  	<div class="modal fade" id="myModal" role="dialog">
    	<div class="modal-dialog">
    
      <!-- Modal content-->
		    <div class="modal-content">
		        <div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        		<h4 class="modal-title">Preencha as Informações para adicionar um Orçamento</h4>
		        </div>
		        	<div class="modal-body">
		        	<?php echo	'<form method="post" action="servicepage.php?serv='.$_GET['serv'].'">';?>
		        		<?php
		        		echo 'Valor: <input type="number" name="valor" class="valor-mask" id="orca-input" data-mask="0000.00" min="0" max="9999" step="any" required /><br><br>';
		        		echo 'Descrição do Serviço a prestar: <input type="text" name="desc" max"500" required><br><br>';
		        		echo '<center><input type="submit" class="card-link btn btn-outline-success text-center"></center>';

		        			if(isset($_POST['desc'])){
		        				$orcam= "SELECT * FROM orcamento WHERE '".$_GET['serv']."' = id_servico AND '".$_SESSION['cd']."' = id_usuariot";
		        				if ($resulti=$mysqli->query($orcam)){
		        					if($resulti->num_rows == 0){
										$ins = "INSERT INTO orcamento VALUES(NULL,'".$_GET['serv']."','".$_SESSION['cd']."','".$_POST['valor']."','".$_POST['desc']."')";
										if ($result=$mysqli->query($ins)) {
                      header('location:servicepage.php?serv='.$_GET['serv'].'');                          
	      								}else{
	  										printf($mysqli->error);
											}
										}else{
											echo "<script>alert('Você já possui um Orçamento neste serviço, caso haja algum requerimento de edição favor editar o orçamento cadastrado');</script>";
										}
									}
								}
		        		?>
		        		</form>
		        	</div>
		        		<div class="modal-footer">
		          			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		        		</div>
		    </div> 
    	</div>
  	</div>

  	<!-- Modal de Editar -->
  	<div class="modal fade" id="editModal" role="dialog">
  		<?php 
  			$orcamen= "SELECT * FROM orcamento WHERE '".$_GET['serv']."' = id_servico AND '".$_SESSION['cd']."' = id_usuariot";
  				if ($resultado=$mysqli->query($orcamen)){
  					while ($objet = $resultado ->fetch_object()) { 


  		?>
    	<div class="modal-dialog">
    
      <!-- Modal content-->
		    <div class="modal-content">
		        <div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        		<h4 class="modal-title">Edite as Informações do seu Orçamento</h4>
		        </div>
		        <?php	echo '<div class="modal-body" id="'.$_SESSION['cd'].'">'; 
               echo '<form method="post" action="servicepage.php?serv='.$_GET['serv'].'">';

		        			echo 'Valor: <input type="number" name="valorup" value="'.$objet->vl_orcamento.'" class="valor-mask"  data-mask="0000.00" min="0" max="9999" step="any" required /><br><br>';
		        			echo 'Descrição do Serviço a prestar: <input type="text" value="'.$objet->ds_orcamento.'" name="descup" max"500" required><br><br>';
		        			echo '<center><input type="submit" name="Editar" class="card-link btn btn-outline-info text-center"></center>';
                  echo '</form>';

		        		if (isset($_POST['descup'])){
		        			$editar="UPDATE orcamento SET vl_orcamento = '".$_POST['valorup']."', ds_orcamento = '".$_POST['descup']."' WHERE '".$_GET['serv']."' = id_servico AND '".$_SESSION['cd']."' = id_usuariot";
		        				if($ress=$mysqli->query($editar)){
		        				 	header('location:servicepage.php?serv='.$_GET['serv'].'');		        					
		        				}else{
		        					print($mysqli->error);
		        				}
		        			}
		        		}
		        	}
		        
			?>
		        		</form>
		        	<?php echo '</div>'?>
		        		
		        </div>
		    </div> 
  	</div>
  </div>

  		
   	<!-- Modal -->
<div id="excluModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Você realmente deseja excluir o Orçamento?</h4>
      </div>


		    <?php	echo '<div class="modal-body" id="'.$_SESSION['cd'].'">'; ?>
        		<form>
        			<?php
                
               
    					  echo '<a href="servicepage.php?serv='.$_GET['serv'].'"><button type="button" class="btn btn-info btn-lg" name="cancelar">Cancelar</button></a>';
              	echo '<a href="delet.php?serv='.$_GET['serv'].'"><button type="button" class="btn btn-danger btn-lg" name="excluir">Excluir</button></a>'; 
        			?>
        			
        		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  	
        <!-- Modal -->
<div id="confModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Você deseja selecionar este Orçamento ?</h4>

      </div>


        <?php echo '<div class="modal-body" id="'.$_SESSION['cd'].'">'; ?>
              <? echo '<form method="post" action="servicepage.php?serv='.$_GET['serv'].'" enctype="multpart/form-data">';?>
              <?php
                $query="SELECT * FROM orcamento AS orc INNER JOIN usuario AS usu ON usu.cd_usuario = orc.id_usuariot WHERE ".$_GET['orc']." = cd_orcamento";
                  if ($respect = $mysqli->query($query)) {
                    while ($object = $respect->fetch_object()) { 
                    
                      echo "Orçamento cadastrado pelo usuario <b>".$object->nm_usuario."</b> no valor de: <b>".$object->vl_orcamento."</b><br><br>";
                      echo '<a href="servicepage.php?serv='.$_GET['serv'].'"><button type="button" class="btn btn-info btn-lg" name="cancelar">Cancelar</button></a>';
                      echo '<a href="delet.php?serv='.$_GET['serv'].'"><button type="button" class="btn btn-success btn-lg" name="excluir">Selecionar</button></a>';
                    }
                  } 
              ?>
              
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    </center>
    </div>
  </div>
</div>
  	<script type="text/javascript">
	
      $('#orca').mask('0000.00');

    </script>


<!-- SCRIPTS -->
<?php include('inc/scripts.php');?>

<!-- FOOTER -->
<?php include('inc/footer.php');?>