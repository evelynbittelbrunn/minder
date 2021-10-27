<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require('../conexaoPDO.php');
include('../function.php');

$id  = $_GET['id'];

$sql = $pdo->query("SELECT qu.*, tm.Descricao AS Materia, ta.Descricao AS Assunto, "
                    ." ba.Descricao AS Banca, tq.Descricao AS TipoQuestao "
                    ." FROM tb_Questao qu "
                    ." INNER JOIN tb_TipoMateria tm "
                    ." ON qu.idTipoMateria = tm.idTipoMateria "
                    ." INNER JOIN tb_TipoAssunto ta "
                    ." ON qu.idTipoAssunto = ta.idTipoAssunto "
                    ." INNER JOIN tb_Banca ba "
                    ." ON qu.idBanca = ba.idBanca "
                    ." INNER JOIN tb_TipoQuestao tq "
                    ." ON qu.idTipoQuestao = tq.idTipoQuestao "
                    ." WHERE qu.idQuestao = ".$id.";");

if($sql->rowCount() > 0){
    foreach($sql->fetchAll() as $value){
        echo '

        <div class="modal">'
            .'<button class="fechar">X</button>'
            .'<div class="modal-corpo">'
                .'<form method="POST" action="Controller/salvaQuestao.php" enctype="multipart/form-data">'   
                
                    .'<div class="container-modal">'
                        .'<input type="text" name="nID" visible="false" value="'.$value['idQuestao'].'" hidden>'
                        .'<label for="iDescricao">Descrição da questão: </label>'
                        .'<textarea id="iDescricao" name="nDescricao" rows="5" cols="30" class="input-modal">'.$value['Descricao'].'</textarea></br>'
                    .'</div>'
                    

                    .'<div>'
                    .'<label>Imagem:</label>' 
                    .'<input type="file" name="nImagem">'
                    .'</div></br>'

                    .'<label for="iAlternativaA">Alternativa A: </label>'
                    .'<input type="text" id="iAlternativaA" name="nAlternativaA" value="'.$value['AlternativaA'].'" class="input-modal"></br>'

                    .'<label for="iAlternativaB">Alternativa B: </label>'
                    .'<input type="text" id="iAlternativaB" name="nAlternativaB" value="'.$value['AlternativaB'].'" class="input-modal"></br>'

                    .'<label for="iAlternativaC">Alternativa C: </label>'
                    .'<input type="text" id="iAlternativaC" name="nAlternativaC" value="'.$value['AlternativaC'].'" class="input-modal"></br>'

                    .'<label for="iAlternativaD">Alternativa D: </label>'
                    .'<input type="text" id="iAlternativaD" name="nAlternativaD" value="'.$value['AlternativaD'].'" class="input-modal"></br>'

                    .'<label for="iAlternativaE">Alternativa E: </label>'
                    .'<input type="text" id="iAlternativaE" name="nAlternativaE" value="'.$value['AlternativaE'].'" class="input-modal"></br>'

                    .'<label for="iResposta">Resposta: </label>'
                   .' <select name="nResposta" id="iResposta" required="true">'
                        .'<option value="'.$value['Resposta'].'">'.$value['Resposta'].'</option>'
                        .'<option value="A">A</option>'
                        .'<option value="B">B</option>'
                        .'<option value="C">C</option>'
                        .'<option value="D">D</option>'
                        .'<option value="E">E</option>'
                    .'</select></br>'

                    .'<label for="iMateria">Matéria: </label>'
                    .'<select name="nMateria" id="iMateria" required="true">'
                        .'<option value="'.$value['idTipoMateria'].'">'.$value['Materia'].'</option>'
                        .consultaMaterias($value['idTipoMateria'])
                    .'</select></br>'

                    .'<label for="iAssunto">Assunto: </label>'
                    .'<select name="nAssunto" id="iAssunto" required="true">'
                        .'<option value="'.$value['idTipoAssunto'].'">'.$value['Assunto'].'</option>'
                        .consultaAssuntos($value['idTipoAssunto'])
                    .'</select></br>'

                    .'<label for="iBanca">Banca: </label>'
                    .'<select name="nBanca" id="iBanca" required="true">'
                        .'<option value="'.$value['idBanca'].'">'.$value['Banca'].'</option>'
                        .consultaBancas($value['idBanca'])
                    .'</select></br>'

                    .'<label for="iTipoQuestao">Tipo da questão: </label>'
                    .'<select name="nTipoQuestao" id="iTipoQuestao">'
                        .'<option value="'.$value['idTipoQuestao'].'">'.$value['TipoQuestao'].'</option>'
                        .consultaTipoQuestoes($value['idTipoQuestao'])
                    .'</select><br>'

                    .'<div></div>'
                    .'<label for="iAno">Ano: </label>'
                    .'<input type="number" id="iAno" name="nAno" value="'.$value['Ano'].'"></br>'
                    .'<input type="submit">'
                .'</form>'
            .'</div>'      
        .'</div>';

    }
}

?>