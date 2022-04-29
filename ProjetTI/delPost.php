<?php
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
    echo $idOfQuestion;
            $deleteQuestion = $conn->prepare('DELETE FROM publication WHERE idPubli=:idPubli');
            $deleteQuestion->bindParam(':idPubli', $idOfQuestion, PDO::PARAM_STR, 50);
            $deleteQuestion->execute();
            echo "supprimé";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}