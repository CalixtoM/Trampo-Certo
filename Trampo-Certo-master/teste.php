<?php  
$senha = 'adm123';
$custo = '08';
$salt = 'HjU1di12HbfDub54Sjbda2';

$hash = crypt($senha, '$2a$' . $custo . '$' . $salt . '$');
echo $hash;
?>