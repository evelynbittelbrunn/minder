<?php
//
function montaMenu($navegacao){
    $menu             = '';
    $menuBanco        = '';
    $menuSimulados    = '';
    $menuComunidade   = '';
    $menuFavoritos    = '';
    $menuNotificacoes = '';
    $menuQuestoes     = '';
    $menuAssuntos     = '';

    /*if (isset($_SESSION['logado'])) {
		$_SESSION['idTipoUsuario'] = 2;
    }*/

    switch ($navegacao) {
        case 'index':
            $menuBanco = 'selected';
            break;
            
        case 'simulados':
            $menuSimulados = 'selected';
            break;

        case 'comunidade':
            $menuComunidade = 'selected';
            break;

        case 'favoritos':
            $menuFavoritos = 'selected';
            break;

        case 'cadastro-assunto':
            $menuAssuntos = 'selected';
            break;

        case 'cadastro-questao':
            $menuQuestoes = 'selected';
            break;

        case 'cadastro-notificacao':
            $menuNotificacoes = 'selected';
            break;
        
        default:
            # code...
            break;
    }
        
        $menu .=
        '<li class="'.$menuBanco.'">'
            .'<a href="index">'
                .'<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="highlighter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 544 512" class="svg-inline--fa fa-highlighter fa-w-17 fa-2x"><path fill="currentColor" d="M528.61 75.91l-60.49-60.52C457.91 5.16 444.45 0 430.98 0a52.38 52.38 0 0 0-34.75 13.15L110.59 261.8c-10.29 9.08-14.33 23.35-10.33 36.49l12.49 41.02-36.54 36.56c-6.74 6.75-6.74 17.68 0 24.43l.25.26L0 479.98 99.88 512l43.99-44.01.02.02c6.75 6.75 17.69 6.75 24.44 0l36.46-36.47 40.91 12.53c18.01 5.51 31.41-4.54 36.51-10.32l248.65-285.9c18.35-20.82 17.37-52.32-2.25-71.94zM91.05 475.55l-32.21-10.33 40.26-42.03 22.14 22.15-30.19 30.21zm167.16-62.99c-.63.72-1.4.94-2.32.94-.26 0-.54-.02-.83-.05l-40.91-12.53-18.39-5.63-39.65 39.67-46.85-46.88 39.71-39.72-5.6-18.38-12.49-41.02c-.34-1.13.01-2.36.73-3l44.97-39.15 120.74 120.8-39.11 44.95zm248.51-285.73L318.36 343.4l-117.6-117.66L417.4 37.15c4.5-3.97 17.55-9.68 28.1.88l60.48 60.52c7.65 7.65 8.04 20 .74 28.28z" class=""></path></svg>'
                .'<span class="nome-links-navegacao">Banco de Questões</span>'
            .'</a>'
            .'<span class="tooltip">Banco de Questões</span>'     
        .'</li>'
        .'<li class="'.$menuSimulados.'">'
            .'<a href="simulados">'
                .'<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-check-circle fa-w-16 fa-2x"><path fill="currentColor" d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 464c-118.664 0-216-96.055-216-216 0-118.663 96.055-216 216-216 118.664 0 216 96.055 216 216 0 118.663-96.055 216-216 216zm141.63-274.961L217.15 376.071c-4.705 4.667-12.303 4.637-16.97-.068l-85.878-86.572c-4.667-4.705-4.637-12.303.068-16.97l8.52-8.451c4.705-4.667 12.303-4.637 16.97.068l68.976 69.533 163.441-162.13c4.705-4.667 12.303-4.637 16.97.068l8.451 8.52c4.668 4.705 4.637 12.303-.068 16.97z" class=""></path></svg>'
                .'<span class="nome-links-navegacao">Simulados</span>'
            .'</a>'                
            .'<span class="tooltip">Simulados</span>'
        .'</li>'
        .'<li class="'.$menuComunidade.'">'
            .'<a href="comunidade">'
                .'<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="comment-alt-lines" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-comment-alt-lines fa-w-16 fa-2x"><path fill="currentColor" d="M448 0H64C28.7 0 0 28.7 0 64v288c0 35.3 28.7 64 64 64h96v84c0 7.1 5.8 12 12 12 2.4 0 4.9-.7 7.1-2.4L304 416h144c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64zm32 352c0 17.6-14.4 32-32 32H293.3l-8.5 6.4L192 460v-76H64c-17.6 0-32-14.4-32-32V64c0-17.6 14.4-32 32-32h384c17.6 0 32 14.4 32 32v288zM280 240H136c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h144c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zm96-96H136c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h240c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8z" class=""></path></svg>'
                .'<span class="nome-links-navegacao">Comunidade</span>'
            .'</a>'                
            .'<span class="tooltip">Comunidade</span>'
        .'</li>'
        .'<li class="'.$menuFavoritos.'">'
            .'<a href="favoritos">'
                .'<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-heart fa-w-16 fa-2x"><path fill="currentColor" d="M462.3 62.7c-54.5-46.4-136-38.7-186.6 13.5L256 96.6l-19.7-20.3C195.5 34.1 113.2 8.7 49.7 62.7c-62.8 53.6-66.1 149.8-9.9 207.8l193.5 199.8c6.2 6.4 14.4 9.7 22.6 9.7 8.2 0 16.4-3.2 22.6-9.7L472 270.5c56.4-58 53.1-154.2-9.7-207.8zm-13.1 185.6L256.4 448.1 62.8 248.3c-38.4-39.6-46.4-115.1 7.7-161.2 54.8-46.8 119.2-12.9 142.8 11.5l42.7 44.1 42.7-44.1c23.2-24 88.2-58 142.8-11.5 54 46 46.1 121.5 7.7 161.2z" class=""></path></svg>'
                .'<span class="nome-links-navegacao">Favoritos</span>'
            .'</a>'                
            .'<span class="tooltip">Favoritos</span>'
        .'</li>';

        if($_SESSION['idTipoUsuario'] == 1){
            $menu .=
            '<li class="'.$menuAssuntos.'">'
                .'<a href="cadastro-assunto">'
                    .'<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="marker" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-marker fa-w-16 fa-2x"><path fill="currentColor" d="M421.4 0c-23.17 0-46.33 8.84-64 26.52l-6.28 6.28-23.43-23.43c-12.5-12.5-32.75-12.5-45.25 0L152.36 139.48c-3.12 3.12-3.12 8.19 0 11.31l11.31 11.31c3.12 3.12 8.19 3.12 11.31 0L305.07 32l23.42 23.43-234.55 234.6A327.069 327.069 0 0 0 .18 485.12l-.03.23C-1.45 499.72 9.88 512 23.94 512c.89 0 1.78-.05 2.69-.15a326.972 326.972 0 0 0 195.3-93.8L485.4 154.54C542.54 97.38 501.35 0 421.4 0zM199.31 395.42c-44.99 45-103.91 74.41-166.07 83.39 9.13-62.64 38.49-121.32 83.32-166.16l78.71-78.72 82.75 82.77-78.71 78.72zm263.46-263.51L300.64 294.07l-82.75-82.77L380.02 49.14C391.07 38.09 405.77 32 421.4 32c32.32 0 58.52 26.16 58.52 58.53-.01 15.63-6.09 30.33-17.15 41.38z" class=""></path></svg>'
                    .'<span class="nome-links-navegacao">Cadastro de assuntos</span>'
                .'</a>'
                .'<span class="tooltip">Cadastro de assuntos</span>'     
            .'</li>'
            .'<li class="'.$menuQuestoes.'">'
                .'<a href="cadastro-questao">'
                    .'<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="pen-nib" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-pen-nib fa-w-16 fa-2x"><path fill="currentColor" d="M493.87 95.6L416.4 18.13C404.32 6.04 388.48 0 372.64 0c-15.84 0-31.68 6.04-43.76 18.13l-92.45 92.45-99.83 28.21a64.003 64.003 0 0 0-43.31 41.35L0 460l52 52 279.86-93.29a64.003 64.003 0 0 0 41.35-43.31l28.21-99.83 92.45-92.45c24.17-24.17 24.17-63.35 0-87.52zM342.42 366.7a31.985 31.985 0 0 1-20.68 21.66l-261.1 87.03-.7-.7L175.7 358.93c9.52 5.62 20.47 9.07 32.3 9.07 35.28 0 64-28.7 64-64s-28.72-64-64-64-64 28.7-64 64c0 11.83 3.45 22.79 9.07 32.31L37.32 452.06l-.71-.7 87.03-261.1a31.986 31.986 0 0 1 21.66-20.68l99.83-28.21 1.25-.36 124.6 124.6-.35 1.25-28.21 99.84zM176 304c0-17.64 14.34-32 32-32s32 14.36 32 32-14.34 32-32 32-32-14.36-32-32zm295.25-143.51l-80.06 80.06-119.75-119.73 80.07-80.06c11.67-11.67 30.58-11.69 42.27 0l77.47 77.47c11.65 11.65 11.65 30.61 0 42.26z" class=""></path></svg>'
                    .'<span class="nome-links-navegacao">Cadastro de questões</span>'
                .'</a>'
                .'<span class="tooltip">Cadastro de questões</span>'     
            .'</li>'
            .'<li class="'.$menuNotificacoes.'">'
                .'<a href="cadastro-notificacao">'
                    .'<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="bell" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-bell fa-w-14 fa-2x"><path fill="currentColor" d="M224 480c-17.66 0-32-14.38-32-32.03h-32c0 35.31 28.72 64.03 64 64.03s64-28.72 64-64.03h-32c0 17.65-14.34 32.03-32 32.03zm209.38-145.19c-27.96-26.62-49.34-54.48-49.34-148.91 0-79.59-63.39-144.5-144.04-152.35V16c0-8.84-7.16-16-16-16s-16 7.16-16 16v17.56C127.35 41.41 63.96 106.31 63.96 185.9c0 94.42-21.39 122.29-49.35 148.91-13.97 13.3-18.38 33.41-11.25 51.23C10.64 404.24 28.16 416 48 416h352c19.84 0 37.36-11.77 44.64-29.97 7.13-17.82 2.71-37.92-11.26-51.22zM400 384H48c-14.23 0-21.34-16.47-11.32-26.01 34.86-33.19 59.28-70.34 59.28-172.08C95.96 118.53 153.23 64 224 64c70.76 0 128.04 54.52 128.04 121.9 0 101.35 24.21 138.7 59.28 172.08C421.38 367.57 414.17 384 400 384z" class=""></path></svg>'
                    .'<span class="nome-links-navegacao">Notificações</span>'
                .'</a>'                
                .'<span class="tooltip">Notificações</span>'
            .'</li>';
        }

        $menu .=
        '<li>'
            .'<a href="Controller/validaLogout">'
            .'<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="sign-out" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-sign-out fa-w-16 fa-3x"><path fill="currentColor" d="M48 64h132c6.6 0 12 5.4 12 12v8c0 6.6-5.4 12-12 12H48c-8.8 0-16 7.2-16 16v288c0 8.8 7.2 16 16 16h132c6.6 0 12 5.4 12 12v8c0 6.6-5.4 12-12 12H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48zm279 19.5l-7.1 7.1c-4.7 4.7-4.7 12.3 0 17l132 131.4H172c-6.6 0-12 5.4-12 12v10c0 6.6 5.4 12 12 12h279.9L320 404.4c-4.7 4.7-4.7 12.3 0 17l7.1 7.1c4.7 4.7 12.3 4.7 17 0l164.5-164c4.7-4.7 4.7-12.3 0-17L344 83.5c-4.7-4.7-12.3-4.7-17 0z" class=""></path></svg>'
                .'<span class="nome-links-navegacao">Sair</span>'
            .'</a>'                
            .'<span class="tooltip">Sair</span>'
        .'</li>';


    return $menu;
}

?>