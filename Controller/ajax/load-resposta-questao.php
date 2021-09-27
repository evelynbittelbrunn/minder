<?php

require '../conexaoPDO.php';

$questao   = $_GET['q'];

$sql = $pdo->query("SELECT Resposta FROM tb_Questao WHERE MD5(idQuestao) = '".$questao."';");

if($sql->rowCount() > 0){
    foreach($sql->fetchAll() as $campo){

        $result = $campo['Resposta'];

        echo $result;

    }
}

?>