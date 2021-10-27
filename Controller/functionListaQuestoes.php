<?php

//Monta a lista de ano
function listaAnoSelect($idMateria,$idAssunto){

    include('conexao.php');
    $sql = "SELECT DISTINCT Ano FROM tb_Questao "
            ." WHERE MD5(idTipoMateria) = '".$idMateria."' "
            ." AND MD5(idTipoAssunto) = '".$idAssunto."' "
            ." ORDER BY idQuestao ASC;";

    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    $lista = '';

    if (mysqli_num_rows($result) > 0) {

		$array = array();
		
		while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			array_push($array,$linha);
		}
    
        foreach ($array as $campo) {
            $lista .= '<option value="'.$campo['Ano'].'">'.$campo['Ano'].'</option>';

        }

    }

    return $lista;
}

//Monta a lista de ano
function listaBancaSelect($idMateria,$idAssunto){

    include('conexao.php');
    $sql = "SELECT DISTINCT ban.Descricao, ban.idBanca "
            ." FROM tb_Banca ban "
            ." INNER JOIN tb_Questao ques "
            ." ON ban.idBanca = ques.idBanca "
            ." WHERE MD5(ques.idTipoMateria) = '".$idMateria."' "
            ." AND MD5(ques.idTipoAssunto) = '".$idAssunto."' "
            ." ORDER BY DEscricao;";

    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    $lista = '';

    if (mysqli_num_rows($result) > 0) {

		$array = array();
		
		while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			array_push($array,$linha);
		}
    
        foreach ($array as $campo) {
            $lista .= '<option value="'.$campo['idBanca'].'">'.$campo['Descricao'].'</option>';

        }

    }

    return $lista;
}

//Monta a lista de ano
function verificaFavorito($idQuestao){

    include('conexao.php');
    $sql = "SELECT COUNT(*) AS Qtd "
            ." FROM tb_Favorito "
            ." WHERE idQuestao = ".$idQuestao
            ." AND idUsuario = ".$_SESSION['idUsuario']." ;";

    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    $qtd = '';

    if (mysqli_num_rows($result) > 0) {

		$array = array();
		
		while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			array_push($array,$linha);
		}
    
        foreach ($array as $campo) {
            $qtd = $campo['Qtd'];

        }

    }

    return $qtd;
}

//Consulta os assuntos
function consultaAssuntos($id){
    include('conexao.php');

    $sql = "SELECT * FROM tb_TipoAssunto "
            ." WHERE idTipoAssunto <> ".$id.";";

    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0) {
		$array = array();
		
		while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			array_push($array,$linha);
		}
    
        foreach ($array as $campo) {
            
            $option .= '<option value="'.$campo['idTipoAssunto'].'">'.$campo['Descricao'].'</option>';  

        }

    }

    return $option;
}

//Monta a lista de questões
function montaListaQuestoes($idMateria,$idAssunto){

    include('conexao.php');
    $sql = "SELECT * FROM tb_Questao "
            ." WHERE MD5(idTipoMateria) = '".$idMateria."' "
            ." AND MD5(idTipoAssunto) = '".$idAssunto."' "
            ." ORDER BY idQuestao ASC;";

    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    $lista = '';

    if (mysqli_num_rows($result) > 0) {

		$array = array();
		
		while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			array_push($array,$linha);
		}
    
        foreach ($array as $campo) {

            $hidden = verificaFavorito($campo['idQuestao']);

            if($hidden > 0){
                $favorito     =  '';
                $naoFavorito  =  'hidden';
            }else{
                $favorito     =  'hidden';
                $naoFavorito  =  '';
            }

            
            if($_SESSION['idUsuario'] != '0'){
            $lista .= 
            '<div class="questao-container-caixa">'
                .'<a href="questao?q='.MD5($campo['idQuestao']).'&a='.$idAssunto.'">'
                    .'<div class="questao-row">'
                        .'<p>'.$campo['Descricao'].'</p>'             
                    .'</div>'
                .'</a>'
                .'<a href="#" onclick=functionFavorito("S",'.$campo['idQuestao'].') id="fav'.$campo['idQuestao'].'" class="favoritado svg-favoritos" '.$favorito.'>'
                    .'<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-heart fa-w-16 fa-2x"><path fill="currentColor" d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z" class=""></path></svg>'
                .'</a>' 
                .'<a href="#" onclick=functionFavorito("N",'.$campo['idQuestao'].') id="nao'.$campo['idQuestao'].'" class="nao-favoritado svg-favoritos" '.$naoFavorito.'>'
                    .'<svg  aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-heart fa-w-16 fa-2x"><path fill="currentColor" d="M462.3 62.7c-54.5-46.4-136-38.7-186.6 13.5L256 96.6l-19.7-20.3C195.5 34.1 113.2 8.7 49.7 62.7c-62.8 53.6-66.1 149.8-9.9 207.8l193.5 199.8c6.2 6.4 14.4 9.7 22.6 9.7 8.2 0 16.4-3.2 22.6-9.7L472 270.5c56.4-58 53.1-154.2-9.7-207.8zm-13.1 185.6L256.4 448.1 62.8 248.3c-38.4-39.6-46.4-115.1 7.7-161.2 54.8-46.8 119.2-12.9 142.8 11.5l42.7 44.1 42.7-44.1c23.2-24 88.2-58 142.8-11.5 54 46 46.1 121.5 7.7 161.2z" class=""></path></svg>'
                .'</a>'  
                .'<a href="#" onclick=iniciaModal("modal-produto",'.$campo['idQuestao'].')  class="nao-favoritado svg-edit">'
                    .'<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-edit fa-w-18 fa-2x"><path fill="currentColor" d="M417.8 315.5l20-20c3.8-3.8 10.2-1.1 10.2 4.2V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h292.3c5.3 0 8 6.5 4.2 10.2l-20 20c-1.1 1.1-2.7 1.8-4.2 1.8H48c-8.8 0-16 7.2-16 16v352c0 8.8 7.2 16 16 16h352c8.8 0 16-7.2 16-16V319.7c0-1.6.6-3.1 1.8-4.2zm145.9-191.2L251.2 436.8l-99.9 11.1c-13.4 1.5-24.7-9.8-23.2-23.2l11.1-99.9L451.7 12.3c16.4-16.4 43-16.4 59.4 0l52.6 52.6c16.4 16.4 16.4 43 0 59.4zm-93.6 48.4L403.4 106 169.8 339.5l-8.3 75.1 75.1-8.3 233.5-233.6zm71-85.2l-52.6-52.6c-3.8-3.8-10.2-4-14.1 0L426 83.3l66.7 66.7 48.4-48.4c3.9-3.8 3.9-10.2 0-14.1z" class=""></path></svg>'
                .'</a>' 
            .'</div>';
                $lista .= 
                '<div class="questao-container-caixa">'
                    .'<a href="questao?q='.MD5($campo['idQuestao']).'&a='.$idAssunto.'">'
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

    }

    return $lista;
}


/*
'<a href="questao?q='.MD5($campo['idQuestao']).'&a='.$idAssunto.'">'
                .'<div class="questao-row">'
                    .'<p>'.$campo['Descricao'].'</p>'
                    .'<a href="#" onclick=functionFavorito("S",'.$campo['idQuestao'].') id="fav'.$campo['idQuestao'].'" class="favoritado">'
                        .'<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-heart fa-w-16 fa-2x"><path fill="currentColor" d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z" class=""></path></svg>'
                    .'</a>' 
                    .'<a href="#" onclick=functionFavorito("N",'.$campo['idQuestao'].') hidden id="nao'.$campo['idQuestao'].'" class="nao-favoritado">'
                        .'<svg  aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-heart fa-w-16 fa-2x"><path fill="currentColor" d="M462.3 62.7c-54.5-46.4-136-38.7-186.6 13.5L256 96.6l-19.7-20.3C195.5 34.1 113.2 8.7 49.7 62.7c-62.8 53.6-66.1 149.8-9.9 207.8l193.5 199.8c6.2 6.4 14.4 9.7 22.6 9.7 8.2 0 16.4-3.2 22.6-9.7L472 270.5c56.4-58 53.1-154.2-9.7-207.8zm-13.1 185.6L256.4 448.1 62.8 248.3c-38.4-39.6-46.4-115.1 7.7-161.2 54.8-46.8 119.2-12.9 142.8 11.5l42.7 44.1 42.7-44.1c23.2-24 88.2-58 142.8-11.5 54 46 46.1 121.5 7.7 161.2z" class=""></path></svg>'
                    .'</a>'                     
                .'</div>'
            .'</a>';
*/
?>