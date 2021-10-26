<?php
//Consulta as matérias
function consultaMaterias(){
    include('conexao.php');
    $option = '';
    $sql = "SELECT * FROM tb_TipoMateria;";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0) {
		$array = array();
		
		while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			array_push($array,$linha);
		}
    
        foreach ($array as $campo) {
            
            $option .= '<option value="'.$campo['idTipoMateria'].'">'.$campo['Descricao'].'</option>';  

        }

    }

    return $option;
}

//Consulta bancas
function consultaBancas(){
    include('conexao.php');

    $sql = "SELECT * FROM tb_Banca;";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0) {
		$array = array();
		
		while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			array_push($array,$linha);
		}
    
        foreach ($array as $campo) {
            
            $option .= '<option value="'.$campo['idBanca'].'">'.$campo['Descricao'].'</option>';  

        }

    }

    return $option;
}
?>