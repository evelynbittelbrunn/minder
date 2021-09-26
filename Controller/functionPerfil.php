<?php
//Carrega as informações do perfil do usuário
function carregaPerfil($idUsuario){
	$idTipo = $_SESSION['idTipoUsuario'];
	$sql = "";

	switch ($idTipo) {

        case 1:
			$sql = "SELECT * "
				." FROM tb_Usuario "
				." WHERE idTipoUsuario = 1 "
				." AND idUsuario = ".$idUsuario.";";
            break;

        case 2:
			$sql = "SELECT * "
				." FROM tb_Usuario "
				." WHERE idTipoUsuario = 2 "
				." AND idUsuario = ".$idUsuario.";";
            break;
    }

	include('conexao.php');
	$resultPerfil = mysqli_query($conn,$sql);
	mysqli_close($conn);
	
	if (mysqli_num_rows($resultPerfil) > 0) {
		$arrayPerfil = array();
		
		while ($linha = mysqli_fetch_array($resultPerfil, MYSQLI_ASSOC)) {
			array_push($arrayPerfil,$linha);
		}
		
		foreach ($arrayPerfil as $perfil) {
            $_SESSION['idUsuario']         = $perfil['idUsuario'];
            $_SESSION['idTipoUsuario']     = $perfil['idTipoUsuario'];
            $_SESSION['NomeUsuario']       = $perfil['Nome'];
            $_SESSION['FotoUsuario']       = $perfil['Foto'];
            $_SESSION['EmailUsuario']      = $perfil['Email'];

		}		
			
	}
	
}

?>