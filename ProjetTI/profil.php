<?php
if (isset($_REQUEST['myFunction']) && $_REQUEST['myFunction'] != '') {
    $_REQUEST['myFunction']($_REQUEST);
}
function afficherProfil($data)
{
    try {
        session_start();
        include('filters/auth_filter.php');
        require('includes/fonctions.php');
        $getInfoMembers = $conn->prepare('SELECT nomMem, preMem, dateNmembre, section, mail, telephone, ville, rue, bio, sexe, administrateur FROM membre where idMem =:idMem');
        $getInfoMembers->bindParam(':idMem', $_SESSION['user_id'], PDO::PARAM_STR, 50);
        $getInfoMembers->execute();
        $rs = $getInfoMembers->fetchAll(PDO::FETCH_ASSOC);
        echo utf8_encode(json_encode($rs));
    } catch (PDOException $e) {
    }
}

// if (!empty($_GET['id'])) {
//     $user = find_user_by_id($_GET['id']);

//     if (!$user) {
//         redirect('index.php');
//     }
// } else {
//     redirect('profil_view.php?id=' . get_session('user_id'));
// }

function update($data)
{
    try {
        session_start();
        include('filters/auth_filter.php');
        include('includes/fonctions.php');
        // Permet de n'afficher que si l'utilisateur à su ce connecter

        $ville = $data['myParams']['ville'];
        $rue = $data['myParams']['rue'];
        $bio = $data['myParams']['bio'];
        $sexe = $data['myParams']['sexe'];
        $telephone = $data['myParams']['telephone'];
        $idMem = $_SESSION['user_id'];

        $sql = $conn->prepare("UPDATE membre SET ville=:ville, rue=:rue, bio=:bio, sexe=:sexe, telephone=:telephone WHERE idMem=:idMem");


        $sql->bindParam(':ville', $ville, PDO::PARAM_STR, 50);
        $sql->bindParam(':rue', $rue, PDO::PARAM_STR, 50);
        $sql->bindParam(':bio', $bio, PDO::PARAM_STR, 50);
        $sql->bindParam(':sexe', $sexe, PDO::PARAM_STR, 50);
        $sql->bindParam(':telephone', $telephone, PDO::PARAM_STR, 50);
        $sql->bindParam(':idMem', $_SESSION['user_id'], PDO::PARAM_STR, 50);
        $sql->execute();
        echo "reussi";
    } catch (PDOException $e) {
     
    }
}

// if (isset($_POST['update'])) {

    // $errors = [];
    // $ville = $data['myParams']['ville'];
    // $rue = $data['myParams']['rue'];
    // $bio = $data['myParams']['bio'];
    // $sexe = $data['myParams']['sexe'];
    // $telephone = $data['myParams']['telephone'];
    // $idMem = $_SESSION['user_id'];

    // $sql = $conn->prepare("UPDATE membre SET ville=:ville, rue=:rue, bio=:bio, sexe=:sexe, telephone=:telephone WHERE idMem=:idMem");


    // $sql->bindParam(':ville', $ville, PDO::PARAM_STR, 50);
    // $sql->bindParam(':rue', $rue, PDO::PARAM_STR, 50);
    // $sql->bindParam(':bio', $bio, PDO::PARAM_STR, 50);
    // $sql->bindParam(':sexe', $sexe, PDO::PARAM_STR, 50);
    // $sql->bindParam(':telephone', $telephone, PDO::PARAM_STR, 50);
    // $sql->bindParam(':idMem', $idMem, PDO::PARAM_STR, 50);
    // $sql->execute();
// }

// require("view/profil_view.php");
