<?php 
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include('../function.php');

require '../conexaoPDO.php';

$id   = $_GET['id'];

$delete = $pdo->query("DELETE FROM tb_Favorito WHERE idQuestao = ".$id." AND idUsuario = ".$_SESSION['idUsuario'].";");    

$sql = $pdo->query("SELECT * FROM tb_Questao quest "
                    ." INNER JOIN tb_Favorito fav "
                    ." ON quest.idQuestao = fav.idQuestao "
                    ." WHERE fav.idUsuario = ".$_SESSION['idUsuario']
                    ." ORDER BY Ano DESC;");

if($sql->rowCount() > 0){
    foreach($sql->fetchAll() as $campo){

        echo 
        '<div class="questao-container-caixa">'
            .'<a href="questao?q='.MD5($campo['idQuestao']).'&a='.$idAssunto.'">'
                .'<div class="questao-row">'
                    .'<p>'.$campo['Descricao'].'</p>'             
                .'</div>'
            .'</a>'
            .'<a href="#" onclick=functionDesfavoritar('.$campo['idQuestao'].') id="fav'.$campo['idQuestao'].'" class="svg-favoritos">'
                .'<svg class="close" aria-hidden="true" style="height: 18px; right: 4%;" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-2x"><path class="close" fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>'
            .'</a>'   
        .'</div>';

    }
}else{
    echo '

    <div class="mensagem-resultado-filtro">
        <h2>Ops, você ainda não favoritou nenhuma questão... <br> Favorite uma questão e volte aqui novamente :D</h2>
    </div>';
}

?>