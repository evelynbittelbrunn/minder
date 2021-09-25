<?php

//Descrição da matéria
function descrMateria($idMateria){

    include('conexao.php');
    $sql = "SELECT Descricao FROM tb_TipoMateria WHERE MD5(idTipoMateria) = '".$idMateria."';";
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    $lista = '';

    if (mysqli_num_rows($result) > 0) {

		$array = array();
		
		while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			array_push($array,$linha);
		}
    
        foreach ($array as $campo) {
            
            $assunto = $campo['Descricao'];

        }

    }

    return $assunto;
}

?>