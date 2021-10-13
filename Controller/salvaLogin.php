<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include('conexao.php');

$nome  = $_POST['nNewNome'];
$login = $_POST['nNewLogin'];
$senha = $_POST['nNewPass'];

if(!filter_var($login, FILTER_VALIDATE_EMAIL)){
    $_SESSION['msg-salva'] = "Digite um email válido.";
    header('location:'.$_SERVER['HTTP_REFERER']);
    
}else{

    if($senha != '' && $nome != ''){
        //Verifica se o Email já está cadastrado
        $sql  =  "SELECT Email FROM tb_usuario AS EMAIL"
        ." WHERE Email = '".$login."'";

        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) > 0){
            //Falha na consulta do email
            $_SESSION['msg-salva'] = "Email já cadastrado.";
            mysqli_close($conn);
            header('location:'.$_SERVER['HTTP_REFERER']);

            //Caso não esteja, tenta realizar a inclusão
        }else{
            include('conexao.php');
            $sql  =  "INSERT INTO tb_usuario(Nome, Email, Senha, FlgAtivo, idTipoUsuario, Foto) "
                ." VALUES('".$nome."','".$login."',MD5('".$senha."'), 'S', 2, 'dist/img/usuario/user-default.png')"; 

            if(!mysqli_query($conn,$sql)){

                //Falha na inserção dos dados do usuário
                $_SESSION['msg-salva'] =  "Falha na inserção dos dados do usuário.";
                mysqli_close($conn);
                header('location:'.$_SERVER['HTTP_REFERER']);

            }else{
                //retorna para a página anterior
                $_SESSION['msg-salva'] =  "Login cadastrado.";
                header('location:'.$_SERVER['HTTP_REFERER']);
            }
        }
    }else{
        $_SESSION['msg-salva'] =  "Preencha todos os campos.";
        header('location:'.$_SERVER['HTTP_REFERER']);
    }
}

?>
