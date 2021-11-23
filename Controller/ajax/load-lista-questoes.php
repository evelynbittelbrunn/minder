    <?php 
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    include('../function.php');

    require '../conexaoPDO.php';

    $materia   = $_GET['mat'];
    $assunto   = $_GET['as'];
    $ano       = $_GET['ano'];
    $banca     = $_GET['banca'];
    $resp      = $_GET['resp'];

    if($ano != 0){
        $queryAno = " AND Ano = ".$ano;
        $_SESSION['AnoFiltro']  = $ano;
    }else{
        $queryAno = "";
        $_SESSION['AnoFiltro']  = "";
    }

    if($banca != 0){
        $queryBanca = " AND idBanca = ".$banca;
        $_SESSION['idBancaFiltro']  = $banca;
    }else{
        $queryBanca = "";
        $_SESSION['idBancaFiltro']  = "";
    }

    if($resp == 'true'){
        $queryRespondidas = " AND idQuestao NOT IN (SELECT idQuestao FROM tb_RespostaUsuario WHERE idUsuario = ".$_SESSION['idUsuario'].") ";
        $_SESSION['questoesRespondidas']  = $resp;
    }else{
        $queryRespondidas                 = "";
        $_SESSION['questoesRespondidas']  = "";
    }


    $sql = $pdo->query("SELECT * FROM tb_Questao " 
                        ." WHERE MD5(idTipoMateria) = '".$materia."' "
                        ." AND MD5(idTipoAssunto) = '".$assunto."' "
                        .$queryAno
                        .$queryBanca
                        .$queryRespondidas
                        ." ORDER BY idQuestao ASC;");

    if($sql->rowCount() > 0){
        foreach($sql->fetchAll() as $campo){

            $hidden = verificaFavorito($campo['idQuestao']);

            if($hidden > 0){
                $favorito     =  '';
                $naoFavorito  =  'hidden';
            }else{
                $favorito     =  'hidden';
                $naoFavorito  =  '';
            }


            if($_SESSION['idUsuario'] != 0){
                echo
                '<div class="questao-container-caixa">'
                    .'<a href="questao?q='.MD5($campo['idQuestao']).'&a='.$assunto.'" style="display:block;width:100%;">'
                        .'<div class="questao-row">'
                            .'<p>'.$campo['Descricao'].'</p>'             
                        .'</div>'
                    .'</a>'
                    .'<a href="#" onclick=functionFavorito("S",'.$campo['idQuestao'].') id="fav'.$campo['idQuestao'].'" class="favoritado svg-favoritos" '.$favorito.'>'
                        .'<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-heart fa-w-16 fa-2x"><path fill="currentColor" d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z" class=""></path></svg>'
                    .'</a>' 
                    .'<a href="#" onclick=functionFavorito("N",'.$campo['idQuestao'].') id="nao'.$campo['idQuestao'].'" class="nao-favoritado svg-favoritos" '.$naoFavorito.'>'
                        .'<svg  aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-heart fa-w-16 fa-2x"><path fill="currentColor" d="M462.3 62.7c-54.5-46.4-136-38.7-186.6 13.5L256 96.6l-19.7-20.3C195.5 34.1 113.2 8.7 49.7 62.7c-62.8 53.6-66.1 149.8-9.9 207.8l193.5 199.8c6.2 6.4 14.4 9.7 22.6 9.7 8.2 0 16.4-3.2 22.6-9.7L472 270.5c56.4-58 53.1-154.2-9.7-207.8zm-13.1 185.6L256.4 448.1 62.8 248.3c-38.4-39.6-46.4-115.1 7.7-161.2 54.8-46.8 119.2-12.9 142.8 11.5l42.7 44.1 42.7-44.1c23.2-24 88.2-58 142.8-11.5 54 46 46.1 121.5 7.7 161.2z" class=""></path></svg>'
                    .'</a>';

                if($_SESSION['idTipoUsuario'] == 1){
                    echo
                    '<a href="#" onclick=iniciaModal("modal-produto",'.$campo['idQuestao'].')  class="nao-favoritado svg-edit">'
                        .'<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-edit fa-w-18 fa-2x"><path fill="currentColor" d="M417.8 315.5l20-20c3.8-3.8 10.2-1.1 10.2 4.2V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h292.3c5.3 0 8 6.5 4.2 10.2l-20 20c-1.1 1.1-2.7 1.8-4.2 1.8H48c-8.8 0-16 7.2-16 16v352c0 8.8 7.2 16 16 16h352c8.8 0 16-7.2 16-16V319.7c0-1.6.6-3.1 1.8-4.2zm145.9-191.2L251.2 436.8l-99.9 11.1c-13.4 1.5-24.7-9.8-23.2-23.2l11.1-99.9L451.7 12.3c16.4-16.4 43-16.4 59.4 0l52.6 52.6c16.4 16.4 16.4 43 0 59.4zm-93.6 48.4L403.4 106 169.8 339.5l-8.3 75.1 75.1-8.3 233.5-233.6zm71-85.2l-52.6-52.6c-3.8-3.8-10.2-4-14.1 0L426 83.3l66.7 66.7 48.4-48.4c3.9-3.8 3.9-10.2 0-14.1z" class=""></path></svg>'
                    .'</a>';
                }
               echo
                '</div>';
            }else{
                echo
                '<div class="questao-container-caixa">'
                    .'<a href="questao?q='.MD5($campo['idQuestao']).'&a='.$assunto.'" style="display:block;width:100%;">'
                        .'<div class="questao-row">'
                            .'<p>'.$campo['Descricao'].'</p>'             
                        .'</div>'
                    .'</a>'
                    .'<a href="#" onclick=functionFavorito("L",'.$campo['idQuestao'].') id="nao'.$campo['idQuestao'].'" class="nao-favoritado svg-favoritos" >'
                        .'<svg  aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-heart fa-w-16 fa-2x"><path fill="currentColor" d="M462.3 62.7c-54.5-46.4-136-38.7-186.6 13.5L256 96.6l-19.7-20.3C195.5 34.1 113.2 8.7 49.7 62.7c-62.8 53.6-66.1 149.8-9.9 207.8l193.5 199.8c6.2 6.4 14.4 9.7 22.6 9.7 8.2 0 16.4-3.2 22.6-9.7L472 270.5c56.4-58 53.1-154.2-9.7-207.8zm-13.1 185.6L256.4 448.1 62.8 248.3c-38.4-39.6-46.4-115.1 7.7-161.2 54.8-46.8 119.2-12.9 142.8 11.5l42.7 44.1 42.7-44.1c23.2-24 88.2-58 142.8-11.5 54 46 46.1 121.5 7.7 161.2z" class=""></path></svg>'
                    .'</a>'   
                .'</div>';
            }

        }
        
    }else{
        echo '

        <div class="mensagem-resultado-filtro">
            <h2>Que pena, sua filtragem não obteve resultados... <br> Dica: tente usar menos regras ;)</h2>
        </div>';
    }

?>