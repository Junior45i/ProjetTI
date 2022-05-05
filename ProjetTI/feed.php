<?php

if (isset($_REQUEST['myFunction']) && $_REQUEST['myFunction'] != '') {
    $_REQUEST['myFunction']($_REQUEST);
}

// Récupère toute les posts et le nombre de commentaire sur un post
function rechercheGlobale($data)
{
    session_start();
    include('filters/auth_filter.php');
    include('includes/fonctions.php');
    // Récup questions sans recherche
    $getAllPosts = $conn->query('SELECT (select count(*) from commentaire where id_question=idPubli) as nbCom , preMem, nomMem, title, content, datePubli, compteur_like, idPubli, idMem FROM publication inner join membre using(idMem) ORDER BY idPubli DESC LIMIT 0,150');
    //select count(*) from commentaire where id_question=idPubli as test
    //Calcul du nombre de commentaire
    $rs = $getAllPosts->fetchAll(PDO::FETCH_ASSOC);
    echo utf8_encode(json_encode($rs));
}

// Affichage du profil sur la gauche
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

// Affichage du profil de l'utilisateur ayant un click
function rechercheUtilisateur($data)
{
    session_start();
    include('filters/auth_filter.php');
    include('includes/fonctions.php');
    $idMem = $data['myParams']['idMem'];
    // Récup questions sans recherche
    $getInfo = $conn->prepare('SELECT * FROM membre WHERE idMem=:idMem');
    $getInfo->bindParam(':idMem', $idMem, PDO::PARAM_STR, 50);
    $getInfo->execute();
    $rs = $getInfo->fetchAll(PDO::FETCH_ASSOC);
    echo utf8_encode(json_encode($rs));
}   
?>