<?php
if (isset($_REQUEST['myFunction']) && $_REQUEST['myFunction'] != '') {
    $_REQUEST['myFunction']($_REQUEST);
}

function affichagePost($data){
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
        if ($ifQuestionExist->rowCount() > 0) {
            $questionInfos = $ifQuestionExist->fetch();
            $question_title = $questionInfos['title'];
            $question_content = $questionInfos['content'];
            $question_date = $questionInfos['datePubli'];
            $question_like = $questionInfos['compteur_like'];
            $question_auteur = $questionInfos['idMem'];
            $getComment = $conn->prepare('SELECT title, content, datePubli, idMem, id_auteur, contenu FROM commentaire INNER JOIN publication USING (idPubli) WHERE id_question=:idPubli ORDER BY id_comment DESC');
            $getComment->bindParam(':idPubli', $idOfPost, PDO::PARAM_STR, 50);
            $getComment->execute();
            
        } else {
            echo "Inconnu";
        }
        $rs = $rs + $getComment->fetchAll(PDO::FETCH_ASSOC);
        echo utf8_encode(json_encode($rs));
    } else {
    }
}
// Ajout de commentaire
// if (isset($_POST['comment'])) {
//     if (!empty($_POST['answer'])) {
//         $user_answer = nl2br(htmlspecialchars($_POST['answer']));
//         $insertAnswer = $conn->prepare("INSERT INTO commentaire(id_auteur, id_question, contenu)VALUES(:id_auteur,:idPubli,:contenu)");
//         $insertAnswer->bindParam(':id_auteur', $_SESSION['user_id'], PDO::PARAM_STR, 50);
//         $insertAnswer->bindParam(':idPubli', $idOfPost, PDO::PARAM_STR, 50);
//         $insertAnswer->bindParam(':contenu', $user_answer, PDO::PARAM_STR, 50);
//         $insertAnswer->execute();
//         redirect('post.php?idPubli=' . $idOfPost);
//     }
// }
