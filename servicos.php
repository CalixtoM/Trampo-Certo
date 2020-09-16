<?php session_start();
  include('inc/conectar.php');
  $sql = "SELECT * FROM usuario WHERE '".$_SESSION['usuario']."' = ds_email";
    if($result = $mysqli->query($sql)) {
      while ($obje = $result -> fetch_object()) {
        $_SESSION['usuario'] = $obje->cd_usuario;
      }
    }

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
                $show="SELECT * FROM servico AS s INNER JOIN usuario AS u ON s.id_usuario = u.cd_usuario";
                if ($result=$mysqli->query($show)) {
                  if($result->num_rows>=1){
                    while ($obj = $result ->fetch_object()) {
                      if ($obj->st_servico ==1) { 
                      echo "
                      <div class='col-sm-4 flip-in-hor-bottom' style='padding-top: 25px;'>
                        <div class='card' style='width: 20rem;'>
                          <div class='card-body'>
                            <h5 class='card-title'><h6 class='h6-servicos'><b>Serviço</b></h6>".$obj->nm_servico."</h5>
                            <p class='card-text'><h6 class='h6-servicos'><b>Descrição</b></h6>".$obj->ds_servico."</p>
                            <div><b>Cliente: </b>".$obj->nm_usuario."</div>
                            <div><b>Data de Prazo: </b>".date('d/m/Y', strtotime($obj->dt_prazo))."</div>
                          </div>
                          <center>
                          <a href='orcamento.php' class='card-link btn btn-outline-success text-center'> Orçamento</a><br><br>
                          </center>
                          </div>
                        </div>
                        ";
                      }
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


