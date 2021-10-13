<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include('function.php');

$login = $_POST['nLogin'];
$senha = stripcslashes($_POST['nPass']);

if(!filter_var($login, FILTER_VALIDATE_EMAIL)){
    $_SESSION['msg-login'] = "Digite um email válido";
    header('location:'.$_SERVER['HTTP_REFERER']);
    
}else{
    $_SESSION['login']     = $login;
    $_SESSION['senha']     = $senha;
    $_SESSION['msg-login'] = '';

    include('conexao.php');
    $sql = "CALL sto_ValidaUsuario('$login');";

    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0) {
        
        $arrayLogin = array();
        
        while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($arrayLogin,$linha);
        }
        
        foreach ($arrayLogin as $campo) {
            if($campo['idUsuario'] > 0){
                
                //Valida tipo de usuário
                if($campo['idTipoUsuario'] == 1 || $campo['idTipoUsuario'] == 2){
                    $sql = "CALL sto_ValidaAcesso('$login','$senha');";
                }
                
                include('conexao.php');
                $result2 = mysqli_query($conn,$sql);
                mysqli_close($conn);
        
                if (mysqli_num_rows($result2) > 0) {
                    $array = array();
                        
                    while ($linha = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
                        array_push($array,$linha);
                    }
                    
                    foreach ($array as $campo2) {
                        $_SESSION['idUsuario']       = $campo2['idUsuario'];
                        $_SESSION['idTipoUsuario']   = $campo2['idTipoUsuario'];
                        $ativo                       = $campo2['FlgAtivo'];

                        if($ativo == 'S'){
                            $_SESSION['logado']    = 1;
                            $_SESSION['msg-login'] = '';
                            unset($_SESSION['senha']);
                            
                            if($_SESSION['idTipoUsuario'] == 1){
                                $_SESSION['TipoUsuario'] = 'administrador';
                                header('location:../index');

                            }elseif($_SESSION['idTipoUsuario'] == 2){
                                $_SESSION['TipoUsuario'] = 'usuario';
                                header('location:../index');

                            }
                        }else{
                            $_SESSION['msg-login'] = "Usuário bloqueado";
                            header('location:'.$_SERVER['HTTP_REFERER']);
                        }
                    }
                }else{
                    $_SESSION['msg-login'] = "Dados inválidos, tente novamente";
                    header('location:'.$_SERVER['HTTP_REFERER']);
                }
            }
        }
    }else{
        $_SESSION['msg-login'] = "Email não cadastrado";
        header('location:'.$_SERVER['HTTP_REFERER']);
    }
}

//Função para limpar e-mail e senha da sessão
function limpaLoginSenha(){
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
}

?>