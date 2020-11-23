<?php
              date_default_timezone_set('America/Sao_Paulo');

  $serv = "SELECT * FROM servico AS s INNER JOIN categoria AS c ON s.id_categoria = c.cd_categoria WHERE id_usuario = '".$_SESSION['cd']. "' ORDER BY dt_servico DESC";



  echo '<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Descrição</th>
            <th scope="col">Data de Publicação</th>
            <th scope="col">Prazo Estipulado</th>
            <th scope="col">Categoria Selecionada</th>
            <th scope="col">Situação</th>
        </tr>
      </thead>
      <tbody>';


  if($result=$mysqli->query($serv)){
    while($obj = $result->fetch_object()){
      echo '
        <tr>
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

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

  

</body>
</html>