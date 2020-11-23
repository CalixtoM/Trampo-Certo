<?php
session_start();
  /*<--------------- ANTI-CHEAT --------------->*/
  if (!(isset($_SESSION['adm']))) {
    header("location:login.php");
  }
  /*--------------------------------------------*/
  include ("inc/conectar.php");
?>
<!-- HEAD -->
<?php include('inc/head.php');?>

<!-- TÍTULO DA PÁGINA -->
<title>Trampo Centro - Categorias</title>

<!-- NAVBAR -->
<?php include('inc/navbar.php');?>

<div id="tc-index">
  <section class="parallax-editcat">
    <div class="container text-light">
      <div class="container">
<?php 
    
    $edit = "SELECT * FROM categoria WHERE cd_categoria = '".$_GET['cat']."'";

    if ($result = $mysqli->query($edit)){
      while($obj = $result->fetch_object()){
        echo '
          <form method="post">
          <h2 id="h2-addservicos" class="tracking-in-expand text-center">EDIÇÃO DE CATEGORIAS</h2><br>
          <div class="row">
          <div class="col-sm-3">
          </div>
          <div class="col-sm-3 coluna-addservicos slide-in-left-titulo">
          <h4 class="h4-addservicos text-left">Nome da Categoria</h4>
            <input type="text" value="'.$obj->nm_categoria.'" placeholder="'.$obj->nm_categoria.' (Antigo Nome)" name="nmedit" class="input-addservicos" required>
          </div>
          </div>
          <br>
          <div class="row">
          <div class="col-sm-3">
          </div>
          <div class="col-sm-3 coluna-addservicos slide-in-left-desc">
          <h4 class="h4-addservicos text-left">Descrição da Categoria</h4>
            <input type="text" value="'.$obj->ds_categoria.'" placeholder="'.$obj->ds_categoria.' (Antiga Descrição)" name="dsedit" class="input-addservicos" required>
          </div>
          </div>
          <div class="row">
          <div class="col-sm-3">
          </div>
          <div class="col-sm-5 text-center">
          <br>
            
            <input type="submit" class="btn btn-outline-success slide-in-fwd-center" style="text-transform: capitalize;"value="Editar">
          </div>
          </div>
            </form>';
      }
    }

    if(isset($_POST['nmedit'])){
        $edit = "UPDATE categoria SET nm_categoria = '".$_POST['nmedit']."', ds_categoria = '".$_POST['dsedit']."' WHERE cd_categoria = '".$_GET['cat']."'";

        if($result = $mysqli->query($edit)){
            header('location: categoria.php');
        }
    }

  ?>

      </div>
    </div>
  </section>
</div>
<!-- SCRIPTS -->
<?php include('inc/scripts.php');?>

<!-- FOOTER -->
<?php include('inc/footer.php');?>