<?php 
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include('function.php');

$idQuestaoMD5        = $_GET['q']; //Está em MD5
$idAssunto           = $_GET['a']; //Está em MD5

$idQuestao           = converteIdMd5('tb_Questao','idQuestao',$idQuestaoMD5);
$idTipoMateria       = consultaidTipoMateria($idAssunto, $idQuestao);
$proxQuestao         = proximaQuestao($idAssunto, $idQuestao);


//Verifica se a próxima questão desse assunto existe
if($proxQuestao > 0 ){
    header('location: ../questao.php?q='.MD5($proxQuestao).'&a='.$idAssunto);
    exit(0);
}

//Consulta o idTipoMateria do assunto
function consultaidTipoMateria($idAssunto, $idQuestao){
    include('conexao.php');

    $sql = "SELECT idTipoMateria "
            ." FROM tb_Questao "
            ." WHERE MD5(idTipoAssunto) = '".$idAssunto
            ."' AND idQuestao = ".$idQuestao.";";
    
    $result = mysqli_query($conn,$sql);    
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0) {	
		$lista = array();

		while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			array_push($lista,$linha);
		}

        foreach ($lista as $campo) {	
            $idTipoMateria = $campo['idTipoMateria'];    
        }
    }

    return $idTipoMateria;  
}

//Busca a próxima questão desse assunto
function proximaQuestao($idAssunto, $idQuestao){
    include('conexao.php');

    $sql = "SELECT MIN(idQuestao) AS idQuestao "
                ." FROM tb_Questao "
                ." WHERE MD5(idTipoAssunto) = '".$idAssunto
                ."' AND idQuestao > ".$idQuestao.";";
    //var_dump($sql);
    //die();

    $result = mysqli_query($conn,$sql);    
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0) {	
		$lista = array();

		while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			array_push($lista,$linha);
		}

        foreach ($lista as $campo) {	
            $idQuestao = $campo['idQuestao'];    
        }
    }

    return $idQuestao;  
}

header('location: '.$_SERVER['HTTP_REFERER']);
?>