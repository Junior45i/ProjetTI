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
    $getAllPosts = $conn->query('SELECT title, content, datePubli, compteur_like, idPubli, idMem FROM publication ORDER BY idPubli DESC LIMIT 0,150');
    $rs = $getAllPosts->fetchAll(PDO::FETCH_ASSOC);
    echo utf8_encode(json_encode($rs));
}

?>

<?php //require('view/feed_view.php'); 
?>
