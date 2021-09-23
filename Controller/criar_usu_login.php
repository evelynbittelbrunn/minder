<?php
include('conexao.php');

$nome  = $_POST['nNewNome'];
$login = $_POST['nNewLogin'];
$senha = $_POST['nNewPass'];

//Verifica se o Email já está cadastrado
$sql  =  "SELECT Email FROM tb_usuario AS EMAIL"
        ." WHERE Email = '".$login."'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
    //Falha na consulta do email
    echo "Email já cadastrado";
    mysqli_close($conn);

//Caso não esteja, tenta realizar a inclusão
}else{
    include('conexao.php');
    $sql  =  "INSERT INTO tb_usuario(Nome, Email, Senha, FlgAtivo, idTipoUsuario, Foto) "
            ." VALUES('".$nome."','".$login."',MD5('".$senha."'), 'S', 2, 'dist/img/usuario/user-default.png')"; 

    if(!mysqli_query($conn,$sql)){

        //Falha na inserção dos dados do usuário
        echo "Falha na inserção dos dados do usuário";
        mysqli_close($conn);
    }else{
        //retorna para a página anterior
        header('location:'.$_SERVER['HTTP_REFERER']);
    }
}


?>
