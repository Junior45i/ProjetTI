<?php
//Permet la suppression d'un poste
if (isset($_REQUEST['myFunction']) && $_REQUEST['myFunction'] != '') {
    $_REQUEST['myFunction']($_REQUEST);
}
function delete($data)
{
    try {
        session_start();
        include('filters/auth_filter.php');
        include('includes/fonctions.php');
        $idOfQuestion = $data['myParams']['idPublication'];
        $deleteCom = $conn->prepare('DELETE * from commentaire WHERE id_question=:idPubli');
        $deleteCom->bindParam(':idPubli', $idOfQuestion, PDO::PARAM_STR, 50);
        $deleteCom->execute();
        $deleteQuestion = $conn->prepare('DELETE FROM publication WHERE idPubli=:idPubli');
        $deleteQuestion->bindParam(':idPubli', $idOfQuestion, PDO::PARAM_STR, 50);
        $deleteQuestion->execute();
        echo "success";
    } catch (PDOException $e) {
        echo "nope";
    }
}
