<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet"> 
    <link href='css/style.css' rel='stylesheet'>
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
            <h2>Junte-se a nós!</h2>            
            <div class="conteudo-form">
                <form method="POST" action="controller/salvaLogin.php" id="iFIndex" name="nFIndex">
                    <input type="text" placeholder="Nome completo" id="iNewNome" name="nNewNome">
                    <input type="text" placeholder="E-mail" id="iNewLogin"name="nNewLogin">
                    <input type="password" placeholder="Senha" id="iNewPass" name="nNewPass">
                    <button>Cadastrar</button>
                </form>
            </div>            
        </div>
    </main>
</body>
</html>