<?php

include 'config/database.php';
$conn = connectDB("localhost", "proj_tm_bdd", "root", "");
// Action du formulaire

try {
    if (isset($_POST['register'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $naissance = $_POST['naissance'];
        $section = $_POST['section'];
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];
        // Vérification de 100% des champs remplit
        if (!empty($nom) && !empty($prenom) && !empty($naissance) && !empty($section) && !empty($mail) && !empty($mdp)) {

            $sql = $conn->prepare("INSERT INTO membre (nomMem, preMem, dateNmembre, section, mail, mdpMembre, idMem) 
                VALUES (:nom, :prenom, :naissance, :section, :mail,:mdp,NULL);");
            $sql->bindParam(':nom', $nom, PDO::PARAM_STR, 50);
            $sql->bindParam(':prenom', $prenom, PDO::PARAM_STR, 50);
            $sql->bindParam(':naissance', $naissance, PDO::PARAM_STR, 50);
            $sql->bindParam(':section', $section, PDO::PARAM_STR, 50);
            $sql->bindParam(':mail', $mail, PDO::PARAM_STR, 50);
            $sql->bindParam(':mdp', $mdp, PDO::PARAM_STR, 50);
            $sql->execute();
        }
        // Ajouter vérification mdp (chapitre 7)

        //Vérifier adresse email valide (chapitre 7)

    }
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

?>


<?php require('view/register_view.php'); ?>