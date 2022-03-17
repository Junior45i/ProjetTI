<?php
    // Selectionne la bonne function
    if (isset($_REQUEST['myFunction']) && $_REQUEST['myFunction'] != '') {    
        $_REQUEST['myFunction']($_REQUEST);
    }


    // Connexion a la BDD
    function connectDB($host, $bdname, $user, $pass){
        try {
            $bdd = new PDO('mysql:host=' . $host .';dbname=' . $bdname . ';charset=utf8', $user, $pass);
        } 
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
        return $bdd;
    }

    function connexion() {
        $nomUser = $_POST['nomUser'];
        $pass = $_POST['pwdUser'];

        echo $nomUser . ' - ' . $pass;
    }



?>