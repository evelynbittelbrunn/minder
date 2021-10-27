<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require '../conexaoPDO.php';

$id   = $_GET['id'];

$sql = $pdo->query("SELECT * FROM tb_Questao WHERE idQuestao = ".$id.";");

if($sql->rowCount() > 0){
    foreach($sql->fetchAll() as $value){
        echo '

        <div class="modal">
            <button class="fechar">X</button>
            <div class="modal-corpo">
                    
            </div>            
        </div>

        ';

    }
}

?>