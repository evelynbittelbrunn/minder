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

    if (isset($_SESSION['logado'])) {
		$_SESSION['idTipoUsuario'] = 2;
    }

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
        
        case 'cadastro-notificacao':
            $menuNotificacoes = 'selected';
            break;

        case 'cadastro-questao':
            $menuQuestoes = 'selected';
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
            .'<a href="#">'
                .'<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-check-circle fa-w-16 fa-2x"><path fill="currentColor" d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 464c-118.664 0-216-96.055-216-216 0-118.663 96.055-216 216-216 118.664 0 216 96.055 216 216 0 118.663-96.055 216-216 216zm141.63-274.961L217.15 376.071c-4.705 4.667-12.303 4.637-16.97-.068l-85.878-86.572c-4.667-4.705-4.637-12.303.068-16.97l8.52-8.451c4.705-4.667 12.303-4.637 16.97.068l68.976 69.533 163.441-162.13c4.705-4.667 12.303-4.637 16.97.068l8.451 8.52c4.668 4.705 4.637 12.303-.068 16.97z" class=""></path></svg>'
                .'<span class="nome-links-navegacao">Simulados</span>'
            .'</a>'                
            .'<span class="tooltip">Simulados</span>'
        .'</li>'
        .'<li class="'.$menuComunidade.'">'
            .'<a href="#">'
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
            '<li class="'.$menuQuestoes.'">'
                .'<a href="#">'
                    .'<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="highlighter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 544 512" class="svg-inline--fa fa-highlighter fa-w-17 fa-2x"><path fill="currentColor" d="M528.61 75.91l-60.49-60.52C457.91 5.16 444.45 0 430.98 0a52.38 52.38 0 0 0-34.75 13.15L110.59 261.8c-10.29 9.08-14.33 23.35-10.33 36.49l12.49 41.02-36.54 36.56c-6.74 6.75-6.74 17.68 0 24.43l.25.26L0 479.98 99.88 512l43.99-44.01.02.02c6.75 6.75 17.69 6.75 24.44 0l36.46-36.47 40.91 12.53c18.01 5.51 31.41-4.54 36.51-10.32l248.65-285.9c18.35-20.82 17.37-52.32-2.25-71.94zM91.05 475.55l-32.21-10.33 40.26-42.03 22.14 22.15-30.19 30.21zm167.16-62.99c-.63.72-1.4.94-2.32.94-.26 0-.54-.02-.83-.05l-40.91-12.53-18.39-5.63-39.65 39.67-46.85-46.88 39.71-39.72-5.6-18.38-12.49-41.02c-.34-1.13.01-2.36.73-3l44.97-39.15 120.74 120.8-39.11 44.95zm248.51-285.73L318.36 343.4l-117.6-117.66L417.4 37.15c4.5-3.97 17.55-9.68 28.1.88l60.48 60.52c7.65 7.65 8.04 20 .74 28.28z" class=""></path></svg>'
                    .'<span class="nome-links-navegacao">Cadastro de questões</span>'
                .'</a>'
                .'<span class="tooltip">Cadastro de questões</span>'     
            .'</li>'
            .'<li class="'.$menuNotificacoes.'">'
                .'<a href="cadastro-notificacao">'
                .'<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="highlighter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 544 512" class="svg-inline--fa fa-highlighter fa-w-17 fa-2x"><path fill="currentColor" d="M528.61 75.91l-60.49-60.52C457.91 5.16 444.45 0 430.98 0a52.38 52.38 0 0 0-34.75 13.15L110.59 261.8c-10.29 9.08-14.33 23.35-10.33 36.49l12.49 41.02-36.54 36.56c-6.74 6.75-6.74 17.68 0 24.43l.25.26L0 479.98 99.88 512l43.99-44.01.02.02c6.75 6.75 17.69 6.75 24.44 0l36.46-36.47 40.91 12.53c18.01 5.51 31.41-4.54 36.51-10.32l248.65-285.9c18.35-20.82 17.37-52.32-2.25-71.94zM91.05 475.55l-32.21-10.33 40.26-42.03 22.14 22.15-30.19 30.21zm167.16-62.99c-.63.72-1.4.94-2.32.94-.26 0-.54-.02-.83-.05l-40.91-12.53-18.39-5.63-39.65 39.67-46.85-46.88 39.71-39.72-5.6-18.38-12.49-41.02c-.34-1.13.01-2.36.73-3l44.97-39.15 120.74 120.8-39.11 44.95zm248.51-285.73L318.36 343.4l-117.6-117.66L417.4 37.15c4.5-3.97 17.55-9.68 28.1.88l60.48 60.52c7.65 7.65 8.04 20 .74 28.28z" class=""></path></svg>'
                    .'<span class="nome-links-navegacao">Cadastro de notificações</span>'
                .'</a>'                
                .'<span class="tooltip">Cadastro de notificações</span>'
            .'</li>';
        }

        $menu .=
        '<li>'
            .'<a href="Controller/validaLogout">'
            .'<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="sign-out" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-sign-out fa-w-16 fa-3x"><path fill="currentColor" d="M48 64h132c6.6 0 12 5.4 12 12v8c0 6.6-5.4 12-12 12H48c-8.8 0-16 7.2-16 16v288c0 8.8 7.2 16 16 16h132c6.6 0 12 5.4 12 12v8c0 6.6-5.4 12-12 12H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48zm279 19.5l-7.1 7.1c-4.7 4.7-4.7 12.3 0 17l132 131.4H172c-6.6 0-12 5.4-12 12v10c0 6.6 5.4 12 12 12h279.9L320 404.4c-4.7 4.7-4.7 12.3 0 17l7.1 7.1c4.7 4.7 12.3 4.7 17 0l164.5-164c4.7-4.7 4.7-12.3 0-17L344 83.5c-4.7-4.7-12.3-4.7-17 0z" class=""></path></svg>'
                .'<span class="nome-links-navegacao">Cadastro de notificações</span>'
            .'</a>'                
            .'<span class="tooltip">Cadastro de notificações</span>'
        .'</li>';


    return $menu;
}

?>