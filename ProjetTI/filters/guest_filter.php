<?php
// Effectue redirection si l'utilisateur est déjà connecté

if(isset($_SESSION['user_id']) && isset($_SESSION['pseudo'])){
    header('Location: profil_view.php');
    exit();
}
?>