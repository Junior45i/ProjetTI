<?php
session_start();
include('filters/auth_filter.php');
include('includes/fonctions.php');
if(isset($_GET['idPubli']) && !empty($_GET['idPubli'])){
    $idOfQuestion = $_GET['idPubli'];

    $ifQuestionExists = $conn->prepare('SELECT idPubli, idMem FROM publication WHERE idPubli=:idPubli');
    $ifQuestionExists->bindParam(':idPubli', $idOfQuestion, PDO::PARAM_STR, 50);
    $ifQuestionExists->execute();

    if($ifQuestionExists->rowCount() > 0){
        $userInfos = $ifQuestionExists->fetch();
        if($userInfos['idMem'] == $_SESSION['user_id']){
            $deleteQuestion = $conn->prepare('DELETE FROM publication WHERE idPubli=:idPubli');
            $deleteQuestion->bindParam(':idPubli', $idOfQuestion, PDO::PARAM_STR, 50);
            $deleteQuestion->execute();
            header('Location: myPost.php');
        } else {
            echo "Vous n'avez pas les permissions !";
        }
    }else{
        echo "Aucune post trouvée";
    }

}else{
    echo "Aucun post trouvé";
}