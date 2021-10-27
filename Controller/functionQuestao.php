<?php
//Monta a questão
function montaQuestao($idQuestao){

    include('conexao.php');
    $sql = "SELECT * FROM tb_Questao WHERE MD5(idQuestao) = '".$idQuestao."';";

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
            '<div class="question-text">'.$campo['Descricao'].'</div>';
            if($campo['ArqImagem'] != NULL){
                $lista .=
                '<img src="'.$campo['ArqImagem'].'">';
            }
            $lista .=
            '<div>'
                .'<div style="color: #C0BABB;">'
                    .'<p style="padding: 6px;">Selecione a alternativa correta: </p>'
                    .'<label class="label-questao" onclick=select("id1") id="id1">'
                        .'<input type="radio" name="certa" value="A" id="radioA">'
                        .$campo['AlternativaA']
                    .'</label>'
                    .'<label class="label-questao" onclick=select("id2") id="id2">'
                        .'<input type="radio" name="certa" value="B" id="radioB">'
                        .$campo['AlternativaB']
                    .'</label>'
                    .'<label class="label-questao" onclick=select("id3") id="id3">'
                        .'<input type="radio" name="certa" value="C" id="radioC">'
                        .$campo['AlternativaC']
                    .'</label>'
                    .'<label class="label-questao" onclick=select("id4") id="id4">'
                        .'<input type="radio" name="certa" value="D" id="radioD">'
                        .$campo['AlternativaD']
                    .'</label>'
                    .'<label class="label-questao" onclick=select("id5") id="id5">'
                        .'<input type="radio" name="certa" value="E" id="radioE">'
                        .$campo['AlternativaE']
                    .'</label><br>'
                .'</div>'
            .'</div>';

        }

    }

    $lista .= 
    
    '<div class="questao-footer">'
        .'<div style="display: flex;justify-content: space-between; aligm-itens: center;">'
            .'<a href="#" onclick="anteriorQuestao();">'
                .'<span><svg style="transform: rotate(180deg);" aria-hidden="true" width="30px" focusable="false" data-prefix="fal" data-icon="arrow-circle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-arrow-circle-right fa-w-16 fa-2x"><path fill="currentColor" d="M8 256c0 137 111 248 248 248s248-111 248-248S393 8 256 8 8 119 8 256zM256 40c118.7 0 216 96.1 216 216 0 118.7-96.1 216-216 216-118.7 0-216-96.1-216-216 0-118.7 96.1-216 216-216zm12.5 92.5l115.1 115c4.7 4.7 4.7 12.3 0 17l-115.1 115c-4.7 4.7-12.3 4.7-17 0l-6.9-6.9c-4.7-4.7-4.7-12.5.2-17.1l85.6-82.5H140c-6.6 0-12-5.4-12-12v-10c0-6.6 5.4-12 12-12h190.3l-85.6-82.5c-4.8-4.7-4.9-12.4-.2-17.1l6.9-6.9c4.8-4.7 12.4-4.7 17.1 0z" class=""></path></svg></span>'
            .'</a>'
            .'<div style="border: 1px solid red;">'
                .'<a href="#" onClick=validaQuestao("'.$idQuestao.'")>VALIDAR QUESTÃO</a>'
                .'<a href="#" onClick=mostraResposta("'.$idQuestao.'")>MOSTRAR RESPOSTA</a>'
            .'</div>'                    
            .'<a href="#" onclick="proximaQuestao();">'
                .'<span><svg aria-hidden="true" width="30px" focusable="false" data-prefix="fal" data-icon="arrow-circle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-arrow-circle-right fa-w-16 fa-2x"><path fill="currentColor" d="M8 256c0 137 111 248 248 248s248-111 248-248S393 8 256 8 8 119 8 256zM256 40c118.7 0 216 96.1 216 216 0 118.7-96.1 216-216 216-118.7 0-216-96.1-216-216 0-118.7 96.1-216 216-216zm12.5 92.5l115.1 115c4.7 4.7 4.7 12.3 0 17l-115.1 115c-4.7 4.7-12.3 4.7-17 0l-6.9-6.9c-4.7-4.7-4.7-12.5.2-17.1l85.6-82.5H140c-6.6 0-12-5.4-12-12v-10c0-6.6 5.4-12 12-12h190.3l-85.6-82.5c-4.8-4.7-4.9-12.4-.2-17.1l6.9-6.9c4.8-4.7 12.4-4.7 17.1 0z" class=""></path></svg></span>'
            .'</a>' 
        .'</div>'
    .'</div>';

    return $lista;
}
?>