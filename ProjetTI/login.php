<?php
session_start();
// Page login dispo que pour visiteur

include 'config/database.php';
$conn = connectDB("localhost", "proj_tm_bdd", "root", "");
// Si l'utilisateur est déjà connecté, cela le redirige vers son profil
include('filters/guest_filter.php');
// Action du formulaire
try {
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        if (!empty($email)&& !empty($mdp)) {
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
                header('Location: profil.php?id='.$user->idMem);
            } else {
                // Faire en sorte que mauvais il ce passe un truc
                echo "Mauvais mdp/pswd";
            }
        }
    }
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
?>

<?php require('view/login_view.php'); ?>