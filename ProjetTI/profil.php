<?php
session_start();

// Permet de n'afficher que si l'utilisateur à su ce connecter
include('filters/auth_filter.php');
require("view/profil_view.php");