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

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body><br><br><br><br><br>
  <div class="container">
<?php 
    
    $edit = "SELECT * FROM categoria WHERE cd_categoria = '".$_GET['cat']."'";

    if ($result = $mysqli->query($edit)){
      while($obj = $result->fetch_object()){
        echo '
          <form method="post">
        <div class="row">
          <div class="col-md-4">
            <input type="text" value="'.$obj->nm_categoria.'" name="nmedit" class="form-control">
          </div>
          <div class="col-md-4">
            <input type="text" value="'.$obj->ds_categoria.'" name="dsedit" class="form-control">
          </div>
          <div class="col-md-4">
            <input type="submit" class="btn btn-success" value="Salvar">
          </div>
            </form>
        </div>';
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
</body>
</html>