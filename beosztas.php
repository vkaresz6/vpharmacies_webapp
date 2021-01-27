<?php
require_once('config/init.php');

if(!isLogged()){
    $_SESSION['loginError'] = "Információ megtekintéséhez be kell jelentkezni";   
    header('Location: login.php');
    die();
}

printHTML('html/header.html');
printMenu();
printHTML('html/beosztas_form.html');
printHTML('html/footer.html');
$con -> close();

