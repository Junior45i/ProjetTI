<?php

if (isset($_REQUEST['myFunction']) && $_REQUEST['myFunction'] != '') {
    $_REQUEST['myFunction']($_REQUEST);
}
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
?>
