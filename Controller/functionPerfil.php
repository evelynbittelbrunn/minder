<?php
//Carrega as informações do perfil do usuário
function carregaPerfil($idUsuario){
	$sql = "";

	if(isset($_SESSION['idTipoUsuario'])){
		$idTipo = $_SESSION['idTipoUsuario'];
	}else{
		$idTipo = 2;
	}
	
	if($idUsuario != ""){
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
	}elseif($idUsuario == '0' || $idUsuario == ''){
		$_SESSION['idUsuario']         = "0";
		$_SESSION['idTipoUsuario']     = "2";
		$_SESSION['NomeUsuario']       = "Não logado";
		$_SESSION['FotoUsuario']       = "";
		$_SESSION['EmailUsuario']      = "";
	}
	
}

?>