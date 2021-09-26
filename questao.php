<?php
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
    <!-- ÍCONES -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>    
    <title>Minder | Vestibulares</title>
</head>
<body>
    
    <div class="sidebar">
        <div class="logo-content">
            <a href="index.php">
                <div class="logo">
                    <img src="img/logo-minder3.png" class="logo-img" alt="Minder Vestibulares">                                
                </div>
            </a> 
            <div id="btn-menu">
                <div class="menu-hamburguer"></div>
            </div>            
        </div>
        <ul class="navegacao">
            <?php echo montaMenu('index'); ?>
        </ul>
    </div>
    <header>
        <div id="btn-menu-2">
            <div class="menu-hamburguer"></div>
        </div> 
        <div class="pesquisar">
            <form action="">
                <input type="text" placeholder="Pesquisar por questões">
                <button>
                    <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-search fa-w-16 fa-2x"><path fill="currentColor" d="M508.5 481.6l-129-129c-2.3-2.3-5.3-3.5-8.5-3.5h-10.3C395 312 416 262.5 416 208 416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c54.5 0 104-21 141.1-55.2V371c0 3.2 1.3 6.2 3.5 8.5l129 129c4.7 4.7 12.3 4.7 17 0l9.9-9.9c4.7-4.7 4.7-12.3 0-17zM208 384c-97.3 0-176-78.7-176-176S110.7 32 208 32s176 78.7 176 176-78.7 176-176 176z" class=""></path></svg>
                </button>
            </form>        
        </div>
        <div class="foto-perfil">
            <a href="#" id="btn-drop"><img class="img-perfil" src="img/eve.jpeg" alt=""></a>
            <div class="drop-down-menu"  id="drop-down">
                <div class="img-drop">
                    <img src="img/eve.jpeg" alt="">
                </div>
                <div class="perfil-content">
                    <h4>Evelyn Bittelbrunn Bittelbrunn</h4>
                </div>
                <div id="notificacoes-container" class="notificacoes-container">
                    <h5>Notificações</h5>
                    <div class="notificacoes-content">
                        <div class="notificacao">
                            <p>Você já conferiu as novas questões de Citologia? Não? Então venha conferir clicando aqui.</p>
                        </div>
                        <div class="notificacao">
                            <p>Novo banco na área! Questões da categoria ITA estão aí! Confira.</p>
                        </div>
                        <div class="notificacao">
                            <p>Você já conferiu as novas questões de Citologia? Não? Então venha conferir clicando aqui.</p>
                        </div>
                    </div>                    
                </div>
                <h5>Configurações</h5>
            </div>
        </div>        
    </header>
    <div class="home-content">
        <div class="questoes-container">
            <form method="POST" enctype="multipart/form-data" id="iQuestao">
                <div class="card-progress">
                    Colocar a progressbar
                </div>
                <div class="card-question">
                    <div class="cont-text" align="center">
                        23/58
                    </div>
                        <?php echo montaQuestao($_GET['q']); ?>
                </div>
            </form>
        </div>
    </div>
<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
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

    function proximaQuestao(){
        const urlParams = new URLSearchParams(location.search);
        //alert(urlParams)
        $('#iQuestao').attr('action','Controller/carregaProxQuestao.php'
            +'?q='+urlParams.get('q')
            +'&a='+urlParams.get('a'));
        $("#iQuestao").submit();
    }

    function anteriorQuestao(){
        const urlParams = new URLSearchParams(location.search);
        //alert(urlParams)
        $('#iQuestao').attr('action','Controller/carregaAntQuestao.php'
            +'?q='+urlParams.get('q')
            +'&a='+urlParams.get('a'));
        $("#iQuestao").submit();
    }
    
</script>
</body>
</html>