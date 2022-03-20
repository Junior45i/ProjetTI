<?php
session_start();

// Connection DB
include 'config/database.php';
$conn = connectDB("localhost", "proj_tm_bdd", "root", "");

// Permet de n'afficher que si l'utilisateur à su ce connecter
include('filters/auth_filter.php');
require("view/profil_view.php");

if(!empty($_GET['id'])){
    // Va récup dans la db les infos de l'util pap à id
    $user = find_user_by_id($_GET['id']);

    if(!$user){
        header('Location: login.php');
    }

}else{
    // A vérifier
    header('Location: profil.php?id='.$_SESSION['user_id']);
}

?>