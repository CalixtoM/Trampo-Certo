<?php
  session_start();
  include('inc/conectar.php');
?>


 <!-- HEAD -->
<?php include('inc/head.php');?>

<!-- TÍTULO DA PÁGINA -->
<title>Trampo Centro - Orçamento</title>


<!-- NAVBAR -->
<?php include('inc/navbar.php');?>

<div id="tc-index">
  <section class="parallax-servicopage">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">


<?php
                $query="SELECT * FROM orcamento AS orc INNER JOIN usuario AS usu ON usu.cd_usuario = orc.id_usuariot INNER JOIN servico AS se ON orc.id_servico = se.cd_servico WHERE ".$_GET['orc']." = cd_orcamento";
                  if ($respect = $mysqli->query($query)) {
                    while ($object = $respect->fetch_object()) { 
                      $_SESSION['orcamento_cd_usuario'] = $object->id_usuariot;
                      echo "<p class='text-light'>Você selecionou o orçamento cadastrado pelo usuário <a href='perfil.php?cdus=$object->id_usuariot' class='tc-animation-footer a-orcamento'><b>".$object->nm_usuario."</b></a> no valor de: <b>R$".$object->vl_orcamento.",00</b><br>Pedimos encarecidamente para que confira os metódos descritos pelo trabalhador de como realizará a tarefa para evitar futuros transtornos:<br><p class='text-light text-center'><b><i>".$object->ds_orcamento."</i></b></p></p>";
                      echo "<p class='text-light text-center'>Disponibilizamos o contato do trabalhador para um atendimento mais direto: <b>".$object->nr_celular."</b><br><br>";
                      echo '<a href="servicepage.php?serv='.$_SESSION['serv'].'"><button type="button" class="btn btn-outline-warning " name="cancelar"><i class="fas fa-angle-left"></i> Cancelar</button></a> ';
                      echo ' <a href="finalizarserv.php?finalizar='.$object->cd_servico.'"><button type="button" class="btn btn-outline-success" name="excluir">Selecionar</button></a>';
                    }
                  } 
              ?>
        </div>
      </div>
    </div>
  </section>
</div> 
<!-- SCRIPTS -->
<?php include('inc/scripts.php');?>

<!-- FOOTER -->
<?php include('inc/footer.php');?>