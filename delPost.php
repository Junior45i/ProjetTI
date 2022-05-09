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
        $deleteCom = $conn->prepare('DELETE FROM commentaire WHERE id_question=:idPubli');
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

function deleteMem($data)
{
    try {
        session_start();
        include('filters/auth_filter.php');
        include('includes/fonctions.php');
        include('filters/admin_filter.php');
        $idOfMem = $data['myParams']['idMem'];

        $deleteCom = $conn->prepare('DELETE FROM commentaire WHERE id_auteur=:idMem');
        $deleteCom->bindParam(':idMem', $idOfMem, PDO::PARAM_STR, 50);
        $deleteCom->execute();

        $deletePub = $conn->prepare('DELETE FROM publication WHERE idMem=:idMem');
        $deletePub->bindParam(':idMem', $idOfMem, PDO::PARAM_STR, 50);
        $deletePub->execute();


        $deleteMem = $conn->prepare('DELETE FROM membre WHERE idMem=:idMem');
        $deleteMem->bindParam(':idMem', $idOfMem, PDO::PARAM_STR, 50);
        $deleteMem->execute();
        echo "success";
    } catch (PDOException $e) {
        echo "nope";
    }
}
