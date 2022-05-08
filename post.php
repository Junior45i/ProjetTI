<?php
if (isset($_REQUEST['myFunction']) && $_REQUEST['myFunction'] != '') {
    $_REQUEST['myFunction']($_REQUEST);
}

// Permet d'afficher un post
function affichagePost($data)
{
    session_start();
    include('filters/auth_filter.php');
    include('includes/fonctions.php');
    $idOfPost = $data['myParams']['idPubli'];
    $user_answer = "";
    // Affichage du post
    if (isset($idOfPost) && !empty($idOfPost)) {
        $ifQuestionExist = $conn->prepare('SELECT * FROM publication WHERE idPubli=:idPubli');
        $ifQuestionExist->bindParam(':idPubli', $idOfPost, PDO::PARAM_STR, 50);
        $ifQuestionExist->execute();
        $rs = $ifQuestionExist->fetchAll(PDO::FETCH_ASSOC);
        echo utf8_encode(json_encode($rs));
    } else {
    }
}

// Permet l'affichage des commentaires spécifique à un post
function affichageCommentaire($data)
{
    session_start();
    include('filters/auth_filter.php');
    include('includes/fonctions.php');
    $idOfPost = $data['myParams']['idPubli'];
    if (isset($idOfPost) && !empty($idOfPost)) {
        $getComment = $conn->prepare('SELECT id_auteur, contenu, idMem, preMem, nomMem FROM commentaire INNER JOIN membre ON membre.idMem = commentaire.id_auteur WHERE id_question=:idPubli ORDER BY id_comment ASC');
        $getComment->bindParam(':idPubli', $idOfPost, PDO::PARAM_STR, 50);
        $getComment->execute();
        $rs = $getComment->fetchAll(PDO::FETCH_ASSOC);
        echo utf8_encode(json_encode($rs));
    } else {
        echo "Inconnu";
    }
}

// Ajout de commentaire au post
function ajoutCommentaire($data)
{
    session_start();
    include('filters/auth_filter.php');
    include('includes/fonctions.php');
    $idOfPost = $data['myParams']['idPubli'];
    $user_answer = htmlspecialchars($data['myParams']['answer']);
    if (isset($user_answer) &&!empty($user_answer)) {
        $user_answer = nl2br($user_answer);
        $insertAnswer = $conn->prepare("INSERT INTO commentaire(id_auteur, id_question, contenu)VALUES(:id_auteur,:idPubli,:contenu)");
        $insertAnswer->bindParam(':id_auteur', $_SESSION['user_id'], PDO::PARAM_STR, 50);
        $insertAnswer->bindParam(':idPubli', $idOfPost, PDO::PARAM_STR, 50);
        $insertAnswer->bindParam(':contenu', $user_answer, PDO::PARAM_STR, 50);
        $insertAnswer->execute();
        echo "reussi";
    }else
    echo "rate";
}
