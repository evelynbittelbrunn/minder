<?php
    include('Controller/functionAssuntos.php');
    include('Controller/functionListaQuestoes.php');
    include('Controller/functionMateria.php');
	include('Controller/functionMenu.php');
	include('Controller/functionNotificacoes.php');
	include('Controller/functionPerfil.php');
    include('Controller/functionQuestao.php');

//Buscar o ID do código MD5
function converteIdMd5($tabela,$campoID,$idMd5){

	include('conexao.php');
	$sql = "SELECT ".$campoID." AS ID "
			." FROM ".$tabela
			." WHERE MD5(".$campoID.") = '".$idMd5."';";

	$result = mysqli_query($conn,$sql);    
	mysqli_close($conn);

	$id = 0;
	
	if (mysqli_num_rows($result) > 0) {
		$array = array();
		
		while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			array_push($array,$linha);
		}
		
		foreach ($array as $campo) {
			$id = $campo['ID'];
		}
        
	}
	return $id;

}

?>