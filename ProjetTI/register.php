<?php
if (isset($_REQUEST['myFunction']) && $_REQUEST['myFunction'] != '') {
    $_REQUEST['myFunction']($_REQUEST);
}

function register($data)
{
    session_start();

    require('includes/fonctions.php');
    include('filters/guest_filter.php');
    // Action du formulaire

    $nom = htmlspecialchars($data['myParams']['nom']);
    $prenom = htmlspecialchars($data['myParams']['prenom']);
    $naissance = htmlspecialchars($data['myParams']['naissance']);
    $section = htmlspecialchars($data['myParams']['section']);
    $mail = htmlspecialchars($data['myParams']['mail']);
    $mdpNonHash = htmlspecialchars( $data['myParams']['mdp']);
    $mdp = password_hash($mdpNonHash, PASSWORD_BCRYPT, $options = ['cost' => 12]);

    
    // Vérification de l'email
    $rechercheMail = $conn->prepare("SELECT * FROM membre WHERE mail=:mail");
    // Attribution des paramètres de la requête préparée
    $rechercheMail->bindParam(':mail', $mail, PDO::PARAM_STR, 50);
    // Exécution de la requête
    $rechercheMail->execute();
    if ($rechercheMail->fetchColumn()) {
        echo 'Mail déjà enregistrée';
    } 
    elseif ($mail == ""){
        echo 'Email requis';
    }
    elseif(strlen($mdpNonHash)<=3){
        echo 'Mot de passe trop court';
    }
    elseif(empty($nom) || empty($prenom) || empty($naissance) || empty($section) || empty($mail) || empty($mdpNonHash)){
        echo 'Merci de remplir tous les champs';
    }
    else{
    $sql = $conn->prepare("INSERT INTO membre (nomMem, preMem, dateNmembre, section, mail, mdpMembre, idMem) 
                VALUES (:nom, :prenom, :naissance, :section, :mail,:mdp,NULL);");
    $sql->bindParam(':nom', $nom, PDO::PARAM_STR, 50);
    $sql->bindParam(':prenom', $prenom, PDO::PARAM_STR, 50);
    $sql->bindParam(':naissance', $naissance, PDO::PARAM_STR, 50);
    $sql->bindParam(':section', $section, PDO::PARAM_STR, 50);
    $sql->bindParam(':mail', $mail, PDO::PARAM_STR, 50);
    $sql->bindParam(':mdp', $mdp, PDO::PARAM_STR, 50);
    $sql->execute();
    echo "Valide";
    }
}
