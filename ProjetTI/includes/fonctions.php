<?php
include 'config/database.php';
$conn = connectDB("localhost", "proj_tm_bdd", "root", "");
// Pas fonctionelle

// if(!function_exists('e')){
//     function e($string){
//         if($string){
//             return htmlspecialchars($string);
//         }
//     }
// }

// if(!function_exists('get_session')){
//     function get_session($key){
//         if ($key) {
//             return !empty($_SESSION[$key])
//             ? e($_SESSION[$key])
//             :null;
//         }
//     }
// }

//Récolter info d'un membre
if(!function_exists('find_user_by_id')){
    function find_user_by_id($id){
        global $conn;

        // A modifier si des infos supp sont à récup dans le futur
       $q = $conn-> prepare('SELECT nomMem, preMem, dateNmembre, section, mail FROM membre where idMem =?');
       $q->execute([$id]);

        $data = $q->fetchAll(PDO::FETCH_OBJ);
        $q->closeCursor();
        return $data;
    }
}