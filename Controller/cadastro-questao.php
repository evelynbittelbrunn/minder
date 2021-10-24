<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    $id          = $_POST['nID'];
    $descricao   = $_POST['nDescricao'];
    $materia     = $_POST['nMateria'];
    $assunto     = $_POST['nAssunto'];
    $banca       = $_POST['nBanca'];
    $tipoQuestao = $_POST['nTipoQuestao'];
    $ano         = $_POST['nAno'];

    include('conexao.php');
    if($id == '0'){
        $sql = "INSERT INTO tb_Questao (Descricao, idTipoMateria, idTipoAssunto, idBanca, idTipoQuestao, Ano)"
        ." VALUES ('".$descricao."',"
                    ."'".$materia."',"
                    ."'".$assunto."',"
                    ."'".$banca."',"
                    ."'".$tipoQuestao."',"
                    ."'".$ano."');";
        //var_dump($sql);
        //die();
    }
    else{
        $sql = "UPDATE tb_Questao "
                ."SET Descricao = '".$descricao."',"
                ."idTipoMateria = '".$materia."',"
                ."idTipoAssunto = '".$assunto."',"
                ."idBanca = '".$banca."',"
                ."idTipoQuestao = '".$tipoQuestao."',"
                ."Ano = '".$ano."'"
                ."WHERE idQuestao = ".$id.";";
    }

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    header('location: '.$_SERVER['HTTP_REFERER']);
?>