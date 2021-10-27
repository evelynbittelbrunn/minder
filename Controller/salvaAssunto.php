<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    $id           = $_POST['nID'];
    $descricao    = $_POST['nDescricao'];
    $materia      = $_POST['nMateria'];

    include('conexao.php');
    if($id == '0'){
        $sql = "INSERT INTO tb_TipoAssunto (idTipoMateria, Descricao)"
        ." VALUES ('".$materia."',"
                    ."'".$descricao."');";
        //var_dump($sql);
        //die();
    }

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    header('location: '.$_SERVER['HTTP_REFERER']);
?>