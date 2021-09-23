<?php
//Monta a questão
function montaQuestao($idQuestao){

    include('conexao.php');
    $sql = "SELECT * FROM tb_Questao WHERE idQuestao = ".$idQuestao.";";

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
            '<div class="question-text">'.$campo['Descricao'].'</div>'
            .'<div>'
                .'<div style="color: #C0BABB;">'
                    .'<p style="padding: 6px;">Selecione a alternativa correta: </p>'
                    .'<input type="radio" name="certa" value="A">'
                    .'<label> '.$campo['AlternativaA'].'</label><br>'
                    .'<input type="radio" name="certa" value="B">'
                    .'<label> '.$campo['AlternativaB'].'</label><br>'
                    .'<input type="radio" name="certa" value="C">'
                    .'<label> '.$campo['AlternativaC'].'</label><br>'
                    .'<input type="radio" name="certa" value="D">'
                    .'<label> '.$campo['AlternativaD'].'</label><br>'
                    .'<input type="radio" name="certa" value="E">'
                    .'<label> '.$campo['AlternativaE'].'</label><br>'
                .'</div>'
            .'</div>';

        }

    }

    return $lista;
}
?>