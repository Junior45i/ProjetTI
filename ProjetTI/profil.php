<?php
session_start();
$errors = [];
include('includes/fonctions.php');

// Permet de n'afficher que si l'utilisateur à su ce connecter
include('filters/auth_filter.php');

if (!empty($_GET['id'])) {
    $user = find_user_by_id($_GET['id']);

    if (!$user) {
        redirect('index.php');
    }
} else {
    redirect('profil.php?id=' . get_session('user_id'));
}


if (isset($_POST['update'])) {

    $errors = [];
    $ville = $_POST['ville'];
    $rue = $_POST['rue'];
    $bio = $_POST['bio'];
    $sexe = $_POST['sexe'];
    $telephone = $_POST['telephone'];
    $idMem = $_SESSION['user_id'];

    $sql = $conn->prepare("UPDATE membre SET ville=:ville, rue=:rue, bio=:bio, sexe=:sexe, telephone=:telephone WHERE idMem=:idMem");


    $sql->bindParam(':ville', $ville, PDO::PARAM_STR, 50);
    $sql->bindParam(':rue', $rue, PDO::PARAM_STR, 50);
    $sql->bindParam(':bio', $bio, PDO::PARAM_STR, 50);
    $sql->bindParam(':sexe', $sexe, PDO::PARAM_STR, 50);
    $sql->bindParam(':telephone', $telephone, PDO::PARAM_STR, 50);
    $sql->bindParam(':idMem', $_SESSION['user_id'], PDO::PARAM_STR, 50);
    $sql->execute();
    $errors[] = "Votre profil a été mis à jours";
}

require("view/profil_view.php");
