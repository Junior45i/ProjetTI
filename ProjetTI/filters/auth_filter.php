<?php
// Verifie si var de ss existe sinon redirige vers la connection

if(!isset($_SESSION['user_id']) && !isset($_SESSION['pseudo'])){
    header('Location: login.php');
    exit();
}

?>