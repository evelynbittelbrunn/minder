<?php
//Consulta as matérias
function consultaMaterias($id){
    include('conexao.php');
    $option = '';
    $sql = "SELECT * FROM tb_TipoMateria WHERE idTipoMateria <> ".$id.";";

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

//Consulta tipo questão
function consultaTipoQuestoes($id){
    include('conexao.php');
    $option = '';
    $sql = "SELECT * FROM tb_TipoQuestao WHERE idTipoQuestao <> ".$id.";";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0) {
		$array = array();
		
		while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			array_push($array,$linha);
		}
    
        foreach ($array as $campo) {
            
            $option .= '<option value="'.$campo['idTipoQuestao'].'">'.$campo['Descricao'].'</option>';  

        }

    }

    return $option;
}

//Consulta bancas
function consultaBancas($id){
    include('conexao.php');

    $sql = "SELECT * FROM tb_Banca WHERE idBanca <> ".$id.";";

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