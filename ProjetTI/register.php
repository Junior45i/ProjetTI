<?php

session_start();

require('includes/fonctions.php');
include('filters/guest_filter.php');
// Action du formulaire

if (isset($_POST['register'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $naissance = $_POST['naissance'];
    $section = $_POST['section'];
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    // Vérification de 100% des champs remplit
    if (!empty($nom) && !empty($prenom) && !empty($naissance) && !empty($section) && !empty($mail) && !empty($mdp)) {

        $errors = [];
        if (mb_strlen($nom) < 3) {
            $errors[] = "Pseudo trop court! (Minimum 3 caractères)";
        }

        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Adresse email invalide";
        }

        if (mb_strlen($mdp) < 6) {
            $errors[] = "Mot de passe trop court! (Minimum 6 caractères)";
        }

        if (is_already_in_use('mail', $mail, 'membre')) {
            $errors[] = "Email déjà utilisée";
        }

        if (count($errors) == 0) {
            echo "test";
            $sql = $conn->prepare("INSERT INTO membre (nomMem, preMem, dateNmembre, section, mail, mdpMembre, idMem) 
                VALUES (:nom, :prenom, :naissance, :section, :mail,:mdp,NULL);");
            $sql->bindParam(':nom', $nom, PDO::PARAM_STR, 50);
            $sql->bindParam(':prenom', $prenom, PDO::PARAM_STR, 50);
            $sql->bindParam(':naissance', $naissance, PDO::PARAM_STR, 50);
            $sql->bindParam(':section', $section, PDO::PARAM_STR, 50);
            $sql->bindParam(':mail', $mail, PDO::PARAM_STR, 50);
            $sql->bindParam(':mdp', $mdp, PDO::PARAM_STR, 50);
            $sql->execute();
            redirect('profil.php');
        } else {
            save_input_data();
        }
        //remplacer par un renvoie json
    } else {
        $errors[] = "Veuillez remplir tout les champs !";
        save_input_data();
    }

    // Ajouter vérification mdp (chapitre 7)

    //Vérifier adresse email valide (chapitre 7)

} else {
    session_destroy();
}

?>


<?php require('view/register_view.php'); ?>