<?php
	session_start();
    include('Controller/function.php');
    carregaPerfil($_SESSION['idUsuario']); 
    if (isset($_SESSION['AnoFiltro']) || isset($_SESSION['idBancaFiltro']) || isset($_SESSION['questoesRespondidas'])){
        //session_destroy();
        unset($_SESSION['AnoFiltro']);
        unset($_SESSION['idBancaFiltro']);
        unset($_SESSION['questoesRespondidas']);
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet"> 
    <link href='css/style.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="shortcut icon" type="imagex/png" href="img/icone-page-minder.png">
    <!-- ÍCONES -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>    
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
            <?php echo montaMenu('index'); ?>
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
                <?php 

                    if($_SESSION['idUsuario'] != '0'){
                        echo '<div id="notificacoes-container" class="notificacoes-container">'
                            .'    <h5>Notificações</h5>'
                            .'    <div class="notificacoes-content">'
                            .montaListaNotificacoes($_SESSION["idUsuario"])
                            .'    </div>'                  
                            .'</div>'
                            .'<h5><a href="troca_senha">Configurações</a></h5>';
                    }else{
                        echo "<h5> Faça login para receber notificações! </h5>";
                    }
                ?>
            </div>
        </div>      
    </header>
    <div class="home-content">
        <div class="questoes-container">
            <div class="cards-container-titulo">
                <h3>Lista de questões</h3>
                <p>Questões sobre <?php echo descrAssunto($_GET['a']); ?> (<?php echo descrMateria($_GET['m']);?>)</p>
            </div>
            <div class="filtros-container">
                <div class="filtros">
                    <div class="caixa-select">
                        <select class="filtro select" id="iAnoFiltro" name="" id="">
                            <option value="0">ANO</option>
                            <?php echo listaAnoSelect($_GET['m'],$_GET['a']); ?>
                        </select>                    
                    </div>  
                    <div class="caixa-select">
                        <select class="filtro select" id="iBancaFiltro" name="" id="">
                            <option value="0">BANCA</option>
                            <?php echo listaBancaSelect($_GET['m'],$_GET['a']); ?>
                        </select>                    
                    </div>  
                    <div class="caixa-check">                    
                        <input type="checkbox" id="iRespondidasFiltro" name="" id="check-respondida">
                        <label for="iRespondidasFiltro">Não respondidas</label>
                    </div>  
                    <input type="text" id="iMateria" value="<?php echo $_GET['m']; ?>" hidden>
                    <input type="text" id="iAssunto" value="<?php echo $_GET['a']; ?>" hidden>
                </div>  
                <a href="#" id="iFiltro">
                    <div class="botao-filtro">FILTRAR</div>  
                </a>                 
            </div>
            <div class="questoes-container-content">
                <?php echo montaListaQuestoes($_GET['m'],$_GET['a']); ?>
            </div>
        </div>
    </div>

    <div id="modal-produto" class="modal-container">
    </div>

    <!-- JQUERY -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <script src="master.js"></script>

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

        // FUNÇÃO FAVORITO
        function functionFavorito(tipo,id) {

            var favorito    = document.getElementById('fav'+id);
            var naoFavorito = document.getElementById('nao'+id);

            if(tipo == 'S'){
                favorito.setAttribute('hidden','hidden');
                naoFavorito.removeAttribute('hidden');

                $.ajax({
                    url: "Controller/ajax/load-favorito.php?tipo=false&id="+id,
                    success: function(result){
                        
                    },
                    error: function(){
                        $(".catalogo").html("OI");
                        
                    }            
                });
            }

            if(tipo == 'N'){
                favorito.removeAttribute('hidden');
                naoFavorito.setAttribute('hidden','hidden');

                $.ajax({                
                    url: "Controller/ajax/load-favorito.php?tipo=true&id="+id,
                    success: function(result){
                        
                    },
                    error: function(){
                        $(".catalogo").html("OI");
                        
                    }            
                });
            }

            if(tipo == 'L'){

                alert("Faça login para favoritar questões!")
            }

        }

        // MODAL
        function iniciaModal(modalID,idQuestao) {

            const modal = document.getElementById(modalID);

            $.ajax({
                
                url: "Controller/ajax/load-modal.php?id="+idQuestao,
                success: function(result){
                    $(".modal-container").html(result);
                    
                },
                error: function(){
                    $(".modal-container").html("OI");
                    
                }            
            });

            modal.classList.add('mostrar');
            modal.addEventListener('click', (e) => {
                if(e.target.id == modalID || e.target.className == 'fechar'){
                    modal.classList.remove('mostrar');
                }
            })
        }
       
    </script>
</body>
</html>