<?php
if (isset($_REQUEST['myFunction']) && $_REQUEST['myFunction'] != '') {
    $_REQUEST['myFunction']($_REQUEST);
}
function connecter($data)
{
    try {
        session_start();
        // Page login dispo que pour visiteur
        // Si l'utilisateur est déjà connecté, cela le redirige vers son profil
        require('includes/fonctions.php');
        include('filters/guest_filter.php');
        // // Action du formulaire
        $email = $data['myParams']['email'];
        $mdp = $data['myParams']['mdp'];

        if (!empty($email) && !empty($mdp)) {
            // $errors = [];
            $sql = $conn->prepare("SELECT idMem,preMem,mdpMembre, nomMem FROM membre 
                            WHERE mail =:email");

            $sql->bindParam(':email', $email, PDO::PARAM_STR, 50);
            // $sql->bindParam(':mdp', $mdp, PDO::PARAM_STR, 50);
            $sql->execute();
            $user = $sql->fetch();

            $userTrouve = $sql->rowCount();
            // Redirection quand utilisateur trouvé
            if ($userTrouve) {
                if (password_verify($mdp, $user['mdpMembre'])) {
                    //Enregistrement d'info à propos de l'utilisateur
                    $_SESSION['user_id'] = $user['idMem'];
                    $_SESSION['pseudo'] = $user['preMem'];
                    $_SESSION['nom'] = $user['nomMem'];
                    echo "success";
                }
                //     } else {
                //         // $errors[] = "Combinaison Identifiant/Password incorrecte";
                //         // save_input_data();

                //     }
                //     } else {
                //         // $errors[] = "Veuillez remplir tout les champs !";
                //         // save_input_data();
            } else {
            }
            // echo "Merci de vérifier vos informations";
        }
        // echo "Merci de remplir les champs";
    } catch (PDOException $e) {
        // echo $sql . "<br>" . $e->getMessage();
    }
}
