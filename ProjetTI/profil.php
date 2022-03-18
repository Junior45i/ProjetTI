<?php
session_start();

// Permet de n'afficher que si l'utilisateur à su ce connecter
include('filters/auth_filter.php');
require("view/profil_view.php");

if(!empty($_GET['id'])){
    // Va récup dans la db les infos de l'util pap à id

}else{
    header('Location: profil.php?id='.get_session('user_id'));
}

?>