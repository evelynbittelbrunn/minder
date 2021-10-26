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
                    .'<input type="radio" name="certa" value="A" id="radioA">'
                    .'<label> '.$campo['AlternativaA'].'</label><br>'
                    .'<input type="radio" name="certa" value="B" id="radioB">'
                    .'<label> '.$campo['AlternativaB'].'</label><br>'
                    .'<input type="radio" name="certa" value="C" id="radioC">'
                    .'<label> '.$campo['AlternativaC'].'</label><br>'
                    .'<input type="radio" name="certa" value="D" id="radioD">'
                    .'<label> '.$campo['AlternativaD'].'</label><br>'
                    .'<input type="radio" name="certa" value="E" id="radioE">'
                    .'<label> '.$campo['AlternativaE'].'</label><br>'
                .'</div>'
            .'</div>';

        }

    }

    $lista .= '<div>'
                .'<div align="right">'
                    .'<a href="#" onclick="proximaQuestao();">'
                        .'<span>PRÓXIMO</span>'
                    .'</a>'
                .'</div>'
                
                .'<div align="left">'
                    .'<a href="#" onclick="anteriorQuestao();">'
                        .'<span>ANTERIOR</span>'
                    .'</a>'
                .'</div>'
            .'</div>';

    return $lista;
}
?>