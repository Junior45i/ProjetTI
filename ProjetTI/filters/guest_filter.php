<?php
// Effectue redirection si utilisateur connecté

if(isset($_SESSION['user_id']) && isset($_SESSION['pseudo'])){
    header('Location: profil.php');
    exit();
}

?>