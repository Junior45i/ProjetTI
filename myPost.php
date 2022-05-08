<?php
session_start();
// Permet de n'afficher que si l'utilisateur à su ce connecter
include('filters/auth_filter.php');
include('includes/fonctions.php');


//Récupère toutes les questions
$getAllMyQuestions = $conn->prepare('SELECT title, content, idPubli FROM publication WHERE idMem=:idMem ORDER BY idPubli ASC');
$getAllMyQuestions->bindParam(':idMem', $_SESSION['user_id'], PDO::PARAM_STR, 50);

$getAllMyQuestions->execute();
$rs = $getAllMyQuestions->fetchAll(PDO::FETCH_ASSOC);
echo utf8_encode(json_encode($rs));

