<?php
session_start();

include 'config/database.php';
$conn = connectDB("localhost", "proj_tm_bdd", "root", "");
// Action du formulaire
try {
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        header('Location:profil.php');
        if (!empty($email)&& !empty($mdp)) {
            $sql = $conn->prepare("SELECT idMem FROM membre 
                            WHERE mail =:email 
                            AND mdpMembre =:mdp");

            $sql->bindParam(':email', $email, PDO::PARAM_STR, 50);
            $sql->bindParam(':mdp', $mdp, PDO::PARAM_STR, 50);
            $sql->execute();

            $userTrouve = $sql->rowCount();

            if ($userTrouve) {
                header('Location: profil.php');
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