<?php
session_start();
  /*Anticheat*/
  if (!(isset($_SESSION["adm"]))) {
    header("location:perfil.php");
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
  <section class="parallax-vis_usuarios ">
    <div class="container text-center">
      <div class="row">
      <div class="col-sm-12 text-center">
         <h3 class="text-light">Serviços Postados</h3><br>
        <table class="table table-tc">
              <tr class="primeira-tr">
                 <th scope="col" class="text-center">Nome do anunciante</th>
                <th scope="col" class="text-center">Nome do serviço</th>
                <th scope="col" class="text-center">Descrição</th>
                <th scope="col" class="text-center">Data da Publicação</th>
                <th scope="col" class="text-center">Prazo Estipulado</th>
                <th scope="col" class="text-center">Categoria Selecionada</th>
                <th scope="col" class="text-center">Situação</th>
              </tr>

<?php

date_default_timezone_set('America/Sao_Paulo');

  $se = "SELECT * FROM servico AS ser
  INNER JOIN usuario AS usu ON usu.cd_usuario = ser.id_usuario
  INNER JOIN categoria AS c ON ser.id_categoria = c.cd_categoria 
  WHERE '".$_SESSION['cd']. "'ORDER BY dt_servico DESC";


 if($result=$mysqli->query($se)){
    while($obj = $result->fetch_object()){
      echo '
        <tr class="tr" >
           <td>'.$obj->nm_usuario.'</td>
            <td>'.$obj->nm_servico.'</td>
            <td>'.$obj->ds_servico.'</td>
            <td>'.date('d/m/Y', strtotime($obj->dt_servico)).'</td>
            <td>'.date('d/m/Y', strtotime($obj->dt_prazo)).'</td>
             <td>'.$obj->nm_categoria.'</td>';
           
            if($obj->st_servico == 1 ){
              echo '<td>Ativo</td>';
            }
            if($obj->st_servico == 0){
              echo '<td>Em processo</td>';
            }
            ;
             if($obj->st_servico == 2){
              echo '<td>Resolvido</td>';
            }
            ;
    }
  }
  echo '
        </tr>
      </tbody>
  </table>'
   
  ?>
       
    </div>
  </section>
</div>
<!-- SCRIPTS -->
<?php include('inc/scripts.php');?>

<!-- FOOTER -->
<?php include('inc/footer.php');?>