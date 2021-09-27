<?php
    session_start();

    include('function.php');
    
    $descricao          = $_POST['nNotificacao'];
    $referencia         = $_POST['nReferencia'];

    include('conexao.php');
    $sql = "SELECT * FROM tb_Usuario WHERE idTipoUsuario = 2;";

    $result = mysqli_query($conn,$sql);    
    mysqli_close($conn);

    if (mysqli_num_rows($result) > 0) {	
		$lista = array();

		while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			array_push($lista,$linha);
		}
        
        foreach ($lista as $campo) {
            //$sql2
            include('conexao.php');
            $sql2 = "INSERT INTO tb_Notificacao (idUsuario, Descricao, Referencia, FlgLido) "
                    ." VALUES (".$campo['idUsuario'].",'".$descricao."', '".$referencia."', 'N');";

            $result2 = mysqli_query($conn,$sql2);    
            mysqli_close($conn);
            
        }
       
    }


    header('location: '.$_SERVER['HTTP_REFERER']);

?>