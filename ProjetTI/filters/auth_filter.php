<?php
// Verifie si une variable de session existe sinon redirige vers la connection

if(!isset($_SESSION['user_id']) && !isset($_SESSION['pseudo'])){
    header('Location: connection');
    exit();
}
?>