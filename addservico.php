<?php 
	session_start();
	include('inc/conectar.php');
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

	<div class="container">
		<form method="post">
			<div class="row">
				<div class="col-md-12">
					<label>Nome do Serviço</label>
					<input type="text" name="nome" class="form-control">
				</div>
			</div>
				<div class="row">
					<div class="col-md-9">
						<label>Descrição do Serviço</label>
						<input type="text" name="desc" class="form-control">
					</div>
					<div class="col-md-3">
						<label>Prazo P/ Realizar</label>
						<input type="date" name="prazo" class="form-control">
					</div>
				</div><br>
				<div class="row">
					<div class="col-md-5"></div>
					<div class="col-md-3">
						<input type="submit" name="enviar" class="btn btn-success" value="Concluir">
					</div>
				</div>
			</div>
		</form>
	</div>

	<?php 

		$data = date("Y/m/d");
		$num = 1;

		if(isset($_POST['nome'])){
			$ins = "INSERT INTO servico VALUES (NULL, '".$_POST['nome']."', '".$_POST['desc']."', '". $data ."', '".$_POST['prazo']."', '".$_SESSION['usuario']."', '".$num."', '". 1 ."' )";

			if ($result=$mysqli->query($ins)) {
          		header('location: servicos.php');
      }
      else{
  			printf($mysqli->error);
		}
	}

	?>

</body>
</html>