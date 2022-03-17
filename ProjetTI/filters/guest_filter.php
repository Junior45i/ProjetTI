<?php
// Effectue redirection si utilisateur connecté
// Ajouter à actiovation par mail qd fera

if(isset($_SESSION['user_id']) && isset($_SESSION['pseudo'])){
    header('Location: profil.php');
    exit();
}

?>