<?php
// Verifie si une variable de session existe sinon redirige vers la connection

if(!isset($_SESSION['administrateur']) && !isset($_SESSION['administrateur'])){
    header('Location: feed');
    exit();
}
