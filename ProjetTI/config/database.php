<?php
//Connection à la db
    function connectDB($host, $bdname, $user, $pass){
    try{
    $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $bdname . ';charset=utf8', $user, $pass);
    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(Exception $e){
        die('Erreur:' . $e->getMessage());
    }
    return $bdd;
}
?>
