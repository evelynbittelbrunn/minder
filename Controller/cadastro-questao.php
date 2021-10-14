<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include('conexao.php');
/*
$add  = $_POST['nAddQuestao'];
$edit  = $_POST['nEditarQuestao'];
$delete  = $_POST['nDeletarQuestao'];
*/
$sql = "
select tb_questao.descricao descricaoQuestao, tb_banca.descricao descricaoBanca, tb_questao.resposta, tb_tipomateria.descricao descricaoMateria, tb_tipoassunto.descricao descricaoAssunto
from tb_questao
inner join tb_banca on tb_banca.idBanca = tb_questao.idBanca,
inner join tb_tipoquestao on tb_tipoquestao.idTipoQuestao = tb_questao.idTipoQuestao,
inner join tb_tipomateria on tb_tipomateria.idTipoMateria = tb_questao.idTipoMateria,
inner join tb_tipoassunto on tb_tipoassunto.idTipoAssunto = tb_questao.idTipoAssunto,
order by tb_banca.descricao, tb_tipomateria.descricao, tb_tipoassunto.descricao, tb_questao.descricao";

$result = mysqli_query ($conn, $sql);

?>
<table border="1">
    <thead>
        <th>Questão</th>
        <th>Banca</th>
        <th>Materia</th>
        <th>Assunto</th>
        <th>Resposta</th>
    </thead>
    <tbody>
<?php
while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    echo "<tr>
        <td>".$linha['descricaoQuestao']."</td>
        <td>".$linha['descricaoBanca']."</td>
        <td>".$linha['descricaoMateria']."</td>
        <td>".$linha['descricaoAssunto']."</td>
        <td>".$linha['resposta']."</td>
    </tr>";
}
?>
    </tbody>
</table>
<?php
mysqli_close ($conn);
?>