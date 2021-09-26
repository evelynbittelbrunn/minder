<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include('function.php');

$login = $_POST['nLogin'];
$senha = stripcslashes($_POST['nPass']);

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
                            header('location:../index.php');

                        }elseif($_SESSION['idTipoUsuario'] == 2){
                            $_SESSION['TipoUsuario'] = 'usuario';
                            header('location:../index.php');

                        }
                    }
                }
            }
        }
    }
}

//Função para limpar e-mail e senha da sessão
function limpaLoginSenha(){
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
}

?>