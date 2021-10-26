<?php
//Consulta do select dependente
session_start();
$idMateria = $_POST['idTipoMateria'];

include('conexao.php');
$option = '';
$sql = "SELECT * FROM tb_TipoAssunto WHERE idTipoMateria = ".$idMateria.";";

$result = mysqli_query($conn, $sql);
mysqli_close($conn);

if (mysqli_num_rows($result) > 0) {
    $array = array();
    
    while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        array_push($array,$linha);
    }

    foreach ($array as $campo) {
        
        $option .= '<option value="'.$campo['idTipoAssunto'].'">'.$campo['Descricao'].'</option>';

    }

}

echo $option;
?>