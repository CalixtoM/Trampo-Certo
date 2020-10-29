<!-- página de tabela dos serviços = exemplo* -->
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
      <h2 id="h2-servicos">SERVIÇOS</h2>
    </center>
    <hr class="hr-servicos" style="background-color: #32CD32;">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <table class="table table-hover table-dark">
              <tr>
                <th scope="col" class="text-center">Data</th>
                <th scope="col" class="text-center">Nome do Serviço</th>
                <th scope="col" class="text-center">Descrição</th>
                <th scope="col" class="text-center">Prazo</th>
                <th scope="col" class="text-center">Cliente</th>
                <th scope="col" class="text-center">Opções</th>
              </tr>
              <?php 
                $show="SELECT * FROM servico AS s INNER JOIN usuario AS u ON s.id_usuario = u.cd_usuario";
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
                              <td><a class='btn btn-success' href='orcamento.php'>Orçamento</a></td>";
                      }
                    }
                  }
                }      
              ?>
          </table>
        </div> 
        <div class="col-sm-5"></div>
        <div class="col-sm-2 text-center">
        <a href="addservico.php" class="btn btn-success">
          Adicione seu Serviço
        </a>
        </div>
      </div>  
    </div>
  </section>
</div>
<!-- SCRIPTS -->
<?php include('inc/scripts.php');?>

<!-- FOOTER -->
<?php include('inc/footer.php');?>
