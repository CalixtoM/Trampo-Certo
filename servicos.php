<?php session_start();
  include('inc/conectar.php');
 
         
    
 ?>

<!-- HEAD -->
<?php include('inc/head.php');?>

<!-- TÍTULO DA PÁGINA -->
<title>Serviços - Trampo Centro</title>

<!-- NAVBAR -->
<?php include('inc/navbar.php');?>

<!-- CONTEÚDO DA PÁGINA -->
<div id="tc-index">
  <section class="parallax-servicos">
    <center>
      <h2 id="h2-servicos" class="tracking-in-expand">SERVIÇOS</h2>
              <div class="col-sm-2 text-center">
        <a href="addservico.php" class="btn btn-success jello-horizontal">
          Adicione seu Serviço
        </a>
    </center>
    <div class="container">

      <div class="row">
        
              <?php

              date_default_timezone_set('America/Sao_Paulo');

         if(isset($_SESSION['usuario'])){
         $sql = "SELECT * FROM usuario WHERE '".$_SESSION['usuario']."' = ds_email;";
          if($result = $mysqli->query($sql)) {
            if($result->num_rows==1){
              while ($obje = $result->fetch_object()) {
                $show="SELECT * FROM servico AS s INNER JOIN usuario AS u ON s.id_usuario = u.cd_usuario WHERE st_servico = 1";
                  if ($resulte=$mysqli->query($show)) {
                    while ($obj = $resulte ->fetch_object()) {
                      echo "
                      <a class='card-servicos' href='servicepage.php?serv=".$obj->cd_servico."' id='a-servicos'>
                      <div class='col-sm-4 flip-in-hor-bottom' style='padding-top: 25px;'>
                        <div class='card' style='width: 20rem;'>
                          <div class='card-body'>
                            <h5 class='card-title'><h6 class='h6-servicos'><b>Serviço</b></h6>".$obj->nm_servico."</h5>
                            <p class='card-text'><h6 class='h6-servicos'><b>Descrição</b></h6>".$obj->ds_servico."</p>";
                            if($_SESSION['cd'] == $obj->id_usuario){
                              echo "<div><b>Cliente: </b>".$obj->nm_usuario."</div>";
                            }
                            if($_SESSION['cd'] != $obj->id_usuario){
                              echo "<div><b>Cliente: </b><a href='perfil.php?cdus=$obj->id_usuario' class='cliente-servicos'>".$obj->nm_usuario."</a></div>";
                            }
                            echo "<div class='text-light'><b class='text-light'>Data de Prazo: </b>".date('d/m/Y', strtotime($obj->dt_prazo))."</div>
                          </div>
                        <center>
                      </a>";
                          if ($obje->cd_usuario == $obj->id_usuario) {
                             
                              
                              echo "<a href='updateserv.php?cod=".$obj->cd_servico."' class='card-link btn btn-outline-success text-center'> Editar</a>";
                              echo "<a href='delet.php?cod=".$obj->cd_servico."' class='card-link btn btn-outline-warning text-center'> Excluir</a><br><br>";
                          
                          }else{
                             echo "<a href='servicepage.php?serv=".$obj->cd_servico."' class='card-link btn btn-outline-success text-center'> Orçamento</a>";
                              echo "<a href='reports.php?cod=".$obj->cd_servico."' class='card-link btn btn-outline-danger text-center'> Reportar</a><br><br>";
                          
                          }
                          echo "</center>
                          </div>
                        </div>
                        ";
                      
                    
                  }
                }
              }
            }else{
              echo "Cri...Cri... Sem serviços disponiveis cadastre agora mesmo o seu!";
            }
          }
        }else{
          $show="SELECT * FROM servico AS s INNER JOIN usuario AS u ON s.id_usuario = u.cd_usuario WHERE st_servico = 1";
                  if ($resulte=$mysqli->query($show)) {
                    while ($obj = $resulte ->fetch_object()) { 
                      echo "<a class='card-servicos' href='login.php' id='a-servicos'>
                      <div class='col-sm-4 flip-in-hor-bottom' style='padding-top: 25px;'>
                        <div class='card' style='width: 20rem;'>
                          <div class='card-body'>
                            <h5 class='card-title'><h6 class='h6-servicos'><b>Serviço</b></h6>".$obj->nm_servico."</h5>
                            <p class='card-text'><h6 class='h6-servicos'><b>Descrição</b></h6>".$obj->ds_servico."</p>
                            <div class='cliente-servicos'><b>Cliente: </b>".$obj->nm_usuario."</div>
                            <div class='text-light'><b class='text-light'>Data de Prazo: </b>".date('d/m/Y', strtotime($obj->dt_prazo))."</div>
                          </div>
                          <center></a></div></div>";
                    }
                  }
        }

              ?>
        </div> 
        <br>
        </div>
      </div>  
    </div>
  </section>

<!-- SCRIPTS -->
<?php include('inc/scripts.php');?>

<!-- FOOTER -->
<?php include('inc/footer.php');?>


<style type="text/css">
  a{
    text-decoration-line: none;
  }
</style>