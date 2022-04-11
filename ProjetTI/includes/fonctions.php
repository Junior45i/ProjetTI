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

if (!function_exists('e')) {
    function e($string){
        if($string){
            return htmlspecialchars($string);
        }
    }
  
}

if (!function_exists('get_session')) {
    function get_session($key){
        if($key){
            return !empty($_SESSION[$key])
            ? e($_SESSION[$key])
            : null;
        }
    }
}

//Récolter info d'un membre
if (!function_exists('find_user_by_id')) {
    function find_user_by_id($id)
    {
        global $conn;

        // A modifier si des infos supp sont à récup dans le futur
        $q = $conn->prepare('SELECT nomMem, preMem, dateNmembre, section, mail, ville, rue, bio, sexe, administrateur FROM membre where idMem =?');
        $q->execute([$id]);

        $data = current($q->fetchAll(PDO::FETCH_OBJ));
        $q->closeCursor();
        return $data;
    }
}

// Vérification de si un utilisateur est déjà présent

if (!function_exists("is_already_in_use")) {
    function is_already_in_use($field, $value, $table)
    {
        global $conn;

        $q = $conn->prepare('SELECT idMem FROM membre WHERE mail = ?');
        $q->execute([$value]);

        $count = $q->rowCount();

        $q->closeCursor();
        return $count;
    }
}

// redirection
if (!function_exists('redirect')) {
    function redirect($page)
    {
        header('Location: ' . $page);
        exit();
    }
}

// sauver donnée input
if (!function_exists('save_input_data')) {
    function save_input_data()
    {
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'mdp') == false) {
                e($_SESSION['input'][$key] = $value);
            }
        }
    }
}

if (!function_exists('get_input')) {
    function get_input($key)
    {
        if (!empty($_SESSION['input'][$key])) {
            return $_SESSION['input'][$key];
        } else {
            return null;
        }
    }
}

// Verifie si l'utilistauer est connecté
if (!function_exists('is_logged_in')) {
    function is_logged_in()
    {
       return isset($_SESSION['user_id']) || isset($_SESSION['pseudo']);
    }
}

