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
            <div class="logo">
                <i class='bx bxs-virus'></i>
                <div class="logo-nome">Minder ;)</div>
            </div>
            <div id="btn-menu">
                <div class="menu-hamburguer"></div>
            </div>            
        </div>
        <ul class="navegacao">
            <li>
                <a href="#">
                    <!--<i class='bx bx-food-menu'></i>-->
                    <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="highlighter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 544 512" class="svg-inline--fa fa-highlighter fa-w-17 fa-2x"><path fill="currentColor" d="M528.61 75.91l-60.49-60.52C457.91 5.16 444.45 0 430.98 0a52.38 52.38 0 0 0-34.75 13.15L110.59 261.8c-10.29 9.08-14.33 23.35-10.33 36.49l12.49 41.02-36.54 36.56c-6.74 6.75-6.74 17.68 0 24.43l.25.26L0 479.98 99.88 512l43.99-44.01.02.02c6.75 6.75 17.69 6.75 24.44 0l36.46-36.47 40.91 12.53c18.01 5.51 31.41-4.54 36.51-10.32l248.65-285.9c18.35-20.82 17.37-52.32-2.25-71.94zM91.05 475.55l-32.21-10.33 40.26-42.03 22.14 22.15-30.19 30.21zm167.16-62.99c-.63.72-1.4.94-2.32.94-.26 0-.54-.02-.83-.05l-40.91-12.53-18.39-5.63-39.65 39.67-46.85-46.88 39.71-39.72-5.6-18.38-12.49-41.02c-.34-1.13.01-2.36.73-3l44.97-39.15 120.74 120.8-39.11 44.95zm248.51-285.73L318.36 343.4l-117.6-117.66L417.4 37.15c4.5-3.97 17.55-9.68 28.1.88l60.48 60.52c7.65 7.65 8.04 20 .74 28.28z" class=""></path></svg>
                    <span class="nome-links-navegacao">Banco de Questões</span>
                </a>      
                <span class="tooltip">Banco de Questões</span>          
            </li>
            <li>
                <a href="#">
                    <!--<i class='bx bx-food-menu' ></i>-->
                    <!--
                    <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="paste" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-paste fa-w-14 fa-2x"><path fill="currentColor" d="M433.941 193.941l-51.882-51.882A48 48 0 0 0 348.118 128H320V80c0-26.51-21.49-48-48-48h-66.752C198.643 13.377 180.858 0 160 0s-38.643 13.377-45.248 32H48C21.49 32 0 53.49 0 80v288c0 26.51 21.49 48 48 48h80v48c0 26.51 21.49 48 48 48h224c26.51 0 48-21.49 48-48V227.882a48 48 0 0 0-14.059-33.941zm-22.627 22.627a15.888 15.888 0 0 1 4.195 7.432H352v-63.509a15.88 15.88 0 0 1 7.431 4.195l51.883 51.882zM160 30c9.941 0 18 8.059 18 18s-8.059 18-18 18-18-8.059-18-18 8.059-18 18-18zM48 384c-8.822 0-16-7.178-16-16V80c0-8.822 7.178-16 16-16h66.752c6.605 18.623 24.389 32 45.248 32s38.643-13.377 45.248-32H272c8.822 0 16 7.178 16 16v48H176c-26.51 0-48 21.49-48 48v208H48zm352 96H176c-8.822 0-16-7.178-16-16V176c0-8.822 7.178-16 16-16h144v72c0 13.2 10.8 24 24 24h72v208c0 8.822-7.178 16-16 16z" class=""></path></svg>-->
                    <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-check-circle fa-w-16 fa-2x"><path fill="currentColor" d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 464c-118.664 0-216-96.055-216-216 0-118.663 96.055-216 216-216 118.664 0 216 96.055 216 216 0 118.663-96.055 216-216 216zm141.63-274.961L217.15 376.071c-4.705 4.667-12.303 4.637-16.97-.068l-85.878-86.572c-4.667-4.705-4.637-12.303.068-16.97l8.52-8.451c4.705-4.667 12.303-4.637 16.97.068l68.976 69.533 163.441-162.13c4.705-4.667 12.303-4.637 16.97.068l8.451 8.52c4.668 4.705 4.637 12.303-.068 16.97z" class=""></path></svg>
                    <span class="nome-links-navegacao">Simulados</span>
                </a>                
                <span class="tooltip">Simulados</span>
            </li>
            <li>
                <a href="#">
                    <!--<i class='bx bx-food-menu'></i>-->
                    <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="comment-alt-lines" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-comment-alt-lines fa-w-16 fa-2x"><path fill="currentColor" d="M448 0H64C28.7 0 0 28.7 0 64v288c0 35.3 28.7 64 64 64h96v84c0 7.1 5.8 12 12 12 2.4 0 4.9-.7 7.1-2.4L304 416h144c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64zm32 352c0 17.6-14.4 32-32 32H293.3l-8.5 6.4L192 460v-76H64c-17.6 0-32-14.4-32-32V64c0-17.6 14.4-32 32-32h384c17.6 0 32 14.4 32 32v288zM280 240H136c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h144c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zm96-96H136c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h240c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8z" class=""></path></svg>
                    <span class="nome-links-navegacao">Comunidade</span>
                </a>                
                <span class="tooltip">Comunidade</span>
            </li>
            <li>
                <a href="#">
                    <!--<i class='bx bx-food-menu'></i>-->
                    <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-heart fa-w-16 fa-2x"><path fill="currentColor" d="M462.3 62.7c-54.5-46.4-136-38.7-186.6 13.5L256 96.6l-19.7-20.3C195.5 34.1 113.2 8.7 49.7 62.7c-62.8 53.6-66.1 149.8-9.9 207.8l193.5 199.8c6.2 6.4 14.4 9.7 22.6 9.7 8.2 0 16.4-3.2 22.6-9.7L472 270.5c56.4-58 53.1-154.2-9.7-207.8zm-13.1 185.6L256.4 448.1 62.8 248.3c-38.4-39.6-46.4-115.1 7.7-161.2 54.8-46.8 119.2-12.9 142.8 11.5l42.7 44.1 42.7-44.1c23.2-24 88.2-58 142.8-11.5 54 46 46.1 121.5 7.7 161.2z" class=""></path></svg>
                    <span class="nome-links-navegacao">Favoritos</span>
                </a>                
                <span class="tooltip">Favoritos</span>
            </li>
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
            <div class="card-question">
                <div class="cont-text" align="center">
                    23/58
                </div>
                    <?php echo montaQuestao($_GET['q']); ?>
            </div>
        </div>
    </div>
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
       
    </script>
</body>
</html>