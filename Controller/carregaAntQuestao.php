<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include('function.php');

$idQuestaoMD5        = $_GET['q']; //Está em MD5
$idAssunto           = $_GET['a']; //Está em MD5

$idQuestao           = converteIdMd5('tb_Questao','idQuestao',$idQuestaoMD5);
$idTipoMateria       = consultaMateria($idAssunto, $idQuestao);
$questaoAnterior     = consultaQuestaoAnterior($idAssunto, $idQuestao);

//Verifica se a anterior questão desse assunto existe
if($questaoAnterior > 0 ){
    header('location: ../questao.php?q='.MD5($questaoAnterior).'&a='.$idAssunto);
    exit(0);
}

//Consulta o idTipoMateria do assunto
function consultaMateria($idAssunto, $idQuestao){
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

//consulta a questão anterior desse assunto
function consultaQuestaoAnterior($idAssunto, $idQuestao){
    include('conexao.php');

    $sql = "SELECT idQuestao "
                ." FROM tb_Questao "
                ." WHERE MD5(idTipoAssunto) = '".$idAssunto
                ."' AND idQuestao < ".$idQuestao
                ." ORDER BY idQuestao DESC "
                ." LIMIT 1;";

    $result = mysqli_query($conn,$sql);    
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0) {	
        $lista = array();

        while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($lista,$linha);
        }

        foreach ($lista as $campo) {	
            $idQuestaoMateria = $campo['idQuestao'];    
        }
    }

    return $idQuestaoMateria;  
}

header('location: '.$_SERVER['HTTP_REFERER']);

?>