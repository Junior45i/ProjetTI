<?php

// Pas fonctionelle

if(!function_exists('e')){
    function e($string){
        if($string){
            return htmlspecialchars($string);
        }
    }
}

if(!function_exists('get_session')){
    function get_session($key)
    {
        if ($key) {
            return htmlspecialchars($key);
        }
    }
}