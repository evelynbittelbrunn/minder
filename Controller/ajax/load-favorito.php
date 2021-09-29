<?php 
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require '../conexaoPDO.php';

$id     = $_GET['id'];
$tipo   = $_GET['tipo'];

if($tipo == "true"){
    $upd = $pdo->query("INSERT INTO tb_Favorito (idQuestao,idUsuario) VALUES (".$id.",".$_SESSION['idUsuario'].");");
}else{
    $upd = $pdo->query("DELETE FROM tb_Favorito WHERE idQuestao = ".$id." AND idUsuario = ".$_SESSION['idUsuario'].";");    
}

?>