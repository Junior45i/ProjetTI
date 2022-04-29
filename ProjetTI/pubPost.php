<?php
if (isset($_REQUEST['myFunction']) && $_REQUEST['myFunction'] != '') {
    $_REQUEST['myFunction']($_REQUEST);
}
function ajouterPost($data)
{
    try {
        session_start();
        include('filters/auth_filter.php');
        include('includes/fonctions.php');
        // Permet de n'afficher que si l'utilisateur à su ce connecter

        $title = $data['myParams']['title'];
        $content = $data['myParams']['content'];

        $insertQuestion = $conn->prepare("INSERT INTO publication(title, content, idMem)VALUES(:title,:content,:idMem)");
        $insertQuestion->bindParam(':title', $title, PDO::PARAM_STR, 50);
        $insertQuestion->bindParam(':content', $content, PDO::PARAM_STR, 50);
        $insertQuestion->bindParam(':idMem', $_SESSION['user_id'], PDO::PARAM_STR, 50);
        $insertQuestion->execute();
        echo "supprimé";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}
