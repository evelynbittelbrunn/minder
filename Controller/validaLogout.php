<?php
    $_SESSION['logado']    = 0;
    session_destroy();
    header('Location: ../login.php');
?>