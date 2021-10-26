<?php
session_start();

include('conexao.php');
$sql = "SELECT * FROM tb_Questao;";

$result = mysqli_query($conn,$sql);    
mysqli_close($conn);

$totalProdutos = mysqli_num_rows($result);

include('conexao.php');
$sql2 = "SELECT * FROM tb_Questao "
        ." "


?>