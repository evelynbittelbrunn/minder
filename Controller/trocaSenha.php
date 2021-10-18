<?php

    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    include("conexao.php");

    if(!isset($_SESSION['idUsuario'])){
        $_SESSION['msg-troca'] = 'Erro interno, favor faça login novamente.';
        header('location:'.$_SERVER['HTTP_REFERER']);

    }else{
        $sOldPass = $_POST['nOldPass'];
        $sNewPass = $_POST['nNewPass'];
        $sPassCon = $_POST['nPassConf'];
        $idUsuario = $_SESSION['idUsuario'];

        if($sOldPass != '' || $sNewPass != '' || $sPassCon != ''){
    
            if($sNewPass == $sPassCon){
                $sql = "SELECT * FROM tb_usuario"
                ." WHERE idUsuario = ".$idUsuario." "
                ." AND Senha = MD5('".$sOldPass."')";

                $result = mysqli_query($conn,$sql);

                if (mysqli_num_rows($result) > 0) {
                    $sql = "UPDATE tb_usuario"
                        ." SET Senha = MD5('".$sNewPass."')"
                        ." WHERE idUsuario = ".$idUsuario."";
                    
                    $result = mysqli_query($conn,$sql);
                    mysqli_close($conn);

                    if ($result) {
                        $_SESSION['msg-troca'] = "Senha alterada com sucesso.";
                        header('location:'.$_SERVER['HTTP_REFERER']);
                    }else{
                        $_SESSION['msg-troca'] = "Erro na troca da senha.";
                        header('location:'.$_SERVER['HTTP_REFERER']);
                    }

                }else{
                    mysqli_close($conn);
                    $_SESSION['msg-troca'] = "Senha antiga incorreta, digite novamente.";
                    header('location:'.$_SERVER['HTTP_REFERER']);
                }
            }else{
                $_SESSION['msg-troca'] = 'Os campos da nova senha devem ser preenchidos igualmente.';
                header('location:'.$_SERVER['HTTP_REFERER']);
            }
        }else{
            $_SESSION['msg-troca'] = 'Preencha todos os campos.';
            header('location:'.$_SERVER['HTTP_REFERER']);
        }
    }
    
?>