<?php
session_start();
// Page login dispo que pour visiteur
// Si l'utilisateur est déjà connecté, cela le redirige vers son profil
require('includes/fonctions.php');
include('filters/guest_filter.php');
// Action du formulaire

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    if (!empty($email) && !empty($mdp)) {
        $errors = [];
        $sql = $conn->prepare("SELECT idMem,preMem  FROM membre 
                            WHERE mail =:email 
                            AND mdpMembre =:mdp");

        $sql->bindParam(':email', $email, PDO::PARAM_STR, 50);
        $sql->bindParam(':mdp', $mdp, PDO::PARAM_STR, 50);
        $sql->execute();

        $userTrouve = $sql->rowCount();

        // Redirection quand utilisateur trouvé
        if ($userTrouve) {
            //Enregistrement d'info à propos de cette utilisateur
            $user = $sql->fetch(PDO::FETCH_OBJ);

            $_SESSION['user_id'] = $user->idMem;
            $_SESSION['pseudo'] = $user->preMem;
            $_SESSION['nom'] = $user->nomMem;
            redirect('profil.php?id='.$user->idMem);
        } else {
            $errors[] = "Combinaison Identifiant/Password incorrecte";
            save_input_data();
        }
    }else {
        $errors[] = "Veuillez remplir tout les champs !";
        save_input_data();
    }
} else {
    session_destroy();
}
?>

<?php require('view/login_view.php'); ?>