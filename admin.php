<?php

if (isset($_REQUEST['myFunction']) && $_REQUEST['myFunction'] != '') {
    $_REQUEST['myFunction']($_REQUEST);
}

function tableauMem($data)
{
    try {
        session_start();
        include('filters/auth_filter.php');
        require('includes/fonctions.php');
        include('filters/admin_filter.php');
        $getInfoMembers = $conn->prepare('SELECT * FROM membre');
        $getInfoMembers->execute();
        $rs = $getInfoMembers->fetchAll(PDO::FETCH_ASSOC);
        echo utf8_encode(json_encode($rs));
    } catch (PDOException $e) {
    }
}

function setAdmin($data){
    try {
        session_start();
        include('filters/auth_filter.php');
        include('filters/admin_filter.php');
        require('includes/fonctions.php');
        $idMem = $data['myParams']['idMem'];
        $administrateur = $data['myParams']['changeAdmin'];
        $setAdmin = $conn->prepare('UPDATE membre SET administrateur=:administrateur WHERE idMem=:idMem');
        $setAdmin->bindParam(':administrateur', $administrateur, PDO::PARAM_STR, 50);
        $setAdmin->bindParam(':idMem', $idMem, PDO::PARAM_STR, 50);
        $setAdmin->execute();
        echo "succes";
    } catch (PDOException $e) {
    }
}
