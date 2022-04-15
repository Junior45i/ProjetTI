<?php
session_start();
include('filters/auth_filter.php');
include('includes/fonctions.php');

// Récup questions sans recherche
$getAllPosts = $conn->query('SELECT title, content, datePubli, compteur_like, idPubli, idMem FROM publication ORDER BY idPubli DESC LIMIT 0,150');

// Vérifie si il y a une recherche
if(isset($_GET['search']) && !empty($_GET['search'])){

    // La recherche
    $usersSearch = $_GET['search'];

    // récupe les posts de la recherche
    $getAllPosts = $conn->query('SELECT title, content, datePubli, compteur_like, idPubli, idMem FROM publication WHERE title LIKE "%'.$usersSearch.'%" ORDER BY idPubli DESC');
}

?>
<?php require('view/feed_view.php'); ?>