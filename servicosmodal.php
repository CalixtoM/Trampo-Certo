<?php
	session_start();

  include ('inc/conectar.php');
  $sql="SELECT * FROM usuario WHERE '".$_SESSION['usuario']."' = ds_email ";
        if ($result=$mysqli->query($sql)) {
          while ($obje = $result ->fetch_object()) {
?>
<!DOCTYPE html>
<html>
<head> 
  <meta charset="utf-8">
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
	<title></title>
</head>
<body>
  <?php
      $show="SELECT * FROM servico";
      if ($result=$mysqli->query($show)) {
        if($result->num_rows>=1){
          while ($obj = $result ->fetch_object()) {
            if ($obj->st_servico ==0) {
              
            
            echo "<h1>".$obj->nm_servico."</h1>";
            if ($obj->id_usuario = $obje->cd_usuario) {
              ?>
              <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#editModal">EDITAR</button>

<!-- Modal -->
<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Pedido</h4>
      </div>
      <?php
    echo'  <div class="modal-body" id="'.$obj->cd_servico.'">';
        
          echo '<form method="post">' ;
          echo  '<input type="text" name="nome" value="'.$obj->nm_servico.'" required><br>';
          echo  '<input type="text" name="descricao" value="'.$obj->ds_servico.'" required><br>';
          echo  '<input type="date" name="data" value="'.$obj->ds_prazo.'" required><br>';
          echo  '<input type="text" name="endereco" value="'.$obje->ds_usendereco.'" required><br>';
          echo  '<input type="submit" name="" value="Editar">'; 
          echo "</form>";
          
      echo '  </div>';
      ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
              <?php
            }
            echo "Descrição: ".$obj->ds_servico." ";
            echo "Prazo: ".$obj->ds_prazo."<br>";

      }
    }
  }else{
    echo "Sem trabalhos registrados";
  }
}
?>
	<div class="container">
  <h2>Serviços</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Adicionar serviços</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Preencha as Informações para adicionar um Serviço</h4>
        </div>
        <div class="modal-body">
        <?php
        $data = date("d/m/Y");
        $num = 0;
        
     	 	
        echo '<form method="post">' ;
      	    echo  '<input type="text" name="nome" placeholder="O que você precisa" required><br>';
      	    echo  '<input type="text" name="descricao" placeholder="Descreva sua situação aqui" required><br>';
      	    echo  '<input type="date" name="data" placeholder="Pra quando você quer o serviço" required><br>';
        	echo  '<input type="text" name="endereco" value="'.$obje->ds_usendereco.'" required><br>';
        	echo  '<input type="submit" name="" value="Cadastrar pedido">'; 
          echo "</form>";
        	  if (isset($_POST['nome'])) {
            $ins = "INSERT INTO servico 
      VALUES (NULL, '". $_POST['nome'] ."', '". $_POST['descricao'] ."', '". $data ."', '". $_POST['data'] ."','".  $obje->cd_usuario."','". $num."')";
        if ($result=$mysqli->query($ins)) {
          header('location: servicos.php');
      }else{
  printf($mysqli->error);
}
}else{
  printf($mysqli->error);
}

          }
          
     	   } 
    	 else{
        printf($mysqli->error);
      }

    
?>
</div>

        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</body>
</html>
