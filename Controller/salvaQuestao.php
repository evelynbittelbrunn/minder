<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    $id           = $_POST['nID'];
    $descricao    = $_POST['nDescricao'];
    $imagem       = $_FILES['nImagem']['name'];
    $alternativaA = $_POST['nAlternativaA'];
    $alternativaB = $_POST['nAlternativaB'];
    $alternativaC = $_POST['nAlternativaC'];
    $alternativaD = $_POST['nAlternativaD'];
    $alternativaE = $_POST['nAlternativaE'];
    $resposta     = $_POST['nResposta'];
    $materia      = $_POST['nMateria'];
    $assunto      = $_POST['nAssunto'];
    $banca        = $_POST['nBanca'];
    $tipoQuestao  = $_POST['nTipoQuestao'];
    $ano          = $_POST['nAno'];

    $_UP['pasta'] = 'imagens/produtos/'.$image.'/';
    $ext          = pathinfo($_FILES['nImagem']["name"], PATHINFO_EXTENSION);
    $novo_nome    = MD5("questao-".$id).'.'.$ext;
    $_UP['pasta'] = '../img/questao/';
    mkdir($_UP['pasta'], 0777);
    $caminho = 'img/questao/'.$novo_nome; 
    
    move_uploaded_file($_FILES['nImagem']['tmp_name'], $_UP['pasta'].$novo_nome);

    include('conexao.php');
    if($id == '0'){
        $sql = "INSERT INTO tb_Questao (Descricao, ArqImagem, idTipoMateria, idTipoAssunto, idBanca, idTipoQuestao, Ano, AlternativaA, AlternativaB, AlternativaC, AlternativaD, AlternativaE, Resposta)"
        ." VALUES ('".$descricao."',"
                    ."'".$caminho."',"
                    ."'".$materia."',"
                    ."'".$assunto."',"
                    ."'".$banca."',"
                    ."'".$tipoQuestao."',"
                    ."'".$ano."',"
                    ."'".$alternativaA."',"
                    ."'".$alternativaB."',"
                    ."'".$alternativaC."',"
                    ."'".$alternativaD."',"
                    ."'".$alternativaE."',"
                    ."'".$resposta."');";
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