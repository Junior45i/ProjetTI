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
        // include('filters/auth_filter.php');
        // // Action du formulaire


        $email = $data['myParams']['email'];
        $mdp = $data['myParams']['mdp'];

        if (!empty($email) && !empty($mdp)) {
            // $errors = [];
            $sql = $conn->prepare("SELECT idMem,preMem, nomMem FROM membre 
                            WHERE mail =:email 
                            AND mdpMembre =:mdp");

            $sql->bindParam(':email', $email, PDO::PARAM_STR, 50);
            $sql->bindParam(':mdp', $mdp, PDO::PARAM_STR, 50);
            $sql->execute();
            // $rs = $sql->fetchAll(PDO::FETCH_ASSOC);
            
            $userTrouve = $sql->rowCount();
            // Redirection quand utilisateur trouvé
            if ($userTrouve) {
        //         //Enregistrement d'info à propos de l'utilisateur
                $user = $sql->fetch(PDO::FETCH_OBJ);
                $_SESSION['user_id'] = $user->idMem;
                $_SESSION['pseudo'] = $user->preMem;
                $_SESSION['nom'] = $user->nomMem;
                echo "success";
                // redirect('profil.php?id=' . $user->idMem);
        //     } else {
        //         // $errors[] = "Combinaison Identifiant/Password incorrecte";
        //         // save_input_data();

        //     }
        //     } else {
        //         // $errors[] = "Veuillez remplir tout les champs !";
        //         // save_input_data();
            }
         }
    } catch (PDOException $e) {
      
        // echo $sql . "<br>" . $e->getMessage();
    }
}
