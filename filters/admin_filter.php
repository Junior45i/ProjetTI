<?php
// Verifie si une variable de session existe sinon redirige vers la connection

if($_SESSION['administrateur']!=1 || empty($_SESSION['administrateur'])){
    header('Location: feed');
    exit();
}
