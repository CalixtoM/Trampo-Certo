<?php
	include('inc/conectar.php');
	include('inc/head.php');
	include('inc/navbar.php');
	include('inc/scripts.php');
	session_start();
?>
<meta charset="utf-8">
<br>
<br>
<br>
<br>
<br>

<?php
                $query="SELECT * FROM orcamento AS orc INNER JOIN usuario AS usu ON usu.cd_usuario = orc.id_usuariot INNER JOIN servico AS se ON orc.id_servico = se.cd_servico WHERE ".$_GET['orc']." = cd_orcamento";
                  if ($respect = $mysqli->query($query)) {
                    while ($object = $respect->fetch_object()) { 
                    	$_SESSION['orcamento_cd_usuario'] = $object->id_usuariot;
                      echo "Você selecionou o orçamento cadastrado pelo usuario <a href='perfil.php?cdus=$object->id_usuariot'><b>".$object->nm_usuario."</b></a> no valor de: <b>R$".$object->vl_orcamento."</b><br>Pedimos encarecidamente para que confira os metódos descritos pelo trabalhador de como realizará a tarefa para evitar futuros transtornos:<br><p><b><i>".$object->ds_orcamento."</i></b></p>Disponibilizamos o contato do trabalhador para um atendimento mais direto: <b>".$object->nr_celular."</b><br>";
                      echo '<a href="servicepage.php?serv='.$_SESSION['serv'].'"><button type="button" class="btn btn-info btn-lg" name="cancelar">Cancelar</button></a>';
                      echo '<a href="finalizarserv.php?finalizar='.$object->cd_servico.'"><button type="button" class="btn btn-success btn-lg" name="excluir">Selecionar</button></a>';
                    }
                  } 
              ?>