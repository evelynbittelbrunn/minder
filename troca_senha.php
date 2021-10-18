<?php 
    session_start();
    include('Controller/function.php');
    if(!isset($_SERVER['HTTP_REFERER'])){
        $_SERVER['HTTP_REFERER'] = '';
    }
    if (!isset($_SESSION['msg-troca']) || $_SERVER['HTTP_REFERER'] != 'http://localhost/C%C3%B3digos/minder/troca_senha'){
        $_SESSION['msg-troca'] = '';
    };
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet"> 
    <link href='css/style.css' rel='stylesheet'>
    <link rel="shortcut icon" type="imagex/png" href="img/icone-page-minder.png">
    <!-- ÍCONES -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>    
    <title>Minder | Vestibulares</title>
</head>
<body class="body-login">
    <main class="main-login">
        <div class="ilustracao">
            <h3>Minder ;)</h3>
            <h2>Seja um expert!</h2>
            <img src="img/estatua.png" alt="Minder">
        </div>
        <div class="conteudo">
            <h2>Troca de senha</h2>            
            <div class="conteudo-form">
                <form method="POST" action="controller/trocaSenha.php" id="iFIndex" name="nFIndex">
                    <input type="password" placeholder="Senha antiga" id="iOldPass" name="nOldPass">
                    <input type="password" placeholder="Nova senha" id="iNewPass"name="nNewPass">
                    <input type="password" placeholder="Conirmar senha" id="iPassConf" name="nPassConf">
                    <button>Trocar senha</button>
                    <p><?php echo $_SESSION['msg-troca']; ?></p>
                    <a href="login" class="voltarLogin">Entrar</a>
                </form>
            </div>            
        </div>
    </main>
</body>
</html>