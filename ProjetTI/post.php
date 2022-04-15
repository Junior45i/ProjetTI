<?php
session_start();
include('filters/auth_filter.php');
include('includes/fonctions.php');

$user_answer ="";

// Affichage du post
if(isset($_GET['idPubli']) && !empty($_GET['idPubli'])){
    $idOfPost = $_GET['idPubli'];
    $ifQuestionExist = $conn->prepare('SELECT * FROM publication WHERE idPubli=:idPubli');
    $ifQuestionExist->bindParam(':idPubli', $idOfPost, PDO::PARAM_STR, 50);
    $ifQuestionExist->execute();

    if($ifQuestionExist->rowCount() > 0){
       $questionInfos = $ifQuestionExist->fetch();

       $question_title = $questionInfos['title'];
       $question_content = $questionInfos['content'];
       $question_date = $questionInfos['datePubli'];
       $question_like = $questionInfos['compteur_like'];
       $question_auteur = $questionInfos['idMem'];

    }else{
        echo "Aucune post trouvée";
    }

}else{
    echo "aucun post trouvé";
}

// Ajout de commentaire
if(isset($_POST['comment'])){
    if(!empty($_POST['answer'])){
        $user_answer = nl2br(htmlspecialchars($_POST['answer']));
        $insertAnswer = $conn->prepare("INSERT INTO commentaire(id_auteur, idPubli, contenu)VALUES(:id_auteur,:idPubli,:contenu)");
        $insertAnswer->bindParam(':id_auteur', $_SESSION['user_id'], PDO::PARAM_STR, 50);
        $insertAnswer->bindParam(':idPubli', $idOfPost, PDO::PARAM_STR, 50);
        $insertAnswer->bindParam(':contenu', $user_answer, PDO::PARAM_STR, 50);
        $insertAnswer->execute();
        redirect('post.php?idPubli='.$idOfPost);
    }

}

// Requete de recherche des commentaires
$getComment = $conn->prepare('SELECT id_auteur, contenu FROM commentaire WHERE idPubli=:idPubli ORDER BY id_comment DESC');
$getComment->bindParam(':idPubli', $idOfPost, PDO::PARAM_STR, 50);
$getComment->execute();
?>
<?php require('view/post_view.php'); ?>