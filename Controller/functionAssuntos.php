<?php

//Descrição do assunto
function descrAssunto($idAssunto){

    include('conexao.php');
    $sql = "SELECT Descricao FROM tb_TipoAssunto WHERE MD5(idTipoAssunto) = '".$idAssunto."';";

    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    $lista = '';

    if (mysqli_num_rows($result) > 0) {

		$array = array();
		
		while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			array_push($array,$linha);
		}
    
        foreach ($array as $campo) {
            
            $assunto = $campo['Descricao'];

        }

    }

    return $assunto;
}

//Conta quantas questões estão disponíveis para aquele assunto
function quantidadeQuestoesAssunto($idAssunto){

    include('conexao.php');
    $sql = "SELECT COUNT(*) AS Qtd FROM tb_Questao WHERE idTipoAssunto = ".$idAssunto.";";

    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    $lista = '';

    if (mysqli_num_rows($result) > 0) {

		$array = array();
		
		while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			array_push($array,$linha);
		}
    
        foreach ($array as $campo) {
            
            $qtdQuestao = $campo['Qtd'];

        }

    }

    return $qtdQuestao;
}

//Monta a lista de assuntos disponíveis por matéria
function montaListaAssuntos($idMateria){

    include('conexao.php');
    $sql = "SELECT * FROM tb_TipoAssunto WHERE MD5(idTipoMateria) = '".$idMateria."';";

    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    $lista = '';

    if (mysqli_num_rows($result) > 0) {

		$array = array();
		
		while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			array_push($array,$linha);
		}
    
        foreach ($array as $campo) {
            $lista .= 
            '<a href="lista-questoes.php?m='.MD5($campo['idTipoMateria']).'&a='.MD5($campo['idTipoAssunto']).'">'
                .'<div class="card-caixa">'
                    .'<div class="card-assunto">'
                        .'<div class="content-assunto">'
                            .'<h4>'.$campo['Descricao'].'</h4>'
                        .'</div>'
                        .'<div class="caixa-texto-quantidade-questoes">'
                            .'<span>'.quantidadeQuestoesAssunto($campo['idTipoAssunto']).'</span>'
                            .'<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="highlighter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 544 512" class="svg-inline--fa fa-highlighter fa-w-17 fa-2x"><path fill="currentColor" d="M528.61 75.91l-60.49-60.52C457.91 5.16 444.45 0 430.98 0a52.38 52.38 0 0 0-34.75 13.15L110.59 261.8c-10.29 9.08-14.33 23.35-10.33 36.49l12.49 41.02-36.54 36.56c-6.74 6.75-6.74 17.68 0 24.43l.25.26L0 479.98 99.88 512l43.99-44.01.02.02c6.75 6.75 17.69 6.75 24.44 0l36.46-36.47 40.91 12.53c18.01 5.51 31.41-4.54 36.51-10.32l248.65-285.9c18.35-20.82 17.37-52.32-2.25-71.94zM91.05 475.55l-32.21-10.33 40.26-42.03 22.14 22.15-30.19 30.21zm167.16-62.99c-.63.72-1.4.94-2.32.94-.26 0-.54-.02-.83-.05l-40.91-12.53-18.39-5.63-39.65 39.67-46.85-46.88 39.71-39.72-5.6-18.38-12.49-41.02c-.34-1.13.01-2.36.73-3l44.97-39.15 120.74 120.8-39.11 44.95zm248.51-285.73L318.36 343.4l-117.6-117.66L417.4 37.15c4.5-3.97 17.55-9.68 28.1.88l60.48 60.52c7.65 7.65 8.04 20 .74 28.28z" class=""></path></svg>'
                        .'</div>'
                    .'</div>'
                .'</div>'  
            .'</a>';   

        }

    }

    return $lista;
}
?>