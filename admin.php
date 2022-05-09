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
        require('includes/fonctions.php');
        $setAdmin = $conn->prepare('UPDATE membre SET administrateur=:setAdmin WHERE idMem=:idMem');
        $setAdmin->bindParam(':idMem', $idMem, PDO::PARAM_STR, 50);
        $setAdmin->bindParam(':setAdmin', $setAdmin, PDO::PARAM_STR, 50);
        $setAdmin->execute();
        $rs = $setAdmin->fetchAll(PDO::FETCH_ASSOC);
        echo ($idMem." ".$setAdmin);
    } catch (PDOException $e) {
    }
}
