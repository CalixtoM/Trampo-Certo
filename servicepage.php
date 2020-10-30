<?php session_start();
  include('inc/conectar.php');
  include('inc/recaptchalib.php');

 ?>
 <!-- HEAD -->
<?php include('inc/head.php');?>

<!-- TÍTULO DA PÁGINA -->
<title>Trampo Centro - Sobre Nós</title>

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
                      echo "<h5 class='h5-servicos text-light'>Serviço postado por:</h6>";
                      echo  "<img src='".$obj->st_foto."' class='foto-perfil'><br>";
                      echo "<div class='text-light'>".$obj->nm_usuario."</div>";
                      echo "<div class='text-light'><strong>Serviço: </strong>".$obj->nm_servico."</div>";
                      echo "<h2 id='h2-servicos' class='tracking-in-expand'>ORÇAMENTOS</h2>";
                      echo "<div class='row'>";
                       if ($result=$mysqli->query($orca)) {
                        while ($obje = $result ->fetch_object()) {                                             
                              if ($result->num_rows>=1) { 
                            echo "
                                  <a class='card-servicos' id='a-servicos'>
                                  <div class='col-sm-4 flip-in-hor-bottom' style='padding-top: 25px;'>
                                  <div class='card' style='width: 20rem;'>
                                  <div class='card-body'>";
                            echo "<h5 class='card-title'><h6 class='h6-orcamento'><b>Usuário</b></h6>".$obje->nm_usuario."</h5>";
                              echo "<h5 class='card-title'><h6 class='h6-servicos'><b>Valor Cobrado</b></h6>R$ ".$obje->vl_orcamento.",00";
                                if ($_SESSION['cd'] == $obj->id_usuario) {
                                echo "<h5 class='card-title'><h6 class='h6-orcamento'><b>Descrição</b></h6>".$obje->ds_orcamento."<br><br>";
                                $valor = $obje->vl_orcamento;
                                $nome = $obje->nm_usuario;
                                echo "<a class='btn btn-success btn-lg' href='orcamento.php?orc=".$obje->cd_orcamento."'>Escolher Orçamento</a>";
                              }
                                if ($_SESSION['cd'] == $obje->id_usuariot) {
                                  echo "<br><br><button type='button' class='btn btn-outline-warning' data-toggle='modal' data-target='#editModal' style='text-transform: capitalize;'>Editar Orçamento</button>";
                                  echo "<br><br><button type='button' class='btn btn-outline-danger' data-toggle='modal' data-target='#excluModal' style='text-transform: capitalize;'>Excluir Orçamento</button><br><br>";
                              }
                          
                            }
                            echo "</a></div></div><br><br></div><br><br>";
                    }

                  }
              }
            }
						if ($resulti=$mysqli->query($orcam)) {
                if ($resulti->num_rows == 0 && $_SESSION['cd'] != $ser) {
                	echo '<br><div class="col-sm-12"><button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#addorçamento">Adicionar Orçamento</button></div><br><br>';
                }
															
						}
   ?>

   <br>
   <!-- MODAL DE ADICIONAR ORÇAMENTO -->
  	<div class="modal fade" id="addorçamento">
    	<div class="modal-dialog">
		    <div class="modal-content bg-custom">
		        <div class="modal-header">
		        		<h4 class="modal-title text-light">Adicionar Orçamento</h4>
		        </div>
		        <div class="modal-body">
              <center>
		        	<?php echo	'<form method="post" action="servicepage.php?serv='.$_GET['serv'].'">';?>
		        		<?php
		        		echo '<label class="text-light">Valor R$: </label><br><input type="number" class="input-login" name="valor" class="valor-mask" id="orca-input"  min="0" max="9999" step="any" required placeholder="Preço $$$" /><br><br>';
		        		echo '<label class="text-light">Descrição do Serviço a prestar:</label><br> <input type="text" name="desc" class="input-login-up max"500" required placeholder="Descrição"><br><br>';
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
                      $duplo_orçamento='
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Você já possui um Orçamento neste serviço, caso haja algum requerimento de edição favor editar o orçamento cadastrado/strong> incorretos.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                      </div>';
										}
									}
								}
		        		?>
		        		</form>
              </center>
		        	</div>
		        		<div class="modal-footer">
		          			<button type="button" class="btn btn-outline-danger"  style="text-transform: capitalize;" data-dismiss="modal">Cancelar</button>
		        		</div>
		    </div> 
    	</div>
  	</div>

  	<!-- MODAL DE EDITAR ORÇAMENTO -->
  	<div class="modal fade" id="editModal">
  		<?php 
  			$orcamen= "SELECT * FROM orcamento WHERE '".$_GET['serv']."' = id_servico AND '".$_SESSION['cd']."' = id_usuariot";
  				if ($resultado=$mysqli->query($orcamen)){
  					while ($objet = $resultado ->fetch_object()) { 
  		?>
    	<div class="modal-dialog">

		    <div class="modal-content bg-custom">
		        <div class="modal-header">
		        		<h4 class="modal-title text-light">Edite as Informações do seu Orçamento</h4>
		        </div>
		        <?php	echo '<div class="modal-body" id="'.$_SESSION['cd'].'">'; 
               echo '<form method="post" action="servicepage.php?serv='.$_GET['serv'].'">';


		        			echo '<label class="text-light">Valor R$: </label><br><input type="number" name="valorup" value="'.$objet->vl_orcamento.'"  class="valor-mask input-login"  data-mask="0000.00" min="0" max="9999" step="any" required /><br><br>';
		        			echo '<label class="text-light">Descrição do Serviço a prestar:</label><br><input type="text" value="'.$objet->ds_orcamento.'" name="descup" class="input-login" max"500" required><br><br>';
                   echo "<button style='text-transform: capitalize;' type='button' class='btn btn-outline-warning' data-dismiss='modal'>Voltar</button> ";
		        			echo ' <input type="submit" name="Editar" class="card-link btn btn-outline-success text-center">';
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

  		
   	<!-- mODAL DE EXCLUIR ORÇAMENTO -->
<div id="excluModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content bg-custom">
      <div class="modal-header">
        <h4 class="modal-title text-light">Você realmente deseja excluir</u> o Orçamento?</h4>
      </div>
		    <?php	echo '<div class="modal-body" id="'.$_SESSION['cd'].'">'; ?>
        	<form>
        		<?php
          
    					  echo '<button data-dismiss="modal" style="text-transform: capitalize;" type="button" class="btn btn-info btn-lg" name="cancelar">Cancelar</button>';
              	echo ' <a href="delet.php?serv='.$_GET['serv'].'"><button style="text-transform: capitalize;" type="button" class="btn btn-danger btn-lg" name="excluir">Excluir</button></a>'; 

        		?>	
        	</form>
      </div>
      <center>
        <button style='text-transform: capitalize;' type='button' class='btn btn-outline-warning' data-dismiss='modal'>Voltar</button><br><br>
      </center>
    </div>

  </div>
</div>
  	
        <!-- MODAL SELECIONAR ORÇAMENTO -->
<div id="confModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
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
    </div>
    </center>
  </div>
</div>
  	<script type="text/javascript">
	
      $('#orca').mask('0000.00');

    </script>


<!-- SCRIPTS -->
<?php include('inc/scripts.php');?>

<!-- FOOTER -->
<?php include('inc/footer.php');?>