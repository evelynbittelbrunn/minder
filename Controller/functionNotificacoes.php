<?php
//monta a lista de notificações
function montaListaNotificacoes($idUsuario){
    include('conexao.php');

    $sql = "SELECT * FROM tb_Notificacao "
            ." WHERE idUsuario = ".$idUsuario
            ." ORDER BY idUsuario DESC "
            ." LIMIT 3;";
            
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
            '<div class="notificacao">'
                .'<p>'.$campo['Descricao'].'</p>'
            .'</div>';

        }

    }

    return $lista;
}

?>