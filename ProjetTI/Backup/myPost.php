<?php
session_start();
include('filters/auth_filter.php');
include('includes/fonctions.php');

// Permet de n'afficher que si l'utilisateur à su ce connecter


$getAllMyQuestions = $conn->prepare('SELECT title, content, idPubli FROM publication WHERE idMem=:idMem ORDER BY idPubli DESC');
$getAllMyQuestions->bindParam(':idMem', $_SESSION['user_id'], PDO::PARAM_STR, 50);
$getAllMyQuestions->execute();

require("view/myPost_view.php");
