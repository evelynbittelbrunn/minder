<?php
	session_start();
    include('Controller/function.php');

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Minder | Vestibulares</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo-content">
            <a href="index">
                <div class="logo">
                    <img src="img/logo-minder3.png" class="logo-img" alt="Minder Vestibulares">                                
                </div>
            </a> 
            <div id="btn-menu">
                <div class="menu-hamburguer"></div>
            </div>            
        </div>
        <ul class="navegacao">
            <?php echo montaMenu('cadastro-questao'); ?>
        </ul>
    </div>
    <header>
        <div id="btn-menu-2">
            <div class="menu-hamburguer"></div>
        </div> 
        <div class="pesquisar">
            <form action="search" method="GET" enctype="multipart/form-data">
                <input type="text" placeholder="Pesquisar por questões" name="b">
                <button type="submit">
                    <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-search fa-w-16 fa-2x"><path fill="currentColor" d="M508.5 481.6l-129-129c-2.3-2.3-5.3-3.5-8.5-3.5h-10.3C395 312 416 262.5 416 208 416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c54.5 0 104-21 141.1-55.2V371c0 3.2 1.3 6.2 3.5 8.5l129 129c4.7 4.7 12.3 4.7 17 0l9.9-9.9c4.7-4.7 4.7-12.3 0-17zM208 384c-97.3 0-176-78.7-176-176S110.7 32 208 32s176 78.7 176 176-78.7 176-176 176z" class=""></path></svg>
                </button>
            </form>        
        </div>
        <div class="foto-perfil">
            <a href="#" id="btn-drop"><img class="img-perfil" src="<?php echo $_SESSION['FotoUsuario']; ?>" alt=""></a>
            <div class="drop-down-menu"  id="drop-down">
                <div class="img-drop">
                    <img src="<?php echo $_SESSION['FotoUsuario']; ?>" alt="">
                </div>
                <div class="perfil-content">
                    <h4><?php echo $_SESSION['NomeUsuario']; ?></h4>
                </div>
                <div id="notificacoes-container" class="notificacoes-container">
                    <h5>Notificações</h5>
                    <div class="notificacoes-content">
                        <?php echo montaListaNotificacoes($_SESSION['idUsuario']); ?>
                    </div>                    
                </div>
                <h5><a href="troca_senha">Configurações</a></h5>
            </div>
        </div>    
    </header>
    <div class="home-content" style="color: #ffffff;">
        <form method="POST" action="Controller/salvaQuestao.php" enctype="multipart/form-data">
            <div class="card-cadastro-questoes">

                <h3 class="cont-text" style="text-transform: uppercase;" align="center">Cadastro de questões</h3>

                <div class="container-cadastro">
                    <input type="text" name="nID" visible="false" value="0" hidden>
                    <label style="display: block;" for="iDescricao">Descrição da questão: </label>
                    <textarea class="input-cadastro" id="iDescricao" name="nDescricao" rows="4" cols="50"></textarea></br>
                </div>

                <div class="container-cadastro" style="margin-bottom: 20px;">
                    <label class="label-cadastro">Imagem:</label> 
                    <input type="file" name="nImagem">
                </div>

                <div class="container-cadastro">
                    <label for="iAlternativaA" class="label-cadastro">Alternativa A: </label>
                    <input type="text" id="iAlternativaA" name="nAlternativaA" class="input-cadastro">
                </div>

                <div class="container-cadastro">
                    <label for="iAlternativaB" class="label-cadastro">Alternativa B: </label>
                    <input type="text" id="iAlternativaB" name="nAlternativaB" class="input-cadastro">
                </div>

                <div class="container-cadastro">
                    <label for="iAlternativaC" class="label-cadastro">Alternativa C: </label>
                    <input type="text" id="iAlternativaC" name="nAlternativaC" class="input-cadastro">
                </div>

                <div class="container-cadastro">
                    <label for="iAlternativaD" class="label-cadastro">Alternativa D: </label>
                    <input type="text" id="iAlternativaD" name="nAlternativaD" class="input-cadastro">
                </div>

                <div class="container-cadastro">
                    <label for="iAlternativaE" class="label-cadastro">Alternativa E: </label>
                    <input type="text" id="iAlternativaE" name="nAlternativaE" class="input-cadastro">
                </div>

                <label for="iResposta">Resposta: </label>
                <select name="nResposta" id="iResposta" required="true">
                    <option value="">Selecione</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                </select></br>

                <label for="iMateria">Matéria: </label>
                <select name="nMateria" id="iMateria" required="true">
                    <option value="">Selecione</option>
                    <?php echo consultaMaterias(0); ?>
                </select></br>

                <label for="iAssunto">Assunto: </label>
                <select name="nAssunto" id="iAssunto" required="true">
                    <option value="">Selecione</option>
                </select></br>

                <label for="iBanca">Banca: </label>
                <select name="nBanca" id="iBanca" required="true">
                    <option value="">Selecione</option>
                    <?php echo consultaBancas(0); ?>
                </select></br>

                <label for="iTipoQuestao">Tipo da questão: </label>
                <select name="nTipoQuestao" id="iTipoQuestao">
                    <option value="1">Discursiva</option>
                    <option value="2">Objetiva</option>
                    <option value="3">Somatória</option>
                </select><br>

                <div></div>
                <label for="iAno">Ano: </label>
                <input type="number" id="iAno" name="nAno"></br>
                <input type="submit">
            </div>            
        
        </form>
    </div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>
        
    $(document).ready(function(){
        $('#iMateria').on('change', function(){
            var materia = $(this).val();
            if(materia){
                $.ajax({
                    type:'POST',
                    url:"Controller/carregaAssuntosMateria.php",
                    data:'idTipoMateria='+materia,
                    success: function(html) {
                        $('#iAssunto').html(html);
                    }
                });
            }
        });
    });

    let btn = document.querySelector("#btn-menu");
    let sidebar = document.querySelector(".sidebar");

    btn.onclick = function() {
        sidebar.classList.toggle("active");
    }

    // MENU RESPONSIVE
    let btn2 = document.querySelector("#btn-menu-2");
    let sidebar2 = document.querySelector(".sidebar");

    btn2.onclick = function() {
        sidebar2.classList.toggle("active");
    }

    /// DROP DOWN
    let img  = document.querySelector("#btn-drop");
    let drop = document.querySelector("#drop-down");

    img.onclick = function() {
        drop.classList.toggle("drop-active");
    }
    
</script>
</body>
</html>