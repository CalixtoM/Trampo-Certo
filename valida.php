<?php
session_start();
include ("inc/conectar.php");
    $senha = md5($_GET['id']);
    if ($result = $mysqli->query("SELECT * FROM usuario WHERE ds_email = '".$_GET['email']."'")) {
        /* determine number of rows result set */
        $row_cnt = $result->num_rows;
        if ($row_cnt == 0) {
            $query = "INSERT INTO `usuario` (`cd_usuario`, `nm_usuario`, `ds_email`, `ds_password`, `nr_cpf`, `nr_celular`, `dt_nascimento`, `ds_usendereco`, `st_admin`, `st_ativo`, `ds_avaliacao`, `st_foto`) VALUES (NULL, '".$_GET['name']."', '".$_GET['email']."', '".$senha."', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '".$_GET['picture']."')";
            if ($result = $mysqli->query($query)){
            while ($obj = $result->fetch_object()){ 
		        $query = "SELECT * FROM usuario WHERE ds_email = '".$_GET['email']."'"; //verifica se os dados do login conferem
                if ($resulte = $mysqli->query($query)){
                while ($obje = $result->fetch_object()){
                    $_SESSION['usuario'] =$_GET['email']; //adiciona o código de usuário na sessão
                    $_SESSION['google'] = true;
                    header("location:registrogoogle.php"); //redireciona o usuário
                }
                }
        	}
        	}
        }
        else{
            $query = "SELECT * FROM usuario WHERE ds_email = '".$_GET['email']."'"; //verifica se os dados do login conferem
            if ($resulti = $mysqli->query($query)){
            while ($obji = $result->fetch_object()){
                $_SESSION['usuario'] = $_GET['email']; //adiciona o código de usuário na sessão
                $_SESSION['google'] = true;
                header("location:registrogoogle.php"); //redireciona o usuário
            }
            }
        }
    }
?>