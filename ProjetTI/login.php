<?php
    session_start();

include 'config/database.php';
$conn = connectDB("localhost", "proj_tm_bdd", "root", "");
// Action du formulaire
try {
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $mdp = $_POST['mdp']; 

    }
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
?>