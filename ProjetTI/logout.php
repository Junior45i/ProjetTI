<?php
// Détruit les variables de sessions et redirige vers le login
    session_start();
    session_destroy();

    $_SESSION = [];

    header('Location: connection')

?>