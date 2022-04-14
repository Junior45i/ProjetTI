<?php
session_start();
$errors = [];
include('includes/fonctions.php');

// Permet de n'afficher que si l'utilisateur à su ce connecter
include('filters/auth_filter.php');

if (isset($_POST['publier'])) {
    $errors = [];
    $title = $_POST['title'];
    $content = $_POST['content'];
    // $datePubli = date("d-m-Y H:i:s");

    if (!empty($title) && !empty($content)) {
        $insertQuestion = $conn->prepare("INSERT INTO publication(title, content, idMem)VALUES(:title,:content,:idMem)");
        $insertQuestion->bindParam(':title', $title, PDO::PARAM_STR, 50);
        $insertQuestion->bindParam(':content', $content, PDO::PARAM_STR, 50);
        $insertQuestion->bindParam(':idMem', $_SESSION['user_id'], PDO::PARAM_STR, 50);
        $insertQuestion->execute();
        $errors[] = "Votre post à été publié sur le site";
    } else {
        $errors[] = "Veuillez remplir tous les champs";
    }
}


require("view/pubPost_view.php");