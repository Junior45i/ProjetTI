<?php
if (isset($_REQUEST['myFunction']) && $_REQUEST['myFunction'] != '') {
    $_REQUEST['myFunction']($_REQUEST);
}
// Permet d'ajouter un post
function ajouterPost($data)
{
    try {
        session_start();
        include('filters/auth_filter.php');
        include('includes/fonctions.php');
        // Permet de n'afficher que si l'utilisateur à su ce connecter

        $title = htmlspecialchars($data['myParams']['title']);
        $content = htmlspecialchars($data['myParams']['content']);

        if(!isset($title) || empty($title) || !isset($content) || empty($content)) {
            echo "Merci de remplir tous les champs";
        }
        elseif (strlen($content) <= 3) {
            echo 'Post trop court';
        }else{ 
            $insertQuestion = $conn->prepare("INSERT INTO publication(title, content, idMem)VALUES(:title,:content,:idMem)");
            $insertQuestion->bindParam(':title', $title, PDO::PARAM_STR, 50);
            $insertQuestion->bindParam(':content', $content, PDO::PARAM_STR, 50);
            $insertQuestion->bindParam(':idMem', $_SESSION['user_id'], PDO::PARAM_STR, 50);
            $insertQuestion->execute();
            echo "valide";
        }
    } catch (PDOException $e) {
        echo "rate";
    }
}
