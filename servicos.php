<?php session_start();


  include('inc/conectar.php');
  $sql = "SELECT * FROM usuario WHERE '".$_SESSION['usuario']."' = ds_email";
    if($result = $mysqli->query($sql)) {
      while ($obje = $result -> fetch_object()) {
        $_SESSION['usuario'] = $obje->cd_usuario;
      }
    }

  

 ?>

 <!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
   <title></title>
 </head>
 <body>
 
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <table class='table'>
                    <thead>
                      <tr>
                        <th scope='col'>Data</th>
                        <th scope='col'>Nome do Serviço</th>
                        <th scope='col'>Descrição</th>
                        <th scope='col'>Prazo</th>
                        <th scope='col'>Cliente</th>
                        <th scope='col'>Opções</th>
                      </tr>
                    </thead>
                    <tbody>
  <?php 
    $show="SELECT * FROM servico AS s 
    INNER JOIN usuario AS u ON s.id_usuario = u.cd_usuario";
      if ($result=$mysqli->query($show)) {
        if($result->num_rows>=1){
          while ($obj = $result ->fetch_object()) {
            if ($obj->st_servico ==1) {
              
            
            echo "
                      <tr>
                        <th scope='row'>".$obj->dt_servico."</th>
                          <td>".$obj->nm_servico."</td>
                          <td>".$obj->ds_servico."</td>
                          <td>".$obj->dt_prazo."</td>
                          <td>".$obj->nm_usuario."</td>
                          <td><a class='btn btn-success' href='orcamento.php'>Orçamento</a></td>
                      ";
          }
        }
      }
    }      
   ?>
                  </tr>
                </tbody>
              </table> 
    </div>
  </div>
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <a href="addservico.php" class="btn btn-info">
        Adicione seu Serviço!
      </a>
    </div>
  </div>


 </body>
 </html>