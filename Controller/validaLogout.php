<?php
    $_SESSION['logado']    = 0;
    session_start();
    session_destroy();
    header('Location: ../login');
?>