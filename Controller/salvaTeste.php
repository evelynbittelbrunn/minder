<?php

$nome        = $_POST['NomeUsuario'];
$tipoUsuario = $_POST['TipoUsuario'];
$email       = $_POST['Email'];
$senha       = $_POST['Senha'];
$ativo       = $_POST['FlgAtivo'];

include('conexao.php');

$sql = "INSERT INTO tb_Usuario (idTipoUsuario,Foto,Nome,Email,Senha,FlgAtivo) 
        VALUES('".$tipoUsuario."','','".$nome."','".$email."','".$senha."','".$ativo."')";

$result = mysqli_query($conn,$sql);
mysqli_close($conn);

header('location: '.$_SERVER['HTTP_REFERER']); 

?>